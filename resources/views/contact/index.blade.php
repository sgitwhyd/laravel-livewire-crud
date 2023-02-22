@extends('layouts.app')

@push('scripts')

<script>
  Livewire.on('contactStored', data => {
    const toastLiveExample = document.getElementById('liveToast')
    const toastMessage = document.getElementById('toast-message');
    const toast = new bootstrap.Toast(toastLiveExample)
    toastMessage.innerHTML = data.message

    toast.show()
  })

  Livewire.on('contactHasBeenUpdated', data => {
    const toastLiveExample = document.getElementById('liveToast')
    const toastMessage = document.getElementById('toast-message');
    const toast = new bootstrap.Toast(toastLiveExample)
    toastMessage.innerHTML = data.message

    toast.show()
  })

  Livewire.on('ContactHasBeenDelete', data => {
    const toastLiveExample = document.getElementById('liveToast')
    const toastMessage = document.getElementById('toast-message');
    const toast = new bootstrap.Toast(toastLiveExample)
    toastMessage.innerHTML = data.message

    toast.show()
  })
</script>
@endpush

@section('content')
<livewire:contact-index />
@endsection