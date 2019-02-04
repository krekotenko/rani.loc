<?php

namespace App\Mail;

use App\Models\PowerTransformation;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PowerTransformationShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $model;
    protected $system_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PowerTransformation $model)
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
        return $this->from($this->system_email)->subject(__('admin.contact-applications_email_subject'))->view('public::mail.power-transformation',['contact'=>$this->model]);
    }
}
