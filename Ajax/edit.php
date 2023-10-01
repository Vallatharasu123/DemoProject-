<?php
include("../config/db.php");

// Initialize a response array
$response = array();

// Update data in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_id = $_POST["dataId"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Validate that data_id is a valid integer
    if (!filter_var($data_id, FILTER_VALIDATE_INT)) {
        $response["status"] = "error";
        $response["message"] = "Invalid dataId provided.";
    } else {
        $sql = "UPDATE personnel SET 
                    first_name = '$first_name', 
                    last_name = '$last_name', 
                    email = '$email', 
                    phone = '$phone' 
                WHERE id = $data_id";

        if ($conn->query($sql) === TRUE) {
            $response["status"] = "success";
            $response["message"] = "Record updated successfully";
        } else {
            $response["status"] = "error";
            $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
