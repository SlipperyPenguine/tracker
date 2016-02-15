<script type="text/javascript">


    // variable to hold request
    var request;
    // bind to the submit event of our form
    $("#commentform").submit(function(event){

        // abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);
        // let's select and cache all the fields
        var $inputs = $form.find("input, submit, button");
        // serialize the data in the form
        var serializedData = $form.serialize();

        // let's disable the inputs for the duration of the ajax request
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Show the results box and a loader
        //$("div#result").html("<i class='fa fa-cog fa-spin'></i> Processing the API Call...");
        //$("div#result-box").fadeIn("slow");

        // fire off the request to /form.php
        request = $.ajax({
            url: "{{ action('CommentController@AjaxStore') }}",
            type: "post",
            data: serializedData
        });

        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            $("div#contents").html(response);
            $("#comment").val('');
        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // log the error to the console
            console.error(
                    "The following error occured: " + textStatus, errorThrown
            );
        });

        // callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
        // reenable the inputs
        $inputs.prop("disabled", false);
        });

        // prevent default posting of form
        event.preventDefault();
    });

</script>