var responsiveHelper_dt_cr = undefined;

$('#dt_changerequests').dataTable({

"pageLength": 10,
"order": [[ 1, "asc" ]],
"columnDefs": [
{"targets": [4],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_cr) {
responsiveHelper_dt_cr = new ResponsiveDatatablesHelper($('#dt_changerequests'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_cr.createExpandIcon(nRow);
},
});