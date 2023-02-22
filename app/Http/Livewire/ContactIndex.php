<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search;
    protected $contacts;

    public $updateStatus = false;
    protected $listeners = ['contactStored' => '$refresh',
    'contactHasBeenUpdated' => '$refresh'
];


    public function destroy($id)
    {
        if ($id) {
            $contact = Contact::find($id);
            $contact->delete();

            $this->emit(
                'ContactHasBeenDelete',
                [
                    'message' => $contact['name'] . ' ' . 'has been deleted'
                ]
            );
        }
    }

        public function getContact($id)
        {
            $this->updateStatus = true;

            $contact = Contact::find($id);

            $this->emit('getContact', $contact);
        }



        public function render()
        {
            $this->contacts = Contact::latest();
            return view('livewire.contact-index', [
                'contacts' => $this->search === null ? $this->contacts->paginate($this->paginate) : $this->contacts->where(
                    'name',
                    'like',
                    '%' .
                    $this->search . '%'
                )->paginate($this->paginate)
            ]);
        }
}
