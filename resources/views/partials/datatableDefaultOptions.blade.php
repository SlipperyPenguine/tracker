"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+"t"+"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oTableTools":
    {
        "aButtons": [
            {
            "sExtends": "copy",
            "oSelectorOpts": { filter: "applied", order: "current" }
            },
            {
            "sExtends": "csv",
            "oSelectorOpts": { filter: "applied", order: "current" }
            },
            {
            "sExtends": "xls",
            "oSelectorOpts": { filter: "applied", order: "current" }
            },
            {
                "sExtends": "print",
                "sMessage": "Generated by Tracker <i>(press Esc to close)</i>"
            }
        ],
        "sSwfPath": "{{ URL::asset('js/plugin/datatables/swf/copy_csv_xls_pdf.swf') }}"
    },
"autoWidth" : true,
stateSave: true,