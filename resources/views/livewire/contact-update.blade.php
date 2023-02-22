<div>
    <form wire:submit.prevent='update' class="mx-auto w-50">
        <input type="hidden" wire:model='contactId'>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" wire:model='name' placeholder="name">
            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" wire:model='phone' placeholder="phone">
            @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary text-white">
            Save
        </button>
    </form>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body" id="toast-message">
            </div>
        </div>
    </div>
</div>