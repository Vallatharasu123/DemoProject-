<?php
include("../config/db.php");

// Initialize a response array
$response = array();

// Check if dataId is provided in the POST request
if (isset($_POST["dataId"])) {
    $data_id = $_POST["dataId"];

    // Prepare the deletion query with a placeholder
    $sql = "DELETE FROM personnel WHERE id = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind the data_id to the placeholder
        $stmt->bind_param("i", $data_id);

        // Execute the statement
        if ($stmt->execute()) {
            $response["status"] = "success";
            $response["message"] = "Data deleted successfully";
        } else {
            $response["status"] = "error";
            $response["message"] = "Error deleting data: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $response["status"] = "error";
        $response["message"] = "Error preparing the delete statement: " . $conn->error;
    }
} else {
    $response["status"] = "error";
    $response["message"] = "DataId not provided in the request.";
}

// Close the database connection
$conn->close();

// Return the JSON response
echo json_encode($response);
?>
