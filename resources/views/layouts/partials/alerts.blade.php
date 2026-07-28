@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{!! addslashes(session('success')) !!}",
    timer: 2500,
    showConfirmButton: false
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: "{!! addslashes(session('error')) !!}"
});
</script>
@endif