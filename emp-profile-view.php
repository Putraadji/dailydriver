<?php
session_start();
//include koneksi
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employer | DailyDriver</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- link style css -->
    <link rel="stylesheet" href="css/emp_profile_view.css">
    <!-- link bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark px-2 mt-3" style="background: color #558FD8;">
            <div class="container-fluid  d-flex ">
                <a class="navbar-brand" href="#"></a>
                <a href="index.php" ><img src="img/Logo (1).png" alt="" width="180.86" height="auto"></a>
                </a>
                <button class="tombol navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class=" collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-2 py-4 py-lg-0">
                        <li class="nav-item1 mx-1"><a class="nav-link" href="find_jobs.html" style="color: #ffffff;margin-top: 0.5rem;">Find Jobs</a></li>
                        <li class="nav-item1 mx-1"><a class="nav-link" href="about.html" style="color: #ffffff;margin-top: 0.5rem;">About</a></li>
                        <li class="nav-item1 mx-1"><a class="nav-link" href="shop.html" style="color: #ffffff;margin-top: 0.5rem;">Contact</a></li>
                        <li class="login nav-item-hover mx-1"><a class="nav-link" href="driver-dashboard.php" style="color:white;"><img src="img/profile_header.png" alt="Profil" style="margin-right:0.4rem;"><?php echo $_SESSION['username'] ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>

    <?php if (!isset($_SESSION["username"])) {
        echo "<div class='alert alert-info alert-dismissible' id='notlogin' role='alert'>";
        echo "<span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>";
        echo "  You need to be signed in to access this page. <a href='login.php' >Sign in </a>";
        echo "</div>";
    } else { ?>

        <main>
            <?php
            $employerprofile = $koneksi->query("SELECT * FROM employer WHERE username = '$_GET[id]'");
            $row = $employerprofile->fetch_assoc();
            ?>

            <div class="tittle">
                <img src="upload/<?php echo $row['employerpic']  ?>" alt="" width="102" height="102">
                <div class="text">
                    <h5><?php echo $row['nama'] ?></h5>
                    <div class="keterangan">
                        <p><img src="img/location.png" alt="" width="14.19" height="20.51"><?php echo $row['location'] ?></p>
                    </div>
                </div>
            </div>
            <div class="desc">
                <div class="job_desc">
                    <h5>About Us</h5>
                    <p><?php echo $row['bio'] ?></p>
                </div>

            </div>
            <div class="overview">
                <div class="button">
                    <button type="button" class=" btn btn-primary  col-8" style="background-color:#F9AB00 ;"> <img src="img/chat.png" alt=""> Private Message</button>
                </div>
                <div class="job_overview">
                    <div class="button1" style="margin-bottom:8px;">
                        <img src="img/date_blue.png" alt="" style="margin-right: 10px; width: 22px; height: 22px;">
                        <div class="text3">
                            <h6>Joined</h6>
                            <p><?php echo date('F d, Y', strtotime($row['registrationdate'])); ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/location_blue.png" alt="" style="margin-right: 10px;width: 18px; height: 22px;">
                        <div class="text3">
                            <h6>Location</h6>
                            <p><?php echo $row['location'] ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/email.png" alt="" style="margin-right: 10px;width: 22px; height: 19px;">
                        <div class="text3">
                            <h6>Email</h6>
                            <p><?php echo $row['email'] ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/phone.png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                        <div class="text3">
                            <h6>Phone Number</h6>
                            <p><?php echo $row['phone'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="emp_profile">
                    <div class="text2">
                        <h6 style="color:black;">Social Profiles:</h6>
                        <div class="sosmed1">
                            <ul>
                                <li><a href="https://<?php echo $row['facebook'] ?>" target="_blank"><img src="img/facebook_black.png" alt=""></a></li>
                                <li><a href="https://<?php echo $row['twitter'] ?>" target="_blank"><img src="img/twt_black.png" alt=""></a></li>
                                <li><a href="https://<?php echo $row['instagram'] ?>" target="_blank"><img src="img/instagram_black.png" alt=""></a></li>
                                <li><a href="https://<?php echo $row['linkedin'] ?>" target="_blank"><img src="img/linkedin_black.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
    <?php } ?>
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>