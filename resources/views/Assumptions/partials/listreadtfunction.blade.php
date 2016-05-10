var responsiveHelper_dt_assumptions = undefined;

$('#dt_assumptions').dataTable({

"createdRow": function ( row, data, index )
{
if (beforenow( data[4] )) {
$('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
}
else if (next5days( data[4] )) {
$('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
}
},
"pageLength": 10,
"order": [[ 4, "asc" ]],
"columnDefs": [
{"targets": [7],"orderable": false},
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