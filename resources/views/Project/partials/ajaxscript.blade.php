<script type="text/javascript">

    function GetExtendedAttributes()
    {
        $.ajax({
                    url: "{{ action('ApiController@getProjectExtendedAttributes', ['projectid'=>$project->id]) }}"
                })
                .done(function( data ) {
                    $("#extendedAttributes").select2({
                        data: data
                    })
                });

    }

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

        //disable buttons to avoid double clicks

        //show uploading spinner
        $("#uploading").css("display","block")

        //var file = $("#xmlfile").files[0];
        var fd = new FormData();
        fd.append("fileToUpload", $('#xmlfile')[0].files[0]);
        fd.append("projectid", "{{$project->id}}");

        $.ajax({
            url: "{{ action('ProjectController@AjaxFileUpload') }}",
            xhr: function() { // custom xhr (is the best)

                var xhr = new XMLHttpRequest();
                var total = 0;

                // Get the total size of files
                $.each(document.getElementById('xmlfile').files, function(i, file) {
                    total += file.size;
                });

                // Called when upload progress changes. xhr2
                xhr.upload.addEventListener("progress", function(evt) {
                    // show progress like example
                    var loaded = (evt.loaded / total).toFixed(2)*100; // percent

                    //$('#uploading').text('Uploading... ' + loaded + '%' );
                    $('#uploadprogressbar').width(loaded + '%');
                    $('#progresstext').html(loaded + '%');
                }, false);

                return xhr;
            },
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#fileloading').html('<i class="fa fa-lg fa-check"></i> File Uploaded Successfully');
                $('#progresstext').hide();
                //$("div#ajaxresponse").html(response);
                GetExtendedAttributes();
                //DisplayTree();
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });

    });

    $("#btnParseFile").click(function() {
        $.ajax({
                    url: "{{url('api/project/AjaxParseFile')}}?projectid={{$project->id}}&flagid="+ $('#extendedAttributes').val()
                })
                .done(function( data ) {
                    $("div#ajaxresponse").html(data);
                    DisplayTree();
                });

    });

</script>