<?php

namespace App\Livewire;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterFooter extends Component
{
    public $email = '';
    public $subscribed = false;

    protected $rules = [
        'email' => 'required|email|unique:newsletters,email',
    ];

    public function subscribe()
    {
        $this->validate();

        Newsletter::create([
            'email' => $this->email,
        ]);

        $this->subscribed = true;
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.newsletter-footer');
    }
}
