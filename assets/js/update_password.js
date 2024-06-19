function validationForm() {
    // Reset any previous validation messages
    resetValidationMessages();

    // Get the input fields
    const currentPasswordInput = document.getElementById('current_password');
    const newPasswordInput = document.getElementById('new_password');
    const confirmPasswordInput = document.getElementById('confirm_password');

    // Perform validation checks for each input field
    if (currentPasswordInput.value.trim() === '') {
        showValidationMessage('validate_current_password', 'Current password field cannot be empty');
        return false;
    }

    if (newPasswordInput.value.trim() === '') {
        showValidationMessage('validate_new_password', 'New password field cannot be empty');
        return false;
    }

    if (newPasswordInput.value !== confirmPasswordInput.value) {
        showValidationMessage('validate_confirm_password', 'New password and confirm password do not match');
        return false;
    }

    return true;
}

// Send AJAX request to update_password.php and display success message using toastr
$(document).ready(function () {
    const form = document.getElementById('update_password');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // prevent the form from submitting normally
        var currentPasswordInput = document.getElementById('current_password');
        var newPasswordInput = document.getElementById('new_password');
        var confirmPasswordInput = document.getElementById('confirm_password');

        if (validationForm()) {
            var formData = {
                current_password: currentPasswordInput.value,
                new_password: newPasswordInput.value
            };

            $.ajax({
                url: 'assets/php/update_password.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data.success) {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('AJAX error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        } else {
            event.preventDefault();
        }
    });
});

function resetValidationMessages() {
    const validationMessages = document.querySelectorAll('.validate');
    validationMessages.forEach(message => {
        message.textContent = '';
    });
}

function showValidationMessage(elementId, message) {
    const validationMessage = document.getElementById(elementId);
    if (validationMessage) {
        validationMessage.textContent = message;
        validationMessage.classList.add('text-danger');
    }
}

