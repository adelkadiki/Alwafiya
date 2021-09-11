<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info=$info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      //  return $this->view('view.name');
        return $this->from("noReply@londonbg.co.uk")->subject('Contact form')-> view('webpages.contactus')->with('info', $this->info);
    }
}
