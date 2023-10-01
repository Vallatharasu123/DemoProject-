<?php
include("../config/db.php");
$sql = "SELECT * FROM personnel";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(array("data" => $data));

$conn->close();
?>
