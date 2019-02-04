<?php

namespace App\Observers;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use App\Mail\SubscriberShipped;

class SubscriberObserver
{
    /**
     * Handle the subscriber "created" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function created(Subscriber $subscriber)
    {
        $emailArray = [];
        if (Setting::where('field','system_email_2')->first()->value) {
            $emailArray = explode(',', Setting::where('field','system_email_2')->first()->value);
        }

        Mail::to(array_merge(Setting::where('field','system_email')->pluck('value')->toArray(), $emailArray))->send(new SubscriberShipped($subscriber));
    }

    /**
     * Handle the subscriber "updated" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function updated(Subscriber $subscriber)
    {
        //
    }

    /**
     * Handle the subscriber "deleted" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function deleted(Subscriber $subscriber)
    {
        //
    }

    /**
     * Handle the subscriber "restored" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function restored(Subscriber $subscriber)
    {
        //
    }

    /**
     * Handle the subscriber "force deleted" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function forceDeleted(Subscriber $subscriber)
    {
        //
    }
}
