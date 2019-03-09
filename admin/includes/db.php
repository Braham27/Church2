<?php
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "north_shore";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>

<?php
session_start();
ob_start();
?>

<?php
function checkQuery($result){
    global $conn;
    if(!$result){
        die('QUERY FAILED' . mysqli_error($conn));
    }
}

function selectUsers(){
    global $conn;
    global $query_search_user;
$search_user = "SELECT * FROM users";
$query_search_user = mysqli_query($conn, $search_user);

}

//for the results
function result($query_result){
    global $conn;
    $result = mysqli_query($conn, $query_result);
}
?>