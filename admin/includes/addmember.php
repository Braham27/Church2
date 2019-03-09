<!-- //don't forget to send this page to edit member -->
<?php
if(isset($_POST['addmember'])){

    $submit= $_POST['addmember'];
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
    $fileExtensions = ['jpeg','jpg','png'];

    $picture_name = $_FILES['name']['name'];
    $picture_temp = $_FILES['name']['tmp_name'];

    $file_size = $_FILES['name']['size'];

    $fileExtension = strtolower(end(explode('.',$picture_name)));

        $errors = []; // Store all foreseen and unforseen errors here
        
        if(!in_array($fileExtension,$fileExtensions)){
        echo  $errors[]="<div class='alert bg-danger alert-accent alert-dismissible fade show mb-0' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'></span>×</span>
                        </button>
                        <i class='fa fa-info mx-2'></i>
                        The file you Choose for the Picture is not allowed. Please upload a JPEG or PNG file</div>";
      } 

      if ($file_size > 2000000) {
      echo $errors[] = "<div class='alert bg-danger alert-accent alert-dismissible fade show mb-0' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'></span>×</span>
        </button>
        <i class='fa fa-info mx-2'></i>This file is more than 2MB. Sorry, it has to be less than or equal to 2MB</div>";
    }

      if(empty($errors)) {
         move_uploaded_file($picture_temp,"img/".$picture_name);

      // \\\\\\\End with the pic

        selectUsers();
        checkQuery($query_search_user);
        $addmembers = "INSERT INTO users (username, user_firstname, user_lastname, user_password, user_email, user_image, user_ministry, position, user_address, user_city, user_state, user_zip, user_description, user_tel) ";
        $addmembers .= "VALUES ('{$username}', '{$firstname}', '{$lastname}', '{$password}', '{$email}', '{$picture_name}', '{$ministry}', '{$position}', '{$address}', '{$city}', '{$state}', '{$zip}', '{$description}', {$phone})";

        $query_addmembers = result($addmembers);
        checkQuery($query_addmembers);

        echo "<div class='alert bg-success alert-accent alert-dismissible fade show mb-0' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'></span>×</span>
              </button>
              <i class='fa fa-info mx-2'></i>
              <strong>Member Added.</strong> <a href='members.php?members' style='color:gray';box-shadow: inset 0 1px 3px rgba(0,0,0,.1), 0 5px 1px rgba(0,0,0,.1);>View All the members</a> </div>";        
      } 
      
      }
    

?>
<div class="col-lg-12 my-4">
                <!-- Sliders & Progress Bars -->
                
                <!-- / Sliders & Progress Bars -->
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
                            <input type="text" class="form-control" id="form1-username" name="lastname" placeholder="Lastname"> </div>
                        </div>

                        <strong class="text-muted d-block mb-2">Firstname</strong>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="form1-username" placeholder="Firstname" name="firstname"> </div>
                        </div>
                        
                        <strong class="text-muted d-block mb-2">Username</strong>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="form1-username" placeholder="Username" name="username"> </div>
                        </div>

                        <strong class="text-muted d-block mb-2">Email</strong>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                          </div>
                          <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email" aria-describedby="basic-addon1"> 
                        </div>

                        <div class="form-row mt-4">
                        <div class="input-group mb-3 col-md-6">
                        <strong class="text-muted d-block mb-2">Ministry</strong>                        
                          <div class="input-group input-group-seamless">
                            <select id="inputState" name="user_ministry" class="form-control">
                                <option value='' selected>Choose...</option>
                                <option value='pastoral'>Pastoral</option>
                                <option value='women'>Women</option>
                                <option value='men'>Men</option>
                                <option value='worship team'>Worship Team</option>
                                <option value='sound & media'>Sound & Media</option>
                                <option value='cleaning'>Cleaning</option>
                            </select> </div>
                        </div>


                        <div class="input-group mb-3 col-md-6">
                        <strong class="text-muted d-block mb-2">Position in Ministry</strong>                        
                          <div class="input-group input-group-seamless">
                            <input type="text" class="form-control" id="form1-username" placeholder="His Position" name="position"> </div>
                        </div>
                        </div>
                        
                            <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <div class="mb-2">
                                <strong class="text-muted">Phone:</strong> </div>
                            <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </span>
                            </span>
                            <input type="tel" class="form-control pl-5" id="form1-username" placeholder="Phone" name="phone"> </div>                            
                              </div>

                              <div class="form-group col-md-6">
                                <div class="mb-2">
                                <strong class="text-muted">Picture:</strong> </div>
                                <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                              <span class="input-group-text"><i class="fas fa-camera"></i></span>
                              </span>
                            </span>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="validatedCustomFile" name="name">
                              <label class="custom-file-label pl-5 text-muted" for="customFileLang">Choose a picture</label>
                              </div>
                            </div>   
                            </div>                            
                          </div>

                            <strong class="text-muted d-block mb-2">Password</strong>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                          </div>
                            <input type="password" class="form-control" id="form2-password" placeholder="Password" name="user_password">
                          </div>

                          <strong class="text-muted d-block mt-4 mb-2">Address</strong>                         
                            <div class="form-group mb-4 col-md-6" style="transform:translate(-3%)">
                                <input type="text" class="form-control" placeholder="52 church St" name="user_adderess"> 
                                <div class="feedback text-muted mx-2">Address</div>
                                <div class="invalid-feedback">
                                  Please provide a valid Address.
                                </div>
                            </div>
  
                            <div class="form-row">

                              <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" name="user_city" required>
                                <div class="feedback text-muted mx-2">City</div>
                                <div class="invalid-feedback">
                                  Please provide a valid city.
                                </div>
                              </div>

                              <div class="col-md-4 mb-3">
                              <select id="inputState" name="user_state" class="form-control">
                                  <option selected>Choose...</option>
                                  <option value='Massachussets'>Massachussets</option>
                              </select>
                                <div class="feedback text-muted mx-2">State</div>
                                <div class="invalid-feedback">
                                  Please provide a valid state.
                                </div>
                              </div>

                              <div class="col-md-4 mb-4">
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" name="user_zip" required>
                                <div class="feedback text-muted mx-2">zip</div>
                                <div class="invalid-feedback">
                                  Please provide a valid zip.
                                </div>
                              </div>
                              
                              <div class="form-group col-md-12">
                              <strong class="text-muted d-block mb-2">Description</strong>
                                <textarea class="form-control" name=user_description rows="5">Say Something About This Member?</textarea>
                              </div>
                 
                              <input class="mt-3 mb-4 btn btn-sm btn-primary mr-1 col-md-2 offset-md-5" type="submit" name="addmember" value="Add Member">

                          </div>
                    </li>
                  </ul>
                  </form>
                </div>
</div>