<?php
include '../database.php';

$id = $_GET['id'];
$sql = "DELETE FROM home WHERE id = $id";
$conn->query($sql);

header("Location: index-dashboard.php");
?>