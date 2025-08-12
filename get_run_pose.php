<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM poses WHERE id=$id");
$data = $result->fetch_assoc();

echo json_encode($data);
?>