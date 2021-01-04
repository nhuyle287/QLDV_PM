<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $cus,$service_name,$address_domain;

    public function __construct($cus,$service_name,$address_domain)
    {
        $this->cus=$cus;
        $this->service_name=$service_name;
        $this->address_domain=$address_domain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email_customer.email');
    }
}
