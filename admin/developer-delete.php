<?php
include '../database.php';

$id = $_GET['id'];
$sql = "DELETE FROM developers WHERE id = $id";
$conn->query($sql);

header("Location: developers-dashboard.php");
?>
