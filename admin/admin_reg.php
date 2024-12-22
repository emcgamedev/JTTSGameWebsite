<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("Location: admin/admin_login.php"); // Redirect to a meaningful page, not back to itself
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../user_login.css">
</head>
<body>
    <div class="container">
        <?php
        $fullName = $username = $email = "";
        $errors = array();
        $success = "";

        if (isset($_POST["submit"])) {
           $fullName = htmlspecialchars($_POST["fullname"]);
           $username = htmlspecialchars($_POST["username"]);
           $email = htmlspecialchars($_POST["email"]);
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];

           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           if (empty($fullName)) {
               $errors['fullname'] = "Full name is required.";
           }
           if (empty($username)) {
               $errors['username'] = "Username is required.";
           } elseif (!preg_match('/^[a-zA-Z0-9_]{5,20}$/', $username)) {
               $errors['username'] = "Username must be alphanumeric, 5-20 characters, and can include underscores.";
           }
           if (empty($email)) {
               $errors['email'] = "Email is required.";
           } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $errors['email'] = "Email is not valid.";
           }
           if (empty($password)) {
               $errors['password'] = "Password is required.";
           } elseif (strlen($password) < 8) {
               $errors['password'] = "Password must be at least 8 characters long.";
           }
           if ($password !== $passwordRepeat) {
               $errors['repeat_password'] = "Passwords do not match.";
           }

           require_once "../database.php";
           $sql = "SELECT * FROM admins WHERE username = '$username' OR email = '$email'";
           $result = mysqli_query($conn, $sql);
           if (mysqli_num_rows($result) > 0) {
               $errors['username'] = "Username or email already exists.";
           }

           if (empty($errors)) {
               $sql = "INSERT INTO admins (fullname, username, email, password) VALUES (?, ?, ?, ?)";
               $stmt = mysqli_stmt_init($conn);
               if (mysqli_stmt_prepare($stmt, $sql)) {
                   mysqli_stmt_bind_param($stmt, "ssss", $fullName, $username, $email, $passwordHash);
                   mysqli_stmt_execute($stmt);
                   $success = "You are registered successfully.";
                   $fullName = $username = $email = ""; // Clear form fields on success
               } else {
                   die("Something went wrong");
               }
           }
        }
        ?>
        <form action="admin_reg.php" method="post">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                    <p class="text-white-50 mb-5">Please input your information!</p>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" class="form-control form-control-lg" name="fullname" placeholder="Full Name" value="<?= $fullName; ?>"/>
                                        <small class="text-danger"><?= $errors['fullname'] ?? ''; ?></small>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" value="<?= $username; ?>"/>
                                        <small class="text-danger"><?= $errors['username'] ?? ''; ?></small>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="<?= $email; ?>"/>
                                        <small class="text-danger"><?= $errors['email'] ?? ''; ?></small>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password"/>
                                        <small class="text-danger"><?= $errors['password'] ?? ''; ?></small>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" class="form-control form-control-lg" name="repeat_password" placeholder="Repeat Password"/>
                                        <small class="text-danger"><?= $errors['repeat_password'] ?? ''; ?></small>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Register</button>
                                    
                                    <?php if (!empty($success)): ?>
                                        <div class="alert alert-success mt-4"><?= $success; ?></div>
                                    <?php endif; ?>

                                    <p class="mb-0 mt-3">Login as <a href="./admin_login.php" class="text-white-50 fw-bold">Admin</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</body>
</html>
