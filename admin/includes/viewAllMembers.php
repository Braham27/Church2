<?php
if(isset($_POST['apply'])){
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

    case 'all';
    $per_page = 100000000000;
    
    default:
    $per_page = 10;
 }
}
?>

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
          <div class="card-header">
            <h6 class="desktop-t m-0"><a href="members.php?link=addmember">Add Member<i class="fas fa-user-plus ml-2"></i></a></h6>
          </div>

          <div class="card-body p-0 pb-3 text-center">

          <table class="table table-striped relative" id="myTable">

          <caption class="desktop-t ml-4 mt-4">List of Members</caption>
                   
          <h6 class="mx-4 mobile text mt-3">Select Number of Rows:</h6>
<div class="form-group mt-3 mb-0" id="month">
 
  <div class="mobile">
    <form method="post" action="">                  
        <div class="inline form-group col-lg-3 ml-5">
          <select class="form-control" name="perpage" id="" >
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="all">Show All</option>
          </select>
        </div>
        <input class="btn btn-sm btn-primary" type="submit" name="apply" value="Apply">
    </form>
  </div>
</div>

<div class="center">
    <div class="search">
      <div class="search-box">
          <input type="text" class="search-txt" id="myInput" onkeyup="myFunction()" name='myInput' placeholder="Search Member">
          <button class="search-btn" type="submit">
              <i class="fas fa-search"></i>
          </button>
      </div>
    </div>
    </div>

                    <thead>
                <tr>
                 
                    <th scope="col">#</th>
                    <th scope="col">Last</th>
                    <th scope="col">First</th>
                    <th  class="desktop" scope="col">Email</th>
                    <th class="desktop" scope="col">position & Ministry</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                  
              <script>
              
                   $('input[name="myInput"]').keyup('change', function(){
                     var value = $(this).val();
                     $.ajax({
                       url:'includes/fetch_database.php',
                       type:'POST',
                       data: 'request='+value,
                       success:function(data){
                         $("#data").html(data);
                       }
                     })
                   })
    
              </script>
<p ></p>
<tbody id="data">
              <?php                    
                  if(isset($_GET['page'])){
                      $page = $_GET['page'];
                  } else {
                      $page ='';
                  }
                  
                  if(!isset($_POST['apply'])){
                  $per_page = 10;
                  }
               
                  if ($page == "" || $page == 1) { // $page == "" means the index;
                      $page_1 = 0;
                  } else {
                      $page_1 = ($page * $per_page) - $per_page; //$per_page is the # of data that you need by page; the total should be equal to 0;
                      //or $page_1 = ($page-1) * $per_page
                  }   

                 $search_user = "SELECT * FROM users";
                 $query_search_user = mysqli_query($conn, $search_user);
                 $count = mysqli_num_rows($query_search_user);
                 $no_of_page = ceil($count/$per_page);           
                
                 $search_user = "SELECT * FROM users LIMIT $page_1, $per_page";
                 $query_search_user = mysqli_query($conn, $search_user);
                  
                 for($x = 1; $x <= $no_of_page; $x++){
                   
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
                   echo ucwords($position) . ' ';
                   echo ucwords($ministry) . ' ' . 'Ministry'; 
                  }                   
                  if(empty($position)){
                    echo ucwords($ministry); 
                  } 
                  echo "</td>";

                 echo "<td colspan='2' class='px-0'>";
                    
                 echo "<a class='mr-3' href='members.php?link=viewMember&m_id=$user_id' id='popover' data-toggle='popover' 
                      title='See More of $user_first' data-trigger='hover' 
                      data-content='' data-placement='top'>
                      <i class='fas fa-plus-square'></i></a>";
                 
                 echo "<a class='mr-2' href='' id='popover' data-toggle='popover' 
                      title='Send A Mail to $user_first' data-trigger='hover' 
                      data-content='' data-placement='top' >
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
                  }}
?>
</tbody>

<script type="text/javascript">

$(".myLink").click(function(){
  var phone = $(this).attr("rel");
  var name = $(this).attr("value");
  var first = $(this).attr("data-content");
  
  $('input.fl').val(name);
  $('input.phone').val(phone);
      });

</script>           


<!-- /BEGINING OF SMS -->
      <?php include "sms.php"; ?>
<!-- /END OF SMS -->
                                                         

                  <?php
                   
                      
                      // delete Members
                      if(isset($_GET['delete'])){
                        $the_member_id = $_GET['delete'];
                        $query_delete_user = "DELETE FROM users WHERE user_id = {$the_member_id}";
                        $res_query = mysqli_query($conn, $query_delete_user);
                        if (!$res_query) {
                          die("QUERY FAILED" . mysqli_error($conn));
                        }
                        header('location:members.php?members');
                      }
                  ?>

           
            </table>

            <div class="pagination mr-4" id="selectmenu">
            <?php
if(isset($_POST['apply']) or !isset($_POST['apply'])){            

    for($i=1; $i<=$no_of_page; $i++){

        if ($page == $i) { // $i = number of page
            echo "<a class='active_link' href='members.php?members&page={$i}'>{$i}</a>";
        } else {
            echo "<a href='members.php?members&page={$i}'>{$i}</a>";
        }
        
    }
  }
  
   ?>
     <!-- <a href="#?pageno=1">&laquo;</a>
                <a href="#">1</a>
                <a href="#" class="active">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a> -->
            </div>

          

        </div>
        </div>
      </div>
    </div>
    <!-- End Default Light Table -->          
</div>