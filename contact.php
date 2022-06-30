<?php
session_start();
include 'koneksi.php';



?>
<!doctype html>
<html lang="en">
  <head>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/contact.css">

    <title>Sidebar #8</title>
  </head>
  <body style="background-color:#2F2EA6 ;">
  
    <main>
        <div class="container">

         <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark px-5 " style="background-color: #2f2ea6;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" >
        <img src="img/Logo (1).png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
          <?php
          if (isset($_SESSION["username"])) {
            if ($_SESSION['level'] == "employer") {
              echo '<li class="nav-item1 mx-2"><a class="nav-link" href="submit-job.php" style="color: #ffffff;">Post Jobs</a>';
            } else {
              echo '<li class="nav-item1 mx-2"><a class="nav-link" href="find-job.php" style="color: #ffffff;">Find Jobs</a>';
            }
          } else {
            echo '<li class="nav-item1 mx-2"><a class="nav-link" href="login.php" style="color: #ffffff;">Find Jobs</a>';
          }
          ?>

          </li>
          <li class="nav-item1 mx-2"><a class="nav-link" href="about.php" style="color: #ffffff;">About</a></li>
          <li class="nav-item1 mx-2"><a class="nav-link" href="contact.php" style="color: #ffffff;">Contact</a></li>
          <?php if (isset($_SESSION["username"])) {
            if ($_SESSION['level'] == "employer") {
              echo '<li><a class="btn loginbutton" href="emp-dashboard.php"style="background-color: transparent !important;
              color: #ffffff !important;
              border: solid 1px #ffffff !important;
              border-radius: 5px !important;
              margin-right: 1rem !important;
              margin-left: 0.5rem !important;
              padding-left: 1.5rem !important;
              padding-right: 1.5rem !important;
              padding-top: 0.5rem !important;
              padding-bottom: 0.5rem !important;">', $_SESSION["username"], '</a></li>';
            } else {
              echo '<li><a class="btn loginbutton" href="driver-dashboard.php"style="background-color: transparent !important;
              color: #ffffff !important;
              border: solid 1px #ffffff !important;
              border-radius: 5px !important;
              margin-right: 1rem !important;
              margin-left: 0.5rem !important;
              padding-left: 1.5rem !important;
              padding-right: 1.5rem !important;
              padding-top: 0.5rem !important;
              padding-bottom: 0.5rem !important;">', $_SESSION["username"], '</a></li>';
            }
          } else {
            echo '<li><a class="loginbutton btn" href="login.php" style="background-color: transparent !important;
            color: #ffffff !important;
            border: solid 1px #ffffff !important;
            border-radius: 5px !important;
            margin-right: 1rem !important;
            margin-left: 0.5rem !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;">Login
              / Register</a></li>';
          }
          ?>
          <?php
          if (isset($_SESSION["username"])) {
            echo '<li><a class="btn addjobbtn" href="logout.php" style="background-color: white !important;
            color: blue !important;
            border: solid 1px #ffffff !important;
            border-radius: 5px !important;
            margin-right: 1rem !important;
            margin-left: 0.5rem !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;">Logout</a></li>';
          } else {
            echo '<li><a class="btn addjobbtn" href="logout.php" style="background-color: white !important;
            color: blue !important;
            border: solid 1px #ffffff !important;
            border-radius: 5px !important;
            margin-right: 1rem !important;
            margin-left: 0.5rem !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;">Add Job</a></li>';
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>

            <div class="tittle ">
              <h5 class="my-2" style="font-weight: bold;">Contact Us</h5>
              <p style="margin-top:-5px;">Home / Contact</p>
          </div>

            <div class="main">
              <div class="profil mb-5">
                <h3>Leave a Message</h3>
              </div>
              <div class="form1 d-flex justify-content-between">
                  <div class="mb-3 ">
                      <h6 style="margin-bottom:1rem;"> Your Name</h6>
                      <input type="text" class="option form-control" id="exampleFormControlInput1" placeholder="Name">
                    </div>
                    <div class=" notelp mb-3">
                        <h6 style="margin-bottom:1rem;">Email</h6>
                        <input type="email" class=" option form-control" id="exampleFormControlInput1" placeholder="Your Email">
                      </div>
              </div>
              <div class="form1 mb-3">
                    <h6 style="margin-bottom:1rem;">Subject</h6>
                    <input type="text" class=" option1 form-control " id="exampleFormControlInput1" placeholder="Subject" >
              </div>
              <div class="form1 mb-4">
                    <h6 style="margin-bottom:1rem;">Your Comment</h6>
                    <textarea rows="10" class="form-control" aria-label="With textarea" placeholder="Your Comment"></textarea>
              </div>

              
              <button type="button" class="tombol btn btn-sm py-2" style="background-color: #F9AB00; color: white; border-radius: 7px; width: 8rem;">Save Profile</button>
          </div>
          <footer>
            <div class="copyright">
                <h6>© 2022 DailyDriver. All Right Reserved</h6>
            </div>
            <div class="sosmed">
              <ul>
                <li><a href=""><img src="img/facebook.png" alt="facebook" ></a></li>
                <li><a href=""><img src="img/twitter.png" alt="twitter" ></a></li>
                <li><a href=""><img src="img/instagram.png" alt="instagram" ></a></li>
                <li><a href=""><img src="img/linkedin.png" alt="linkedin"></a></li>
              </ul>
            </div>
        </footer>
        </div>
      </div>  
    </main>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>