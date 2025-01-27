<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactStoreFront extends Mailable
{
    use Queueable, SerializesModels;
	public $emailContent;
	public $email;
    /**
     * Create a new message instance.
     */
	public function __construct(string $emailContent, string $email = null)
	{
		$this->emailContent = $emailContent;
		$this->email = $email;
	}
	
	public function build()
	{
		return $this->subject('Thông tin mới từ khách hàng')
			->view('email.contact-store-front');
	}
}
