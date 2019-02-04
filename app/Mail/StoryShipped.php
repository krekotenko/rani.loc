<?php

namespace App\Mail;

use App\Models\Setting;
use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoryShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Story $model)
    {
        $this->model = $model;
        $this->system_email = Setting::where('field','system_email')->first()->value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $photos = json_decode($this->model->image_uploads);
        if($photos) {
            foreach($photos as $file) {
                $this->attach(public_path('storage/images/stories/'.$file));
            }
        }

        return $this->
                from($this->system_email)->
                subject(__('admin.stories_email_subject'))->
                view('public::mail.stories',['story'=>$this->model]);

    }
}
