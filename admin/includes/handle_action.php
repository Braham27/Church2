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
} elseif ($active && $inactive) {
    // Both are checked; No specific condition for status needed as we are fetching both
    // $whereConditions[] = "(Status = 'Active' OR Status = 'Inactive')";
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
                            <td colspan='2' class='px-0'>
                    
                            <a class='mr-3' href='members.php?link=viewMember&m_id=$member_id' id='popover' data-toggle='popover' 
                                 title='See More of $user_first' data-trigger='hover' 
                                 data-content='' data-placement='top'>
                                 <i class='fas fa-plus-square'></i></a>
                            
                            <a class='pl-1 myLink pr-2 py-0'  id='popover' data-trigger='hover' rel='$user_email' 
                            data-content='$user_first' value='$user_last $user_first' data-toggle='modal' data-target='.email'
                            title='Send A sms to $user_first' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
                                 <i class='fas fa-envelope'></i></a>             
                                 
                            <a class='pl-1 myLink pr-2 py-0'  id='popover' data-trigger='hover' rel='$user_tel' 
                                 data-content='$user_first' value='$user_last $user_first' data-toggle='modal' data-target='.sms'
                                 title='Send A sms to $user_first' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
                                   <i class='fas fa-sms'></i>
                                 </a>
                                 
                            <a class='mr-2 pb-1' href='members.php?link=editmember&m_id=$member_id;' id='popover' data-toggle='popover' 
                                 title='Edit' data-trigger='hover' 
                                 data-content=' data-placement='top'>
                                 <i class='fas fa-edit'></i></a>                                
           
                                   // Invisible form for CSRF token submission
                           <form id='form-{$member_id}' style='display:none;' action='includes/toggle_status.php' method='post'>
                               <input type='hidden' name='user_id' value='{$member_id}'>
                               <input type='hidden' name='action' value='" . ($status == 'Active' ? "deactivate" : "activate") . "'>
                               <input type='hidden' name='csrf_token' value='{$csrfToken}'>
                               </form>
           
                           // Toggle link
                           <a class='mr-2 toggle-status' href='#' id='popover' data-toggle='popover' rel='{$member_id}' 
                               title='" . ($status == 'Active' ? "Inactivate" : "Activate") . " {$user_first}' data-trigger='hover' 
                               data-content='" . ($status == 'Active' ? "Inactivate" : "Activate") . " {$user_first}' data-placement='top'  
                               onclick='event.preventDefault(); if(confirm(\"Are you sure you want to " . ($status == 'Active' ? "Inactivate" : "Activate") . " {$user_last} {$user_first}?\")) document.getElementById(\"form-{$member_id}\").submit();'>
                               <i class='fa " . ($status == 'Active' ? "fa-toggle-on" : "fa-toggle-off") . "' aria-hidden='true'></i>
                               </a>
                                 </td>
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