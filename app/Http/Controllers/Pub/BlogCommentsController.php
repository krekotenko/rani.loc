<?php

namespace App\Http\Controllers\Pub;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Blog;
use App\Models\BlogComments;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(BlogCommentRequest $request, Blog $blog)
    {
        /** @var BlogComments $comment */
        $comment = new BlogComments($request->except('photo','blog_id','comment_id'));

        if(isset($request->photo) && $request->hasFile('photo')) {
            $comment->photo = ImageService::handleUploadedImage(
                $request->photo,
                config('settings.blog_comments_photo.width'),
                config('settings.blog_comments_photo.height'),
                public_path() . '/storage/images/blog/'
            );
        }

        if($request->comment_id) {
            $comment->comment_id = $request->comment_id;
        }
        $blog->comments()->save($comment);

        return response()->json([
            'status' => 'success'
        ]);

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
