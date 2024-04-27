
$(document).ready(function () {
    var firstOpen = true;

    var time = "00:00 AM";

    $('#timePicker').datetimepicker({
        useCurrent: false,
        format: "hh:mm A"
    }).on('dp.show', function () {
        var userDate = getuserDate();
        var dateParts = userDate.split("/");
        var year = parseInt(dateParts[0]);
        var month = parseInt(dateParts[1]);
        var day = parseInt(dateParts[2]);
        var currentuserTime = new Date(); // JavaScript months are zero-based so -1
        // Update the weekday part of userTime
        currentuserTime.setFullYear(year, month - 1, day);
        // console.log("Usersss", currentuserTime);

        if (!userDate) {
            console.log("User Date is null");
            return;
        }
        var now = new Date();
        // var minute = now.getMinutes().toString().padStart(2, '0'); // Ensure minutes have leading zero if needed
        var ampm = now.getHours() >= 12 ? 'PM' : 'AM'; // Determine AM/PM
        var hour = "00:00:00 PM";

        if (currentuserTime.getFullYear() === now.getFullYear() && currentuserTime.getMonth() === now.getMonth() && currentuserTime.getDate() === now.getDate()) {
            // console.log("hi")
            currentMs = now.getTime();
            hour = currentMs + 2 * 60 * 60 * 1000 > now.getTime() + 2 * 60 * 60 * 1000 ? now.getHours() + 2 : now.getHours() + 3;
            hour = now.getHours() > 12 ? hour - 12 : hour;
            // console.log(123, (now.getTime() - now.getSeconds() * 1000 - now.getMinutes() * 60 * 1000))
        }
        var formattedHour = hour.toString().padStart(2, '0');
        // console.log(moment().startOf('day'))
        if (firstOpen) {
            time = formattedHour + ":00 " + ampm;
            firstOpen = false;
        }
        $(this).data('DateTimePicker').date(time);
        // validateTime();
    }).on('dp.change', function (e) {
        // Your event handling code here
        e.preventDefault();
        validateTime();
    });
    // $('.input-group-addon').click()
    $('.input-group-addon').click(function () {
        // force click on timepicker to show
        $("a[title='Increment Minute']").hide();
        $("a[title='Decrement Minute']").hide();
    });
    $('#appointmentModal').on('shown.bs.modal', function () {
        firstOpen = true;
        document.getElementById("apm_time").value = "";

        // alert("hello");
        $("#validate-time-rule").text("");
        $("#validate-time-rule").removeClass("text-danger");
    });
});
function validateTime() {
    userTime = getUserTime();
    var isToday = userTime.getFullYear() === new Date().getFullYear() && userTime.getMonth() === new Date().getMonth() && userTime.getDate() === new Date().getDate();
    if (isToday && userTime.getHours() <= new Date().getHours() + 2) {
        //set a text within the div <div id="validate-time-rule"></div>
        $("#validate-time-rule").text("Time must be at least 2 hours later");
        $("#validate-time").text("");
        //add class attribute text-danger
        $("#validate-time-rule").addClass("text-danger");

    } else {
        $("#validate-time-rule").text("");
        $("#validate-time-rule").removeClass("text-danger");
    }
}
function getUserTime() {
    var selectedTime = $('#apm_time').val();
    var timeParts = selectedTime.match(/^(\d{1,2}):(\d{2}) ([AP]M)$/);

    if (timeParts) {
        // Set the date to the selected time
        var hours = parseInt(timeParts[1]);
        var minutes = parseInt(timeParts[2]);
        var ampm = timeParts[3];

        // console.log("Selected Time: " + hours + ":" + minutes + " " + ampm + " " + userTime);
        var userDate = getuserDate();
        if (!userDate) {
            console.log("User Date is null ");
            return null;
        }
        var dateParts = userDate.split("/");
        var year = parseInt(dateParts[0]);
        var month = parseInt(dateParts[1]);
        var day = parseInt(dateParts[2]);

        var userTime = new Date(year, month - 1, day, hours % 12 + (ampm === "PM" ? 12 : 0), minutes); // JavaScript months are zero-based so -1
        // Update the weekday part of userTime
        userTime.setFullYear(year, month - 1, day);
        // console.log("User Time: " + userTime);
        return userTime;
    } else {
        console.log("Invalid time format: " + selectedTime);
    }
    return null;
}


function getuserDate() {
    return document.getElementById("apm_date").textContent || "";
}