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
  <title>Dashboard | DailyDriver</title>
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
  <link rel="stylesheet" href="css/emp_dashboard.css">
</head>

<body style="background-color:#2F2EA6 ;">


  <aside class="sidebar">
    <div class="toggle">
      <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar" style="color:white;">
        <span></span>
      </a>
    </div>
    <?php
    $ambil = $koneksi->query("SELECT * FROM employer WHERE username ='$_SESSION[username]'");
    $pecah = $ambil->fetch_assoc();
    ?>

    <div class="side-inner">

      <div class="profile">
        <img src="upload/<?php echo $pecah['employerpic'] ?>" alt="Image" id="profileDisplay" class="img-fluid">
        <h3 class="name"><?php echo ' ', $pecah['nama'] ?></h3>
        <span class="country"><?php echo $pecah['location'] ?></span>
      </div>


      <div class="nav-menu">
        <ul>
          <li class="accordion">
            <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible" style="background-color:#DDE8F8 ;">
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
          <a href="index.php"> <img src="img/Logo (1).png" alt="" width="210.86" height="52.37"> </a>
          <div class="notif">
            <a class=" profil_1 nav-link" href="#" style="color:white;"><img src="upload/<?php echo $pecah['employerpic'] ?>" alt="Profil" style="width:50px; height:50px;border-radius: 50% ; margin-right:0.5rem;"><?php echo ' ', $pecah['nama'] ?></a>
            <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
          </div>

        </header>

        <div class="tittle " style="margin-top: -2rem;">
          <h5 class="my-2" style="font-weight: bold;">Edit Profile</h5>
          <p style="margin-top:-5px;">Profile / Edit Profile</p>
        </div>

        <div class="main px-7 py-5">
          <div class="profil">
            <h4><b>My Profile</b></h4>
            <img src="upload/<?php echo $pecah['employerpic'] ?>" onClick="triggerClick()" alt="" style="width:100px; height:100px;margin-top: 1.5rem; margin-bottom: 2rem;">

          </div>
          <form method="POST" enctype="multipart/form-data">
            <div class="row mb-0">
              <div class="col">
                <label class="form-label btn btn-info" for="image" style="background-color:#1967d2 ; color:white; border:none">Change Profile Picture</label>
                <input type="file" name="image" onChange="displayImage(this)" class="form-control" id="image" style="visibility:hidden">
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="firstname" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $pecah['nama'] ?>">
              </div>
              <div class="col">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone Number" value="<?php echo $pecah['phone'] ?>">
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $pecah['email'] ?>">
              </div>
              <div class="col">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Location" value="<?php echo $pecah['location'] ?>">
              </div>
            </div>

            <div class="row mb-4">
              <div class="col">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control" rows="4" placeholder="Write something about you"><?php echo $pecah['bio'] ?></textarea>
              </div>
            </div>

            <div class="social_media">
              <h6 class="mb-4">Social</h6>
              <div class="fb mb-3">
                <h6 style="margin-bottom:1rem;margin-right: 3rem;">Facebook:</h6>
                <input type="text" name="facebook" class="form-control" id="exampleFormControlInput1" placeholder="facebook.com/" value="<?php echo $pecah['facebook'] ?>">
              </div>
              <div class=" twt mb-3">
                <h6 style="margin-bottom:1rem;margin-right: 4.2rem;">Twitter:</h6>
                <input type="text" name="twitter" class="form-control" id="exampleFormControlInput1" placeholder="twitter.com/" value="<?php echo $pecah['twitter'] ?>">
              </div>
              <div class="ig mb-3">
                <h6 style="margin-bottom:1rem;margin-right: 2.8rem;">Instagram:</h6>
                <input type="text" name="instagram" class="form-control" id="exampleFormControlInput1" placeholder="instagram.com/" value="<?php echo $pecah['instagram'] ?>">
              </div>
              <div class="linkedin mb-4">
                <h6 style="margin-bottom:1rem;margin-right: 3.5rem;">Linkedin:</h6>
                <input type="text" name="linkedin" class="form-control" id="exampleFormControlInput1" placeholder="linkedin.com/" value="<?php echo $pecah['linkedin'] ?>">
              </div>
            </div>
            <button type="submit" name="save" class="tombol btn btn-sm py-2" style="background-color: #F9AB00; color: white; border-radius: 7px; width: 8rem;">Save Profile</button>
          </form>
          <?php if (isset($_POST['save'])) {

            $username = $_SESSION['username'];
            $fullname = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $bio = $_POST['bio'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $instagram = $_POST['instagram'];
            $linkedin = $_POST['linkedin'];

            $nama = $_FILES['image']['name'];
            $lokasi = $_FILES['image']['tmp_name'];
            if (!empty($lokasi)) {
              move_uploaded_file($lokasi, "upload/" . $nama);

              $koneksi->query("UPDATE employer SET employerpic='$nama',
nama='$fullname', phone='$phone', email='$email', location='$location', bio='$bio',facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin'
WHERE username='$username'");
            } else {
              $koneksi->query("UPDATE employer SET nama='$fullname', phone='$phone', email='$email', location='$location', bio='$bio',facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin'
WHERE username='$username'");
            }
            echo "<script>alert('Data Successfully Changed');</script>";
            echo "<script>location='emp-dashboard.php'</script>";
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
  <script>
    function triggerClick(e) {
      document.querySelector('#image').click();
    }

    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }

    function previewFile() {
      var preview = document.querySelector('img');
      var file = document.querySelector('input[type=file]').files[0];
      var reader = new FileReader();

      reader.addEventListener("load", function() {
        preview.src = reader.result;
      }, false);

      if (file) {
        reader.readAsDataURL(file);
      }
    }
    $(function() {
      $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
      });
    });
  </script>


  <script src="js/bootstrap.min.js"></script>
  <script src="js/chosen.jquery.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/popper.min.js"></script>
</body>

</html>