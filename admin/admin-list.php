<?php
include '../database.php';

$sql = "SELECT id, fullname, email, username FROM admins";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
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
        .btn-row {
            display: flex;
            gap: 10px;
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
                <h1 class="text-center mb-5">Admin List</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td class="btn-row">
                                <button type="button" class="btn btn-warning edit-btn" data-id="<?php echo $row['id']; ?>">Edit</button>
                                <a href="admin-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Admin Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded here from "admin-information.php" -->
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'admin-information.php',
                type: 'GET',
                data: { id: id },
                success: function(response) {
                    $('#editModal .modal-body').html(response);
                    $('#editModal').modal('show');

                    // Handle form submission inside the modal
                    $('#editModal form').on('submit', function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                $('#editModal').modal('hide');
                                location.reload(); // Reload the page to see the updated data
                            },
                            error: function() {
                                alert('Error updating admin information.');
                            }
                        });
                    });
                }
            });
        });
    });
</script>

</body>
</html>
