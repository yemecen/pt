<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        return $this->subject($this->details['no'].' - nolu Cm')->view('mail')->with([
            'title' => $this->details['title'],
            'description' => $this->details['description'],
            'no' => $this->details['no'],
        ]);                   
    }
}
