<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactStoreFront as ContactStoreFrontMail;


class ContactStoreFront extends Component
{
	public $email = '';
	public $emailContent = '';
	public function sendEmail(){
		$this->validate([
			'email' => 'required|email',
			'emailContent' => 'required|string|max:1000',
		]);
		
//		Mail::to($this->email)->send(new \App\Mail\ContactStoreFront($this->emailContent, $this->email));
		Mail::to('tranmanhhieu10@gmail.com')->send(new \App\Mail\ContactStoreFront($this->emailContent, $this->email));
		
		// Reset form fields
		$this->reset(['email', 'emailContent']);
		
		Notification::make()->title('Gửi email thành công !')->success()->send();
		
		
	}
    public function render()
    {
        return view('livewire.contact-store-front');
    }
}
