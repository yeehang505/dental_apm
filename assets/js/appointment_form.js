$(document).ready(function () {
    // Get the form element
    const form = document.getElementById('apm_form');

    // Add an event listener for the form submission
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // prevent the form from submitting normall

        // Perform your form validation logic here
        if (!validateForm()) {
            // If validation fails, prevent the form submission
            event.preventDefault();
        }
    });
    $('#appointmentModal').on('hidden.bs.modal', function (e) {
        resetValidationMessages();
    });
})

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
    }

    if (contactInput.value.trim() === '') {
        elementId = "validate-contact";
        showValidationMessage(elementId, 'Contact field cannot be empty');
        error++
    }

    if (timeInput.value.trim() === '') {
        elementId = "validate-time";
        showValidationMessage(elementId, 'Time field cannot be empty');
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


