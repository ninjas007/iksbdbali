    $(document).ready(function () {
        $('#tableAnggota').DataTable({
            "info": false,
            dom: 'Bfrtip',
            buttons: [
                'excel',
                'pdf'
            ]
        });
    });