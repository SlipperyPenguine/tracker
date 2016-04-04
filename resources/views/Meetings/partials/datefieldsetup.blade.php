$('#start_date').datepicker({
todayBtn: "linked",
format: "dd MM yyyy",
keyboardNavigation: false,
forceParse: false,
calendarWeeks: true,
autoclose: true
});

$('#start_time').timepicker();

$("#duration").spinner({
step: 0.5,
numberFormat: "n"
});
