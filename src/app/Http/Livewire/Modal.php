<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Modal extends Component
{
    public $showModal = false;
    public $contact;

    public function render()
    {
        return view('livewire.modal');
    }

    public function openModal()
    {
        $this->showModal = true;
    }
 
    public function closeModal()
    {
        $this->showModal = false;
    }
}
