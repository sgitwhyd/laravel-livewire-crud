<div>
    <div class="container">

        @if($updateStatus)
        <livewire:contact-update />
        @else
        <livewire:contact-create />

        @endif

        <hr>

        <div class="row">
            <div class="col">
                <select class="form-select form-control-sm w-auto" wire:model='paginate'
                    aria-label="select-data-to-display">
                    <option selected value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    {{ $paginate }}
                </select>
            </div>

            <div class="col">
                <input type="search" wire:model='search' class="form-control mb-3" id="search" aria-describedby="search"
                    placeholder="Search...">
            </div>

        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Phone</th>
                    <th scope='col'>
                        Create At
                    </th>
                    <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($contacts as $index => $contact)
                <tr>
                    <th scope="row">
                        {{ $contacts->firstItem() + $index }}
                    </th>
                    <td>
                        {{ $contact->name }}
                    </td>
                    <td>
                        {{ $contact->phone }}
                    </td>
                    <td>
                        {{ $contact->created_at }}
                    </td>
                    <td>
                        <button class="btn-info btn btn-sm text-white" wire:click='getContact({{ $contact->id }})'>
                            Edit
                        </button>
                        <button class="btn-danger btn btn-sm text-white" wire:click='destroy({{ $contact->id}})'>
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
</div>