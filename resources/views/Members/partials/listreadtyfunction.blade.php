var responsiveHelper_dt_members = undefined;

$('#dt_members').dataTable({

"createdRow": function ( row, data, index )
{
if (beforenow( data[5] )) {
$('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
}
else if (next5days( data[5] )) {
$('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
}
},
"pageLength": 10,
"order": [[ 1, "asc" ]],
"columnDefs": [
{"targets": [3],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_members) {
responsiveHelper_dt_members = new ResponsiveDatatablesHelper($('#dt_members'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_members.createExpandIcon(nRow);
},
});