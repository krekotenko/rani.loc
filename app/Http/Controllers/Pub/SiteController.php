<?php

namespace App\Http\Controllers\Pub;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;

class SiteController extends Controller
{
    //var for template
    protected $vars = array();
    //var for title page
    protected $title = FALSE;

    protected $description = FALSE;
    //var for template
    protected $template = FALSE;

    public function __construct() {
        return TRUE;
    }

    /**
     * @return $this
     */
    protected function renderOutput() {

        //add title
        $this->vars = array_add($this->vars,'title', $this->title);
        //add description
        $this->vars = array_add($this->vars,'description', $this->description);
        //add programs
        $programs = Program::all('name','alias','type','titleH1','show_message')->where('show_message', '<>', 1)->all();
        $this->vars = array_add($this->vars,'programs', $programs);

        $page = Page::where('alias','get-started')->firstOrFail();
        $video = $page->datas->where('alias','video_url')->first()->value;
        $this->vars = array_add($this->vars,'video', $video);

        //render view
        return view($this->template)->with($this->vars);
    }
}
