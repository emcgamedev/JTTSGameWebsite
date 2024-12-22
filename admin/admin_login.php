<?php
session_start();
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === "yes") {
    header("Location: main-dashboard.php"); // Redirect if already logged in
    exit;
}

$usernameError = "";
$passwordError = "";
if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Validate input
    if (empty($username)) {
        $usernameError = "Username is required.";
    }
    if (empty($password)) {
        $passwordError = "Password is required.";
    }

    if (empty($usernameError) && empty($passwordError)) {
        require_once "../database.php";

        $sql = "SELECT * FROM admins WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($admin) {
            if (password_verify($password, $admin["password"])) {
                $_SESSION["admin"] = "yes";
                header("Location: main-dashboard.php");
                exit;
            } else {
                $passwordError = "Invalid password.";
            }
        } else {
            $usernameError = "Invalid username.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form For Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../user_login.css">
</head>
<body>
    <div class="container">
        <form action="admin_login.php" method="post">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mb-md-5 mt-md-4 pb-25">
                                        <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                                        <p class="text-white-50 mb-5">Please enter your username and password!</p>

                                        <!-- Username Field -->
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <input type="text" id="typeUsernameX" 
                                                   class="form-control form-control-lg <?php echo !empty($usernameError) ? 'is-invalid' : ''; ?>" 
                                                   name="username" 
                                                   placeholder="Username" 
                                                   value="<?php echo htmlspecialchars($username ?? ''); ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo $usernameError; ?>
                                            </div>
                                        </div>

                                        <!-- Password Field -->
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <input type="password" id="typePasswordX" 
                                                   class="form-control form-control-lg <?php echo !empty($passwordError) ? 'is-invalid' : ''; ?>" 
                                                   name="password" 
                                                   placeholder="Password" />
                                            <div class="invalid-feedback">
                                                <?php echo $passwordError; ?>
                                            </div>
                                        </div>

                                        <button data-mdb-button-init data-mdb-ripple-init 
                                                class="btn btn-outline-light btn-lg px-5" 
                                                name="login" type="submit">Login</button>
                                    </div>

                                    <div>
                                        <p class="mb-0">Don't have an account? <a href="./admin_reg.php" class="text-white-50 fw-bold">Sign Up</a></p>
                                        <p class="mb-0 mt-3">Login as <a href="../login.php" class="text-white-50 fw-bold">User</a></p>
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
