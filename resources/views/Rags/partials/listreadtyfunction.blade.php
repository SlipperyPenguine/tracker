var responsiveHelper_dt_rag = undefined;

$('#dt_rags').dataTable({

    "createdRow": function ( row, data, index )
    {
    if (beforenow( data[5] )) {
    $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
    }
    else if (next5days( data[5] )) {
    $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
    }
    },
    "pageLength": 10,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
    {"targets": [2],"orderable": false},
    ],
    @include('partials.datatableDefaultOptions')
    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
        if (!responsiveHelper_dt_rag) {
        responsiveHelper_dt_rag = new ResponsiveDatatablesHelper($('#dt_rags'), breakpointDefinition_tracker);
        }
    },
    "rowCallback" : function(nRow) {
        responsiveHelper_dt_rag.createExpandIcon(nRow);
    },
});