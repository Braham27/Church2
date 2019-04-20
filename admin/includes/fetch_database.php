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