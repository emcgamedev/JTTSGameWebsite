<?php
include '../database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL delete statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect to the user list page after deletion
        header("Location: user-list.php");
        exit();
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No user ID provided.";
}
$conn->close();
?>
