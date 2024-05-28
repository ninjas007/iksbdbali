    $(document).ready(function () {
        $('#tableAnggota').DataTable({
            "info": true,
            "lengthChange": false,
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
                'excel',
                'pdf'
            ]
        });
    });