<?php
session_start();
include 'koneksi.php';
?>

<html>

<head>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/isi_profile.css">
  <!-- <link rel="stylesheet" type="text/css" href="profile.css"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
</head>

<body>
  <header>
    <img src="img/Logo (1).png" alt="logo">
  </header>
  <form method="POST">
    <div class="daftar_form">
      <div class="form">
        <div class="text">
          <h3 style="margin-top: 2rem;">Profile</h3>
          <h5 style="margin-bottom: 10px;">Mohon isi data berikut dengan benar.</h5>
          <div class="row">
            <div class="small-12 medium-2 large-2 columns">
              <div class="circle">
                <img class="profile-pic" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">

              </div>

              <div class="p-image">
                <i class="fa fa-camera upload-button"></i>
                <input class="file-upload" name="image" type="file">
              </div>
            </div>
          </div>
          <div class="user-detail mt-5">

            <div class="form-group my-4">
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter First Name" name="name">
            </div>

            <div class="form-group my-4">
              <input type="text" class="form-control" name="lastname" id="Lname" placeholder="Enter Last Name" name="name">
            </div>

            <select class="form-select my-4" name="gender" aria-label="Default select example ">
              <option selected>Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>


            <button type="submit" name="submit" class=" tombol btn  btn-lg" style=" color: white;background-color: #F9AB00;">Next</button>
  </form>

  <?php if (isset($_POST['submit'])) {
    $firstname = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $picture = $_POST['picture'];

    $nama = $_FILES['image']['name'];
    $lokasi = $_FILES['image']['tmp_name'];
    move_uploaded_file($lokasi, "upload/" . $nama);

    $koneksi->query("INSERT INTO driver(username, picture, registrationdate, namadepan, namabelakang, gender, phone, email, location, bio, facebook, twitter, instagram, linkedin) VALUES('$_SESSION[username]', '$nama', now(), '$firstname', '$lastname', '$gender', '','','','','','','','' )");
    echo "<script>location='skills.php'</script>";
  } ?>
  </div>
  </div>
  </div>



</body>
<script>
  $(document).ready(function() {


    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }


    $(".file-upload").on('change', function() {
      readURL(this);
    });

    $(".upload-button").on('click', function() {
      $(".file-upload").click();
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>