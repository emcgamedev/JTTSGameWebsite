<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
        <nav>
            <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="installer.php">Installer</a></li>
            <li><a href="developers.php">Developers</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul>
            <li><a class="navbar-brand" href="index.php">
                <img src="./img/JTTS L1.png" alt="" width="45" height="45" style="margin-right:20px">Jake The Tree Shelter</a>
            </li>
            <li class="hideOnMobile"><a href="index.php">Home</a></li>
            <li class="hideOnMobile"><a href="about.php">About</a></li>
            <li class="hideOnMobile"><a href="installer.php">Download</a></li>
            <li class="hideOnMobile"><a href="developers.php">Developers</a></li>
            <li class="hideOnMobile"><a href="logout.php">Logout</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" 
                viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
            </ul>
        </nav>
        
        <script>
            function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
            }
            function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
            }
        </script>

<?php
include 'database.php';

$sql = "SELECT * FROM home";
$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>

<header class="hero-section">
  <div class="container">
    <div class="row align-items-center py-4 g-5">
      <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-12 col-md-6">
        <div class="text-center text-md-start">
          <h1 class="display-md-2 display-4 fw-bold text-dark pb-2">
            <span class="text-primary"><?php echo $row['title']; ?></span>
          </h1>
          <p class="lead"><?php echo nl2br($row['description']); ?></p>
          <!-- <button class="btn btn-primary px-5 py-3 mt-3 fs-5 fw-medium"type="button">Download Now</button> -->
        </div>
      </div>
      <div class="col-12 col-md-6">
        <img src="<?php echo $row['image']; ?>" class="img-fluid" />
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</header>
    
    <!-- FOOTER-->
    <footer class="footer">
      <div class="container">
          <div class="row">
                <div class="col-sm-6 col-md-4 mt-4 col-lg-3 text-center text-sm-start">
                    <div class="information">
                          <h6 class="footer-heading text-uppercase text-white fw-bold">Navigate</h6>
                          <ul class="list-unstyled footer-link mt-4">
                              <li class="mb-1"><a href="index.php" class="text-white text-decoration-none fw-semibold">Home</a></li>
                              <li class="mb-1"><a href="about.php" class="text-white text-decoration-none fw-semibold">About</a></li>
                              <li class="mb-1"><a href="installer.php" class="text-white text-decoration-none fw-semibold">Download</a></li>
                              <li class="mb-1"><a href="developers.php" class="text-white text-decoration-none fw-semibold">Developers</a></li>
                          </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mt-4 col-lg-3 text-center text-sm-start">
                    <div class="resources">
                          <h6 class="footer-heading text-uppercase text-white fw-bold">Download The Installer</h6>
                          <ul class="list-unstyled footer-link mt-4">
                          <li class="mb-1"><a href="builds/JakeTheTreeShelter.exe" class="text-white text-decoration-none fw-semibold">Download</a></li>
                          </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mt-4 col-lg-2 text-center text-sm-start">
                      <div class="social">
                          <h6 class="footer-heading text-uppercase text-white fw-bold">Social Media Account</h6>
                          <ul class="list-inline my-4">
                              <li class="mb-1"><a href="https://www.facebook.com/profile.php?id=61568284880816" class="text-white text-decoration-none fw-semibold">Jake The Tree Shelter</a></li>
                          </ul>
                      </div>
                </div>
                <div class="col-sm-6 col-md-6 mt-4 col-lg-4 text-center text-sm-start">
                    <div class="contact">
                        <h6 class="footer-heading text-uppercase text-white fw-bold">University Of Caloocan City</h6>
                        <address class="mt-4 m-0 text-white mb-1"><i class="bi bi-pin-map fw-semibold"></i> Barangay 171, Bagumbong Caloocan City</address>
                        <a href="tel:+" class="text-white mb-1 text-decoration-none d-block fw-semibold"><i class="bi bi-telephone"></i>091234567896</a>
                        <a href="mailto:" class="text-white mb-1 text-decoration-none d-block fw-semibold"><i class="bi bi-envelope"></i>uccnorth@gmail.com</a>
                    </div>
                </div>
            </div>
          </div>
        <div class="text-center bg-dark text-white mt-4 p-1">
            <p class="mb-0 fw-bold">2024 © BSEMC 4B All Rights Reserved</p>
        </div>
      </div>
  </footer>
</body>
</html>