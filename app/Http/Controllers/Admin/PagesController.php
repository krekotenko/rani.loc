<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\Testimonial;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Services\Pages\PageCheckService;
use App\Http\Controllers\Controller;

class PagesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Collection $pages */
        $pages = Page::all();

        /** @var String $title */
        $this->title = "Pages";

        /** @var String $content */
        $content = view('administrator::include.pages')->with(['pages' => $pages, 'title' => $this->title])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        /** @var String $title */
        $this->title = __('admin.pages_edit_title', ['title' => $page->title]);

        /*$page->datas->transform(function($item) {
            $item->load('field');
        });*/
        $testimonials = [];
        $testimonialsAll = [];

        $maxTestimonials = 0;
        if($page->alias == 'home') {
            $maxTestimonials = 6;
        }
        if ($page->alias == 'home' || $page->alias == 'client-stories') {
            $testimonials = $page->testimonials()->orderBy('section_id', 'ASC')->orderBy('position_id', 'ASC')->get();
            $testimonialsAll = Testimonial::all();
        }

        /** @var String $content */
        $content = view('administrator::include.pages-form')->with([
            'page' => $page,
            'testimonials' => $testimonials,
            'testimonialsAll' => $testimonialsAll,
            'title' => $this->title,
            'maxTestimonials' => $maxTestimonials
        ])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        //update page
        $page->fill($request->except('fields', '_token'));
        $page->update();

        //check page fields
        if ($request->fields) {

            //update fields
            foreach ($request->fields as $key => $field) {

                /** @var Data $model */
                $model = $page->datas->where('alias', $key)->first();
                if($model) {
                    if($model->field->alias != 'file') {
                        $model->value = $field;
                    } else if ($model->alias == 'audio_file') {
                        $model->value = ImageService::handleUploadedAudio(
                            $field,
                            public_path().'/storage/audio/'
                        );
                    }
                    else {
                        if(is_object($field)) {
                            
                            /** @var ineger $width */
                            $width = 0;
                            /** @var ineger $height */
                            $height = 0;
                            
                            //add width and height for image
                            if($model->additional) {
                                list($width, $height) = explode(',',$model->additional);
                            }
                            //save image and get path
                            $model->value = ImageService::handleUploadedImage(
                                    $field,
                                    $width,
                                    $height,
                                    public_path().'/storage/images/pages/'
                                );
                        }
                    }
                    //update data model
                    $model->update();
                }
            }
        }

        if ($request->testimonials) {
            $page->testimonials()->detach();
            $count = 1;
            $position_id = 1;
            $section_id = 1;
            foreach ($request->testimonials as $key => $testimonial) {
                if ($testimonial) {
                    if ($page->alias == 'home') {
                        if ($key <= 5) {
                            if (($position_id % 13) == 0) {
                                $position_id = 1;
                                $section_id++;
                            }
                            list($page_id, $testimonial_id) = explode('|', $testimonial);
                            $page->testimonials()->attach($page_id, [
                                'testimonial_id' => $testimonial_id,
                                'position_id' => $position_id,
                                'section_id' => $section_id
                            ], false);
                            $position_id++;
                            $count++;
                        }
                    } else {
                        if (($position_id % 13) == 0) {
                            $position_id = 1;
                            $section_id++;
                        }
                        list($page_id, $testimonial_id) = explode('|', $testimonial);
                        $page->testimonials()->attach($page_id, [
                            'testimonial_id' => $testimonial_id,
                            'position_id' => $position_id,
                            'section_id' => $section_id
                        ], false);
                        $position_id++;
                        $count++;
                    }
                }
            }

        }
        // redirect back to page
        return \back()
                 ->with(
                     [
                     'message' => \trans('admin.pages_update_success_message'),
                     'status' => 'success',
                     ]
                 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
