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
          
          </div>
          <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-info mx-2"></i>
            <strong>How you doin'?</strong> I'm just a friendly, good-looking notification message and I come in all the colors you can see below. Pretty cool, huh? </div>
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Forms & Components</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row mb-2">
              <div class="col-12">
                <span style="font-size: 16px;" class="d-block mb-2 text-muted">
                  <strong>Colors</strong>
                </span>
              </div>
              <div class="col mb-4">
                <div class="bg-primary rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Primary</div>
              </div>
              <div class="col mb-4">
                <div class="bg-secondary rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Secondary</div>
              </div>
              <div class="col mb-4">
                <div class="bg-success rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Success</div>
              </div>
              <div class="col mb-4">
                <div class="bg-info rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Info</div>
              </div>
              <div class="col mb-4">
                <div class="bg-warning rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Warning</div>
              </div>
              <div class="col mb-4">
                <div class="bg-danger rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Danger</div>
              </div>
              <div class="col mb-4">
                <div class="bg-dark rounded text-white text-center p-3" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Dark</div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 mb-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Inputs</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-0 px-3 pt-3">
                      <div class="row">
                        <div class="col-sm-12 col-md-4 mb-3">
                          <!-- Checkboxes -->
                          <strong class="text-muted d-block mb-2">Checkboxes</strong>
                          <fieldset>
                            <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault">
                              <label class="custom-control-label" for="formsCheckboxDefault">Default</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="formsCheckboxChecked" checked>
                              <label class="custom-control-label" for="formsCheckboxChecked">Checked</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="formsCheckboxDisabled" disabled>
                              <label class="custom-control-label" for="formsCheckboxDisabled">Disabled</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="formsCheckboxDisabledChecked" disabled checked>
                              <label class="custom-control-label" for="formsCheckboxDisabledChecked">Disabled Checked</label>
                            </div>
                          </fieldset>
                          <!-- / Checkboxes -->
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                          <!-- Radios -->
                          <strong class="text-muted d-block mb-2">Radio Buttons</strong>
                          <fieldset>
                            <div class="custom-control custom-radio mb-1">
                              <input type="radio" id="formsRadioDefault" name="formsRadioDefault" class="custom-control-input">
                              <label class="custom-control-label" for="formsRadioDefault">Default</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                              <input type="radio" id="formsRadioChecked" name="formsRadioChecked" class="custom-control-input" checked>
                              <label class="custom-control-label" for="formsRadioChecked">Checked</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                              <input type="radio" id="formsRadioDisabled" name="formsRadioDisabled" class="custom-control-input" disabled>
                              <label class="custom-control-label" for="formsRadioDisabled">Disabled</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                              <input type="radio" id="formsRadioDisabledChecked" name="formsRadioDisabledChecked" class="custom-control-input" disabled checked>
                              <label class="custom-control-label" for="formsRadioDisabledChecked">Disabled Checked</label>
                            </div>
                          </fieldset>
                          <!-- / Radios -->
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                          <!-- Toggles -->
                          <fieldset>
                            <strong class="text-muted d-block mb-2">Toggle Switches</strong>
                            <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                              <input type="checkbox" id="customToggle1" name="customToggle1" class="custom-control-input">
                              <label class="custom-control-label" for="customToggle1">Default</label>
                            </div>
                            <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                              <input type="checkbox" id="customToggle2" name="customToggle2" class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="customToggle2">Checked</label>
                            </div>
                            <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                              <input type="checkbox" id="customToggle3" name="customToggle3" class="custom-control-input" disabled="disabled">
                              <label class="custom-control-label" for="customToggle3">Disabled</label>
                            </div>
                            <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                              <input type="checkbox" id="customToggle4" name="customToggle4" class="custom-control-input" checked="checked" disabled="disabled">
                              <label class="custom-control-label" for="customToggle4">Disabled Checked</label>
                            </div>
                          </fieldset>
                          <!-- / Toggles -->
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-3">
                      <!-- Small Buttons -->
                      <strong class="text-muted d-block my-2">Small Buttons</strong>
                      <div class="row mb-3">
                        <div class="col">
                          <button type="button" class="mb-2 btn btn-sm btn-primary mr-1">Primary</button>
                          <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1">Secondary</button>
                          <button type="button" class="mb-2 btn btn-sm btn-success mr-1">Success</button>
                          <button type="button" class="mb-2 btn btn-sm btn-danger mr-1">Danger</button>
                          <button type="button" class="mb-2 btn btn-sm btn-warning mr-1">Warning</button>
                          <button type="button" class="mb-2 btn btn-sm btn-info mr-1">Info</button>
                          <button type="button" class="mb-2 btn btn-sm btn-dark mr-1">Dark</button>
                          <button type="button" class="mb-2 btn btn-sm btn-white mr-1">White</button>
                        </div>
                      </div>
                      <!-- / Small Buttons -->
                      <!-- Small Outline Buttons -->
                      <strong class="text-muted d-block mb-2">Small Outline Buttons</strong>
                      <div class="row">
                        <div class="col">
                          <button type="button" class="mb-2 btn btn-sm btn-outline-primary mr-1">Primary</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-secondary mr-1">Secondary</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-success mr-1">Success</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-danger mr-1">Danger</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-warning mr-1">Warning</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-info mr-1">Info</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-dark mr-1">Dark</button>
                          <button type="button" class="mb-2 btn btn-sm btn-outline-light mr-1">Light</button>
                        </div>
                      </div>
                      <!-- / Small Outline Buttons -->
                    </li>
                    <li class="list-group-item p-3">
                      <!-- Normal Buttons -->
                      <strong class="text-muted d-block my-2">Normal Buttons</strong>
                      <div class="row mb-3">
                        <div class="col">
                          <button type="button" class="mb-2 btn btn-primary mr-2">Primary</button>
                          <button type="button" class="mb-2 btn btn-secondary mr-2">Secondary</button>
                          <button type="button" class="mb-2 btn btn-success mr-2">Success</button>
                          <button type="button" class="mb-2 btn btn-danger mr-2">Danger</button>
                          <button type="button" class="mb-2 btn btn-warning mr-2">Warning</button>
                          <button type="button" class="mb-2 btn btn-info mr-2">Info</button>
                          <button type="button" class="mb-2 btn btn-dark mr-2">Dark</button>
                          <button type="button" class="mb-2 btn btn-white mr-2">White</button>
                        </div>
                      </div>
                      <!-- / Normal Buttons -->
                      <!-- Normal Outline Buttons -->
                      <strong class="text-muted d-block mb-2">Normal Outline Buttons</strong>
                      <div class="row">
                        <div class="col">
                          <button type="button" class="mb-2 btn btn-outline-primary mr-2">Primary</button>
                          <button type="button" class="mb-2 btn btn-outline-secondary mr-2">Secondary</button>
                          <button type="button" class="mb-2 btn btn-outline-success mr-2">Success</button>
                          <button type="button" class="mb-2 btn btn-outline-danger mr-2">Danger</button>
                          <button type="button" class="mb-2 btn btn-outline-warning mr-2">Warning</button>
                          <button type="button" class="mb-2 btn btn-outline-info mr-2">Info</button>
                          <button type="button" class="mb-2 btn btn-outline-dark mr-2">Dark</button>
                          <button type="button" class="mb-2 btn btn-outline-light mr-2">Light</button>
                        </div>
                      </div>
                      <!-- / Normal Outline Buttons -->
                    </li>
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col-sm-12 col-md-6">
                          <strong class="text-muted d-block mb-2">Forms</strong>
                          <form>
                            <div class="form-group">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> </div>
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" value="myCoolPassword"> </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="7898 Kensington Junction, New York, USA"> </div>
                            <div class="form-row">
                              <div class="form-group col-md-7">
                                <input type="text" class="form-control" id="inputCity" value="New York"> </div>
                              <div class="form-group col-md-5">
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-12 col-md-6">
                          <strong class="text-muted d-block mb-2">Form Validation</strong>
                          <form>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Catalin" required>
                                <div class="valid-feedback">The first name looks good!</div>
                              </div>
                              <div class="form-group col-md-6">
                                <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Vasile" required>
                                <div class="valid-feedback">The last name looks good!</div>
                              </div>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="Username" value="catalin.vasile" required>
                              <div class="invalid-feedback">This username is taken.</div>
                            </div>
                            <div class="form-group">
                              <select class="form-control is-invalid">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                              <div class="invalid-feedback">Please select your state.</div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 mb-4">
                <!-- Sliders & Progress Bars -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Sliders & Progress Bars</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3">
                      <!-- Progress Bars -->
                      <div class="mb-2">
                        <strong class="text-muted d-block mb-3">Progress Bars</strong>
                        <div class="progress progress-sm mb-3">
                          <div id="progress-bar-example-1" class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress progress-sm mb-3">
                          <div id="progress-bar-example-2" class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress progress-sm mb-3">
                          <div id="progress-bar-example-3" class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress progress-sm">
                          <div id="progress-bar-example-4" class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <!-- / Progress Bars -->
                    </li>
                    <li class="list-group-item px-3">
                      <!-- Sliders -->
                      <div class="mb-2">
                        <strong class="text-muted d-block">Custom Sliders</strong>
                        <div id="slider-example-1" class="slider-success my-4">
                          <input type="hidden" class="custom-slider-input">
                          <input type="hidden" class="custom-slider-input"> </div>
                        <div id="slider-example-2" class="slider-info my-4">
                          <input type="hidden" class="custom-slider-input">
                          <input type="hidden" class="custom-slider-input"> </div>
                        <div id="slider-example-3" class="mt-4">
                          <input type="hidden" class="custom-slider-input">
                          <input type="hidden" class="custom-slider-input"> </div>
                      </div>
                      <!-- / Sliders -->
                    </li>
                  </ul>
                </div>
                <!-- / Sliders & Progress Bars -->
                <!-- Input & Button Groups -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Groups</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3">
                      <form>
                        <!-- Button Groups -->
                        <strong class="text-muted d-block mb-2">Button Groups</strong>
                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                          <label class="btn btn-white active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Fizz </label>
                          <label class="btn btn-white">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Buzz </label>
                          <label class="btn btn-white">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Foo </label>
                          <label class="btn btn-white">
                            <input type="radio" name="options" id="option4" autocomplete="off"> Bar </label>
                        </div>
                        <!-- / Button Groups -->
                        <!-- Input Groups -->
                        <strong class="text-muted d-block mb-2">Input Groups</strong>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> </div>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2" value="contact">
                          <div class="input-group-append">
                            <span class="input-group-text">@designrevision.com</span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="1000">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                        <!-- Input Groups -->
                        <!-- Seamless Input Groups -->
                        <strong class="text-muted d-block mb-2">Seamless Input Groups</strong>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <span class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">person</i>
                              </span>
                            </span>
                            <input type="text" class="form-control" id="form1-username" placeholder="Username" value="design.revision"> </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group input-group-seamless">
                            <input type="password" class="form-control" id="form2-password" placeholder="Password" value="mySuperSecretPa$$word">
                            <span class="input-group-append">
                              <span class="input-group-text">
                                <i class="material-icons">lock</i>
                              </span>
                            </span>
                          </div>
                        </div>
                        <!-- / Seamless Input Groups -->
                        <!-- Input/Button Group -->
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-white" type="button">Button</button>
                          </div>
                        </div>
                        <!-- / Input/Button Group -->
                        <!-- Input/Button Group -->
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <button class="btn btn-white" type="button">Button</button>
                          </div>
                          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2"> </div>
                        <!-- / Input/Button Group -->
                      </form>
                    </li>
                  </ul>
                </div>
                <!-- / Input & Button Groups -->
              </div>
            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
              <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-components-overview.1.1.0.js"></script>
  </body>
</html>