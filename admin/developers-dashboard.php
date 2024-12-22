<?php
include '../database.php';

$sql = "SELECT * FROM developers";
$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Developers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #343a40;
            color: #fff;
        }
        #sidebar .nav-link {
            color: #fff;
        }
        #sidebar .nav-link:hover {
            background: #495057;
        }
        #content {
            flex: 1;
        }
        .wrapper {
            display: flex;
            height: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./main-dashboard.php">Admin Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./admin_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div id="sidebar" class="bg-dark">
            <div class="sidebar-header p-3">
                <h4>Menu</h4>
            </div>
            <ul class="nav flex-column p-3">
                <li class="nav-item">
                    <a class="nav-link" href="index-dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-dashboard.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="installer-dashboard.php">Installer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="developers-dashboard.php">Developers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-list.php">Admin Lists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-list.php">User Lists</a>
                </li>
            </ul>
        </div>
        <div id="content" class="p-4">
            <div class="container my-5">
                <h1 class="text-center mb-5">Developers</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addDeveloperModal">Add Developer</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['position']; ?></td>
                            <td><img src="<?php echo '../' . $row['image']; ?>" alt="<?php echo $row['name']; ?>" style="width: 100px;"></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editDeveloperModal-<?php echo $row['id']; ?>">Edit</button>
                                    <a href="developer-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Developer Modal -->
                        <div class="modal fade" id="editDeveloperModal-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editDeveloperModalLabel-<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDeveloperModalLabel-<?php echo $row['id']; ?>">Edit Developer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="developer-edit.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="position">Position:</label>
                                                <input type="text" class="form-control" id="position" name="position" value="<?php echo $row['position']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image:</label>
                                                <input type="file" class="form-control-file" id="image" name="image">
                                                <img src="../<?php echo $row['image']; ?>" alt="Current Image" style="width: 150px; height: auto;">
                                                <small>Leave blank to keep existing image</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Developer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <!-- Add Developer Modal -->
                <div class="modal fade" id="addDeveloperModal" tabindex="-1" aria-labelledby="addDeveloperModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addDeveloperModalLabel">Add Developer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="developer-add.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position:</label>
                                        <input type="text" class="form-control" id="position" name="position" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control-file" id="image" name="image" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Developer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
