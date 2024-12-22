<?php
include '../database.php';

$sql = "SELECT * FROM installer";
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
    <title>Admin Dashboard - Installer Page</title>
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
        textarea {
            resize: none;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons .btn {
            margin: 0;
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
                <h1 class="text-center mb-5">Manage Installer Page</h1>
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Section</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><img src="<?php echo '../' . $row['image']; ?>" alt="<?php echo $row['title']; ?>" style="width: 100px;"></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-warning edit-btn" 
                                        data-id="<?php echo $row['id']; ?>" 
                                        data-title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES); ?>" 
                                        data-description="<?php echo htmlspecialchars($row['description'], ENT_QUOTES); ?>" 
                                        data-image="<?php echo '../' . $row['image']; ?>">Edit</button>
                                    <a href="installer-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" action="installer-add.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="addTitle">Title:</label>
                            <input type="text" class="form-control" id="addTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="addDescription">Description:</label>
                            <textarea class="form-control" id="addDescription" name="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="addImage">Image:</label>
                            <input type="file" class="form-control-file" id="addImage" name="image" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="installer-edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editId" name="id">
                        <div class="form-group">
                            <label for="editTitle">Title:</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description:</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editImage">Image:</label>
                            <input type="file" class="form-control-file" id="editImage" name="image">
                            <img id="imagePreview" src="" alt="Image Preview" style="width: 100%; margin-top: 10px;">
                            <small>Leave blank to keep the current image</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).on('click', '.edit-btn', function() {
        const id = $(this).data('id');
        const title = $(this).data('title');
        const description = $(this).data('description');
        const image = $(this).data('image');

        $('#editId').val(id);
        $('#editTitle').val(title);
        $('#editDescription').val(description);
        $('#imagePreview').attr('src', image);

        $('#editModal').modal('show');
    });

    $('#editImage').on('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
</body>
</html>