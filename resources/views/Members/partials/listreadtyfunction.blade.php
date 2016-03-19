var responsiveHelper_dt_members = undefined;

var breakpointDefinitiondt_members = {
tablet : 1024,
phone : 480
};


$('#dt_members').dataTable({

// Tabletools options:
//   https://datatables.net/extensions/tabletools/button_options             stateSave: true,
stateSave: true,
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

"autoWidth" : true,
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_dt_members) {
responsiveHelper_dt_members = new ResponsiveDatatablesHelper($('#dt_members'), breakpointDefinitiondt_members);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_dt_members.createExpandIcon(nRow);
},
});