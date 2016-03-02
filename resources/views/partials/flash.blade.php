@if(session()->has('flash_message'))
    <script type="text/javascript">

        //alert('got here');

        $.smallBox({
            title : "{{session('flash_message.title')}}",
            content : "{{session('flash_message.message')}}",
            color : "{{session('flash_message.color')}}",
            iconSmall : "{{session('flash_message.icon')}}",
            timeout : 4000
        });

        //swal("Here's a message!")

/*        $.bigBox({
            title : "Big Information box",
            content : "This message will dissapear in 6 seconds!",
            color : "#C46A69",
            //timeout: 6000,
            icon : "fa fa-warning shake animated",
            number : "1",
            timeout : 6000
        });*/



    </script>
@endif