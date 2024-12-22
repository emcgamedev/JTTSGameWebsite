<?php
include '../database.php';

$id = $_GET['id'];
$sql = "DELETE FROM about WHERE id = $id";
$conn->query($sql);

header("Location: about-dashboard.php");
?>
