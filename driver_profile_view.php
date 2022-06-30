<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}

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

<body style="font-family: 'Roboto'">
    <header>
        <!-- navbar -->
        <nav class=" head navbar navbar-expand-lg navbar-dark px-5 mt-1 mb-1" style="background: color #558FD8;">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand" href="#"></a>
                <img src="img/Logo (1).png" alt="" width="180.86" height=auto>
                </a>
                <button class="tombol navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-1 py-4 py-lg-0">
                        <li class="nav-item1 mx-1"><a class="nav-link" href="find_jobs.html" style="color: #ffffff;margin-top: 0.5rem;">Find Jobs</a></li>
                        <li class="nav-item1 mx-1"><a class="nav-link" href="about.html" style="color: #ffffff;margin-top: 0.5rem;">About</a></li>
                        <li class="nav-item1 mx-1"><a class="nav-link" href="shop.html" style="color: #ffffff;margin-top: 0.5rem;">Contact</a></li>
                        <li class="login nav-item-hover mx-1"><a class="nav-link" href="user_dashboard.php" style="color:white;"><img src="img/profile_header.png" alt="Profil" style="margin-right:0.4rem;">Aldo Surya Kusuma</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
    </header>


    <main>
        <?php
        $sql = "SELECT * FROM education e INNER JOIN review r ON e.driver_id = r.driver_id INNER JOIN resume res ON r.driver_id = res.driver_id INNER JOIN skill s ON res.driver_id = s.driver_id INNER JOIN driver d ON s.driver_id = d.username WHERE d.username = 'wahyuakbar' LIMIT 1";
        $result = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <div class="tittle">
                    <img style="border-radius:7px " src="<?php echo 'upload/', $row['picture'] ?>" alt="" width="102" height="102">
                    <div class="text">
                        <h5><?php echo $row['namadepan'], ' ', $row['namabelakang']  ?> </h5>
                        <div class="keterangan">
                            <p><img src="img/location.png" alt="" width="14.19" height="20.51"> <?php echo $row['location'] ?></p>
                        </div>
                        <div class="keterangan2">
                            <p class="full"><?php echo $row['skillname'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="desc">
                    <div class="job_desc" style="margin-top:1rem ;">
                        <h5 style="font-weight: bold;">About Me</h5>
                        <p><?php echo $row['bio'] ?></p>
                        <?php ?>
                    </div>
                    <div class="key_respon">
                        <h5 style=" font-weight: bold;">Education</h5>
                        <div class="edu" style="display: flex;">
                            <h6 style="margin-right:1rem;"><?php echo $row['title'] ?></h6>
                            <p style="color:#1967D2;"><?php echo $row['year'] ?></p>
                        </div>
                        <p style="color:#1967D2; margin-top: -1rem;"> <?php echo $row['edudesc'] ?></p>
                    </div>

                    <div class="comments">
                        <h6 class="mb-3" style=" font-weight: bold;"> 1 Comments</h6>
                        <div class="review1">
                            <div class="name">
                                <h6 style=" font-weight: bold;"><?php echo $row['nama'] ?></h6>
                                <p><?php echo $row['datereview'] ?></p>
                                <p><?php echo $row['overview'] ?></p>
                            </div>
                            <div class="rating">
                                <div class="angka">
                                    <h6 style="font-size:small ;"><?php echo $row['score'],'.0' ?></h6>
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
                                <p><?php echo $row['registrationdate'] ?></p>
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
                            <img src="img/Vector (4).png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                            <div class="text3">
                                <h6>Gender</h6>
                                <p><?php echo $row['gender'] ?></p>
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
                    <div class="job_skill">
                        <h5 style="color:black; font-size: 16px;">Job Skill</h5>
                        <div class="button2">
                            <p><?php echo $row['skillname'] ?></p>
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
        <?php }
        } ?>
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
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>