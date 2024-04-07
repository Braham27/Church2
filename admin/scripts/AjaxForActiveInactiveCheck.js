// $(document).ready(function(){
//     function updateTable() {
//         var isActiveChecked = $("#activeMembers").is(":checked");
//         var isInactiveChecked = $("#inactiveMembers").is(":checked");

//         // Prepare data to send in AJAX request
//         var formData = {
//             active: isActiveChecked,
//             inactive: isInactiveChecked
//         };

//         $.ajax({
//             type: 'POST',
//             url: "../includes/viewAllMembers.php", // Send the request to the same page
//             data: formData,
//             success: function(response) {
//                 // Update your table here with the response
//                 $('#data').html(response);
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.error('Error: ', textStatus, errorThrown);
//             }
//         });
//     }

//     // Event listeners for the checkboxes
//     $("#activeMembers, #inactiveMembers").on("click", updateTable);

//     // Initial table update
//     updateTable();
    
// });


