<?php

namespace App\Http\Controllers\Admin;

use App\Models\FreeSessionApplication;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends AdminController
{

    /**
     * AdminController constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function getData() {

        /** @var ContactApplication $applications */
        $applications = new FreeSessionApplication();
        $applications = $applications->getStats()->toArray();

        /** @var array $chartCategories */
        $chartCategories = array_keys($applications);

        /** @var array $chartData */
        $chartData = array_values($applications);
        array_unshift($chartData,"free session");



        //send response
        return response()->json([
            'chartData' => $chartData,
            'chartCategories' => $chartCategories,
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var String $template */
        $this->template = 'administrator::home';

        /** @var String $title */
        $this->title = "Administrator Area";
        /** @var String $content */
        $content = view('administrator::include.home')->with(['title' => $this->title])->render();
        $this->vars = array_add($this->vars,'content', $content);

        //render output
        return $this->renderOutput();
    }
}
