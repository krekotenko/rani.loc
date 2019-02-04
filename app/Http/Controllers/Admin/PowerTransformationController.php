<?php

namespace App\Http\Controllers\Admin;

use App\Models\PowerTransformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PowerTransformationController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var PowerTransformation $results */
        $results = PowerTransformation::orderBy('created_at', 'DESC')->paginate(config('settings.paginate_admin'));

        /** @var String $title */
        $this->title = "Growth for groups Applications";

        /** @var String $content */
        $content = view('administrator::include.power-transformation')->with(['results' => $results, 'title' => $this->title])->render();
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
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return \Illuminate\Http\Response
     */
    public function show(PowerTransformation $powerTransformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PowerTransformation $powerTransformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PowerTransformation $powerTransformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PowerTransformation $powerTransformation)
    {
        //
        $powerTransformation->delete();

        // redirect back to page
        return \back()
            ->with(
                [
                    'message' => \trans('admin.tests_results_success_message'),
                    'status' => 'success',
                ]
            );
    }
}
