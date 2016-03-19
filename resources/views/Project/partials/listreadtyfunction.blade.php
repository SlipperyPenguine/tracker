var responsiveHelper_dt_projects = undefined;

var breakpointDefinitiondt_projects = {
tablet : 1024,
phone : 480
};

$('#dt_projects').dataTable(
{
    stateSave: true,
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
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" + "t" + "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oTableTools": { "aButtons": [ "copy", "csv", "xls", { "sExtends": "pdf",
                                                            "sTitle": "Tracker_PDF",
                                                            "sPdfMessage": "Tracker PDF Export",
                                                            "sPdfSize": "letter" },
                                                        { "sExtends": "print",
                                                            "sMessage": "Generated by Tracker <i>(press Esc to close)</i>" }
                                ],
                    "sSwfPath": "{{ URL::asset('js/plugin/datatables/swf/copy_csv_xls_pdf.swf') }}"
                    },
    "autoWidth" : true,
    "preDrawCallback" : function()
    {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_dt_projects) {
            responsiveHelper_dt_projects = new ResponsiveDatatablesHelper($('#dt_projects'), breakpointDefinitiondt_projects);
        }
    },
    "rowCallback" : function(nRow) {
        responsiveHelper_dt_projects.createExpandIcon(nRow);
    },
});