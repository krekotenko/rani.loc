<?php

namespace App\Http\Controllers\Pub;


use App\Models\TestsResult;
use App\Models\PowerTransformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestsResultsController extends Controller
{
    public function resultStore(Request $request) {
        /** @var TestsResult $result*/
        $result = new TestsResult();
        //store model
        $result->fill($request->except('_token'))->save();

        //send response
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function PowerStore(Request $request) {
        /** @var PowerTransformation $power*/
        $power = new PowerTransformation();
        //store model
        $power->fill($request->except('_token'))->save();

        //send response
        return response()->json([
            'status' => 'success'
        ]);
    }
}
