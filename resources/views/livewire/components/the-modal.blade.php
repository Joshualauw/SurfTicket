{{-- @if ($isOpen)
<div
   class="fixed left-20 right-20 top-16 w-1/2 mx-auto p-3 z-10 {{ $computedType }} text-md text-white flex justify-between rounded-md shadow-md">
   <p>{{ $isOpen }}</p>
   <p wire:click='closeModal' class="cursor-pointer">X</p>
</div>
@endif --}}

<input type="hidden" id='flash_title' value="{{ $title }}">
<input type="hidden" id='flash_message' value="{{ $message }}">
<input type="hidden" id='flash_type' value="{{ $type }}">
<script>
   Swal.fire(
        $('#flash_title').val(),
        $('#flash_message').val(),
        $('#flash_type').val()
    )
</script>