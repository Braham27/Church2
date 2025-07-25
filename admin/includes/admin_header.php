<?php include 'db.php' ?>
<?php 
if(isset($_SESSION['position'])){
  if ($_SESSION['position'] !== 'pastor') {
    header("location: ../index.php");
  }  
}
if (!isset($_SESSION['position'])) {
  header("location: ../index.php");
}

if (!isset($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  $csrfToken = $_SESSION['csrf_token'];
}
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>gjvg</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="styles/css.css">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/a.c.1.1.0.min.css">
    
    <link rel="stylesheet" href="styles/ac.1.1.0.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> 
    <script src="scripts/jquery-3.2.1.min.js"></script>
    <script src="scripts/viewAllMembers.js"></script>



    <!-- sms -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="styles/sms.css">
    
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>


     <!-- <script type="text/javascript" src="cdn.jsdelivr.net/jquery/3.1.0/jquery.min.js"></script> -->

     <!-- single profile -->

     <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- js -->
    <!-- <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script> -->
    <script type="text/javascript" src="scripts/sliding.form.js"></script>
    <!-- //js -->
    <link href="styles/profil.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="styles/smoothbox.css" type='text/css' media="all" />

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  </head>

  <body class="h-100">
  
    <div class="color-switcher-toggle animated pulse infinite">
     <a href="settings.php" style="color:unset"> <i class="material-icons">settings</i> </a>
    </div>
