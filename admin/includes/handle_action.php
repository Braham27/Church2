<?php
include_once("function.php");
// change status for 1 or multiple users
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF token check for security
    checkCsrfToken();

    $action = $_POST['actions'];
    $selectedUsers = $_POST['selected_users'] ?? [];  // Null coalescing operator for PHP 7

    // Handle different actions
    switch ($action) {
        case 'activate':
        case 'inactivate':
            $newStatus = $action === 'activate' ? 'Active' : 'Inactive';
            foreach ($selectedUsers as $userId) {
                $stmt = mysqli_prepare($conn, "UPDATE users SET status = ? WHERE user_id = ?");
                mysqli_stmt_bind_param($stmt, 'si', $newStatus, $userId);
                mysqli_stmt_execute($stmt);
            }
            break;
        // Add cases for 'send_emails' and 'send_message' as needed
    }

    // Redirect or provide feedback
    header('Location: members.php?members');
    exit();
}
?>