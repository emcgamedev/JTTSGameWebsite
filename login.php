<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}

$email = $password = "";
$emailError = $passwordError = "";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: index.php");
            die();
        } else {
            $passwordError = "Password does not match";
        }
    } else {
        $emailError = "Email does not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="user_login.css">
</head>
<body>
    <form action="login.php" method="post">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-25">
                                    <h2 class="fw-bold mb-2 text-uppercase">User Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your email and password!</p>

                                    <!-- Email Input -->
                                    <div class="form-outline form-white mb-4">
                                        <input 
                                            type="email" 
                                            id="typeEmailX" 
                                            class="form-control form-control-lg <?php echo $emailError ? 'is-invalid' : ''; ?>" 
                                            name="email" 
                                            placeholder="Email"
                                            value="<?php echo htmlspecialchars($email); ?>" 
                                        />
                                        <?php if ($emailError): ?>
                                            <div class="invalid-feedback"><?php echo $emailError; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-outline form-white mb-4">
                                        <input 
                                            type="password" 
                                            id="typePasswordX" 
                                            class="form-control form-control-lg <?php echo $passwordError ? 'is-invalid' : ''; ?>" 
                                            name="password" 
                                            placeholder="Password"
                                        />
                                        <?php if ($passwordError): ?>
                                            <div class="invalid-feedback"><?php echo $passwordError; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Submit Button -->
                                    <button 
                                        class="btn btn-outline-light btn-lg px-5" 
                                        name="login" 
                                        type="submit">Login
                                    </button>
                                </div>
                                <div>
                                    <p class="mb-0">Don't have an account? <a href="registration.php" class="text-white-50 fw-bold">Sign Up</a></p>
                                    <p class="mb-0">Login as <a href="./admin/admin_login.php" class="text-white-50 fw-bold">Admin</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
</html>
