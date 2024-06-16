$(document).ready(function () {
    // Get the form element
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

    const form = document.getElementById('apm_form');

    // Add an event listener for the form submission
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // prevent the form from submitting normally

        // Perform your form validation logic here
        if (!validateForm()) {
            // If validation fails, prevent the form submission
            event.preventDefault();
        } else {
            // If validation succeeds, submit the form
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const contactInput = document.getElementById('contact');
            const timeInput = document.getElementById('apm_time');
            // console.log(timeInput.value);
            const dateInput = document.getElementById('apm_date');
            console.log(dateInput.textContent)
            const remarkTextarea = document.getElementById("remark");
            const doctorSelect = document.getElementById("doctor");
            // console.log(dateInput.textContent)
            var  formData =  {
                name: nameInput.value,
                email: emailInput.value,
                contact: contactInput.value,
                time: timeInput.value,
                date: dateInput.textContent,
                remark: remarkTextarea.value,
                doctor: doctorSelect.value,
                date: dateInput.textContent
            }
            // send the AJAX request
            $.ajax({
                url: 'assets/php/appointment_form.php',
                type: 'POST',
                data: formData,
            
                success: function (data) {
                    console.log(data);
                     if (data.success) {
                        // toastr success message
                        toastr.success(data.msg)

                        //close the modal not hide
                        document.querySelector('.close').click();
                        // Reset input fields to empty strings
                        nameInput.value = '';
                        emailInput.value = '';
                        contactInput.value = '';
                        timeInput.value = '';
                        dateInput.textContent = ''; // If 'apm_date' is not an input, use textContent to reset it
                        remarkTextarea.value = '';
                        
                    } else {
                        // toastr error message
                        toastr.error(data.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('AJAX error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }
    });
    $('#appointmentModal').on('hidden.bs.modal', function (e) {
        resetValidationMessages();
    });
});

// Function to validate the form
function validateForm() {
    // Reset any previous validation messages
    resetValidationMessages();
    error = 0;
    // Get the input fields
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const contactInput = document.getElementById('contact');
    const timeInput = document.getElementById('apm_time');
    const remarkTextarea = document.getElementById("remark");
    const doctorSelect = document.getElementById("doctor");
    
    var validate_time_content = document.getElementById('validate-time-rule').textContent;
    console.log(validate_time_content);
    var elementId = "";
    // Perform validation checks for each input field
    if (nameInput.value.trim() === '') {
        elementId = "validate-name";
        showValidationMessage(elementId, 'Name field cannot be empty');
        error++
    }

    if (emailInput.value.trim() === '') {
        elementId = "validate-email";
        showValidationMessage(elementId, 'Email field cannot be empty');
        error++
    } else if (!emailInput.value.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        elementId = "validate-email";
        showValidationMessage(elementId, 'Email format is not correct');
        error++
    }


    if (contactInput.value.trim() === '') {
        elementId = "validate-contact";
        showValidationMessage(elementId, 'Contact field cannot be empty');
        error++
    } else if (contactInput.value.length !== 10 && contactInput.value.length !== 11) {
        elementId = "validate-contact";
        showValidationMessage(elementId, 'Contact field only accept 10 or 11 digits number');
        error++
    }
    

    if (timeInput.value.trim() === '') {
        elementId = "validate-time";
        showValidationMessage(elementId, 'Time field cannot be empty');
        $("#validate-time-rule").text("");
        error++
    } else if (validate_time_content !== "") {
        $("#validate-time").text("");
        error++
    }

    if (remarkTextarea.value.trim() === '') {
        elementId = "validate-remark";
        showValidationMessage(elementId, 'Remark field cannot be empty');
        error++
    }

    if (doctorSelect.value.trim() === '') {
        elementId = "validate-doctor";
        showValidationMessage(elementId, 'Doctor field cannot be empty');
        error++
    }

    return error === 0 ? true : false; // Form is valid
}

// Function to reset validation messages
function resetValidationMessages() {
    const validationMessages = document.querySelectorAll('.validate');
    validationMessages.forEach(message => {
        message.textContent = '';
    });
}

// Function to show validation message for a specific input field
function showValidationMessage(elementId, message) {
    const validationMessage = document.getElementById(elementId);
    if (validationMessage) {
        validationMessage.textContent = message;
        validationMessage.classList.add('text-danger');
    }
}

