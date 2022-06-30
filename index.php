<?php
session_start();
include 'koneksi.php';


?>


<html>

<head>
  <title>Hire Personal Drivers | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
  <!-- link font -->
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

  <!-- link style css -->
  <link rel="stylesheet" href="css/index.css">
  <!-- link bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body style="background-color: #2f2ea6; font-family: 'Roboto', sans-serif;">
  <div class="header">
    <div class="elipse" style="position: absolute; margin-top:-1rem;">
      <img src="img/grup1.png" alt="" style=" width: 29rem; height:29rem;">
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark px-5 mt-3" style="background: color #558FD8;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="margin-left: 6.5rem;">
          <img src="img/Logo (1).png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="margin-right: 6.5rem;" id="navbarNav">
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
                echo '<li><a class="btn loginbutton" href="emp-dashboard.php">', $_SESSION["username"], '</a></li>';
              } else {
                echo '<li><a class="btn loginbutton" href="driver-dashboard.php">', $_SESSION["username"], '</a></li>';
              }
            } else {
              echo '<li><a class="btn loginbutton" href="login.php">Login
              / Register</a></li>';
            }
            ?>
            <?php
            if (isset($_SESSION["username"])) {
              echo '<li><a class="btn addjobbtn" href="logout.php">Logout</a></li>';
            } else {
              echo '<li><a class="btn addjobbtn" href="logout.php">Add Job</a></li>';
            }
            ?>

          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->
  </div>
  <div class="container" style=" margin-bottom: 2rem; position: relative; margin-left: 4rem; margin-top: 4rem;">
    <div class="main">
      <h2 style="margin-bottom: 1rem; font-weight: bold;"> </h2>
      <p style="margin: 0.5rem 0; font-size: smaller;"> Ribuan orang menggunakan DailyDriver.com untuk mencari personal
        driver mereka.</p>
      <nav class="navbar3 pb-1" style="background-color: #ffffff;">
        <div class="group container-fluid pt-3">
          <form method="POST" action="find-driver.php" class="search d-flex">
            <div class="keywords input-group" style="margin-left: 1rem;">
              <div class="input-group-text" id="btnGroupAddon"><img src="img/search_icon.png" alt=""></div>
              <input type="text" name="by_category" id="by_category" style="border:none; outline: none;" class="form-control" placeholder="Keywords..." aria-label="Input group example" aria-describedby="btnGroupAddon">
            </div>


            <button type="submit" name="search" class="button_find" href="find-driver.php">Find Driver</button>

          </form>
        </div>
      </nav>
      <p style="font-size: smaller;">Popular Searches : Car Driver, Truck Driver, Bus Driver</p>

    </div>
    <div class="aside" data-relative-input="true" id="scene" style="display: flex; flex-direction: row;">
      <img class="gambar1" src="img/MainPict.png" alt="main_gambar">
      <img class="gambar2" src="img/150+ Driver.png" alt="" data-depth="0.2">

    </div>
    <a href="#konten">
      <div class="scroll-down"> <img src="img/Frame1.png" alt="" width="13" height="30">
        <h6> Scroll Down </h6>
      </div>
    </a>
  </div>

  <section id="konten"></section>

  <div class="information" style="margin-top: 4rem;">
    <div class="text aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
      <h3>How it works?</h3>
      <h5 style="color: #6d6d6d; font-size: smaller;">Job for anyone, anywhere.</h5>
    </div>
    <div class="konten">
      <div class="konten1 aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">
        <img src="img/how_it_works3.png" alt="">
        <h5>Buat Pekerjaan</h5>
        <p style="color: #6d6d6d;">Gratis dan mudah untuk membuat pekerjaan. Tinggal mengisi judul, deskripsi dan anggaran dan
          penawaran-penawaran bersaing berdatangan dalam hitungan menit</p>
      </div>
      <div class="konten2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
        <img src="img/how_it_works2.png" alt="">
        <h5>Telusuri Portofolio</h5>
        <p style="color: #6d6d6d;">Cari para driver yang bisa Anda percaya dengan menelusuri sampel-sampel mereka dari pekerjaan sebelumnya dan
          membaca ulasan tentang profil mereka.</p>
      </div>
      <div class="konten3 aos-init aos-animate" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
        <img src="img/how_it_works1.png" alt="">
        <h5>Pilih Driver</h5>
        <p style="color: #6d6d6d;">Tidak ada istilah pekerjaan terlalu besar atau terlalu kecil. Kami punya driver untuk pekerjaan dengan ukuran
          seberapa pun. Kami bisa menyelesaikan semuanya!</p>
      </div>
    </div>
    </section>
    <div class="jobs">
      <div class="text ">
        <h3>Featured Jobs</h3>
        <h5 style="color: #6d6d6d; font-size: smaller;">know your worth and find the job that qualify your life.</h5>
      </div>
      <div class="list">
        <?php $ambil = $koneksi->query("SELECT * FROM job j INNER JOIN employer e ON j.employer_id = e.username LIMIT 2"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
         
          <div class="list1 ">
            <img src="upload/<?php echo $pecah['employerpic'] ?>" alt="" style="border-radius:7px; width:60; height:60;">
            <div class="caption">
              <a href="job-view.php?id=<?php echo$pecah['id']; ?>" class="title"> <h5><?php echo $pecah['jobtitle'] ?></h5> </a>
              <div class="info">
                <p> <img src="img/category.png" alt="" width="22" height="20" style="margin-top:-0.2rem ;"><?php echo $pecah['category'] ?></p>
                <p> <img src="img/location.png" alt="" width="9" height=auto><?php echo $pecah['joblocation'] ?></p>
                <p> <img src="img/date.png" alt="" width="19" height="19"><?php echo date('F d, Y', strtotime($pecah['postdate'])); ?></p>
                <p> <img src="img/cash.png" alt="" width="24" height="21"> <?php echo $pecah['salarykurs'], ' ', number_format($pecah['salary'], 2, ',', '.'), ' ', $pecah['salarytype'] ?></p>
              </div>
            </div>
            <div class="keterangan d-flex justify-content-end">
              <div class="keterangan1 justify-content-end"><?php echo $pecah['type'] ?></div>
            </div>
          </div>
        <?php } ?>

        <a class="btn btn-primary btn-lg mx-auto mb-5 loadmore" href="find-job.php" style="color:white; text-decoration:none; font-size: smaller; margin-left: 1rem; margin-right: 1rem;"> Load More Listing</a></button>
      </div>
    </div>
    <div class="driver">
      <div class="text4">
        <h4>Featured Drivers</h3>
          <h5 style="color: #6d6d6d; font-size: smaller; font-weight: 100;">Find your best driver here.</h5>
          <ul class="link">
            <li>
              <a href="find-driver.php" class="browse">Browse All Drivers ></a>
            </li>
          </ul>

      </div>
      <div class="card-group">
        <?php $ambil = $koneksi->query("SELECT * FROM driver LIMIT 4"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
          <div class="card text-center">
            <img src="upload/<?php echo $pecah['picture'] ?>" class="card-img-top" alt="..." style=border-radius:50%;>
            <div class="card-body">
              <h5 class="card-title mb-3"><?php echo $pecah['namadepan'], ' ', $pecah['namabelakang'] ?></h5>
              <div class="d-grid gap-2">
               <a href="driver-profile-view.php?id=<?php echo$pecah['username'];?>" class="btn viewbtn" type="button"> View
                  Profile</a>
              </div>
            </div>
          </div>
        <?php } ?>


      </div>
      <div class="footer">
        <div class="copyright">
          <h6>© 2022 DailyDriver. All Right Reserved</h6>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Aos Js -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<!-- gsap -->
<!-- Gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TextPlugin.min.js"></script>
<script>
  gsap.registerPlugin(TextPlugin);
  gsap.to(".main h2", {
    duration: 5,
    delay: 0.4,
    text: "Temukan Personal Driver  <br> Terbaik Untuk Anda"
  })
  gsap.from('.aside', {
    duration: 2,
    y: -100,
    opacity: 0,
    ease: 'bounce',
    delay: 0.6
  });
  gsap.from('.display-4', {
    duration: 1,
    rotateY: 360,
    opacity: 0
  });
  gsap.from('.lead', {
    duration: 2,
    y: -100,
    opacity: 0,
    ease: 'bounce',
    delay: 0.4
  });
</script>
<!-- parallax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script>
  var scene = document.getElementById('scene');
  var parallaxInstance = new Parallax(scene, {
    relativeInput: true
  });

  parallaxInstance.friction(0.2, 0.2);
</script>

</html>