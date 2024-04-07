$(document).ready(function() {
    // Trigger the search or filter operation when the user types in the search box
    $('#myInput').on('keyup', function() {
        submitForm(); // Call the submitForm function whenever text is typed
    });

    // Additionally, trigger the search or filter operation when checkboxes change state
    $('#activeMembers, #inactiveMembers').on('change', function() {
        submitForm(); // Call the submitForm function whenever checkboxes change state
    });

    // Define the submitForm function
    function submitForm() {
        var formData = {
            request: $('#myInput').val(), // Get the value from the search input
            active: $('#activeMembers').is(':checked') ? 'Active' : 'none', // Check the status of the Active checkbox
            inactive: $('#inactiveMembers').is(':checked') ? 'Inactive' : 'none' // Check the status of the Inactive checkbox
        };

        $.ajax({
            url: 'includes/fetch_database.php',
            type: 'GET',
            data: formData, // Send the formData object with the AJAX request
            success: function(data) {
                $("#data").html(data); // Update the HTML of the element with ID 'data'
            }
        });
    }
});