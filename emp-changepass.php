<?php
session_start();
include 'koneksi.php';
?>


<!doctype html>
<html lang="en">

<head>
  <title>Change Password | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/chosen.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Style -->
  <link rel="stylesheet" href="css/change_pass.css">


</head>

<body style="background-color:#2F2EA6 ;">


  <aside class="sidebar">
    <div class="toggle">
      <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar" style="color:white;">
        <span></span>
      </a>
    </div>
    <div class="side-inner">

      <div class="profile">
        <img src="images/person_4.jpg" alt="Image" class="img-fluid">
        <h3 class="name">Aldo Surya Kusuma</h3>
        <span class="country">Yogyakarta</span>
      </div>


      <div class="nav-menu">
        <ul>
          <li class="accordion">
            <a href="emp-dashboard.php" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
              <span class="icon-home mr-3"></span>Profile
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
            </div>
          </li>
          <li class="accordion">
            <a href="manage-jobs.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
              <span class="icon-search2 mr-3"></span>My Jobs
            </a>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
            </div>

          </li>
          <li><a href="submit-job.php"><span class="icon-pencil mr-3"></span>Submit Jobs</a></li>
          <li><a href="applicants.php"><span class="icon-speaker_phone mr-3"></span>Applicants Jobs</a></li>
          <li><a href="#"><span class="icon-location-arrow mr-3"></span>Messages</a></li>
          <li><a href="emp-changepass.php" style="background-color:#DDE8F8 ;"><span class="icon-pie-chart mr-3"></span>Change Password</a></li>
          <li><a href="find-driver.php"><span class="icon-car mr-3"></span>Find Driver</a></li>
          <li><a href="about.php"><span class="icon-help mr-3"></span>About</a></li>
          <li><a href="contact.php"><span class="icon-phone_android mr-3"></span>Contact</a></li>
          <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Log Out</a></li>
        </ul>
      </div>
    </div>

  </aside>
  <main>
    <div class="site-section">
      <div class="container">

        <header>
          <a href="index.php">
           <a href="index.php"> <img src="img/Logo (1).png" alt="" width="210.86" height="52.37"> </a>
          </a>
          <div class="notif">
            <a class=" profil_1 nav-link" href="login.html" style="color:white;"><img src="img/profile_header.png" alt="Profil" style="margin-right:0.4rem;">Aldo Surya Kusuma</a>
            <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
          </div>

        </header>

        <div class="tittle " style="margin-top: -2rem;">
          <h5 class="my-2" style="font-weight: bold;">Change Password</h5>
          <p style="margin-top:-5px;">Profile / Change Password</p>
        </div>
        <?php
        if (isset($_POST['submit'])) {
          $ambil = $koneksi->query("SELECT*FROM user_account WHERE username='$_SESSION[username]'");
          $row = $ambil->fetch_assoc();
          if ($row['password'] == $_POST['oldpass']) {
            if ($_POST['pass'] == $_POST['repass']) {
              $koneksi->query("UPDATE user_account SET password = '$_POST[pass]' WHERE username='$_SESSION[username]' ");
              echo "<div class='alert alert-info alert-dismissible' id='wrongpass' role='alert'>";
              echo "<span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>";
              echo "  <strong>       Successfully</strong> Change Password";
              echo "</div>";
            } else {
              echo "<div class='alert alert-info alert-dismissible' id='wrongpass' role='alert'>";
              echo "<span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>";
              echo "  <strong>       Incorrect</strong> Retype Password";
              echo "</div>";
            }
          } else {
            echo "<div class='alert alert-info alert-dismissible' id='wrongpass' role='alert'>";
            echo "<span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>";
            echo "  <strong>       Incorrect</strong> Old Password";
            echo "</div>";
          }
        }
        ?>
        <div class="main">
          <h5>Change Password</h5>

          <form method="POST">
            <div class="input-group flex-nowrap my-4">
              <input type="password" name="oldpass" class="form-control" placeholder="Old Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap my-4">
              <input type="password" name="pass" class="form-control" placeholder="New Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap my-4">
              <input type="password" name="repass" class="form-control" placeholder="Retype Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <button type="submit" name="submit" class="tombol btn btn-sm py-2" style="background-color: #F9AB00; color: white; border-radius: 7px; width: 9rem;">Change Password</button>
          </form>
        </div>
        <footer>
          <div class="copyright">
            <h6>© 2022 DailyDriver. All Right Reserved</h6>
          </div>
          <div class="sosmed">
            <ul>
              <li><a href=""><img src="img/facebook.png" alt="facebook"></a></li>
              <li><a href=""><img src="img/twitter.png" alt="twitter"></a></li>
              <li><a href=""><img src="img/instagram.png" alt="instagram"></a></li>
              <li><a href=""><img src="img/linkedin.png" alt="linkedin"></a></li>
            </ul>
          </div>
        </footer>
      </div>
    </div>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="js/chosen.jquery.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/popper.min.js"></script>
</body>

</html>