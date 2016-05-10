var responsiveHelper_dt_projects = undefined;

$('#dt_projects').dataTable(
{

    "createdRow": function ( row, data, index )
    {
        if (beforenow( data[5] ))
        {
            $('td', row).eq(5).addClass('text-danger').css('font-weight', 'bold');
        }
        else if (next5days( data[5] ))
        {
            $('td', row).eq(5).addClass('text-warning').css('font-weight', 'bold');
        }

        if (beforenow( data[4] ))
        {
            $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
        }
        else if (next5days( data[4] ))
        {
            $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
        }
    },
    "pageLength": 10,
    "order": [[ 4, "asc" ]],
    "columnDefs": [ {"targets": [6],"orderable": false}, ],
    @include('partials.datatableDefaultOptions')
    "preDrawCallback" : function()
    {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_dt_projects) {
            responsiveHelper_dt_projects = new ResponsiveDatatablesHelper($('#dt_projects'), breakpointDefinition_tracker);
        }
    },
    "rowCallback" : function(nRow) {
        responsiveHelper_dt_projects.createExpandIcon(nRow);
    },
});