<?php
session_start();
include 'koneksi.php';
?>

<html>

<head>
  <title>login_form</title>
  <!-- link font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

  <!-- link style css -->
  <link rel="stylesheet" href="css/skills.css">
  <!-- link bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
  <div class="header">
    <img src="img/Logo (1).png" alt="">
  </div>
  <div class="daftar_form">
    <div class="form">
      <h2 style="margin-top: 2rem;">Skills</h2>
      <h5 style="margin-bottom: 10px; margin-top: 1.5rem;">Beritahu Kami Keahllian Utama Anda.</h5>
      <form method="POST">
        <ul>
          <li>
            <input type="checkbox" name="skill[]" value="Car Driver" id="myCheckbox1" />
            <label for="myCheckbox1"  class="label1"><img src="img/car.png" width="36" height="17" /> Car Driver</label>
          </li>
          <li>

            <input type="checkbox" name="skill[]" value="Moving" id="myCheckbox2" />
            <label for="myCheckbox2" class="label2"><img src="img/moving.png" style="margin-right:0.7rem;" />Moving</label>
          </li>
          <li>

            <input type="checkbox" name="skill[]" value="Car Courier" id="myCheckbox3" />
            <label for="myCheckbox3" class="label3"><img src="img/car courier.png" /> Car Courier</label>
          </li>
          <li>

            <input type="checkbox" name="skill[]" value="Truck driver" id="myCheckbox4" />
            <label for="myCheckbox4" class="label4"><img src="img/truck.png" /> Truck Driver</label>
          </li>
          <li>

            <input type="checkbox" name="skill[]" value="Bus Driver" id="myCheckbox5" />
            <label for="myCheckbox5" class="label5"><img src="img/bus.png" /> Bus Driver</label>
          </li>
        </ul>

        <div class="daftar mb-5">
          <div class="button mt-3">
            <button type="submit" name="submit" class="btn btn-lg" style="background-color: #F9AB00; width: 100%; color: white;"> <a style="text-decoration:none; color:white">Next</a></button>
          </div>
      </form>

      <?php 
      if(isset($_POST['submit'])){
        $skills =implode(", ", $_POST['skill']);
        $koneksi->query("INSERT INTO skill(driver_id, skillname) VALUES('$_SESSION[username]', '$skills')");
        echo "<script>location='index.php'</script>";
      }
      ?>

    </div>
  </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>