function validateProfileForm() {
    // Reset any previous validation messages
    resetValidationMessages();
    error = 0;
    // Get the input fields
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const contactInput = document.getElementById('contact_no');
    const icInput = document.getElementById('ic');
    
    // Perform validation checks for each input field
    if (nameInput.value.trim() === '') {
        showValidationMessage('validate-name', 'Name field cannot be empty');
        error++
    }

    if (emailInput.value.trim() === '') {
        showValidationMessage('validate-email', 'Email field cannot be empty');
        error++
    } else if (!emailInput.value.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        showValidationMessage('validate-email', 'Email format is not correct');
        error++
    }


    if (contactInput.value.trim() === '') {
        showValidationMessage('validate-contact_no', 'Contact field cannot be empty');
        error++
    } else if (contactInput.value.length !== 10 && contactInput.value.length !== 11) {
        showValidationMessage('validate-contact_no', 'Contact field only accept 10 or 11 digits number');
        error++
    }
    

    if (icInput.value.trim() === '') {
        showValidationMessage('validate-ic', 'IC field cannot be empty');
        error++
    } else if (icInput.value.length !== 12) {
        showValidationMessage('validate-ic', 'IC field only accept 12 digits number');
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


// Send AJAX request to profile.php and display success message using toastr
$(document).ready(function () {
console.log("hello");
const form = document.getElementById('profileForm');

form.addEventListener('submit', function (event) {

    event.preventDefault(); // prevent the form from submitting normally
    // Get the input fields
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const contactInput = document.getElementById('contact_no');
    const icInput = document.getElementById('ic');

    if (validateProfileForm()) {
        var formData = {
            name: nameInput.value,
            email: emailInput.value,
            contact: contactInput.value,
            ic: icInput.value
        }
        $.ajax({
            url: 'assets/php/profile.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data.success) {
                    toastr.success(data.msg);
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    } else {
        console.log('Form validation failed');
        event.preventDefault();
    }

})
})
