<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    protected $rules = [
        'name' => 'required|min:6',
        'phone' => 'required'
    ];

    public function updated($updateContact)
    {
        $this->validateOnly($updateContact);
    }

    public function update()
    {
        $validatedData = $this->validate();

        if ($this->contactId) {
            $contact = Contact::find($this->contactId);
            $contact->update($validatedData);
        }

        $this->resetInput();
        $this->emit('contactHasBeenUpdated', [
            'message' => $contact['name'] . ' ' . 'has been updated'
        ]);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }

    public function render()
    {
        return view('livewire.contact-update');
    }
}
