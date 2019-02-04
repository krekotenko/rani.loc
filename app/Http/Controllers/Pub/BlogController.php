<?php

namespace App\Http\Controllers\Pub;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends SiteController
{

    /**
     * BlogController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        //template
        $this->template = 'public::pages';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /** @var Collection $blogs */
        $blogs = Blog::blogs()->paginate(config('settings.blog_paginate') + 1);
        if (isset($_GET['page'])) {
            $blogs->slice(1);
        }

        /** @var String $template */
        $template = 'public::include.pages-blogs';

        if (!$request->ajax()) {
            /** @var Blog $first */
            $first = $blogs->shift();
        }

        /** @var String $blogContent */
        $blogsContent = view($template . '-content')->with(['blogs' => $blogs])->render();

        //check request type
        if ($request->ajax()) {
            return response()->json([
                'url' => $blogs->url($blogs->currentPage() + 1),
                'blogsContent' => $blogsContent,
                'status' => 'success'
            ]);
        }

        /** @var Page $page */
        $page = Page::where('alias', 'blog')->orderBy('created_at', 'DESC')->firstOrFail();

        /** @var Collection $popular */
        $popular = Blog::popular()->get();
        /** @var String $blogsPopular */
        $blogsPopular = view($template . '-popular')->with(['popular' => $popular])->render();

        $this->title = $page->title;
        $this->description = $page->description;

        /** @var String $content */
        $content = view($template)->with([
            'page' => $page,
            'first' => $first,
            'blogsPopular' => $blogsPopular,
            'blogsContent' => $blogsContent
        ])->render();
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
    public function show(Blog $blog)
    {
        $blog->increment('views');

        $blog->load('commentsPub','tips');

        /** @var Collection $popular */
        $popular = Blog::popular()->get();

        /** @var String $blogsPopular */
        $blogsPopular = view('public::include.pages-blogs-popular')->with(['popular' => $popular])->render();

        /** @var String $content */
        $content = view('public::include.pages-blog')->with([
            'blog' => $blog,
            'blogsPopular' => $blogsPopular,
            'popular' => $popular
        ])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
