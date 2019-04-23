<?php include 'includes/admin_header.php'; ?>

    <div class="container-fluid">
      <div class="row">

<!-- Main Sidebar -->
<?php include 'includes/admin_sidebar.php'; ?>
<!-- End Main Sidebar -->

        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">

<!-- Main Navbar -->
<?php include 'includes/admin_nav.php'; ?>
<!-- / .main-navbar -->

<?php

$query = "SELECT * FROM users WHERE user_email = '{$_SESSION['email']}'";
$user_admin = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($user_admin)){
  $server_user_firstname = $row['user_firstname'];
  $server_user_lastname = $row['user_lastname'];
  $server_user_username = $row['username'];
  $server_user_password = $row['user_password'];
  $server_user_email = $row['user_email'];
  $picture_name = $row['user_image'];
  $server_user_ministry = $row['user_ministry'];
  $server_user_position = $row['position'];
  $server_user_address = $row['user_address'];
  $server_user_city = $row['user_city'];
  $server_user_state = $row['user_state'];
  $server_user_zip = $row['user_zip'];
  $server_user_description = $row['user_description'];
  $server_user_tel = $row['user_tel'];
}


if(isset($_POST['update'])){
  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

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

    $picture_name = $_FILES['filename']['name'];
    $picture_temp = $_FILES['filename']['tmp_name'];

    $file_size = $_FILES['filename']['size'];

    $fileExtension = strtolower(end(explode('.',$picture_name)));

  //  move_uploaded_file($picture_temp, "img/$picture_name");

        $errors = []; // Store all foreseen and unforseen errors here

      if(empty($picture_name)){

         while ($row = mysqli_fetch_array($user_admin)){
          $picture_name = $row['user_image'];}
       
      if(empty($password)){
        while ($row = mysqli_fetch_array($user_admin)){
          $password = $row['user_password'];}
      }

        $editmembers = "UPDATE users SET user_firstname = '{$fname}', "; 
        $editmembers .= "user_lastname = '{$lname}', user_password = '{$password}', ";
        $editmembers .= "user_email = '{$email}', "; 
        $editmembers .= "user_address = '{$address}', user_city = '{$city}', ";
        $editmembers .= "user_state = '{$state}', user_zip = '{$zip}', ";
        $editmembers .= "user_description = '{$description}', user_tel = {$phone} ";
        $editmembers .= "WHERE user_email = '{$_SESSION['email']}'";

        result($editmembers);        
        checkQuery($result);

        echo " <div class='alert alert-success alert-dismissible fade show mb-0' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
        <i class='fa fa-check mx-2'></i>
        <strong>Success!</strong> Your profile has been updated! 
      </div>";
        
      }  
        elseif(!in_array($fileExtension,$fileExtensions) || $file_size > 2000000){
        echo  $errors="<div class='alert bg-danger alert-accent alert-dismissible fade show mb-0' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'></span>×</span>
                        </button>
                        <i class='fa fa-info mx-2'></i>
                        Please upload a JPEG or PNG file and less than 2MB </div>";
      } elseif(empty($errors)==true) {
        move_uploaded_file($picture_temp,"img/".$picture_name);

       selectUsers();
       checkQuery($query_search_user);
       $editmembers = "UPDATE users SET user_firstname = '{$fname}', "; 
       $editmembers .= "user_lastname = '{$lname}', user_password = '{$password}', ";
       $editmembers .= "user_email = '{$email}', user_image = '{$picture_name}', "; 
       $editmembers .= "user_address = '{$address}', user_city = '{$city}', ";
       $editmembers .= "user_state = '{$state}', user_zip = {$zip}, ";
       $editmembers .= "user_description = '{$description}', user_tel = {$phone} ";
       $editmembers .= "WHERE user_email = '{$_SESSION['email']}'";

       $query_editmembers = result($editmembers);           
       checkQuery($query_editmembers);

       echo " <div class='alert alert-success alert-dismissible fade show mb-0' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
        <i class='fa fa-check mx-2'></i>
        <strong>Success!</strong> Your profile has been updated! 
      </div>";
  } else {
           echo "";
        }
    }
?>
          <!-- END ALERT -->

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
              <script>
$(function(){
  $('#my_file').change( function(e) {
    // var img = URL.createObjectURL(e.target.files[0]);
        var img = $('#my_file').val();
        $('.imgg').attr('src', 'img/'+img);
    });
  })
});

// $(function(){
//   $('#my_file').change( function(e) {
//     var img = URL.createObjectURL(e.target.files[0]);
//         // var img = file.name;
//         $('.imgg').attr('src', 'img/file.name');
//     });
//   })
// });
</script>                  
                      
<form method="post" enctype="multipart/form-data">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">

         <div id="im" class="mb-3 mx-auto">
                    <img class="rounded-circle imgg" src="img/<?php echo $picture_name;?>" alt="User Avatar" width="90" height="90"> </div>
                    <h4 class="mb-0"><?php echo $server_user_lastname . " ". $server_user_firstname; ?></h4>
                    <span class="text-muted d-block mb-2"> <?php if(!empty($server_user_position)){
                   echo ucwords($server_user_position) .' '. 'Of The'.' ';
                   echo ucwords($server_user_ministry);
                  } 
                  if(empty($server_user_position)){
                    echo ' '.'Ministry';
                  }  ?></span>
                    <a type="file" id="img1"  class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2" name="filename">
                      <i class="material-icons mr-1">person_add</i>Change Picture</a>
                    <input type="file" id="my_file" name="filename" >

                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">74%</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</span>
                    </li>
                  </ul>
                </div>

              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">                         
                      <div class="row">
                        <div class="col">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="feLastName">Last Name</label>
                              <input type="text" class="form-control" name="lname" id="feLastName" placeholder="Last Name" value="<?php echo $server_user_lastname ; ?>"> </div>
                            <div class="form-group col-md-6">
                                <label for="feFirstName">First Name</label>
                                <input type="text" class="form-control" name="fname" id="feFirstName" placeholder="First Name" value="<?php echo $server_user_firstname; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" name="email" id="feEmailAddress" placeholder="Email" value="<?php echo $server_user_email; ?>"> </div>
                             
                              

                         <div class="form-group col-md-6">
                          <div id="spass">
                            <input class="mx-2" id="check" type="checkbox"> <span id="hide2"> To Change the Password? Click!!! </span> </div>
                            <div class="hide">
                            <label for="fePassword">Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Change the Password"> </div>
                            </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Phone</label>
                                <input type="tel" class="form-control" name="tel" id="feEmailAddress" placeholder="Email" value="<?php echo $server_user_tel; ?>"> </div>
                            <div class="form-group col-md-6">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" name="address" id="feInputAddress" placeholder="1234 Main St" value="<?php echo $server_user_address; ?>"> </div>
                </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" name="city" id="feInputCity" value="<?php echo $server_user_city; ?>"> </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" name="state" class="form-control" >
                                  <option selected><?php echo $server_user_state; ?></option>
                                  <option value="others">Others</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="inputZip" value="<?php echo $server_user_zip; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Description</label>
                                <textarea class="form-control" name="Description" rows="5"> <?php echo $server_user_description; ?> </textarea>
                              </div>
                            </div>
                            <button type="submit" name="update" class="btn btn-accent yow">Update Account</button>
</form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
<?php include 'includes/admin_footer.php'; ?>
