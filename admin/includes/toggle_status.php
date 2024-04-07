<?php
include 'db.php';

if (isset($_POST['user_id'], $_POST['action'], $_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']) {
    $userId = $_POST['user_id'];
    $action = $_POST['action'] === 'deactivate' ? 'Inactive' : 'Active';

    // Update user status in the database
    $stmt = mysqli_prepare($conn, "UPDATE users SET status = ? WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'si', $action, $userId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Return a success response
        header('Location: ../members.php?members'); // Redirect back to your user list page
    exit();
    } else {
        // Return a failure response
        echo json_encode(['success' => false, 'error' => 'Failed to update user status']);
    }
} else {
    // Return an error response for invalid request or CSRF token mismatch
    echo json_encode(['success' => false, 'error' => 'Invalid request or CSRF token mismatch']);
}

mysqli_close($conn);
?>