<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;


    public $paginate = 5;
    public $search;
    public $updateStatus = false;


    protected $paginationTheme = 'bootstrap';
    protected $listeners =
    ['contactStored' => '$refresh',
    'contactHasBeenUpdated' => '$refresh' ];


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

        public function updatingsearch()
        {
            $this->resetPage();
        }



        public function render()
        {
            $searchedContacts = Contact::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);

           

            return view('livewire.contact-index', [
                'contacts' =>   $this->search === null ? Contact::paginate($this->paginate) : $searchedContacts

            ]);
        }
}
