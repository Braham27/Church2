<!-- //don't forget to send this page to edit member -->
<?php
if (isset($_GET['m_id'])) {
    $the_m_id = $_GET['m_id'];

    $member_info = "SELECT * FROM users WHERE user_id = {$the_m_id}";
  $result = mysqli_query($conn, $member_info);

   while($row = mysqli_fetch_array($result)){
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
}
?>

<?php
if(isset($_POST['editmember'])){

    $submit= $_POST['editmember'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $ministry = $_POST['user_ministry'];
    $position = $_POST['position'];

    $password = $_POST['user_password'];
    $address = $_POST['user_adderess'];
    $city = $_POST['user_city'];
    $state = $_POST['user_state'];
    $zip = $_POST['user_zip'];
    $description = $_POST['user_description'];
    $phone = $_POST['phone'];

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

        $member_info = "SELECT * FROM users WHERE user_id = {$the_m_id}";
        $result = mysqli_query($conn, $member_info);

         while ($row = mysqli_fetch_array($result)){
          $picture_name = $row['user_image'];}
          // if(empty($picture_name)){
          //   $picture_name = "Businessman.png";
          // }

        $editmembers = "UPDATE users SET username = '{$username}', user_firstname = '{$firstname}', "; 
        $editmembers .= "user_lastname = '{$lastname}', user_password = '{$password}', ";
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
       $editmembers = "UPDATE users SET username = '{$username}', user_firstname = '{$firstname}', "; 
       $editmembers .= "user_lastname = '{$lastname}', user_password = '{$password}', ";
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
<div class="col-lg-12 my-4">

                <!-- Input & Button Groups -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Add Members</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3">

                      <form method="post" action="" enctype="multipart/form-data">
                        <!-- Input Groups -->
                       
                        <!-- Input Groups -->
                        <!-- Seamless Input Groups -->
                        <strong class="text-muted d-block mb-2">Lastname</strong>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="form1-username" name="lastname" value="<?php echo $server_user_lastname; ?>"> </div>
                        </div>

                        <strong class="text-muted d-block mb-2">Firstname</strong>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="form1-username" value="<?php echo $server_user_firstname; ?>" name="firstname"> </div>
                        </div>
                        
                        <strong class="text-muted d-block mb-2">Username</strong>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="form1-username" value="<?php echo $server_user_username; ?>" name="username"> </div>
                        </div>

                        <strong class="text-muted d-block mb-2">Email</strong>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                          </div>
                          <input type="email" class="form-control" value="<?php echo $server_user_email; ?>" aria-label="email" name="email" aria-describedby="basic-addon1"> 
                        </div>

                        <div class="form-row mt-4">
                        <div class="input-group mb-3 col-md-6">
                        <strong class="text-muted d-block mb-2">Ministry</strong>                        
                          <div class="input-group input-group-seamless">
                            <select id="inputState" name="user_ministry" class="form-control">
                                <option value="<?php echo $server_user_ministry; ?>" selected><?php echo $server_user_ministry; ?></option>
                                <?php if($server_user_ministry !== 'church'){ echo "<option value='church'>Church</option>"; } ?>
                                <?php if($server_user_ministry !== 'women'){ echo "<option value='women'>Women</option>"; } ?>
                                <?php if($server_user_ministry !== 'men'){ echo "<option value='men'>Men</option>"; } ?>
                                <?php if($server_user_ministry !== 'worship team'){ echo "<option value='worship team'>Worship Team</option>"; } ?>
                                <?php if($server_user_ministry !== 'sound & media'){ echo "<option value='sound & media'>Sound & Media</option>"; } ?>
                                <?php if($server_user_ministry !== 'cleaning'){ echo "<option value='cleaning'>Cleaning</option>"; } ?>
                            </select> 
                          </div>
                        </div>

                        <div class="input-group mb-3 col-md-6">
                        <strong class="text-muted d-block mb-2">Position in Ministry</strong>                        
                          <div class="input-group input-group-seamless">
                            <input type="text" class="form-control" id="form1-username" value="<?php echo $server_user_position; ?>" name="position"> </div>
                        </div>
                        </div>
                        
                            <div class="form-row mt-3">
                                <div class="form-group col-md-6">
                                  <div class="mb-2"> <strong class="text-muted">Phone:</strong> </div>
                                  <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                      </span>
                                    </span>
                                    <input type="tel" class="form-control pl-5" id="form1-username" value="<?php echo $server_user_tel; ?>" name="phone"> 
                                  </div>                            
                                </div>

                              <div class="form-group col-md-6">
                                <div class="mb-2">
                                <strong class="text-muted">Picture:</strong> 
                                </div>
                                <div class="input-group input-group-seamless">
                                  <span class="input-group-prepend">
                                    <span class="input-group-text">
                                    <span class="input-group-text"><i class="fas fa-camera"></i></span>
                                    </span>
                                  </span>
                                  <div class="custom-file">
                                    <div class="col-md-10">
                                        <input type="file" class="custom-file-input" value="<?php echo $picture_name; ?>" id="validatedCustomFile" name="name">
                                        <label class="custom-file-label pl-5 text-muted" style="overflow:hidden" for="customFileLang"><?php echo $picture_name; ?></label>
                                    </div>
                                    <img width="65" height="65" class="mx-3" style="border-radius:50%;border:#c3c7cc solid 5px;box-shadow: inset 0 1px 2px rgba(0,0,0,.1), 0 4px 1px rgba(0,0,0,.1);" src="img/<?php echo $picture_name; ?>" alt="">
                                  </div>
                                </div>   
                              </div>                            
                            </div>

                            <strong class="text-muted d-block mb-2">Password</strong>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                          </div>
                            <input type="password" class="form-control" id="form2-password" value="<?php echo $server_user_password; ?>" name="user_password">
                          </div>

                          <strong class="text-muted d-block mt-4 mb-2">Address</strong>                         
                            <div class="form-group mb-4 col-md-6" style="transform:translate(-3%)">
                                <input type="text" class="form-control" value="<?php echo $server_user_address; ?>" name="user_adderess"> 
                                <div class="feedback text-muted mx-2">Address</div>
                                <div class="invalid-feedback">
                                  Please provide a valid Address.
                                </div>
                            </div>
  
                            <div class="form-row">

                              <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $server_user_city; ?>" name="user_city" required>
                                <div class="feedback text-muted mx-2">City</div>
                                <div class="invalid-feedback">
                                  Please provide a valid city.
                                </div>
                              </div>

                              <div class="col-md-4 mb-3">
                              <select id="inputState" name="user_state" class="form-control">
                                  <option value="<?php echo $server_user_state; ?>" selected><?php echo $server_user_state; ?></option>
                                  <option value='Massachussets'>Massachussets</option>
                              </select>
                                <div class="feedback text-muted mx-2">State</div>
                                <div class="invalid-feedback">
                                  Please provide a valid state.
                                </div>
                              </div>

                              <div class="col-md-4 mb-4">
                                <input type="text" class="form-control" id="validationCustom05" placeholder="<?php echo $server_user_zip; ?>" name="user_zip" required>
                                <div class="feedback text-muted mx-2">zip</div>
                                <div class="invalid-feedback">
                                  Please provide a valid zip.
                                </div>
                              </div>
                              
                              <div class="form-group col-md-12">
                              <strong class="text-muted d-block mb-2">Description</strong>
                                <textarea class="form-control" name=user_description rows="5"><?php echo $server_user_description; ?></textarea>
                              </div>
                 
                              <input class="mt-3 mb-4 btn btn-sm btn-primary mr-1 col-md-2 offset-md-5" type="submit" name="editmember" value="Edit Member">

                          </div>
                    </li>
                  </ul>
                  </form>
                </div>
</div>