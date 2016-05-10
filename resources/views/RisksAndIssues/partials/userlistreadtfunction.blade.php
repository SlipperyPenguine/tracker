var responsiveHelper_dt_userrisks = undefined;

$('#dt_userrisks').dataTable({
"createdRow": function ( row, data, index )
{
if (beforenow( data[8] )) {
$('td', row).eq(8).addClass('text-danger').css('font-weight', 'bold');
}
else if (next5days( data[8] )) {
$('td', row).eq(8).addClass('text-warning').css('font-weight', 'bold');
}
},
"pageLength": 10,
"order": [[ 8, "asc" ]],
"columnDefs": [
{"targets": [10],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_userrisks) {
responsiveHelper_dt_userrisks = new ResponsiveDatatablesHelper($('#dt_userrisks'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_userrisks.createExpandIcon(nRow);
},
});

var table = $('#dt_userrisks').DataTable();

var filteredData = table
.column( 5 )
.search('Open');

table.draw();