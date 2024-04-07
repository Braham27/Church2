<?php
include 'db.php';
// Assuming you're using sessions for CSRF protection
if (isset($_POST['user_id'], $_POST['action'], $_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']) {
    $userId = $_GET['user_id'];
    $action = $_GET['action'] === 'deactivate' ? 'Inactive' : 'Active';

    // Update user status in the database
    $stmt = mysqli_prepare($conn, "UPDATE users SET status = ? WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'si', $action, $userId);
    $result = mysqli_stmt_execute($stmt);

    // Redirect back after updating
    header('Location: ../members.php?members'); // Redirect back to your user list page
    exit();
} else {
    die('Invalid request');
}

?>