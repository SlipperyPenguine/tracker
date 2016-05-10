var responsiveHelper_dt_workstreams = undefined;

$('#dt_workstreams').dataTable({

"pageLength": 25,
"columnDefs": [ {"targets": [5],"orderable": false} ],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_workstreams) {
responsiveHelper_dt_workstreams = new ResponsiveDatatablesHelper($('#dt_workstreams'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_workstreams.createExpandIcon(nRow);
},
"drawCallback" : function(oSettings) {
responsiveHelper_dt_workstreams.respond();
}
});