<?php

// Function to generate a CSRF token
function generateCsrfToken() {
    return bin2hex(random_bytes(32)); // Generate a random token
}

// Function to validate CSRF token
function csrfTokenIsValid($token) {
    // Check if the token matches the one stored in the session
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>