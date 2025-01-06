@if (session('success'))
<script>
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Data Berhasil Ditambahkan",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@if (session('menyala'))
<script>
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Data berhasil diedit",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if (session('delete'))
<script>
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Data berhasil dihapus",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Data?',
            text: "Anda tidak dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>