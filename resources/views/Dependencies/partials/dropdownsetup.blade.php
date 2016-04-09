function formatResult(node) {

return '<div class="row">' +
    '<div class="col-md-2">' + node.subject_type + '</div>' +
    '<div class="col-md-10">' + node.text + '</div>' +
    '</div>';

};

function formatSelection(node) {

        return node.text;

};

$("#dependent_on_id").select2({

placeholder: "Select an internal dependency",
allowClear: true,
templateResult: formatResult,
templateSelection: formatSelection,
escapeMarkup: function(m) {
// Do not escape HTML in the select options text
return m;
},
ajax: {
url: "{{ action('ApiController@getDependentLookup') }}",
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
//console.log(data);

return {
results: data
};
},
cache: true
},

minimumInputLength: 2

});

// Listen for when the select2() emits a change, and perform the search
$("#dependent_on_id").on("change", function(e) {
var data = $(this).select2('data');
//Then I take the values like if I work with an array
var value = data.id;
var text = data.text;
var type = data[0]['subject_type']
//console.log(data[0] );
//console.log('type:' + type );

$("#dependent_on_type").val(type);
$("#freetextdependency").valid();
$("#freetextdependency").val("");
// $(this).valid();
// $(this).next().children().children().addClass("valid");

});

$("#owner").select2({
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

//$("#owner").on("change", function(e) {
//    $(this).valid();
//    $(this).next().children().children().addClass("valid");
//});

