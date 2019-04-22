<!-- Search Table -->
<?php
include 'db.php';


    $request = $_POST['request'];

   $search_user = "SELECT * FROM users WHERE user_firstname LIKE '$request%' OR user_lastname LIKE '$request%'";
   $query_search_user = mysqli_query($conn, $search_user);

    while($row = mysqli_fetch_assoc($query_search_user)){
    $user_id = $row['user_id'];
    $user_email = $row['user_email'];
    $position = $row['position'];
    $ministry = $row['user_ministry'];
    $user_last = $row['user_lastname'];
    $user_first = $row['user_firstname'];
    $user_tel = $row['user_tel'];
  
   echo "<tr>";    
   echo "<th scope='row'>" . $x++ . "</th>";
   echo "<td>$user_last</td>";
   echo "<td>$user_first</td>";
   echo "<td class='desktop pl-5 pr-0'>$user_email</td>";
   echo "<td class='desktop'>"; 
   
   if(!empty($position)){
     echo ucwords($position) .' '. 'Of The'.' ';
    } 
    echo ucwords($ministry); 
    if(!empty($position)){
      echo ' '.'Ministry';
    } 
    echo "</td>";

   echo "<td colspan='2' class='px-0'>";
      
   echo "<a class='mr-3' href=' id='popover' data-toggle='popover' 
        title='See More of $user_first' data-trigger='hover' 
        data-content=' data-placement='top'>
        <i class='fas fa-plus-square'></i></a>";

   echo "<a class='mr-2' href=' id='popover' data-toggle='popover' 
        title='Send A Mail to $user_first' data-trigger='hover' 
        data-content='Send A Mail' data-placement='top' >
        <i class='fas fa-envelope'></i></a>";             
        
   echo "<a class='pl-1 myLink pr-2 py-0'  id='popover' data-trigger='hover' rel='$user_tel' 
        data-content='$user_first' value='$user_last $user_first' data-toggle='modal' data-target='.bd-example-modal-lg'
        title='Send A sms to $user_first' href='javascript:void(0)' data-toggle='popover' data-placement='top'>
          <i class='fas fa-sms'></i>
        </a>";
        
   echo "<a class='mr-2 pb-1' href='members.php?link=editmember&m_id=$user_id;' id='popover' data-toggle='popover' 
        title='Edit' data-trigger='hover' 
        data-content=' data-placement='top'>
        <i class='fas fa-edit'></i></a>";              
        
   echo "<a class='mr-2' href='members.php?delete=$user_id;' id='popover' data-toggle='popover' 
        title='Delete $user_first' data-trigger='hover' 
        data-content='Delete $user_first' data-placement='top' onclick='return confirm('Are you sure you want to Delete $user_last . ' ' . $user_first;?');'>
        <i class='fas fa-trash-alt'></i></a>";                 
   
        echo "</td>";
        echo "</tr>";
        }
    
?>

<script type="text/javascript">

$(".myLink").click(function(){
  var phone = $(this).attr("rel");
  var name = $(this).attr("value");
  var first = $(this).attr("data-content");
  
  $('input.fl').val(name);
  $('input.phone').val(phone);
      });

</script>           


<?php
$query = "SELECT * FROM users WHERE user_email = '{$_SESSION['email']}'";
$user_admin = mysqli_query($conn, $query);

if(isset($_POST['update'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $ministry = $_POST['user_ministry'];
    $position = $_POST['position'];

    $password = $_POST['pass'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $description = $_POST['Description'];
    $phone = $_POST['tel'];

    // for the picture
    $errors = []; 
    $fileExtensions = ['jpeg','jpg','png', ''];

    $picture_name = $_FILES['name']['name'];
    $picture_temp = $_FILES['name']['tmp_name'];

    $file_size = $_FILES['name']['size'];

    $fileExtension = strtolower(end(explode('.',$picture_name)));

  //  move_uploaded_file($picture_temp, "img/$picture_name");

        $errors = []; // Store all foreseen and unforseen errors here

      if(empty($picture_name)){

         while ($row = mysqli_fetch_array($result)){
          $picture_name = $row['user_image'];}
          if(empty($picture_name)){
            $picture_name = "Businessman.png";
          }

        $editmembers = "UPDATE users SET username = '{$username}', user_firstname = '{$fname}', "; 
        $editmembers .= "user_lastname = '{$lname}', user_password = '{$password}', ";
        $editmembers .= "user_email = '{$email}', user_image = '{$picture_name}', "; 
        $editmembers .= "user_ministry = '{$ministry}', position = '{$position}', " ;
        $editmembers .= "user_address = '{$address}', user_city = '{$city}', ";
        $editmembers .= "user_state = '{$state}', user_zip = '{$zip}', ";
        $editmembers .= "user_description = '{$description}', user_tel = {$phone} ";
        $editmembers .= "WHERE user_id = {$the_m_id}";

        result($editmembers);        
        checkQuery($result);

        echo "<div class='alert bg-success alert-accent alert-dismissible fade show mb-0' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'></span>×</span>
              </button>
              <i class='fa fa-info mx-2'></i>
              <strong>Member Edit.</strong> Go To <a href='members.php?members' style='color:gray';box-shadow: inset 0 1px 3px rgba(0,0,0,.1), 0 5px 1px rgba(0,0,0,.1);>View All the members</a> <i class='far fa-hand-point-left'></i> </div>";
        
      }  
        elseif(!in_array($fileExtension,$fileExtensions) || $file_size > 2000000){
        echo  $errors="<div class='alert bg-danger alert-accent alert-dismissible fade show mb-0' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'></span>×</span>
                        </button>
                        <i class='fa fa-info mx-2'></i>
                        Either the file extension of the picture you Choose Or to much Size. Please upload a JPEG or PNG file and less than 2MB </div>";
      } elseif(empty($errors)==true) {
        move_uploaded_file($picture_temp,"img/".$picture_name);

       selectUsers();
       checkQuery($query_search_user);
       $editmembers = "UPDATE users SET username = '{$username}', user_firstname = '{$fname}', "; 
       $editmembers .= "user_lastname = '{$lname}', user_password = '{$password}', ";
       $editmembers .= "user_email = '{$email}', user_image = '{$picture_name}', "; 
       $editmembers .= "user_ministry = '{$ministry}', position = '{$position}', " ;
       $editmembers .= "user_address = '{$address}', user_city = '{$city}', ";
       $editmembers .= "user_state = '{$state}', user_zip = {$zip}, ";
       $editmembers .= "user_description = '{$description}', user_tel = {$phone} ";
       $editmembers .= "WHERE user_id = {$the_m_id}";

       $query_editmembers = result($editmembers);           
       checkQuery($query_editmembers);

       echo "<div class='alert bg-success alert-accent alert-dismissible fade show mb-0' role='alert'>
             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'></span>×</span>
             </button>
             <i class='fa fa-info mx-2'></i>
             <strong>Member Edit.</strong> Go To <a href='members.php?members' style='color:gray';box-shadow: inset 0 1px 3px rgba(0,0,0,.1), 0 5px 1px rgba(0,0,0,.1);>View All the members</a> <i class='far fa-hand-point-left'></i> </div>";
  } else {
           echo "";
        }
    }
?>