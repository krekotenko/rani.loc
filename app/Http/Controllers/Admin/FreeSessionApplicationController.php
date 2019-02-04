<?php

namespace App\Http\Controllers\Admin;

use App\Models\FreeSessionApplication;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeSessionApplicationController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var ContactApplication $applications */
        $applications = FreeSessionApplication::orderBy('created_at', 'DESC')->paginate(config('settings.paginate_admin'));

        /** @var String $title */
        $this->title = "Free Sessions Applications";

        /** @var String $content */
        $content = view('administrator::include.free-applications')->with(['applications' => $applications, 'title' => $this->title])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPdf(FreeSessionApplication $free_application)
    {
        $pdf = PDF::loadView('administrator::pdf.free_session', ['free_application' => $free_application]);
        return $pdf->download('document.pdf');
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
    public function destroy(FreeSessionApplication $free_application)
    {
        $free_application->delete();
        // redirect back to page
        return \back()
            ->with(
                [
                    'message' => \trans('admin.free_delete_success_message'),
                    'status' => 'success',
                ]
            );
    }
}
