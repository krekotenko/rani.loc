<?php

namespace App\Observers;

use App\Models\PowerTransformation;
use App\Models\Setting;
use App\Mail\PowerTransformationShipped;
use Mail;

class PowerTransformationObserver
{
    /**
     * Handle the power transformation "created" event.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return void
     */
    public function created(PowerTransformation $powerTransformation)
    {
        Mail::to(Setting::where('field','system_email')->first()->value)->send(new PowerTransformationShipped($powerTransformation));
    }

    /**
     * Handle the power transformation "updated" event.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return void
     */
    public function updated(PowerTransformation $powerTransformation)
    {
        //
    }

    /**
     * Handle the power transformation "deleted" event.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return void
     */
    public function deleted(PowerTransformation $powerTransformation)
    {
        //
    }

    /**
     * Handle the power transformation "restored" event.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return void
     */
    public function restored(PowerTransformation $powerTransformation)
    {
        //
    }

    /**
     * Handle the power transformation "force deleted" event.
     *
     * @param  \App\Models\PowerTransformation  $powerTransformation
     * @return void
     */
    public function forceDeleted(PowerTransformation $powerTransformation)
    {
        //
    }
}
