<?php

namespace App\Mail;

// use App\NewsLetterContent;
use App\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $tmp = NewsLetterContent::where('activated',1)->first();
        // $logo = Settings::pluck('logo')->first();

        return $this->view('newsletter');
    }
}
