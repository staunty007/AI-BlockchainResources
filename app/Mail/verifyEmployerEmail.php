<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Employer;

class verifyEmployerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $employer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employer $employer)
    {
        $this->employer = $employer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.sendEmployerView');
    }
}
