<!-- <script src="scripts/AjaxForActiveInactiveCheck.js"></script> -->

<?php
include_once 'excel.php';
include_once 'handle_action.php';
include_once 'function.php';
$csrfToken = $_SESSION['csrf_token'];

// Number of rows per page 
if(isset($_POST['apply'])){
  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    // Handle the error: the token is missing or doesn't match
    die('CSRF token mismatch.');
}
 $bulk_options = $_POST['perpage'];
 switch ($bulk_options) {
    case '25':
    $per_page = 25;
    break;

    case '50';
    $per_page = 50;
    break;

    case '100';
    $per_page = 100;
    break;

    case '100000';
    $per_page = 1000000;
    break;
    
    default:
    $per_page = 10;
 }
}
// Handle the 'Apply' form submission for per_page
if(isset($_POST['apply'])){
    // CSRF check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $csrfToken) {
        die('CSRF token mismatch.');
    }

    // Handle per_page selection
    $per_page = $_POST['perpage'] ?? 10; // Default to 10
    $per_page = is_numeric($per_page) ? (int)$per_page : 10; // Ensure $per_page is an integer
    $_SESSION['selected_perpage'] = $per_page; // Remember user selection in session
} else {
    $per_page = $_SESSION['selected_perpage'] ?? 10; // Use session or default
}
// Pagination logic
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page_1 = ($page - 1) * $per_page;
?>

<script>
$(document).ready(function() {
    // Check if there's a selected value in the PHP session and set it in the dropdown.
    var selectedValue =
        "<?php echo isset($_SESSION['selected_perpage']) ? $_SESSION['selected_perpage'] : '10'; ?>";
    $('#perpage').val(selectedValue);

});
</script>

<div class="main-content-container container-fluid px-4">

    <!-- Page Header -->

    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Members</h3>
        </div>
    </div>

    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row row1">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left: Add Member Link -->
                        <div class="col-md-4 mx-auto">
                            <div class="card-header">
                                <h6 class="m-0">
                                    <a href="members.php?link=addmember">Add Member<i
                                            class="fas fa-user-plus ml-2"></i></a>
                                </h6>
                            </div>
                        </div>

                        <!-- Center: Upload Form -->
                        <div class="col-md-4 text-center mt-3">
                            <form id="uploadForm" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <input type="file" id="excelFile" name="excelFile" accept=".xlsx, .xls, .csv" required
                                    hidden />
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#excelModal">
                                    Add Members Using Excel
                                </button>
                                <input type="submit" value="Upload" class="btn btn-success mt-2" hidden />
                            </form>
                        </div>

                        <!-- Hidden File Input for Uploading -->
                        <form id="uploadForm" enctype="multipart/form-data" method="post" style="display:none;">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <input type="file" id="excelFile" name="excelFile" accept=".xlsx, .xls, .csv" required />
                            <input type="submit" value="Upload" />
                        </form>
                        <!-- Right: Search Box -->
                        <div class="col-md-4">
                            <div class="center">
                                <div class="search">
                                    <div class="search-box">
                                        <input type="text" class="search-txt" id="myInput" name='myInput'
                                            placeholder="Search Member">
                                        <button class="search-btn" type="button" onkeyup="submitForm()" name="myInput"
                                            id="searchButton">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0 pb-3 text-center">

                    <div class="container-fluid">
                        <div class="row justify-content-between ml-1">
                            <div class="col-lg-3 justify-content-between">
                                <form method="post" id="userActionForm" class="form-inline mt-3">
                                    <input type="hidden" name="csrf_token"
                                        value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <label for="actions" class="my-1 mr-2">Action:</label>
                                    <select class="custom-select my-1 mr-sm-2 col-lg-5" name="actions" id="actions">
                                        <option value="activate">Activate</option>
                                        <option value="inactivate">Inactivate</option>
                                        <option value="send_emails">Send Email</option>
                                        <option value="send_message">Send Message</option>
                                    </select>
                                    <button type="button" id="applyActionBtn"
                                        class="btn btn-primary my-1">Apply</button>
                                </form>
                            </div>
                            <div class="col-lg-3 text-center mt-2 mr-3">
                                <div class="form-check form-check-inline mt-3">
                                    <label class="form-check-label mr-2" for="activeMembers">Active:</label>
                                    <input class="form-check-input myCheckboxClass" type="checkbox" id="activeMembers"
                                        name="active" value="Active" onchange="submitForm()" checked>
                                </div>
                                <div class="form-check form-check-inline mt-3">
                                    <label class="form-check-label mr-2" for="inactiveMembers">Inactive:</label>
                                    <input class="form-check-input myCheckboxClass" type="checkbox" id="inactiveMembers"
                                        name="inactive" value="Inactive" onchange="submitForm()">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <form method="post" action="members.php?members" class="form-inline mt-3">
                                    <input type="hidden" name="csrf_token"
                                        value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <label for="perpage" class="my-1 mr-2">Select Number of Rows:</label>
                                    <select class="custom-select my-1 mr-sm-2 col-lg-3" name="perpage" id="perpage">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="100000">Show All</option>
                                    </select>
                                    <button type="submit" name="apply" class="btn btn-primary my-1">Apply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped relative" id="data">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col">Last</th>
                                <th scope="col">First</th>
                                <th class="desktop" scope="col">Email</th>
                                <th class="desktop" scope="col">Position & Ministry</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <p></p>
                        <tbody id="myTable">
                            <?php  
              $conn = mysqli_connect('localhost', 'root', '', 'north_shore');
              if (!$conn) {
                  die('Connection failed: ' . mysqli_connect_error());
              }
              
                 // Start with a base SQL query

                 $search_user = "SELECT * FROM users";

                // Continue with executing $search_user query

                $search_user = "SELECT * FROM users LIMIT $page_1, $per_page";
                $query_search_user = mysqli_query($conn, $search_user);
                $count_query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users");
                $count_row = mysqli_fetch_array($count_query);
                $total_records = $count_row[0];
                $no_of_page = ceil($total_records / $per_page);

                // Calculate the starting number for the current page
                $startNumber = ($page - 1) * $per_page + 1;

                //   $search_user = "SELECT * FROM users WHERE Status = 'Active' LIMIT $page_1, $per_page";
                //   $query_search_user = mysqli_query($conn, $search_user);
                  
                //  for($x = 1; $x <= $no_of_page; $x++){
                   
                  while($row = mysqli_fetch_assoc($query_search_user)){
                  $member_id = $row['user_id'];
                  $user_email = $row['user_email'];
                  $position = $row['position'];
                  $ministry = $row['user_ministry'];
                  $user_last = $row['user_lastname'];
                  $user_first = $row['user_firstname'];
                  $user_tel = $row['user_tel'];
                  $status = $row['Status'];
                 
              
                 echo "<tr>"; 
                 echo "<td>
                 <input type='checkbox' class='user-checkbox' id='vehicle1' data-member-email='$user_email' data-member-phone='$user_tel' name='selected_users[]' data-user-id='$member_id' value='$member_id' data-member-name='{$user_first} {$user_last}'>
       
                </td>";    
                 echo "<th>" . $startNumber++ . "</th>";
                 echo "<td>$user_last</td>";
                 echo "<td>$user_first</td>";
                 echo "<td class='desktop pr-0'>$user_email</td>";
                 echo "<td class='desktop'>"; 

                 if(!empty($position)){
                   echo ucwords($position) . ' / ';
                   echo ucwords($ministry) . '\'s ' . 'Ministry'; 
                  }                   
                  if(empty($position)){
                    echo ucwords($ministry); 
                  } 
                  echo "</td>";

                 echo "<td colspan='2' class='px-0'>";
                    
                 echo "<a class='mr-3' href='members.php?link=viewMember&m_id=$member_id' id='popover' data-toggle='popover' 
                      title='See More of $user_first' data-trigger='hover' 
                      data-content='' data-placement='top'>
                      <i class='fas fa-plus-square'></i></a>";
                 
                 echo "<a class='pl-1 myLink pr-2 py-0'  id='popover' data-trigger='hover' rel='$user_email' 
                 data-content='$user_first' value='$user_last $user_first' data-toggle='modal' data-target='.email'
                 title='Send A sms to $user_first' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
                      <i class='fas fa-envelope'></i></a>";             
                      
                 echo "<a class='pl-1 myLink pr-2 py-0'  id='popover' data-trigger='hover' rel='$user_tel' 
                      data-content='$user_first' value='$user_last $user_first' data-toggle='modal' data-target='.sms'
                      title='Send A sms to $user_first' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
                        <i class='fas fa-sms'></i>
                      </a>";
                      
                 echo "<a class='mr-2 pb-1' href='members.php?link=editmember&m_id=$member_id;' id='popover' data-toggle='popover' 
                      title='Edit' data-trigger='hover' 
                      data-content=' data-placement='top'>
                      <i class='fas fa-edit'></i></a>";                                

                        // Invisible form for CSRF token submission
                echo "<form id='form-{$member_id}' style='display:none;' action='includes/toggle_status.php' method='post'>
                    <input type='hidden' name='user_id' value='{$member_id}'>
                    <input type='hidden' name='action' value='" . ($status == 'Active' ? "deactivate" : "activate") . "'>
                    <input type='hidden' name='csrf_token' value='{$csrfToken}'>
                    </form>";

                // Toggle link
                echo "<a class='mr-2 toggle-status' href='#' id='popover' data-toggle='popover' rel='{$member_id}' 
                    title='" . ($status == 'Active' ? "Inactivate" : "Activate") . " {$user_first}' data-trigger='hover' 
                    data-content='" . ($status == 'Active' ? "Inactivate" : "Activate") . " {$user_first}' data-placement='top'  
                    onclick='event.preventDefault(); if(confirm(\"Are you sure you want to " . ($status == 'Active' ? "Inactivate" : "Activate") . " {$user_last} {$user_first}?\")) document.getElementById(\"form-{$member_id}\").submit();'>
                    <i class='fa " . ($status == 'Active' ? "fa-toggle-on" : "fa-toggle-off") . "' aria-hidden='true'></i>
                    </a>";
                      echo "</td>";
                      echo "</tr>";
                  }
                // }
?>
                        </tbody>
                    </table>
                    <div class="pagination mr-4" id="selectmenu">
                        <?php
                          for ($i = 1; $i <= $no_of_page; $i++) {
                            echo "<a " . ($page == $i ? "class='active_link' " : "") . "href='members.php?members&page={$i}'>{$i}</a>";
                        }
                        ?>
                    </div>

                    <?php
                    include_once "modal.php";
?>




                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
</div>