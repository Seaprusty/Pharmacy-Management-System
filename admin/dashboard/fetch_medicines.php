<?php
require 'includes/conn.php';

$query = "SELECT medicine_name FROM medicines";
$result = $conn->query($query);

$medicines = array();
while ($row = $result->fetch_assoc()) {
    $medicines[] = $row;
}

header('Content-Type: application/json');
echo json_encode($medicines);
?>
