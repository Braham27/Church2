<?php
include 'db.php'; // Make sure this path is correct
include("function.php");

// Initialize variables to hold the conditions for filtering and the base SQL query
$whereParts = [];
$searchSql = "SELECT * FROM users";

// Check if "Active", "Inactive", or a search term is set
$activeSelected = isset($_GET['active']) && $_GET['active'] === 'Active';
$inactiveSelected = isset($_GET['inactive']) && $_GET['inactive'] === 'Inactive';
$searchTermProvided = isset($_GET['request']) && !empty($_GET['request']);

// Ensure at least one of "Active" or "Inactive" is selected
if (!$activeSelected && !$inactiveSelected) {
    echo "<tr><td colspan='7' style='text-align:center;'>Please select if you are looking for active or inactive members before searching.</td></tr>";
    return; // Stop the script execution
}

// Add conditions for "Active" or "Inactive" if selected
if ($activeSelected && $inactiveSelected) {
    // Optionally handle this case differently if needed
    // Example: Resetting the filter to fetch all records regardless of status
    $whereParts[] = "(Status = 'Active' OR Status = 'Inactive')";
} else {
    if ($activeSelected) {
        $whereParts[] = "Status = 'Active'";
    }
    if ($inactiveSelected) {
        $whereParts[] = "Status = 'Inactive'";
    }
}

// Process the search term if provided
if ($searchTermProvided) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['request']);
    $whereParts[] = "(user_firstname LIKE '%$searchTerm%' OR user_lastname LIKE '%$searchTerm%' OR user_email LIKE '%$searchTerm%')";
}

// Construct the WHERE clause if there are conditions to apply
if (!empty($whereParts)) {
    $searchSql .= " WHERE " . implode(' AND ', $whereParts);
}

// Execute the query
$result = mysqli_query($conn, $searchSql);
$output = "";
$output .= "<thead>
                    <tr>
                        <th scope='col'></th>
                        <th scope='col'>#</th>
                        <th scope='col'>Last</th>
                        <th scope='col'>First</th>
                        <th class='desktop' scope='col'>Email</th>
                        <th class='desktop' scope='col'>Position & Ministry</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>

                <p></p>
                <tbody id='myTable'>";
$counter = 1;

// Check if there are results and build the output
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
     $output .= "<tr>";
     $output .= "<td><input type='checkbox' name='vehicle1' data-user-id='{$row['user_id']}' value='{$row['user_id']}'></td>"; 
     $output .= "<td>" . $counter++ . "</td>";
     $output .= "<td>" . htmlspecialchars($row['user_lastname']) . "</td>";
     $output .= "<td>" . htmlspecialchars($row['user_firstname']) . "</td>";
     $output .= "<td class='desktop pl-5 pr-0'>" . htmlspecialchars($row['user_email']) . "</td>";
     $output .= "<td>" . htmlspecialchars(ucwords($row['position'])) . " / " . htmlspecialchars(ucwords($row['user_ministry'])) . "'s Ministry</td>";
     $output .= "<td colspan='2' class='px-0'>
          <a class='mr-3' href='members.php?link=viewMember&m_id=" . htmlspecialchars($row['user_id']) . "' id='popover' data-toggle='popover' 
              title='See More of " . htmlspecialchars($row['user_firstname']) . "' data-trigger='hover' 
              data-content='' data-placement='top'>
              <i class='fas fa-plus-square'></i></a>
          <a class='pl-1 myLink pr-2 py-0' id='popover' data-trigger='hover' rel='" . htmlspecialchars($row['user_email']) . "' 
              data-content=" . htmlspecialchars($row['user_firstname']) . " value='" . htmlspecialchars($row['user_firstname']) . " " . htmlspecialchars($row['user_lastname']) . "' data-toggle='modal' data-target='.email'
              title='Send An Email to " . htmlspecialchars($row['user_firstname']) . "' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
              <i class='fas fa-envelope'></i></a>           
          <a class='pl-1 myLink pr-2 py-0' id='popover' data-trigger='hover' rel='" . htmlspecialchars($row['user_tel']) . "' 
              data-content=" . htmlspecialchars($row['user_firstname']) . " value='" . htmlspecialchars($row['user_firstname']) . " " . htmlspecialchars($row['user_lastname']) . "' data-toggle='modal' data-target='.sms'
              title='Send A SMS to " . htmlspecialchars($row['user_firstname']) . "' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
              <i class='fas fa-sms'></i></a>
          <a class='mr-2 pb-1' href='members.php?link=editmember&m_id=" . htmlspecialchars($row['user_id']) . "' id='popover' data-toggle='popover' 
              title='Edit' data-trigger='hover'>
              <i class='fas fa-edit'></i></a>";
              $status = htmlspecialchars($row['Status']);
       if ($status == 'Active') { 
       $output .= "<a class='mr-2' href='members.php?delete={$row['user_id']}' id='popover' data-toggle='popover' rel='{$row['user_id']}' 
                 title='Inactivate" . htmlspecialchars($row['user_firstname']) . "data-trigger='hover' 
                 data-content='DeletInactivate" . htmlspecialchars($row['user_firstname']) . "data-placement='top' onclick='return confirm(\"Are you sure you want to inactivate" . htmlspecialchars($row['user_lastname']) . " " . htmlspecialchars($row['user_firstname']) . "?\");'>
                 <i class='fa fa-toggle-on' id='activateMember' aria-hidden='true'></i>";
       }else{
       $output .= "<a class='mr-2' href='members.php?delete={$row['user_id']}' id='popover' data-toggle='popover' rel='{$row['user_id']}' 
                 title='Activate" . htmlspecialchars($row['user_firstname']) . "data-trigger='hover' 
                 data-content='DeletInactivate" . htmlspecialchars($row['user_firstname']) . "data-placement='top' onclick='return confirm(\"Are you sure you want to Activate" . htmlspecialchars($row['user_lastname']) . " " . htmlspecialchars($row['user_firstname']) . "?\");'>
                 <i class='fa fa-toggle-off' id='inactivateMember' aria-hidden='true'></i>";
       }

    $output .= "</td>
    </tr>";
     }
 } else {
     $output = "<tr><td colspan='7'>No matching records found</td></tr>";
 }

 echo $output;

echo "</tbody>";
mysqli_close($conn);
?>
?>


