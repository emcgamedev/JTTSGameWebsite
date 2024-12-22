<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form for User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="user_login.css">
</head>
<body>
    <div class="container">
        <?php
        $errors = array();
        $successMessage = "";

        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            if (empty($fullName)) {
                $errors['fullname'] = "Full Name is required.";
            }
            if (empty($email)) {
                $errors['email'] = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email address.";
            }
            if (empty($password)) {
                $errors['password'] = "Password is required.";
            } elseif (strlen($password) < 8) {
                $errors['password'] = "Password must be at least 8 characters long.";
            }
            if (empty($passwordRepeat)) {
                $errors['repeat_password'] = "Please confirm your password.";
            } elseif ($password !== $passwordRepeat) {
                $errors['repeat_password'] = "Passwords do not match.";
            }

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    $errors['email'] = "Email already exists.";
                }
            }

            if (empty($errors)) {
                $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    $successMessage = "You are registered successfully.";
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>

        <form action="registration.php" method="post">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pb-4">
                                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                        <p class="text-white-50 mb-5">Please input your information!</p>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="typeFullNameX" class="form-control form-control-lg" 
                                                name="fullname" placeholder="Full Name" value="<?= htmlspecialchars($fullName ?? '') ?>">
                                            <small class="text-danger"><?= $errors['fullname'] ?? '' ?></small>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="email" id="typeEmailX" class="form-control form-control-lg" 
                                                name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? '') ?>">
                                            <small class="text-danger"><?= $errors['email'] ?? '' ?></small>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="typePasswordX" class="form-control form-control-lg" 
                                                name="password" placeholder="Password">
                                            <small class="text-danger"><?= $errors['password'] ?? '' ?></small>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="typePasswordRepeatX" class="form-control form-control-lg" 
                                                name="repeat_password" placeholder="Confirm Password">
                                            <small class="text-danger"><?= $errors['repeat_password'] ?? '' ?></small>
                                        </div>

                                        <button data-mdb-button-init data-mdb-ripple-init 
                                            class="btn btn-outline-light btn-lg px-5" 
                                            type="submit" name="submit">Register</button>

                                        <?php if ($successMessage): ?>
                                            <div class="mt-3 alert alert-success"><?= $successMessage ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div>
                                        <p class="mb-0">Login as 
                                            <a href="./login.php" class="text-white-50 fw-bold">User</a>
                                        </p>
                                    </div>
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
