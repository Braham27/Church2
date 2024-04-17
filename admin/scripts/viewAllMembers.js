// Javascript for actions button
document.addEventListener('DOMContentLoaded', function() {
    var applyButton = document.getElementById('applyActionBtn');
    var confirmBtn = document.getElementById('confirmBtn');

    // Handle Apply button click to open appropriate modals
    applyButton.addEventListener('click', function(event) {
        event.preventDefault();
        var selectedAction = document.getElementById('actions').value;
        switch (selectedAction) {
            case 'activate':
            case 'inactivate':
                openConfirmationModal(selectedAction);
                break;
            case 'send_emails':
                openEmailModal();
                break;
            case 'send_message':
                openSmsModal();
                break;
        }
    });

    // Functions to handle modal opening
    function openConfirmationModal(action) {
        var selectedMembers = Array.from(document.querySelectorAll('.user-checkbox:checked'));
        var memberListHtml = selectedMembers.map(checkbox => `<li>${checkbox.getAttribute('data-member-name')}</li>`).join('');
        document.getElementById('actionType').textContent = action;
        document.getElementById('memberList').innerHTML = memberListHtml;
        $('#confirmationModal').modal('show');
    }

    function openEmailModal() {
        $('#emailModal').modal('show');
    }

    function openSmsModal() {
        $('#smsModal').modal('show');
    }

    confirmBtn.addEventListener('click', function() {
        document.getElementById('userActionForm').submit();
    });
});



// This should be changed
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
  