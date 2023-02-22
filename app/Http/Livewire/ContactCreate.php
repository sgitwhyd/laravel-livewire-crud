<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;

    protected $rules = [
        'name' => 'required|min:6',
        'phone' => 'required'
    ];

    public function updated($createContactForm)
    {
        $this->validateOnly($createContactForm);
    }

     public function saveContact()
     {
         $validatedData = $this->validate();
         $data = Contact::create($validatedData);

         $this->resetInput();

         $this->emit('contactStored', [
            'message' =>  $data['name'] . ' ' . 'has been created'
         ]);
     }

     public function resetInput()
     {
         $this->name = null;
         $this->phone = null;
     }

    public function render()
    {
        return view('livewire.contact-create');
    }
}
