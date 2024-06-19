// $(document).ready(function () {
//     var timeInput = document.getElementById('apm_time');

//     // Check if the timeInput element is successfully selected
//     if (timeInput) {
//         console.log(timeInput);

//         // Add event listener for 'change' and 'input' events
//         timeInput.addEventListener('change', function () {
//             console.log("Time Changed (change event)");
//             denlist_update();
//         });

//         timeInput.addEventListener('input', function () {
//             console.log("Time Changed (input event)");
//             denlist_update();
//         });
//     } else {
//         console.error('Element with ID "apm_time" not found.');
//     }
    
//     // Initial call to update the dentist list
//     denlist_update();
// });

// function denlist_update(){
//     var dateInput = document.getElementById('apm_date');
//     var timeInput = document.getElementById('apm_time');

//     // Check if the required elements are successfully selected
//     if (dateInput && timeInput) {
//         var html = '';
//         var ajax = $.ajax({
//             url: 'assets/php/dentist_list.php',
//             type: 'POST',
//             data: {
//                 date: dateInput.textContent, // If the date is expected to be in textContent
//                 time: timeInput.value // If the time is expected to be in value
//             },
//             success: function (den_list) {
//                 $('#dentist_list').html(den_list);
//             },
//             error: function (jqXHR, textStatus, errorThrown) {
//                 console.error('Error in AJAX request:', textStatus, errorThrown);
//             }
//         });
//     } else {
//         console.error('Element with ID "apm_date" or "apm_time" not found.');
//     }
// }
