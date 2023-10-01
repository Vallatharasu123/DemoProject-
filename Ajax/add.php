<?php
include("../config/db.php");

// Initialize a response array
$response = array();

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO personnel (first_name, last_name, email, phone) VALUES ('$first_name', '$last_name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        // Get the last inserted ID
        $last_inserted_id = $conn->insert_id;

        // Fetch the last inserted record from the database
        $fetch_sql = "SELECT * FROM personnel WHERE id = $last_inserted_id";
        $result = $conn->query($fetch_sql);

        // Fetch and encode the last inserted record as JSON
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response["status"] = "success";
            $response["message"] = "Record added successfully";
            $response["data"] = $row;
        } else {
            $response["status"] = "error";
            $response["message"] = "Error fetching last inserted record";
        }
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
