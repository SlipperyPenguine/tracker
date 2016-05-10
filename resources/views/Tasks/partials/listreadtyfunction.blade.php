var responsiveHelper_dt_tasks = undefined;

$('#dt_tasks').dataTable({

"createdRow": function ( row, data, index )
{
if (beforenow( data[3] )) {
$('td', row).eq(3).addClass('text-danger').css('font-weight', 'bold');
}
else if (next5days( data[3] )) {
$('td', row).eq(3).addClass('text-warning').css('font-weight', 'bold');
}

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
{"targets": [5],"orderable": false},
],
@include('partials.datatableDefaultOptions')
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_tasks) {
responsiveHelper_dt_tasks = new ResponsiveDatatablesHelper($('#dt_tasks'), breakpointDefinition_tracker);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_tasks.createExpandIcon(nRow);
},
});