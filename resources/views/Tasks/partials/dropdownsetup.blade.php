
$("#action_owner").select2({
ajax: {
url: "{{ action('ApiController@getUsers') }}",
dataType: 'json',
delay: 250,
data: function (params) {
return {
q: params.term, // search term
page: params.page
};
},
processResults: function (data) {
// parse the results into the format expected by Select2.
// since we are using custom formatting functions we do not need to
// alter the remote JSON data
return {
results: data
};
},
cache: true
},

minimumInputLength: 1

});