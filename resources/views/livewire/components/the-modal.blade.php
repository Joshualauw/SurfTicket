<div>
    <input type="hidden" value="{{ $message }}" id="modal_message">
    <input type="hidden" value="{{ $type }}" id="modal_type">
    <script>
        Swal.fire({
            text: $("#modal_message").val(),
            icon: $("#modal_type").val()
        });
    </script>
</div>