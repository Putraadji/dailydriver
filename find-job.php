<?php
session_start();
include 'koneksi.php';



?>


<html>

<head>
  <title>Find Jobs | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
  <!-- link font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <!-- link style css -->
  <link rel="stylesheet" href="css/find_jobs.css">
  <!-- link bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <?php
  $s_location = "";
  $s_category = "";
  $s_keyword = "";
  if (isset($_POST['submit'])) {
    $s_location = $_POST['by_location'];
    $s_category = $_POST['by_category'];
    $s_keyword = $_POST['by_title'];
  }
  ?>

  <!-- <?php
        //$query = "SELECT * FROM job j INNER JOIN employer e ON j.employer_id = e.username";
        //$ambiljumlah = $koneksi->query("SELECT COUNT(*) as jumlah FROM job");
        //$jumlah = $ambiljumlah->fetch_assoc();
        ?>
  -->

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark px-5 pt-4 pb-4" style="background-color: #2F2EA6;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="img/Logo (1).png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php $take= $koneksi->query("SELECT*FROM driver WHERE username='$_SESSION[username]'");
      $pecahan = $take->fetch_assoc(); ?>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
          <li class="nav-item mx-2"><a class="nav-link" href="#" style="color: #ffffff;">Find Jobs</a></li>
          <li class="nav-item mx-2"><a class="nav-link" href="about.php" style="color: #ffffff;">About</a></li>
          <li class="nav-item mx-2"><a class="nav-link" href="shop.php" style="color: #ffffff;">Contact</a></li>
          <li class="nav-item-hover mx-2"><a class="nav-link" href="user_dashboard.php" style="background-color: #ffffff00; color: #ffffff; border:solid 1px #ffffff; border-radius: 5px; margin-right: 0.5rem; margin-left: 0.2rem; padding: 10px 10px;"><?php echo $pecahan['namadepan'], ' ', $pecahan['namabelakang'] ?></a></li>
          <li class="nav-item mx-2"><a class="nav-link" href="logout.php" style="background-color: #ffffff; color: #2f2ea6; border-radius: 5px; padding :10px 15px">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  <div class="text">
    <h4> Find Jobs</h4>
    <h6><a href="index.php" style="text-decoration:none; color:black">Home</a> / Jobs</h6>
  </div>
  <div class="find">
    <div class="form">
      <form method="POST" action="">
        <div class="text1">
          <div class="form1">
            <h6 style="padding-bottom: 0.7rem;">Search by keywords</h6>
            <div class="d-flex" style="padding-bottom: 1rem;">
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="img/search_icon.png"></span>
                </div>
                <input type="text" id="by_title" name="by_title" class="form-control" placeholder="Job Title, Keywords..." value="<?php echo $s_keyword; ?>" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
          <div class="form1">
            <h6 style="padding-bottom: 0.7rem;">Location</h6>
            <div class="d-flex" style="padding-bottom: 1rem;">
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="by_location"><img src="img/location.png"></span>
                </div>
                <input type="text" name="by_location" class="form-control" placeholder="City or Postcode" value="<?php echo $s_location; ?>" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
        </div>
        <div class="text2">
          <div class="form2">
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
          </div>

        </div>
        <div class="button">
          <button type="submit" name="submit" class="button_find btn" style="background-color: #F9AB00; color: #ffffff;">Find Jobs</button>
        </div>
      </form>
    </div>
    <div class="daftar">
      <!-- <h6>Showing <?php //echo $jumlah['jumlah'] 
                        ?> results</h6> -->
      <?php //while ($job = $ambil->fetch_assoc()) { 
      ?>
      <?php
      $search_category = '%' . $s_category . '%';
      $search_location = '%' . $s_location . '%';
      $search_keyword = '%' . $s_keyword . '%';
      $query = "SELECT * FROM job j INNER JOIN employer e ON j.employer_id = e.username WHERE category LIKE ? AND joblocation LIKE ? AND(jobtitle LIKE ? OR category LIKE ? OR joblocation LIKE ?)";
      $cari = $koneksi->prepare($query);
      $cari->bind_param('sssss', $search_category, $search_location, $search_keyword, $search_keyword, $search_keyword);
      $cari->execute();
      $result = $cari->get_result();
      $jumlah = $result->num_rows;
      
      ?>
      <h6>Showing <?php echo $jumlah ?> results </h6>
      <?php
      if ($result->num_rows > 0) {
        while ($job = $result->fetch_assoc()) {


      ?>
          <div class="list3 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
            <div class="gambar">
              <img src="upload/<?php echo $job['employerpic'] ?>" style="border-radius:50%" alt="">
              <div class="caption" style="margin-right: 6rem;">
                <a href="job-view.php?id=<?php echo $job['id'] ?>" class="title">
                  <h5 style="margin-left: 1rem;"><?php echo $job['jobtitle'] ?></h5>
                </a>
                <div class="note">
                  <div class="kategori" style="color: #6d6d6d;">
                    <img src="img/category.png" alt="category" style="width: 23; height: 20; margin-right: 0.5rem;"><?php echo $job['category'] ?>
                  </div>
                  <div class="location" style="color: #6d6d6d; margin-left: 1rem;">
                    <img src="img/location.png" alt="lokasi" style=" width:17.19; height:23.51; margin-right: 0.5rem;"><?php echo $job['joblocation'] ?>
                  </div>
                  <div class="cost" style="color: #6d6d6d; margin-left: 1rem;">
                    <img src="img/cash.png" alt="biaya" style="  width:24.99; height:21; margin-right: 0.5rem;"><?php echo $job['salarykurs'], ' ', number_format($job['salary'], 2, ',', '.'), ' ', $job['salarytype'] ?>
                  </div>
                </div>
                <div class="keterangan">
                  <div class="keterangan1 mx-2"><?php echo $job['type'] ?></div>
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
<script>
  $(document).ready(function() {
    $('#by_cat a').on('click', function() {
      $_SESSION['by_category'] = ($(this).text());

    });
  });
</script>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>