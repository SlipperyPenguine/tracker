var responsiveHelper_dt_usertasks = undefined;

$('#dt_usertasks').dataTable({

"pageLength": 10,
"order": [[ 0, "asc" ]],
"columnDefs": [
{"targets": [8],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_usertasks) {
responsiveHelper_dt_usertasks = new ResponsiveDatatablesHelper($('#dt_usertasks'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_usertasks.createExpandIcon(nRow);
},
});

var table = $('#dt_usertasks').DataTable();

var filteredData = table
.column( 4 )
.search('Open');

table.draw();