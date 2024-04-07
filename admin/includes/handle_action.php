<?php
// Assuming you have already established a connection to your database and it's stored in $conn

// Capture the user inputs
$searchTerm = trim($_GET['request'] ?? ''); // The search term input by the user, trimmed to remove leading/trailing spaces
$active = isset($_GET['active']) && $_GET['active'] === 'Active'; // Checks if the 'Active' checkbox is selected
$inactive = isset($_GET['inactive']) && $_GET['inactive'] === 'Inactive'; // Checks if the 'Inactive' checkbox is selected

// Validate checkbox selection
if (!$active && !$inactive) {
    echo "Please select if the member is active or inactive.";
    return; // Stop the script execution if no status is selected
}

// Start constructing the SQL query
$searchSql = "SELECT * FROM users";
$whereConditions = [];

// Conditions based on checkbox states
if ($active && !$inactive) {
    $whereConditions[] = "Status = 'Active'";
} elseif (!$active && $inactive) {
    $whereConditions[] = "Status = 'Inactive'";
}

// Search term condition
if (!empty($searchTerm)) {
    // Split the search term into parts based on spaces (assuming names might be separated by spaces)
    $terms = explode(' ', $searchTerm);
    $searchConditions = [];
    foreach ($terms as $term) {
        $safeTerm = mysqli_real_escape_string($conn, $term);
        $searchConditions[] = "(firstname LIKE '%$safeTerm%' OR lastname LIKE '%$safeTerm%' OR CONCAT(firstname, ' ', lastname) LIKE '%$safeTerm%' OR CONCAT(lastname, ' ', firstname) LIKE '%$safeTerm%' OR email LIKE '%$safeTerm%')";
    }

    // Combine search conditions with OR, as any part can match
    $whereConditions[] = '(' . implode(' OR ', $searchConditions) . ')';
}

// Construct the WHERE clause if there are conditions
if (!empty($whereConditions)) {
    $searchSql .= " WHERE " . implode(' AND ', $whereConditions);
}

// Execute the query
$result = mysqli_query($conn, $searchSql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Process and output the results...

    // Start the output
    $output = "<table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Position & Ministry</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

    // Check if any records were found
    if (mysqli_num_rows($result) > 0) {
        $counter = 1; // Initialize a counter for numbering the rows
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<tr>
                            <td>" . htmlspecialchars($counter++) . "</td>
                            <td>" . htmlspecialchars($row['user_lastname']) . "</td>
                            <td>" . htmlspecialchars($row['user_firstname']) . "</td>
                            <td>" . htmlspecialchars($row['user_email']) . "</td>
                            <td>" . htmlspecialchars($row['position']) . " / " . htmlspecialchars($row['user_ministry']) . "</td>
                            <td>
                                <!-- Action buttons go here -->
                            </td>
                        </tr>";
        }
    } else {
        $output .= "<tr><td colspan='6'>No matching records found</td></tr>";
    }

    $output .= "</tbody></table>";

    // Close the database connection
    mysqli_close($conn);

    // Return the output
//     echo $output;
// } else {
//     echo "Please provide a search term or select a status filter.";
// }
?>
?>