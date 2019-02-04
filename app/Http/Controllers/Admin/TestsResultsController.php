<?php

namespace App\Http\Controllers\Admin;

use App\Models\TestsResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestsResultsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var TestsResult $results */
        $results = TestsResult::orderBy('created_at', 'DESC')->paginate(config('settings.paginate_admin'));

        /** @var String $title */
        $this->title = "Tests Results";

        /** @var String $content */
        $content = view('administrator::include.tests-results')->with(['results' => $results, 'title' => $this->title])->render();
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
    public function destroy(TestsResult $tests_result)
    {


        $tests_result->delete();

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
