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



?>
          </div> 
          <!-- ALERT -->
         
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

                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                    <img class="rounded-circle" src="img/<?php echo $_SESSION['picture'];?>" alt="User Avatar" width="90" height="90"> </div>
                    <h4 class="mb-0"><?php echo $_SESSION['last'] . " ". $_SESSION['first']; ?></h4>
                    <span class="text-muted d-block mb-2"> <?php    if(!empty($_SESSION['position'])){
                   echo ucwords($_SESSION['position']) .' '. 'Of The'.' ';
                   echo ucwords($_SESSION['ministry']);
                  } 
                  if(empty($_SESSION['position'])){
                    echo ' '.'Ministry';
                  }  ?></span>
<form action="post">
                    <button type="file" id="img1" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                      <i class="material-icons mr-1">person_add</i>Change Picture</button>
                    <input type="file" id="my_file" name="name" style="display: none;" />
</form>
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
                          <form>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">First Name</label>
                                <input type="text" class="form-control" name="fname" id="feFirstName" placeholder="First Name" value="<?php echo $_SESSION['first']; ?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="feLastName" placeholder="Last Name" value="<?php echo $_SESSION['last']; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" name="email" id="feEmailAddress" placeholder="Email" value="<?php echo $_SESSION['email']; ?>"> </div>
                             
                              

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
                                <input type="tel" class="form-control" name="tel" id="feEmailAddress" placeholder="Email" value="<?php echo $_SESSION['tel']; ?>"> </div>
                            <div class="form-group col-md-6">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" name="address" id="feInputAddress" placeholder="1234 Main St" value="<?php echo $_SESSION['address']; ?>"> </div>
                </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" name="city" id="feInputCity" value="<?php echo $_SESSION['city']; ?>"> </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" name="state" class="form-control" >
                                  <option selected><?php echo $_SESSION['state'] ?></option>
                                  <option value="others">Others</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="inputZip" value="<?php echo $_SESSION['zip']; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Description</label>
                                <textarea class="form-control" name="Description" rows="5"> <?php echo $_SESSION['desc']; ?> </textarea>
                              </div>
                            </div>
                            <button type="submit" name="update" class="btn btn-accent">Update Account</button>
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
