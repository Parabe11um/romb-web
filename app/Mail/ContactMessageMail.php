<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use SerializesModels;

    public $contact;

    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Новое сообщение с сайта')
            ->view('emails.contact-message');
    }
}
