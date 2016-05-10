var responsiveHelper_dt_meetings = undefined;

$('#dt_meetings').dataTable({

"pageLength": 10,
"order": [[ 2, "asc" ]],
"columnDefs": [
{"targets": [5],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_meetings) {
responsiveHelper_dt_meetings = new ResponsiveDatatablesHelper($('#dt_meetings'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_meetings.createExpandIcon(nRow);
},
});