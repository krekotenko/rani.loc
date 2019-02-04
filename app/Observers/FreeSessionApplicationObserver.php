<?php

namespace App\Observers;

use App\Mail\FreeSessionApplicationShipped;
use App\Models\FreeSessionApplication;

use App\Models\Setting;
use Mail;

class FreeSessionApplicationObserver
{
    /**
     * Handle the free session application "created" event.
     *
     * @param  \App\FreeSessionApplication  $freeSessionApplication
     * @return void
     */
    public function created(FreeSessionApplication $freeSessionApplication)
    {
        Mail::to(Setting::where('field','system_email')->first()->value)->send(new FreeSessionApplicationShipped($freeSessionApplication));

    }

    /**
     * Handle the free session application "updated" event.
     *
     * @param  \App\FreeSessionApplication  $freeSessionApplication
     * @return void
     */
    public function updated(FreeSessionApplication $freeSessionApplication)
    {
        //
    }

    /**
     * Handle the free session application "deleted" event.
     *
     * @param  \App\FreeSessionApplication  $freeSessionApplication
     * @return void
     */
    public function deleted(FreeSessionApplication $freeSessionApplication)
    {
        //
    }

    /**
     * Handle the free session application "restored" event.
     *
     * @param  \App\FreeSessionApplication  $freeSessionApplication
     * @return void
     */
    public function restored(FreeSessionApplication $freeSessionApplication)
    {
        //
    }

    /**
     * Handle the free session application "force deleted" event.
     *
     * @param  \App\FreeSessionApplication  $freeSessionApplication
     * @return void
     */
    public function forceDeleted(FreeSessionApplication $freeSessionApplication)
    {
        //
    }
}
