<?php

namespace App\Mail;

use App\Models\FreeSessionApplication;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeSessionApplicationShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $model;
    protected $system_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FreeSessionApplication $model)
    {
        //
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
        return $this->from($this->system_email)->subject(__('admin.free-sesions-applications_email_subject'))->view('public::mail.application-free-session',['contact'=>$this->model]);
    }
}
