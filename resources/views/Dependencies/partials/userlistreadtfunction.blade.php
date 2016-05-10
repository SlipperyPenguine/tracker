var responsiveHelper_dt_dependencies = undefined;

$('#dt_dependencies').dataTable({

"createdRow": function ( row, data, index )
{
if (beforenow( data[5] )) {
$('td', row).eq(5).addClass('text-danger').css('font-weight', 'bold');
}
else if (next5days( data[5] )) {
$('td', row).eq(5).addClass('text-warning').css('font-weight', 'bold');
}
},
"pageLength": 10,
"order": [[ 5, "asc" ]],
"columnDefs": [
{"targets": [9],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_dependencies) {
responsiveHelper_dt_dependencies = new ResponsiveDatatablesHelper($('#dt_dependencies'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_dependencies.createExpandIcon(nRow);
},
});

var table = $('#dt_dependencies').DataTable();

var filteredData = table
.column( 4 )
.search('Open');

table.draw();