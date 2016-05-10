var responsiveHelper_dt_risks = undefined;

$('#dt_risks').dataTable({

"createdRow": function ( row, data, index )
{
if (beforenow( data[4] )) {
$('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
}
else if (next5days( data[4] )) {
$('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
}

if (data[3] > 12)
$('td', row).eq(3).addClass('text-danger').css('font-weight', 'bold');
else if (data[3] > 9)
$('td', row).eq(3).addClass('text-warning').css('font-weight', 'bold');

},
"pageLength": 10,
"order": [[ 4, "asc" ]],
"columnDefs": [
{"targets": [5],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_risks) {
responsiveHelper_dt_risks = new ResponsiveDatatablesHelper($('#dt_risks'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_risks.createExpandIcon(nRow);
},
});