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
        var currentuserTime = new Date();
        currentuserTime.setFullYear(year, month - 1, day);

        if (!userDate) {
            console.log("User Date is null");
            return;
        }
        var now = new Date();
        var ampm = now.getHours() >= 12 ? 'PM' : 'AM';
        var hour = "00:00:00 PM";

        if (currentuserTime.getFullYear() === now.getFullYear() && currentuserTime.getMonth() === now.getMonth() && currentuserTime.getDate() === now.getDate()) {
            currentMs = now.getTime();
            hour = currentMs + 2 * 60 * 60 * 1000 > now.getTime() + 2 * 60 * 60 * 1000 ? now.getHours() + 2 : now.getHours() + 3;
            hour = now.getHours() > 12 ? hour - 12 : hour;
        }
        var formattedHour = hour.toString().padStart(2, '0');
        if (firstOpen) {
            time = formattedHour + ":00 " + ampm;
            firstOpen = false;
        }
        $(this).data('DateTimePicker').date(time);
    }).on('dp.change', function (e) {
        e.preventDefault();
        validateTime();
        denlist_update(); // Call the update function when the time changes
    });

    $('.input-group-addon').click(function () {
        $("a[title='Increment Minute']").hide();
        $("a[title='Decrement Minute']").hide();
    });

    $('#appointmentModal').on('shown.bs.modal', function () {
        firstOpen = true;
        document.getElementById("apm_time").value = "";
        $("#validate-time-rule").text("");
        $("#validate-time-rule").removeClass("text-danger");
    });
});

function validateTime() {
    var userTime = getUserTime();
    var isToday = userTime.getFullYear() === new Date().getFullYear() && userTime.getMonth() === new Date().getMonth() && userTime.getDate() === new Date().getDate();
    if (isToday && userTime.getHours() <= new Date().getHours() + 2) {
        $("#validate-time-rule").text("Time must be at least 2 hours later");
        $("#validate-time").text("");
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
        var hours = parseInt(timeParts[1]);
        var minutes = parseInt(timeParts[2]);
        var ampm = timeParts[3];

        var userDate = getuserDate();
        if (!userDate) {
            console.log("User Date is null ");
            return null;
        }
        var dateParts = userDate.split("/");
        var year = parseInt(dateParts[0]);
        var month = parseInt(dateParts[1]);
        var day = parseInt(dateParts[2]);

        var userTime = new Date(year, month - 1, day, hours % 12 + (ampm === "PM" ? 12 : 0), minutes);
        userTime.setFullYear(year, month - 1, day);
        return userTime;
    } else {
        console.log("Invalid time format: " + selectedTime);
    }
    return null;
}

function getuserDate() {
    return document.getElementById("apm_date").textContent || "";
}

function denlist_update(){
    // Remove css class style="pointer-events: none;" 
    const selectElement = document.querySelector('#dentist_list');
    selectElement.style.pointerEvents = 'auto';
    
    console.log("Time Changed (input event)");
    // var 
    var dateInput = document.getElementById('apm_date');
    var timeInput = document.getElementById('apm_time');
    console.log(dateInput.textContent);
    console.log(timeInput.value);

    if (dateInput && timeInput) {
        $.ajax({
            url: 'assets/php/dentist_list.php',
            type: 'POST',
            data: {
                date: $('#apm_date').text(),
                time: $('#apm_time').val()
            },
            success: function (response) {
                // var result = response.den_list;
                // console.log(result)
                var den_list = $($.parseHTML(response.den_list));
                $('#dentist_list').html(den_list);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error in AJAX request:', textStatus, errorThrown);
            }
        });
    } else {
        console.error('Element with ID "apm_date" or "apm_time" not found.');
    }
}
