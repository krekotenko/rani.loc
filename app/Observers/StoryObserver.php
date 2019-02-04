<?php

namespace App\Observers;

use App\Mail\StoryShipped;
use App\Models\Setting;
use App\Models\Story;
use Illuminate\Support\Facades\Mail;

class StoryObserver
{
    /**
     * Handle the story "created" event.
     *
     * @param  \App\Story  $story
     * @return void
     */
    public function created(Story $story)
    {
        Mail::to(Setting::where('field','system_email')->first()->value)->send(new StoryShipped($story));

    }

    /**
     * Handle the story "updated" event.
     *
     * @param  \App\Story  $story
     * @return void
     */
    public function updated(Story $story)
    {
        //
    }

    /**
     * Handle the story "deleted" event.
     *
     * @param  \App\Story  $story
     * @return void
     */
    public function deleted(Story $story)
    {
        //
    }

    /**
     * Handle the story "restored" event.
     *
     * @param  \App\Story  $story
     * @return void
     */
    public function restored(Story $story)
    {
        //
    }

    /**
     * Handle the story "force deleted" event.
     *
     * @param  \App\Story  $story
     * @return void
     */
    public function forceDeleted(Story $story)
    {
        //
    }
}
