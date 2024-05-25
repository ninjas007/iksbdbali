    $(document).ready(function () {
        $('#exportTable').DataTable({
            "ordering": false,
            "info":     false,
            "searching": false,
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });