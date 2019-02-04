<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;

/**
 * Class TestimonialsController
 * @package App\Http\Controllers\Admin
 */
class TestimonialsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Testimonial $testimonials */
        $testimonials = Testimonial::orderBy('client_name')->paginate(config('settings.paginate_admin'));

        /** @var String $title */
        $this->title = "Testimonials";

        /** @var String $content */
        $content = view('administrator::include.testimonials')->with(['testimonials' => $testimonials, 'title' => $this->title])->render();
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
        $this->title = "Create Testimonials";

        /** @var String $content */
        $content = view('administrator::include.testimonials-form')->with(['title' => $this->title])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * @var Testimonial $testimonial
         */
        $testimonial = new Testimonial();
        if($request->hasFile('img_1')){
            $testimonial->img_1 = ImageService::handleUploadedImage(
                $request->img_1,
                config('settings')['testimonials']['img_1']['width'],
                config('settings')['testimonials']['img_1']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_2')){
            $testimonial->img_2 = ImageService::handleUploadedImage(
                $request->img_2,
                config('settings')['testimonials']['img_2']['width'],
                config('settings')['testimonials']['img_2']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_3')){
            $testimonial->img_3 = ImageService::handleUploadedImage(
                $request->img_3,
                config('settings')['testimonials']['img_3']['width'],
                config('settings')['testimonials']['img_3']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_4')){
            $testimonial->img_4 = ImageService::handleUploadedImage(
                $request->img_4,
                config('settings')['testimonials']['img_4']['width'],
                config('settings')['testimonials']['img_4']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_5')){
            $testimonial->img_5 = ImageService::handleUploadedImage(
                $request->img_5,
                config('settings')['testimonials']['img_5']['width'],
                config('settings')['testimonials']['img_5']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_6')){
            $testimonial->img_6 = ImageService::handleUploadedImage(
                $request->img_6,
                config('settings')['testimonials']['img_6']['width'],
                config('settings')['testimonials']['img_6']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_7')){
            $testimonial->img_7 = ImageService::handleUploadedImage(
                $request->img_7,
                config('settings')['testimonials']['img_7']['width'],
                config('settings')['testimonials']['img_7']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };

        //store model
        $testimonial->fill($request->except('_token'))->save();
        return\Redirect::route('testimonials.index')
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
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
        ///** @var String $title */
        $this->title = $testimonial->title;

        /** @var String $content */
        $content = view('administrator::include.testimonials-form')->with(['testimonial' => $testimonial, 'title' => $this->title])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {

        if($request->hasFile('img_1')){
            $testimonial->img_1 = ImageService::handleUploadedImage(
                $request->img_1,
                config('settings')['testimonials']['img_1']['width'],
                config('settings')['testimonials']['img_1']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_2')){
            $testimonial->img_2 = ImageService::handleUploadedImage(
                $request->img_2,
                config('settings')['testimonials']['img_2']['width'],
                config('settings')['testimonials']['img_2']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_3')){
            $testimonial->img_3 = ImageService::handleUploadedImage(
                $request->img_3,
                config('settings')['testimonials']['img_3']['width'],
                config('settings')['testimonials']['img_3']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_4')){
            $testimonial->img_4 = ImageService::handleUploadedImage(
                $request->img_4,
                config('settings')['testimonials']['img_4']['width'],
                config('settings')['testimonials']['img_4']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_5')){
            $testimonial->img_5 = ImageService::handleUploadedImage(
                $request->img_5,
                config('settings')['testimonials']['img_5']['width'],
                config('settings')['testimonials']['img_5']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_6')){
            $testimonial->img_6 = ImageService::handleUploadedImage(
                $request->img_6,
                config('settings')['testimonials']['img_6']['width'],
                config('settings')['testimonials']['img_6']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };
        if($request->hasFile('img_7')){
            $testimonial->img_7 = ImageService::handleUploadedImage(
                $request->img_7,
                config('settings')['testimonials']['img_7']['width'],
                config('settings')['testimonials']['img_7']['height'],
                public_path().'/storage/images/testimonials/'
            );
        };

        //update model
        $testimonial->fill($request->except('_token'))->update();

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
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        $testimonial->pages()->detach();
        $testimonial->programs()->detach();
        $testimonial->delete();

        return \back()
            ->with(
                [
                    'message' => \trans('admin.testimonials_delete_success_message'),
                    'status' => 'success',
                ]
            );

    }
}
