<?php
include '../database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL delete statement
    $stmt = $conn->prepare("DELETE FROM admins WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect to the admin list page after deletion
        header("Location: admin-list.php");
        exit();
    } else {
        echo "Error deleting admin: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No admin ID provided.";
}
$conn->close();
?>
