<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogCommentRequest;
use App\Models\BlogComments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCommentsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Collection $pages */
        $blogsComments = BlogComments::orderBy('created_at', 'DESC')->paginate(config('settings.blog_comments_paginate'));

        /** @var String $title */
        $this->title = "Blog comments";

        /** @var String $content */
        $content = view('administrator::include.blogs-comments')->with(['blogsComments' => $blogsComments, 'title' => $this->title])->render();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComments $blogs_comment)
    {

        /** @var String $title */
        $this->title = __('blog.comments_edit_title', ['title' => $blogs_comment->name]);

        /** @var String $content */
        $content = view('administrator::include.blogs-comments-form')->with([
            'blogComment' => $blogs_comment,
            'title' => $this->title
        ])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCommentRequest $request, BlogComments $blogs_comment)
    {
        $blogs_comment->fill($request->except('_token'));

        if ($blogs_comment->save()) {

            return redirect()->route('blogs-comments.index')
                ->with(
                    [
                        'message' => \trans('blog.comments_update_success_message'),
                        'status' => 'success',
                    ]
                );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComments $blogs_comment)
    {
        //
        $blogs_comment->comments()->delete();
        $blogs_comment->delete();
        return redirect()->route('blogs-comments.index')
            ->with(
                [
                    'message' => \trans('blog.comments_delete_success_message'),
                    'status' => 'success',
                ]
            );
    }
}
