<script type="text/javascript">

    function DisplayTree()
    {
        // PAGE RELATED SCRIPTS

        $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
        $('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function(e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(':visible')) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
            }
            e.stopPropagation();
        });
    }

    // variable to hold request
    var request;

    // bind to the submit event of our form
    $("#msprojectfileuploadform").submit(function(event){



        // abort any pending request
        if (request) {
            request.abort();
        }

        // prevent default posting of form
        event.preventDefault();

        //var file = $("#xmlfile").files[0];
        var fd = new FormData();
        fd.append("fileToUpload", $('#xmlfile')[0].files[0]);
        fd.append("projectid", "{{$project->id}}");

        $.ajax({
            url: "{{ action('ProjectController@AjaxFileUpload') }}",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function(response) {
                $("div#ajaxresponse").html(response);
                DisplayTree();
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });

    });

</script>