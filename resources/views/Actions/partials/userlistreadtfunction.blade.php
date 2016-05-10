var responsiveHelper_dt_actions = undefined;

var breakpointDefinitiondt_actions = {
tablet : 1024,
phone : 480
};


$('#dt_actions').dataTable({

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
if (!responsiveHelper_dt_actions) {
responsiveHelper_dt_actions = new ResponsiveDatatablesHelper($('#dt_actions'), breakpointDefinitiondt_actions);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_actions.createExpandIcon(nRow);
},
});

var table = $('#dt_actions').DataTable();

var filteredData = table
.column( 4 )
.search('Open');

table.draw();