<?php

namespace App\Http\Controllers\Pub;

use Carbon\Carbon;
use DateService;
use App\Http\Requests\ApplicationContactRequest;
use App\Http\Requests\ApplicationFreeRequest;
use App\Http\Requests\UltimateRequest;
use App\Models\ContactApplication;
use App\Models\FreeSessionApplication;
use App\Models\UltimateDesign;
use App\Services\ImageService;
use App\Srvices\Google\GoogleCalendarService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationsController extends Controller
{
    public function contactStore(ApplicationContactRequest $request)
    {

        /** @var ContactApplication $application */
        $application = new ContactApplication();
        //store model
        $application->fill($request->except('_token'))->save();

        //send response
        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * @param ApplicationFreeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function freeStore(ApplicationFreeRequest $request)
    {

        /** @var ContactApplication $application */
        $application = new FreeSessionApplication();
        //store model
        $application->fill($request->except('_token', 'signature','confirm_email','dob','date_of_last_check'));

        if(isset($request->dob) && DateService::isValid($request->dob,"m/d/Y")) {
            $application->dob = Carbon::createFromFormat("m/d/Y",$request->dob);
        }
        else {
            $application->dob = Carbon::now();
        }
        if(isset($request->date_of_last_check) && DateService::isValid($request->date_of_last_check,"m/d/Y")) {
            $application->date_of_last_check = Carbon::createFromFormat("m/d/Y",$request->date_of_last_check);
        }
        else {
            $application->date_of_last_check = Carbon::now();
        }


        if ($request->input('signature')) {
            $application->signature = ImageService::handleImageFromBase64($request->signature,
                'app/public/files/signaturs/');
        }
        if ($application->save()) {
            if (GoogleCalendarService::handleAddToCalendar($application)) {
                //send response
                //$request->session()->flash('status', 'success');
                return response()->json([
                    'status' => 'success'
                ]);
            }
        }
        //send response
        return response()->json([
            'status' => 'fail'
        ]);
    }

    /**
     * @param ApplicationFreeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ultimateStore(UltimateRequest $request)
    {

        /** @var UltimateDesign $ultimate */
        $ultimate = new UltimateDesign();
        //store model
        $ultimate->fill($request->except('_token'));

        if ($ultimate->save()) {
            //send response
            return response()->json([
                'status' => 'success'
            ]);

        }
        //send response
        return response()->json([
            'status' => 'fail'
        ]);
    }
}
