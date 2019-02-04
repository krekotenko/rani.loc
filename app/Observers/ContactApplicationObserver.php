<?php

namespace App\Observers;

use App\Mail\ContactApplicationShipped;
use App\Models\ContactApplication;
use App\Models\Setting;
use Mail;

class ContactApplicationObserver
{
    /**
     * Handle the contact application "created" event.
     *
     * @param  App\Models\ContactApplication  $contactApplication
     * @return void
     */
    public function created(ContactApplication $contactApplication)
    {
        Mail::to(Setting::where('field','system_email')->first()->value)->send(new ContactApplicationShipped($contactApplication));
    }

    /**
     * Handle the contact application "updated" event.
     *
     * @param  \App\ContactApplication  $contactApplication
     * @return void
     */
    public function updated(ContactApplication $contactApplication)
    {
        //
    }

    /**
     * Handle the contact application "deleted" event.
     *
     * @param  \App\ContactApplication  $contactApplication
     * @return void
     */
    public function deleted(ContactApplication $contactApplication)
    {
        //
    }

    /**
     * Handle the contact application "restored" event.
     *
     * @param  \App\ContactApplication  $contactApplication
     * @return void
     */
    public function restored(ContactApplication $contactApplication)
    {
        //
    }

    /**
     * Handle the contact application "force deleted" event.
     *
     * @param  \App\ContactApplication  $contactApplication
     * @return void
     */
    public function forceDeleted(ContactApplication $contactApplication)
    {
        //
    }
}
