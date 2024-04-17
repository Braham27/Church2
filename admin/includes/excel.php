<!-- Insert the excel sheet to the DB with the PhpSpreadsheet -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excelFile'])) {
    $file = $_FILES['excelFile'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $inputFileName = $file['tmp_name'];
        try {
            $spreadsheet = IOFactory::load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();

        for ($row = 2; $row <= $highestRow; $row++) { // Start at row 2 to skip headers
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $sheet->getHighestColumn() . $row, NULL, TRUE, FALSE)[0];

            $username = generateUsername($rowData[1], $rowData[2]); // Assuming user_firstname and user_lastname are in the 2nd and 3rd columns respectively
            $password = generatePassword(); // You'll hash this later before storing
            $user_image = 'Businessman.png';

            $sql = "INSERT INTO users (user_image, username, user_firstname, user_lastname, user_password, user_email, user_ministry, position, user_tel, user_address, user_city, user_state, user_zip, user_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if (!$stmt) {
                die("mysqli prepare failed: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt, 'sssssssssssss', 
                $user_image,
                $username, 
                $rowData[1], // user_firstname
                $rowData[2], // user_lastname
                $password, 
                $rowData[5], // user_email
                $rowData[7], // user_ministry
                $rowData[8], // position
                $rowData[14], // user_tel
                $rowData[9], // user_address
                $rowData[10], // user_city
                $rowData[11], // user_state
                $rowData[12], // user_zip
                $rowData[13] // user_description
            );

            $result = mysqli_stmt_execute($stmt);

            if (!$result) {
                echo "Execute Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        echo json_encode(['error' => 'Error uploading file.']);
    }
    mysqli_close($conn);
} 
// else {
//     echo json_encode(['error' => 'No file uploaded.']);
// }



function generateUsername($firstName, $lastName) {
    // A simple username generator using the first letter of the first name and full last name
    return strtolower(substr($firstName, 0, 1) . $lastName);
}

function generatePassword() {
    // A simple random password generator
    return bin2hex(random_bytes(8));
}

?>