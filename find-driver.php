<?php
session_start();
include 'koneksi.php';



?>


<html>

<head>
<title>Find Drivers | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
  <!-- link font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

  <!-- link style css -->
  <link rel="stylesheet" href="css/find_driver.css">
  <!-- link bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <?php
  $s_location = "";
  $s_category = "";
  $s_gender = "";
  if (isset($_POST['submit'])) {
    $s_location = $_POST['by_location'];
    $s_category = $_POST['by_category'];
    $s_gender = $_POST['by_gender'];
  }
  ?>
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
              echo '<li><a class="btn loginbutton" href="emp-dashboard.php" style="background-color: transparent !important;
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
            echo '<li><a class="btn addjobbtn" href="logout.php"  style="background-color: white !important;
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
            echo '<li><a class="btn addjobbtn" href="logout.php"  style="background-color: white !important;
            color: blue !important;
            border: solid 1px #ffffff !important;
            border-radius: 5px !important;
            margin-right: 1rem !important;
            margin-left: 0.5rem !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;"">Add Job</a></li>';
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  <div class="text">
    <h5> Find Driver</h5>
    <p><a style="text-decoration:none ; color:black" href="index.php">Home</a> / Driver</p>
  </div>
  <div class="find">
    <div class="form">
      <form method="POST" action="">
        <h6 style="padding-bottom: 0.7rem;">Location</h6>
        <div class="d-flex" style="padding-bottom: 0.5rem; width: 13rem;">
          <div class="input-group-text" id="btnGroupAddon"><img src="img/location.png" alt=""></div>
          <input class="form-control" type="text" name="by_location" id="by_location" value="<?php echo $s_location; ?>" placeholder="City" aria-label="Search">
        </div>
        <h6 style="padding-bottom: 0.7rem;">Category</h6>
        <select name="by_category" id="by_category" class="form-control">
          <option value="">Choose a Category</option>
          <option value="Car Driver" <?php if ($s_category == "Car Driver") {
                                        echo "selected";
                                      } ?>>Car Driver</option>
          <option value="Bus Driver" <?php if ($s_category == "Bus Driver") {
                                        echo "selected";
                                      } ?>>Bus Driver</option>
          <option value="Truck Driver" <?php if ($s_category == "Truck Driver") {
                                          echo "selected";
                                        } ?>>Truck Driver</option>
          <option value="Car Courier" <?php if ($s_category == "Car Courier") {
                                        echo "selected";
                                      } ?>>Car Courier</option>
          <option value="Moving" <?php if ($s_category == "Moving") {
                                    echo "selected";
                                  } ?>>Moving</option>
        </select>
        <h6 style="padding-bottom: 0.7rem;">Driver Gender</h6>
        <select name="by_gender" id="by_gender" class="form-control">
          <option value="">Driver Gender</option>
          <option value="Male" <?php if ($s_gender == "Male") {
                                  echo "selected";
                                } ?>>Male</option>
          <option value="Female" <?php if ($s_gender == "Female") {
                                    echo "selected";
                                  } ?>>Female</option>
        </select>
        <div class="button">
          <button type="submit" id="submit" name="submit" class="btn btn-lg" style="background-color: #F9AB00; width: 13.6rem; height: 2.5rem; color: white;">
            <h6>Find Drivers</h6>
          </button>
        </div>
      </form>
    </div>
    <div class="daftar">
      <?php
      $search_category = '%' . $s_category . '%';
      $search_location = '%' . $s_location . '%';
      $search_gender = '%' . $s_gender . '%';
      $query = "SELECT DISTINCT username, driver_id, namadepan, namabelakang, gender, location, picture FROM driver d INNER JOIN skill s ON d.username = s.driver_id WHERE skillname LIKE ? AND location LIKE ? AND gender LIKE ?";
      $cari = $koneksi->prepare($query);
      $cari->bind_param('sss', $search_category, $search_location, $search_gender);
      $cari->execute();
      $result = $cari->get_result();
      $jumlah = $result->num_rows;

      ?>
      <h6>Showing <?php echo $jumlah ?> results </h6>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {


      ?>
          <div class="list1 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
            <div class="gambar">
              <img style="border-radius:50% ;" src="<?php echo 'upload/', $row['picture'] ?>" alt="">
              <div class="caption">
                <h5><?php echo $row['namadepan'],' ',$row['namabelakang'] ?></h5>
                <div class="note">
                  <div class="location">
                    <img src="img/location.png" alt="lokasi" style=" width:17.19; height:23.51; margin-right: 0.5rem;"></p><?php echo $row['location'] ?></p>
                  </div>

                </div>
                <div class="keterangan">
                  <?php $ambilskill = $koneksi->query("SELECT * FROM skill WHERE driver_id = '$row[driver_id]'"); ?>
                  <?php while ($skill = $ambilskill->fetch_assoc()) { ?>
                    <div class="keterangan1 mx-2"><?php echo $skill['skillname'] ?></div>
                  <?php } ?>
                </div>
                <div class="button">
                  <button type="button" class="btn btn-lg" style="background-color: #F9AB00; color: white; width: 11.6rem; margin-top: 1.4rem; margin-left:4rem;"> <a href="driver-profile-view.php?id=<?php echo $row['username'];?>" style="color: white; text-decoration: none;">View Profile</a></button>
                </div>
              </div>
            </div>
          </div>
      <?php }
      } ?>





    </div>
    <div class="footer">
      <div class="copyright">
        <h5>© 2022 DailyDriver. All Right Reserved</h5>
      </div>
      <div class="sosmed">
        <ul>
          <li><a href=""><img src="img/facebook.png" alt=""></a></li>
          <li><a href=""><img src="img/twitter.png" alt=""></a></li>
          <li><a href=""><img src="img/instagram.png" alt=""></a></li>
          <li><a href=""><img src="img/linkedin.png" alt=""></a></li>
        </ul>
      </div>
    </div>
</body>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>