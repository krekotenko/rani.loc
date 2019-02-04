<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramsRequest;
use App\Services\ImageService;

class ProgramsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Program $pages */
        $pages = Program::orderBy('created_at', 'DESC')->paginate(config('settings.paginate_admin'));

        /** @var String $title */
        $this->title = "Programs";

        /** @var String $content */
        $content = view('administrator::include.programs')->with(['pages' => $pages, 'title' => $this->title])->render();
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
        /** @var String $title */
        $this->title = "Create Programs";

        $testimonials = [];
        $testimonialsAll = [];
        $testimonialsAll = Testimonial::all();

        /** @var String $content */
        $content = view('administrator::include.programs-form')->with(['title' => $this->title,'testimonialsAll'=>$testimonialsAll,'testimonials' => $testimonials])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProgramsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramsRequest $request)
    {

        /** @var Program $program */
        $program = new Program();
        $program->fill($request->except('_token'));
        if($request->hasFile('background_img')){
            $program->background_img = ImageService::handleUploadedImage(
                $request->background_img,
                config('settings')['pages']['programs_page_background_image']['width'],
                config('settings')['pages']['programs_page_background_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };


        if($request->hasFile('icon_1')){
            $program->icon_1 = ImageService::handleUploadedSvgImage(
                $request->icon_1,
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('icon_2')){
            $program->icon_2 = ImageService::handleUploadedSvgImage(
                $request->icon_2,
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('icon_3')){
            $program->icon_3 = ImageService::handleUploadedSvgImage(
                $request->icon_3,
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('icon_4')){
            $program->icon_4 = ImageService::handleUploadedSvgImage(
                $request->icon_4,
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('icon_5')){
            $program->icon_5= ImageService::handleUploadedSvgImage(
                $request->icon_5,
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('icon_6')){
            $program->icon_6 = ImageService::handleUploadedSvgImage(
                $request->icon_6,
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('path_image_1')){
            $program->path_image_1 = ImageService::handleUploadedImage(
                $request->path_image_1,
                config('settings')['pages']['programs_page_image']['width'],
                config('settings')['pages']['programs_page_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('path_image_2')){
            $program->path_image_2 = ImageService::handleUploadedImage(
                $request->path_image_2,
                config('settings')['pages']['programs_page_image']['width'],
                config('settings')['pages']['programs_page_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('path_image_3')){
            $program->path_image_3 = ImageService::handleUploadedImage(
                $request->path_image_3,
                config('settings')['pages']['programs_page_image']['width'],
                config('settings')['pages']['programs_page_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };

        //store model
        $program->save();
            return\Redirect::route('programs.edit',['program' => $program->id])
                ->with(
                    [
                        'message' => \trans('admin.pages_update_success_message'),
                        'status' => 'success',
                    ]
                );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
        ///** @var String $title */
        $this->title = $program->title;

        $testimonials = [];
        $testimonialsAll = [];

        $testimonials = $program->testimonials()->orderBy('section_id', 'ASC')->orderBy('position_id', 'ASC')->get();
        $testimonialsAll = Testimonial::all();

        /** @var String $content */
        $content = view('administrator::include.programs-form')->with(['program' => $program, 'title' => $this->title,'testimonials' => $testimonials,
            'testimonialsAll' => $testimonialsAll])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        /** @var Program $application */

        //update model
        $program->fill($request->except('_token'));


        if($request->hasFile('background_img')){
            $program->background_img = ImageService::handleUploadedImage(
                $request->background_img,
                config('settings')['pages']['programs_page_background_image']['width'],
                config('settings')['pages']['programs_page_background_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };


        /** @var Program $application */
        if($request->hasFile('icon_1')){
            $program->icon_1 = ImageService::handleUploadedSvgImage(
                $request->icon_1,
                public_path().'/storage/images/programs/'
            );
        };


        if($request->hasFile('icon_2')){
            $program->icon_2 = ImageService::handleUploadedSvgImage(
                $request->icon_2,
                public_path().'/storage/images/programs/'
            );
        };

        if($request->hasFile('icon_3')){
            $program->icon_3 = ImageService::handleUploadedSvgImage(
                $request->icon_3,
                public_path().'/storage/images/programs/'
            );
        };

        if($request->hasFile('icon_4')){
            $program->icon_4 = ImageService::handleUploadedSvgImage(
                $request->icon_4,
                public_path().'/storage/images/programs/'
            );
        };

        if($request->hasFile('icon_5')){
            $program->icon_5= ImageService::handleUploadedSvgImage(
                $request->icon_5,
                public_path().'/storage/images/programs/'
            );
        };

        if($request->hasFile('icon_6')){
            $program->icon_6 = ImageService::handleUploadedSvgImage(
                $request->icon_6,
                public_path().'/storage/images/programs/'
            );
        };

        if($request->hasFile('path_image_1')){
            $program->path_image_1 = ImageService::handleUploadedImage(
                $request->path_image_1,
                config('settings')['pages']['programs_page_image']['width'],
                config('settings')['pages']['programs_page_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('path_image_2')){
            $program->path_image_2 = ImageService::handleUploadedImage(
                $request->path_image_2,
                config('settings')['pages']['programs_page_image']['width'],
                config('settings')['pages']['programs_page_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };
        if($request->hasFile('path_image_3')){
            $program->path_image_3 = ImageService::handleUploadedImage(
                $request->path_image_3,
                config('settings')['pages']['programs_page_image']['width'],
                config('settings')['pages']['programs_page_image']['height'],
                public_path().'/storage/images/programs/'
            );
        };

        $program->update();

        if ($request->testimonials) {
            $program->testimonials()->detach();
            $count = 1;
            $position_id = 1;
            $section_id = 1;
            foreach ($request->testimonials as $key => $testimonial) {
                if ($testimonial) {
                    if ($key <= 5) {
                        if (($position_id % 13) == 0) {
                            $position_id = 1;
                            $section_id++;
                        }
                        list($page_id, $testimonial_id) = explode('|', $testimonial);
                        $program->testimonials()->attach($page_id, [
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

        return\back()->with(
                [
                    'message' => \trans('admin.pages_update_success_message'),
                    'status' => 'success',
                ]
         );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->testimonials()->detach();
        $program->delete();

        // redirect back to page
        return \back()
            ->with(
                [
                    'message' => \trans('admin.program_delete_success_message'),
                    'status' => 'success',
                ]
            );
    }
}
