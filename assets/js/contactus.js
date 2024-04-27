$(document).ready(function () {

    $('#contact_submit').click(function(){

        // Perform your form validation logic here
        if (!validatecontactForm()) {
            // If validation fails, prevent the form submission
            return false;
        } else {
            // If validation succeeds, submit the form
            const nameInput = document.getElementById('contact_name');
            const emailInput = document.getElementById('contact_email');
            const subjectInput = document.getElementById('contact_subject');
            const messageTextarea = document.getElementById("contact_message");

            var formData =  {
                name: nameInput.value,
                email: emailInput.value,
                subject: subjectInput.value,
                message: messageTextarea.value
            }
            // send the AJAX request
            $.ajax({
                url: 'assets/php/contactus.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        // toastr success message
                        toastr.success(data.msg)

                        // Reset input fields to empty strings
                        nameInput.value = '';
                        emailInput.value = '';
                        subjectInput.value = '';
                        messageTextarea.value = '';
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
});

function validatecontactForm() {
    var error = 0;

    const nameInput = document.getElementById('contact_name');
    const emailInput = document.getElementById('contact_email');
    const subjectInput = document.getElementById('contact_subject');
    const messageTextarea = document.getElementById("contact_message");

    if (nameInput.value.trim() === '') {
        error++;
    }

    if (emailInput.value.trim() === '') {
        error++;
    }

    if (subjectInput.value.trim() === '') {
        error++;
    }

    if (messageTextarea.value.trim() === '') {
        error++;
    }
   
    if (error > 0) {
        toastr.error("Please fill in all required fields");
    }

    return (error === 0);
}
