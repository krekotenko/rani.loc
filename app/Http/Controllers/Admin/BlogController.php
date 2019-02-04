<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogTips;
use App\Services\ImageService;
use App\Services\Url\UrlService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Collection $pages */
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(config('settings.blog_paginate_admin'));

        /** @var String $title */
        $this->title = "Blog";

        /** @var String $content */
        $content = view('administrator::include.blogs')->with(['blogs' => $blogs, 'title' => $this->title])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAlias(Request $request)
    {
        if (isset($request->titleH1)) {
            $urlService = new UrlService(new Blog());
            //send response
            return response()->json([
                'status' => 'success',
                'alias' => $urlService->getAlias($request->titleH1)
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** @var String $title */
        $this->title = __("blog.posts_create_page_title");

        /** @var Collection $blogs */
        $blogs = Blog::all();

        /** @var String $content */
        $content = view('administrator::include.blogs-form')->with([
            'title' => $this->title,
            'blogs' => $blogs
        ])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        /** @var Blog $blog */
        $blog = new Blog();
        //store model
        $blog->fill($request->except('_token', 'banner', 'blog_id','tips'));
        $blog->banner = ImageService::handleUploadedImage(
            $request->banner,
            config('settings.blog_banner.width'),
            config('settings.blog_banner.height'),
            public_path() . '/storage/images/blog/'
        );
        ImageService::handleUploadedImage(
            $request->banner,
            config('settings.blog_banner_mini.width'),
            config('settings.blog_banner_mini.height'),
            public_path() . '/storage/images/blog/',
            'mini_'.$blog->banner
        );

        if ($blog->save()) {

            if(isset($request->tips) && $request->tips) {
                foreach ($request->tips as $item) {
                    $tip = new BlogTips();
                    $tip->text = $item;
                    $tip->blog()->associate($blog)->save();
                }
            }

            if (isset($request->blog_id)) {
                $blog->related()->sync($request->blog_id);
            }
            return redirect()->route('blogs.index')
                ->with(
                    [
                        'message' => \trans('blog.posts_create_success_message'),
                        'status' => 'success',
                    ]
                );
        }
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
    public function edit(Blog $blog)
    {
        /** @var String $title */
        $this->title = __('blogs.posts_edit_title', ['title' => $blog->titleH1]);

        /** @var Collection $blogs */
        $blogs = Blog::all();

        $related = [];

        $related = $blog->related->map(function ($item) {
            return $item->id;
        })->toArray();


        /** @var String $content */
        $content = view('administrator::include.blogs-form')->with([
            'blog' => $blog,
            'blogs' => $blogs,
            'related' =>$related,
            'title' => $this->title
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
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->fill($request->except('_token', 'banner', 'blog_id'));
        if(isset($request->banner)) {
            $blog->banner = ImageService::handleUploadedImage(
                $request->banner,
                config('settings.blog_banner.width'),
                config('settings.blog_banner.height'),
                public_path() . '/storage/images/blog/'
            );
            ImageService::handleUploadedImage(
                $request->banner,
                config('settings.blog_banner_mini.width'),
                config('settings.blog_banner_mini.height'),
                public_path() . '/storage/images/blog/',
                'mini_'.$blog->banner
            );
        }

        if ($blog->save()) {
            $blog->tips()->delete();
            if(isset($request->tips) && $request->tips) {
                foreach ($request->tips as $item) {
                    $tip = new BlogTips();
                    $tip->text = $item;
                    $tip->blog()->associate($blog)->save();
                }
            }


            if (isset($request->blog_id) && count($request->blog_id) > 0) {
                $blog->related()->sync($request->blog_id);
            }
            return redirect()->route('blogs.index')
                ->with(
                    [
                        'message' => \trans('blog.posts_update_success_message'),
                        'status' => 'success',
                    ]
                );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->related()->detach();
        $blog->comments()->delete();
        $blog->tips()->delete();
        $blog->delete();
        return \back()
            ->with(
                [
                    'message' => \trans('blog.post_delete_success_message'),
                    'status' => 'success',
                ]
            );
    }
}
