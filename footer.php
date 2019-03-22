</div> <!-- container from header -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script src="static/js/main.js"></script>

<script>
$(document).ready( function () {
    var table = $('#customertable').DataTable( {
        paging: true,
        autoWidth: true,
        ordering: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        dom: "<'row'<'col-4'l><'col-8'f>tr>" + "<'row'<'col-4'p><'col-8'>>",
        buttons: [
            { extend: 'colvis', text: 'Visible', className: 'btn btn-outline-dark btn-sm colvis' },
        ],
        scrollX: false,
        "columnDefs": [
            { "orderable": false, "targets": 8 },
            { "orderable": false, "targets": 9 },
            { "orderable": false, "targets": 10 },
        ],
        "language": {
            "paginate": {
                "previous": "Zurück",
                "next": "Nächste",
            },
            "search": "Suche:",
            "lengthMenu": "Zeige _MENU_ Einträge",
            "zeroRecords": "Keine passenden Einträge gefunden",
        },
    });

} );

</script>
<script>
$(document).ready( function () {
    $('#customertable').on( 'dblclick', 'tbody tr', function () {
        window.location.href = $(this).attr('href');
    } );
} );
</script>

<script>
$(document).ready( function () {
    var table = $('#invoicetable').DataTable( {
        paging: true,
        autoWidth: true,
        ordering: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        dom: "<'row'<'col-4'l><'col-8'f>tr>" + "<'row'<'col-4'p><'col-8'>>",
        buttons: [
            { extend: 'colvis', text: 'Visible', className: 'btn btn-outline-dark btn-sm colvis' },
        ],
        scrollX: false,
        "columnDefs": [
            { "orderable": false, "targets": 8 },
            { "orderable": false, "targets": 9 },
            //{ "orderable": false, "targets": 10 },
        ],
        "language": {
            "paginate": {
                "previous": "Zurück",
                "next": "Nächste",
            },
            "search": "Suche:",
            "lengthMenu": "Zeige _MENU_ Einträge",
            "zeroRecords": "Keine passenden Einträge gefunden",
        },
    });

} );

$(document).ready( function () {
    var table = $('#parttable').DataTable( {
        paging: true,
        autoWidth: true,
        ordering: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        dom: "<'row'<'col-4'l><'col-8'f>tr>" + "<'row'<'col-4'p><'col-8'>>",
        buttons: [
            { extend: 'colvis', text: 'Visible', className: 'btn btn-outline-dark btn-sm colvis' },
        ],
        scrollX: false,
        "columnDefs": [
            { "orderable": false, "targets": 5 },
            { "orderable": false, "targets": 4 },
        ],
        "language": {
            "paginate": {
                "previous": "Zurück",
                "next": "Nächste",
            },
            "search": "Suche:",
            "lengthMenu": "Zeige _MENU_ Einträge",
            "zeroRecords": "Keine passenden Einträge gefunden",
        },
    });

} );

$(document).ready( function () {
    var table = $('#contracttable').DataTable( {
        paging: true,
        autoWidth: true,
        ordering: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        dom: "<'row'<'col-4'l><'col-8'f>tr>" + "<'row'<'col-4'p><'col-8'>>",
        buttons: [
            { extend: 'colvis', text: 'Visible', className: 'btn btn-outline-dark btn-sm colvis' },
        ],
        scrollX: false,
        "columnDefs": [
            { "orderable": false, "targets": 4 },
            { "orderable": false, "targets": 5 },
            { "orderable": false, "targets": 6 },
        ],
        "language": {
            "paginate": {
                "previous": "Zurück",
                "next": "Nächste",
            },
            "search": "Suche:",
            "lengthMenu": "Zeige _MENU_ Einträge",
            "zeroRecords": "Keine passenden Einträge gefunden",
        },
    });

} );

$(document).ready( function () {
    var table = $('#contractdetailtable').DataTable( {
        paging: true,
        autoWidth: true,
        ordering: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        dom: "<'row'<'col-4'l><'col-8'f>tr>" + "<'row'<'col-4'p><'col-8'>>",
        buttons: [
            { extend: 'colvis', text: 'Visible', className: 'btn btn-outline-dark btn-sm colvis' },
        ],
        scrollX: false,
        "columnDefs": [
            { "orderable": false, "targets": 5 },
        ],
        "language": {
            "paginate": {
                "previous": "Zurück",
                "next": "Nächste",
            },
            "search": "Suche:",
            "lengthMenu": "Zeige _MENU_ Einträge",
            "zeroRecords": "Keine passenden Einträge gefunden",
        },
    });

} );

$(document).ready( function () {
    var table = $('#invoicedetailtable').DataTable( {
        paging: true,
        autoWidth: true,
        ordering: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        dom: "<'row'<'col-4'l><'col-8'f>tr>" + "<'row'<'col-4'p><'col-8'>>",
        buttons: [
            { extend: 'colvis', text: 'Visible', className: 'btn btn-outline-dark btn-sm colvis' },
        ],
        scrollX: false,
        //"columnDefs": [
        //    { "orderable": false, "targets": 5 },
        //],
        "language": {
            "paginate": {
                "previous": "Zurück",
                "next": "Nächste",
            },
            "search": "Suche:",
            "lengthMenu": "Zeige _MENU_ Einträge",
            "zeroRecords": "Keine passenden Einträge gefunden",
        },
    });

} );


</script>
<script>
$(document).ready( function () {
    $('#invoicetable').on( 'dblclick', 'tbody tr', function () {
        window.location.href = $(this).attr('href');
    } );    
} );
$(document).ready( function () {
    $('#parttable').on( 'dblclick', 'tbody tr', function () {
        window.location.href = $(this).attr('href');
    } );    
} );
$(document).ready( function () {
    $('#contracttable').on( 'dblclick', 'tbody tr', function () {
        window.location.href = $(this).attr('href');
    } );    
} );
</script>

</body>
</html>