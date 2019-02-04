<?php

namespace App\Http\Controllers\Pub;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends SiteController
{
    public function __construct()
    {
        parent::__construct();
        //template
        $this->template = 'public::pages';
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function index(Program $program)
    {
        if ($program->show_message) {
            abort(404);
        }
        $this->title = $program->title;
        $this->description = $program->description;

        $testimonials = $program->testimonials;
        $testimonials->transform(function ($item) {
            $item->short_description = substr($item->description, 0, strpos(wordwrap($item->description, 100), "\n")). '...';
            return $item;
        });

        /** @var String $content */
        $content = view('public::include.program')->with(['program' => $program, 'testimonials' => $testimonials])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }
}
