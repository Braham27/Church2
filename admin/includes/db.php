<?php
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "north_shore";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Function to check if table exists
function tableExists($conn, $tableName) {
    $sql = "SHOW TABLES LIKE '$tableName'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

// Create users table if not exists
if (!tableExists($conn, 'users')) {
    // SQL to create users table
    $sql = "CREATE TABLE users (
        user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(250) COLLATE latin1_swedish_ci NOT NULL,
        user_firstname VARCHAR(250) COLLATE latin1_swedish_ci,
        user_lastname VARCHAR(250) COLLATE latin1_swedish_ci,
        user_password VARCHAR(250) COLLATE latin1_swedish_ci NOT NULL,
        user_email TEXT COLLATE latin1_swedish_ci,
        user_image TEXT COLLATE latin1_swedish_ci,
        user_ministry VARCHAR(250) COLLATE latin1_swedish_ci,
        position VARCHAR(250) COLLATE latin1_swedish_ci,
        user_address TEXT COLLATE latin1_swedish_ci,
        user_city VARCHAR(250) COLLATE latin1_swedish_ci,
        user_state VARCHAR(250) COLLATE latin1_swedish_ci,
        user_zip INT(12),
        user_description VARCHAR(250) COLLATE latin1_swedish_ci,
        user_tel INT(15),
        Status VARCHAR(10) COLLATE latin1_swedish_ci
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $conn->close();
}

// Create payment table if not exists
if (!tableExists($conn, 'payment')) {
    // SQL to create payment table
    $sql = "CREATE TABLE payment (
        user_id INT(11) NOT NULL,
        payment_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(100) COLLATE latin1_swedish_ci NOT NULL,
        lastname VARCHAR(100) COLLATE latin1_swedish_ci NOT NULL,
        email TEXT COLLATE latin1_swedish_ci NOT NULL,
        phone INT(12),
        Amount DECIMAL(65,2) NOT NULL,
        Total_amount DECIMAL(65,2) NOT NULL,
        Time DATETIME DEFAULT CURRENT_TIMESTAMP,
        DayOfTheWeek VARCHAR(15) COLLATE latin1_swedish_ci,
        payment_DayOfTheMonth INT(11),
        payment_Month INT(11),
        payment_Year INT(11)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table payment created successfully\n";
    } else {
        echo "Error creating table payment: " . $conn->error . "\n";
    }
}

$conn->close();

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
    
    global $result;
    global $conn;
    $result = mysqli_query($conn, $query_result);
    return $result;
}
?>