function beforenow(comparedate)
{
    if(!(comparedate))
        return false;

    try
    {
        var q = new Date();
        var m = q.getMonth();
        var d = q.getDate();
        var y = q.getFullYear();

        var date = new Date(y,m,d);

        mydate=new Date(comparedate);
        //console.log(date);
        //console.log(comparedate);
        //console.log(mydate)

        if(date>mydate)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    catch(err)
    {
        //console.log('returning false');
        return false;
    }
}

function next5days(comparedate)
{
    if(!(comparedate))
        return false;

    try {
        var q = new Date();
        var m = q.getMonth();
        var d = q.getDate();
        var y = q.getFullYear();

        var date = new Date(y, m, d + 5);

        mydate = new Date(comparedate);
       // console.log(date);
      //  console.log(comparedate);
       // console.log(mydate)

        if (date > mydate) {
            return true;
        }
        else {
            return false;
        }

    }
    catch(err) {
      // console.log('returning false');
        return false;
    }
}


var deleter = {

    linkSelector          : "a[data-delete]",
    modalTitle            : "Are you sure?",
    modalMessage          : "You will not be able to recover this entry?",
    modalConfirmButtonText: "Yes, delete it!",
    laravelToken          : null,
    url                   : "/",

    init: function() {
        $(this.linkSelector).on('click', {self:this}, this.handleClick);
    },

    handleClick: function(event) {
        event.preventDefault();

        var self = event.data.self;
        var link = $(this);

        self.modalTitle             = link.data('title') || self.modalTitle;
        self.modalMessage           = link.data('message') || self.modalMessage;
        self.modalConfirmButtonText = link.data('button-text') || self.modalConfirmButtonText;
        self.url                    = link.attr('href');
        self.laravelToken           = $("meta[name=token]").attr('content');

        //self.confirmDelete();

        $.SmartMessageBox({
            title : link.data('title') || self.modalTitle,
            content : link.data('message') || self.modalMessage,
            buttons : '[No][Yes]'
        }, function(ButtonPressed) {
            if (ButtonPressed === "Yes") {

                self.makeDeleteRequest();

/*                $.smallBox({
                    title : "Callback function",
                    content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
                    color : "#659265",
                    iconSmall : "fa fa-check fa-2x fadeInRight animated",
                    timeout : 4000
                });*/
            }
            if (ButtonPressed === "No") {
/*                $.smallBox({
                    title : "Callback function",
                    content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
                    color : "#C46A69",
                    iconSmall : "fa fa-times fa-2x fadeInRight animated",
                    timeout : 4000
                });*/
            }

        });

    },

    confirmDelete: function() {
        swal({
                title             : this.modalTitle,
                text              : this.modalMessage,
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : this.modalConfirmButtonText,
                closeOnConfirm    : true
            },
            function() {
                this.makeDeleteRequest()
            }.bind(this)
        );
    },

    makeDeleteRequest: function() {
        var form =
            $('<form>', {
                'method': 'POST',
                'action': this.url
            });

        var token =
            $('<input>', {
                'type': 'hidden',
                'name': '_token',
                'value': this.laravelToken
            });

        var hiddenInput =
            $('<input>', {
                'name': '_method',
                'type': 'hidden',
                'value': 'DELETE'
            });

        return form.append(token, hiddenInput).appendTo('body').submit();
    }
};

deleter.init();
