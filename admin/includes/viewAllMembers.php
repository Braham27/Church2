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
    <div class="row">
      <div class="col">
        <div class="card card-small mb-4">
          <div class="card-header border-bottom">
            <h6 class="m-0"><a href="members.php?link=addmember">Add Member<i class="fas fa-user-plus ml-2"></i></a></h6>

          </div>
          <div class="card-body p-0 pb-3 text-center">
          <table class="table table-striped relative" id="myTable">
          <caption class="ml-4 mt-4">List of Members</caption>
            <thead>
                <tr>
                    
                  <h6 class="text-left mx-4 mt-3" style="float:left;position:relative;top:4px">Select Number of Rows:</h6>
                  
                  <div class="form-group mt-3 mb-0" id="month">

                  <div class="form-group col-lg-3" style="display:inline-block;width:300px;"> 
                    <select class="form-control" id="maxRows" >
                      <option selected>Show All</option>
                      <option>10</option>
                      <option>25</option>
                      <option>50</option>
                      <option>100</option>
                    </select>
                    </div>
                    
                   
                    <div class="search-box">
                        <input type="text" class="search-txt" id="myInput" onkeyup="myFunction()" placeholder="Type to search">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    </div>
                    
               

                  <th scope="col">#</th>
                  <th scope="col">Last</th>
                  <th scope="col">First</th>
                  <th scope="col">Email</th>
                  <th scope="col">position & Ministry</th>
                  <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                 selectUsers();
                  checkQuery($query_search_user);
                  $count = mysqli_num_rows($query_search_user);

                  for($x = 1; $x <= $count; $x++){
                
                  while($row = mysqli_fetch_array($query_search_user)){
                  $user_id = $row['user_id'];
                  $user_email = $row['user_email'];
                  $position = $row['position'];
                  $ministry = $row['user_ministry'];
                  $user_last = $row['user_lastname'];
                  $user_first = $row['user_firstname'];
                  $user_tel = $row['user_tel'];
              ?>

                  <tr>
                      <th scope="row"><?php echo $x++ ?></th>
                      <td><?php echo $user_last ?></td>
                      <td><?php echo $user_first ?></td>
                      <td class="pl-5 pr-0 text-left"><?php echo $user_email ?></td>
                      <td><?php if(!empty($position)){echo ucwords($position) ." ". "Of The"." ";} echo ucwords($ministry); if(!empty($position)){echo " "."Ministry";}  ?></td>
                      <td colspan="2" class="px-0">
                      
                      <a class="mr-3" href="" id="popover" data-toggle="popover" 
                        title="See More of <?php echo $user_first ?>" data-trigger="hover" 
                        data-content="" data-placement="top">
                        <i class="fas fa-plus-square"></i></a> 

                        <a class="mr-2" href="" id="popover" data-toggle="popover" 
                        title="Send A Mail to <?php echo $user_first ?>" data-trigger="hover" 
                        data-content="Send A Mail" data-placement="top" >
                        <i class="fas fa-envelope"></i></a>  

<!-- data-toggle="modal" data-target=".bd-example-modal-lg"  -->
<!-- rel="<?php  $user_id?>" -->
                        <input type="hidden" class="" value="">
                        <input type="hidden" class="" value="">
                        <input type="hidden" class="" value="">
                        <input type="hidden" class="" value="">
                        <input type="hidden" class="" value="">
                        <input type="hidden" class="" value="">
                        <input type="hidden" class="" value="">
                        
                        <a class="pl-1 myLink pr-2 py-0"  id="popover" data-trigger="hover" rel="<?php echo $user_tel?>" 
                        data-content="<?php echo $user_first ?>" value="<?php echo $user_last . " " . $user_first ?>" data-toggle="modal" data-target=".bd-example-modal-lg"
                        title="Send A sms to <?php echo $user_first ?>" href='javascript:void(0)' data-toggle="popover" data-placement="top">
                          <i class="fas fa-sms"></i>
                        </a>


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
                                  
                            </div>
                          </div>
                        </div>

                        <a class="mr-2 pb-1" href="members.php?link=editmember&m_id=<?php echo $user_id; ?>" id="popover" data-toggle="popover" 
                        title="Edit" data-trigger="hover" 
                        data-content="" data-placement="top">
                        <i class="fas fa-edit"></i></a> 
                        
                        <a class="mr-2" href="members.php?delete=<?php echo $user_id; ?>" id="popover" data-toggle="popover" 
                        title="" data-trigger="hover" 
                        data-content="Delete <?php echo $user_first ?>" data-placement="top" onclick="return confirm('Are you sure you want to Dele <?php echo $user_last . ' ' . $user_first; ?>?');">
                        <i class="fas fa-trash-alt"></i></a> 
                      </td>              
                  </tr>
                  <?php
                        }
                      }
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

                   
                                       
            </tbody>
            </table>


<script>

</script>
                                        

            <div class="pagination mr-4" id="selectmenu">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a href="#" class="active">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>

        </div>
        </div>
      </div>
    </div>
    <!-- End Default Light Table -->          
</div>