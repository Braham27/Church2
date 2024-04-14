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


// Script to submit form when a file is selected
document.getElementById('excelFile').addEventListener('change', function() {
    if (this.files && this.files[0]) {
      document.getElementById('uploadForm').submit();
    }
  });
  