<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Freelancer;

class verifyFreelancerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $freelancer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Freelancer $freelancer)
    {
        $this->freelancer = $freelancer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.sendFreelancerView');
    }
}
