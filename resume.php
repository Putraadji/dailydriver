<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["username"])) {
  header("location:index.php");
}


?>

<!doctype html>
<html lang="en">

<head>
  <title>My Resume | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Style -->
  <link rel="stylesheet" href="css/my_resume1.css">

</head>

<body style="background-color:#2F2EA6 ;">


  <aside class="sidebar">
    <div class="toggle">
      <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar" style="color:white;">
        <span></span>
      </a>
    </div>
    <?php
    $ambil = $koneksi->query("SELECT * FROM driver WHERE username ='$_SESSION[username]'");
    $pecah = $ambil->fetch_assoc();

    $ambiledu = $koneksi->query("SELECT * FROM education WHERE driver_id ='$_SESSION[username]'");
    $baris = $ambiledu->fetch_assoc();
    ?>
    <div class="side-inner">

      <div class="profile">
        <img src="upload/<?php echo $pecah['picture'] ?>" alt="Image" class="img-fluid">
        <h3 class="name"><?php echo ' ', $pecah['namadepan'], ' ', $pecah['namabelakang'] ?></h3>
        <span class="country"><?php echo $pecah['location'] ?></span>
        <button type="button" class="view btn btn-sm " style="background-color: #F9AB00; color: white; border-radius: 7px;">View Profile</button>
      </div>


      <div class="nav-menu">
        <ul>
          <li class="accordion">
            <a href="driver-dashboard.php" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
              <span class="icon-home mr-3"></span>Profile
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
            </div>
          </li>
          <li class="accordion">
            <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible" style="background-color:#DDE8F8 ;">
              <span class="icon-search2 mr-3"></span>My Resume
            </a>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
            </div>

          </li>
          <li><a href="applied.php"><span class="icon-notifications mr-3"></span>My Applied</a></li>
          <li><a href="#"><span class="icon-location-arrow mr-3"></span>Messages</a></li>
          <li><a href="driver-changepass.php"><span class="icon-pie-chart mr-3"></span>Change Password</a></li>
          <li><a href="find-job.php"><span class="icon-book mr-3"></span>Find Jobs</a></li>
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
            <img src="img/Logo (1).png" alt="" width="210.86" height="52.37">
          </a>
          <div class="notif">
            <a class=" profil_1 nav-link" href="login.html" style="color:white;"><img src="upload/<?php echo $pecah['picture'] ?>" alt="Profil" style="width:50px; height:50px;border-radius: 50% ; margin-right:0.5rem;"><?php echo ' ', $pecah['namadepan'], ' ', $pecah['namabelakang'] ?></a>
            <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
          </div>

        </header>

        <div class="tittle " style="margin-top: -2rem;">
          <h5 class="my-2" style="font-weight: bold;">Edit Resume</h5>
          <p style="margin-top:-5px;">Profile / My Resume</p>
        </div>

        <div class="main">
          <h4 style="margin-bottom: 1rem;">My Resume</h4>
          <h5 class="mb-5">CV Attachment</h5>
          <div class="input-group my-3">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
          <button type="button" class="btn btn-sm py-2 mb-3" style="background-color: #DDE8F8; color: #1967D2; border-radius: 7px; width: 9rem;">Upload Attachment</button>
          <h6>Upload file .pdf, .doc, .docx</p>
        </div>
        <form method="POST">
          <div class="education">
            <h5>Education</h5>
            <div class="title mb-3">
              <label for="exampleFormControlInput1" class="form-label" style="margin-right: 5.8rem;">Title</label>
              <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="<?php echo $baris['title'] ?>">
            </div>
            <div class="academy mb-3">
              <label for="exampleFormControlInput1" class="form-label" style="margin-right: 4rem;">Academy</label>
              <input type="text" name="academy" class="form-control" id="exampleFormControlInput1" placeholder="Academy" value="<?php echo $baris['academy'] ?>">
            </div>
            <div class="year mb-3">
              <label for="exampleFormControlInput1" class="form-label" style="margin-right: 6.3rem;">Year</label>
              <input type="text" name="year" class="form-control" id="exampleFormControlInput1" placeholder="Year" value="<?php echo $baris['year'] ?>">
            </div>
            <div class="desc mb-3">
              <label for="exampleFormControlTextarea1" class="form-label" style="margin-right: 3.2rem;">Description</label>
              <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"><?php echo $baris['edudesc'] ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-sm py-2" style="background-color: #DDE8F8; color: #1967D2; border-radius: 7px; width: 5rem;">Save </button>
          </div>
        </form>
        <?php
        if(isset($_POST['submit'])){
          $koneksi->query("UPDATE education SET title='$_POST[title]', academy='$_POST[academy]', year='$_POST[year]', edudesc='$_POST[desc]' WHERE driver_id='$_SESSION[username]'");
          echo "<script>alert('Data Successfully Changed');</script>";
            echo "<script>location='resume.php'</script>";
      
        }
        ?>

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



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>