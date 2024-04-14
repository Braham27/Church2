// $(document).ready(function() {
//     // Trigger the search or filter operation when the user types in the search box
//     $('#myInput').on('keyup', function() {
//         submitForm(); // Call the submitForm function whenever text is typed
//     });

//     // Additionally, trigger the search or filter operation when checkboxes change state
//     $('#activeMembers, #inactiveMembers').on('change', function() {
//         submitForm(); // Call the submitForm function whenever checkboxes change state
//     });

//     // Define the submitForm function
//     function submitForm() {
//         var formData = {
//             request: $('#myInput').val(), // Get the value from the search input
//             active: $('#activeMembers').is(':checked') ? 'Active' : 'none', // Check the status of the Active checkbox
//             inactive: $('#inactiveMembers').is(':checked') ? 'Inactive' : 'none' // Check the status of the Inactive checkbox
//         };

//         $.ajax({
//             url: 'includes/fetch_database.php',
//             type: 'GET',
//             data: formData, // Send the formData object with the AJAX request
//             success: function(data) {
//                 $("#data").html(data); // Update the HTML of the element with ID 'data'
//             }
//         });
//     }
// });

// // Listen for changes on checkboxes with the class 'myCheckboxClass'
// $('input.myCheckboxClass').on('change', function() {
//     // Check if the checkbox is checked
//     if ($(this).is(':checked')) {
//         var value = $(this).val(); // Get the value of the checked checkbox

//         $.ajax({
//             url: 'includes/fetch_database.php',
//             type: 'GET',
//             data: { request: value }, // Send the value as 'request'
//             success: function(data) {
//                 $("#data").html(data); // Update the element with ID 'data' with the response
//             }
//         });
//     }
// });

function submitForm() {
    var active = $('#activeMembers').is(':checked') ? 'Active' : '';
    var inactive = $('#inactiveMembers').is(':checked') ? 'Inactive' : '';
    var searchTerm = $('#myInput').val();

    $.ajax({
        url: 'includes/fetch_database.php',
        type: 'GET',
        data: { 
            active: active,
            inactive: inactive,
            request: searchTerm
        },
        success: function(data) {
            $("#data").html(data);
        }
    });
}

// Attach handlers to checkboxes and search input
$('#activeMembers, #inactiveMembers, #myInput').on('change keyup', function() {
    submitForm();
});
