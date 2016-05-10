

$('#dt_links').dataTable({

"pageLength": 10,
"order": [[ 0, "asc" ]],
"columnDefs": [
{"targets": [1],"orderable": false},
],
@include('partials.datatableDefaultOptions')
});