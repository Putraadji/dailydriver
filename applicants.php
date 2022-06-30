<?php
session_start();
include 'koneksi.php';



?>

<!doctype html>
<html lang="en">

<head>
  <title>Manage Job | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/applicants_job.css">
  <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
  </script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<?php $s_status = ""; 
if (isset($_POST['approve'])){
  $s_status = $_POST['approve'];
}


?>

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
        <button type="button" class="view btn btn-sm " style="background-color: #F9AB00; color: white; border-radius: 7px;">View Profile</button>
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
          <li><a href="submit-job.php" ><span class="icon-pencil mr-3"></span>Submit Jobs</a></li>
          <li><a href="applicants.php" style="background-color:#DDE8F8 ;"><span class="icon-speaker_phone mr-3"></span>Applicants Jobs</a></li>
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
          <a href="index.php">
          <img src="img/Logo (1).png" alt="" width="210.86" height="52.37">
          </a>
          
          <div class="notif">
            <a class=" profil_1 nav-link" href="login.html" style="color:white;"><img src="img/profile_header.png" alt="Profil" style="margin-right:0.4rem;">Aldo Surya Kusuma</a>
            <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
          </div>
        </header>

        <div class="tittle " style="margin-top: -2rem;">
          <h5 class="my-2" style="font-weight: bold;">Applicants Job</h5>
          <p style="margin-top:-5px;">Profile / Applicants Job</p>
        </div>

        <div class="education">
          <h5 style="font-weight:bold;">All Applicants</h5>
          <div class="tools">


          </div>
          <div class="list">
            <div class="driver">
              <div class="driver_1">
                <?php
                $querytotal = "SELECT * FROM driver d INNER JOIN proposal p ON d.username= p.driver_id INNER JOIN job j ON p.job_id = j.id INNER JOIN employer e ON j.employer_id = e.username WHERE e.username= '$_SESSION[username]'";
                $caritotal = $koneksi->prepare($querytotal);
                $caritotal->execute();
                $ambiltotal = $caritotal->get_result();
                $jumlahtotal = $ambiltotal->num_rows;
                ?>
                <?php
                $queryapproved = "SELECT * FROM driver d INNER JOIN proposal p ON d.username= p.driver_id INNER JOIN job j ON p.job_id = j.id INNER JOIN employer e ON j.employer_id = e.username WHERE e.username= '$_SESSION[username]' AND status LIKE 'Approved'";
                $cariapproved = $koneksi->prepare($queryapproved);
                $cariapproved->execute();
                $ambilapproved = $cariapproved->get_result();
                $jumlahapproved = $ambilapproved->num_rows;
                ?>
                <?php
                $queryrejected = "SELECT * FROM driver d INNER JOIN proposal p ON d.username= p.driver_id INNER JOIN job j ON p.job_id = j.id INNER JOIN employer e ON j.employer_id = e.username WHERE e.username= '$_SESSION[username]' AND status LIKE 'Rejected'";
                $carirejected = $koneksi->prepare($queryapproved);
                $carirejected->execute();
                $ambilrejected = $carirejected->get_result();
                $jumlahrejected = $ambilrejected->num_rows;
                ?>
                <?php
                $search_status = '%' . $s_status . '%';
                $query = "SELECT * FROM driver d INNER JOIN proposal p ON d.username= p.driver_id INNER JOIN job j ON p.job_id = j.id INNER JOIN employer e ON j.employer_id = e.username WHERE e.username= '$_SESSION[username]' AND status LIKE ?";
                $cari = $koneksi->prepare($query);
                $cari->bind_param('s', $search_status);
                $cari->execute();
                $ambil = $cari->get_result();
                $jumlah = $ambil->num_rows;
                
                
                ?>

              </div>
              <form method="POST">
                <div class="driver_2 btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" value="" name="approve" id="btnradio1" autocomplete="off" checked>
                  <label class="btn btn-outline-primary" for="btnradio1">Total(s): <?php echo $jumlahtotal ?></label>

                  <input type="radio" class="btn-check" value="Approved" <?php if($s_status == "Approved"){echo "checked";} ?> name="approve" id="btnradio2" autocomplete="off">
                  <label class="btn btn-outline-primary" for="btnradio2">Approved: <?php echo $jumlahapproved ?></label>

                  <input type="radio" class="btn-check" value="Rejected" <?php if($s_status == "Rejected"){echo "checked";} ?> name="approve" id="btnradio3" autocomplete="off">
                  <label class="btn btn-outline-primary" for="btnradio3">Rejected(s): <?php echo $jumlahrejected ?></label>
                </div>
              </form>
            </div>
            <?php while ($row = $ambil->fetch_assoc()) { ?>
              <div class="list1">
                <div class="name">
                  <div class="nama">
                    <a href="driver-profile-view.php?id=<?php echo $row['driver_id'] ?>">
                      <p class="text" style="color:black ;"> <?php echo $row['namadepan'], ' ', $row['namabelakang'] ?></p>
                    </a>
                    <?php if ($row['status'] == "Approved") { ?>
                      <div class="status" style="background-color: #77B63C;">
                        <p><?php echo $row['status'] ?></p>
                      </div>
                    <?php } else if ($row['status'] == "Rejected") { ?>
                      <div class="status" style="background-color: #777777;">
                        <p><?php echo $row['status'] ?></p>
                      </div>
                    <?php } else { ?>
                      <div class="status" style="background-color: #2DCFB5;">
                        <p><?php echo $row['status'] ?></p>
                      </div>
                    <?php } ?>
                  </div>
                  <a href="job-view.php?id=<?php echo $row['id'] ?>">
                    <p class="text" style="color:blue; margin-top: -1rem;"><?php echo $row['jobtitle'] ?></p>
                  </a>
                  <p class="date">Applied date : <?php echo date('F d, Y', strtotime($row['proposal_time'])); ?></p>
                </div>
                <div class="icon">

                  <div class="rotate">
                    <?php if ($row['status'] == 'Approved') { ?>
                      <a href="reject.php?id=<?php echo $row['proposal_id'] ?>"><img src="img/rotate.png" alt=""></a>
                    <?php } else { ?>
                      <a href="approve.php?id=<?php echo $row['proposal_id'] ?>"><img src="img/centang.png" alt="Approve"></a>
                    <?php } ?>
                  </div>
                  <?php if ($row['status'] !== "Rejected") { ?>
                    <div class="download">
                      <a href=""> <img src="img/download.png" alt=""></a>
                    </div>
                  <?php } ?>
                  <div class="silang">
                    <a href="reject.php?id=<?php echo $row['proposal_id'] ?>"><img src="img/silang_2.png" alt="" width="12" height="12"></a>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>

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
    </div>
  </main>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('input[name=approve]').change(function() {
        $('form').submit();
      });
    });
  </script>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>