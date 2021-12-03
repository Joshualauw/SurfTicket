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