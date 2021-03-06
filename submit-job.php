<?php
session_start();
include 'koneksi.php';



?>

<!doctype html>
<html lang="en">

<head>
  <title>Submit Job | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/chosen.css">

  <!-- Bootstrap CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- Style -->
  <link rel="stylesheet" href="css/submit_job.css">


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
          </li>
          <li><a href="submit-job.php" style="background-color:#DDE8F8 ;"><span class="icon-pencil mr-3"></span>Submit Jobs</a></li>
          <li><a href="applicants.php"><span class="icon-speaker_phone mr-3"></span>Applicants Jobs</a></li>
          <li><a href="#"><span class="icon-location-arrow mr-3"></span>Messages</a></li>
          <li><a href="emp-changepass.php"><span class="icon-pie-chart mr-3"></span>Change Password</a></li>
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
          <a href="index.php"><img src="img/Logo (1).png" alt="" width="210.86" height="52.37"></a>
          <div class="notif">
            <a class=" profil_1 nav-link" href="login.html" style="color:white;"><img src="img/profile_header.png" alt="Profil" style="margin-right:0.4rem;">Aldo Surya Kusuma</a>
            <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
          </div>
        </header>

        <div class="tittle " style="margin-top: -2rem;">
          <h5 class="my-2" style="font-weight: bold;">Submit Job</h5>
          <p style="margin-top:-5px;"><a href="emp-dashboard.php" style="text-decoration:none ;color:black">Profile</a> / Submit Job</p>
        </div>

        <div class="main px-7 py-5">
          <h5 class="mb-5" style="font-weight:bold;">Post a New Job</h5>
          <form method="POST">
            <div class="row mb-4 ">
              <div class="col ">
                <h6 style="margin-bottom:1rem; font-weight: bold;">Job Title</h6>
                <input type="text" name="jobtitle" class="form-control" id="exampleFormControlInput1" placeholder="Your Job Title" required>
              </div>
            </div>
            <div class="row mb-4 ">
              <div class="col">
                <h6 style="margin-bottom:1rem;font-weight: bold;">Job Description</h6>
                <textarea class="form-control" name="jobdesc" id="exampleFormControlTextarea1" rows="3" cols="6" placeholder="Describe your job here" required></textarea>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <h6 style="margin-bottom:1rem;font-weight: bold;">Category</h6>
                <select class=" option form-select mb-3" name="category" aria-label=".form-select example">
                  <option value="Car Driver">Car Driver</option>
                  <option value="Bus Driver">Bus Driver</option>
                  <option value="Truck Driver">Truck Driver</option>
                  <option value="Car Courier">Car Courier</option>
                  <option value="Moving">Moving</option>
                </select>
              </div>
              <div class="col ">
                <h6 style="margin-bottom:1rem;font-weight: bold;">Type</h6>
                <select class="option form-select mb-3" name="type" aria-label=".form-select example">
                  <option value="Full Time">Full Time</option>
                  <option value="Part Time">Part Time</option>
                  <option value="Freelancer">FreeLancer</option>
                </select>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <h6 style="margin-bottom:1rem; font-weight: bold;">Salary Type</h6>
                <select class=" option form-select mb-3" name="salarytype" aria-label=".form-select example">
                  <option value="/ Month">Monthly</option>
                  <option value="/ Day">Daily</option>
                  <option value="/ Week">Weekly</option>
                </select>
              </div>
              <div class="col">
                <h6 style="margin-bottom:1rem; font-weight: bold;">Salary</h6>
                <div class="input-group mb-3">
                  <input type="number" name="salary" class="form-control" aria-label="Text input with dropdown button" placeholder="0">
                  <select class="btn btn-outline-secondary dropdown-toggle" name="salarykurs" aria-expanded="false">
                    <option value="IDR">IDR</option>
                    <option value="USD">USD</option>
                    <option value="IDR">EUR</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <h6 style="margin-bottom:1rem;font-weight: bold;">Experience</h6>
                <select class=" option form-select mb-3" name="experience" aria-label=".form-select example">
                  <option value="1 Year"> 1 Year at least </option>
                  <option value="2 Year">2 Year at least</option>
                  <option value=">2 Year">More Than 2 Year</option>
                </select>
              </div>
              <div class="col ">
                <h6 style="margin-bottom:1rem;font-weight: bold;">Location</h6>
                <input type="text" class="option form-control" name="joblocation" id="joblocation" placeholder="Job Location" required>
              </div>
            </div>
            <button type="submit" name="submit" id="submit" class="tombol btn btn-sm py-2" style="background-color: #F9AB00; color: white; border-radius: 7px; width: 8rem;">Post</button>
          </form>
          <br><br>
          <?php
          if (isset($_POST['submit'])) {
            $koneksi->query("INSERT INTO job(employer_id, jobtitle, jobdesc, category, type, salarytype, salary, salarykurs, experience, joblocation, postdate) VALUES('$_SESSION[username]','$_POST[jobtitle]', '$_POST[jobdesc]', '$_POST[category]', '$_POST[type]', '$_POST[salarytype]', '$_POST[salary]', '$_POST[salarykurs]', '$_POST[experience]', '$_POST[joblocation]', now()) ");
            echo "<div class='alert alert-info'>Job Posted</div>";
          }
          ?>
        </div>
        <footer>
          <div class="copyright">
            <h6>?? 2022 DailyDriver. All Right Reserved</h6>
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



  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="js/chosen.jquery.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/popper.min.js"></script>
</body>

</html>