<?php
session_start();
//include koneksi
include "koneksi.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Driver | DailyDriver</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- link style css -->
    <link rel="stylesheet" href="css/driver_profil_view.css">
    <!-- link bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="font-family: 'Roboto'" style="background-color: #2F2EA6;">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark px-5" style="background-color: #2F2EA6;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="margin-left: 6.5rem;">
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

    <?php if (!isset($_SESSION["username"])) {
        echo "<div class='alert alert-info alert-dismissible' id='notlogin' role='alert'>";
        echo "<span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>";
        echo "  You need to be signed in to access this page. <a href='login.php' >Sign in </a>";
        echo "</div>";
    } else { ?>

        <main>
            <?php
            $driverprofile = $koneksi->query("SELECT * FROM driver WHERE username ='$_GET[id]'");
            $driveredu = $koneksi->query("SELECT * FROM education WHERE driver_id ='$_GET[id]'");
            $driverreview = $koneksi->query("SELECT * FROM review WHERE driver_id ='$_GET[id]'");
            $driverresume = $koneksi->query("SELECT * FROM resume WHERE driver_id ='$_GET[id]'");
            $driverskill = $koneksi->query("SELECT * FROM skill WHERE driver_id ='$_GET[id]'");
            $ambiljumlah = $koneksi->query("SELECT COUNT(*) as jumlah FROM review WHERE driver_id = '$_GET[id]'");

            $profile = $driverprofile->fetch_assoc();
            $edu = $driveredu->fetch_assoc();
            $review = $driverreview->fetch_assoc();
            $resume = $driverresume->fetch_assoc();
            $skill = $driverskill->fetch_assoc();
            $jumlahreview = $ambiljumlah->fetch_assoc();

            ?>
            <div class="tittle">
                <img src="<?php echo 'upload/', $profile['picture'] ?>" alt="" width="102" height="102">
                <div class="text">
                    <h5><?php echo $profile['namadepan'], ' ', $profile['namabelakang']  ?> </h5>
                    <div class="keterangan">
                        <p><img src="img/location.png" alt="" width="14.19" height="20.51"> <?php echo $profile['location'] ?></p>
                    </div>
                    <div class="keterangan2">
                        <p class="full"><?php echo $skill['skillname'] ?></p>
                    </div>
                </div>
            </div>

            <div class="desc">
                <div class="job_desc" style="margin-top:1rem ;">
                    <h5 style="font-weight: bold;">About Me</h5>
                    <p><?php echo $profile['bio'] ?></p>
                    <?php ?>
                </div>
                <div class="key_respon">
                    <h5 style=" font-weight: bold;">Education</h5>
                    <div class="edu" style="display: flex;">
                        <h6 style="margin-right:1rem;"><?php echo $edu['title'] ?></h6>
                        <p style="color:#1967D2;"><?php echo $edu['year'] ?></p>
                    </div>
                    <p style="color:#1967D2; margin-top: -1rem;"> <?php echo $edu['edudesc'] ?></p>
                </div>

                <div class="comments">
                    <h6 class="mb-3" style=" font-weight: bold;"> <?php echo $jumlahreview['jumlah'] ?> Comments</h6>
                    <div class="review1">
                        <div class="name">
                            <h6 style=" font-weight: bold;"><?php echo $review['nama'] ?></h6>
                            <p><?php echo $review['datereview'] ?></p>
                            <p><?php echo $review['overview'] ?></p>
                        </div>
                        <div class="rating">
                            <div class="angka">
                                <h6 style="font-size:small ;"><?php echo $review['score'], '.0' ?></h6>
                            </div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>

                    </div>

                </div>
            </div>
            <div class="review">
                <h6>Add a review</h6>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                    <h6>Your Rating</h6>
                </div>
                <h6>Your Comment</h6>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="5" placeholder="Comment"></textarea>
                </div>
                <button type="button" class=" btn btn-primary btn-lg col-6" style="background-color:#F9AB00 ;">Submit Review</button>
            </div>
            </div>
            <div class="overview">
                <div class="button">
                    <button type="button" class=" btn btn-primary  col-8" style="background-color:#F9AB00 ; border: none">Download CV</button>
                    <button type="button" class=" btn btn-primary  col-2" style="background-color:#F9AB00 ; border: none ; margin-left: -1rem;"><img src="img/chat.png" alt=""></button>
                </div>
                <div class="job_overview">
                    <div class="button1" style="margin-bottom:8px;">
                        <img src="img/date_blue.png" alt="" style="margin-right: 10px; width: 22px; height: 22px;">
                        <div class="text3">
                            <h6>Joined</h6>
                            <p><?php echo $profile['registrationdate'] ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/location_blue.png" alt="" style="margin-right: 10px;width: 18px; height: 22px;">
                        <div class="text3">
                            <h6>Location</h6>
                            <p><?php echo $profile['location'] ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/Vector (4).png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                        <div class="text3">
                            <h6>Gender</h6>
                            <p><?php echo $profile['gender'] ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/email.png" alt="" style="margin-right: 10px;width: 22px; height: 19px;">
                        <div class="text3">
                            <h6>Email</h6>
                            <p><?php echo $profile['email'] ?></p>
                        </div>
                    </div>
                    <div class="button1">
                        <img src="img/phone.png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                        <div class="text3">
                            <h6>Phone Number</h6>
                            <p><?php echo $profile['phone'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="job_skill">
                    <h5 style="color:black; font-size: 16px;">Job Skill</h5>
                    <div class="button2">
                        <p><?php echo $skill['skillname'] ?></p>
                    </div>
                </div>
                <div class="emp_profile">
                    <div class="text2">
                        <h6 style="color:black;">Social Profiles:</h6>
                        <div class="sosmed1">
                            <ul>
                                <li><a href="https://<?php echo $profile['facebook'] ?>" target="_blank"><img src="img/facebook_black.png" alt=""></a></li>
                                <li><a href="https://<?php echo $profile['twitter'] ?>" target="_blank"><img src="img/twt_black.png" alt=""></a></li>
                                <li><a href="https://<?php echo $profile['instagram'] ?>" target="_blank"><img src="img/instagram_black.png" alt=""></a></li>
                                <li><a href="https://<?php echo $profile['linkedin'] ?>" target="_blank"><img src="img/linkedin_black.png" alt=""></a></li>
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