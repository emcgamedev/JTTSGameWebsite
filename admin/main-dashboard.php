<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <h2>Welcome to the Admin Dashboard</h2>
            <p>Select an option from the sidebar to manage the corresponding section.</p>
        </div>
    </div>
</body>
</html>
