// $(document).ready(function(){
    var firstOpen = true;
    var time;
    $('#timePicker').datetimepicker({
        useCurrent: false,
        format: "hh:mm A"
    }).on('dp.show', function() {
        if(firstOpen) {
            time = moment().startOf('day');
            firstOpen = false;
        } else {
            time = "01:00 PM"
        }        
        $(this).data('DateTimePicker').date(time);
    });

//force click on timepicker to show
    // $('.input-group-addon').click();
// });

