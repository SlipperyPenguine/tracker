var responsiveHelper_dt_assumptions = undefined;

$('#dt_assumptions').dataTable({

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
{"targets": [8],"orderable": false},
],

@include('partials.datatableDefaultOptions')

"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_assumptions) {
responsiveHelper_dt_assumptions = new ResponsiveDatatablesHelper($('#dt_assumptions'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_assumptions.createExpandIcon(nRow);
},
});

var table = $('#dt_assumptions').DataTable();

var filteredData = table
.column( 4 )
.search('Open');

table.draw();