<?php
session_start();
//include koneksi
include "koneksi.php";


if(isset($_POST['apply'])){
    $koneksi->query("INSERT INTO proposal(job_id, driver_id, proposal_time, status) VALUES('$_GET[id]', '$_SESSION[username]', now(), 'Pending' )");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job View</title>
    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- link style css -->
    <link rel="stylesheet" href="css/job_view.css">
    <!-- link bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color:#ffffff ;">

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

    <main>
        <?php $ambil = $koneksi->query("SELECT * FROM job j INNER JOIN employer e ON j.employer_id = e.username WHERE j.id = '$_GET[id]';");
        $job = $ambil->fetch_assoc();

        ?>
        <div class="tittle">
            <img style="border-radius:7px ;" src="upload/<?php echo $job['employerpic'] ?>" alt="" width="102" height="102">
            <div class="text">
                <h5><?php echo $job['jobtitle'] ?></h5>
                <div class="keterangan">
                    <p><img src="img/category.png" alt="" width="18" height="16"> <?php echo $job['category'] ?></p>
                    <p><img src="img/location.png" alt="" width="14.19" height="20.51"><?php echo $job['joblocation'] ?></p>
                    <p><img src="img/date.png" alt="" width="18" height="16"> <?php echo date('F d, Y', strtotime($job['postdate'])); ?></p>
                    <p><img src="img/cash.png" alt="" width="18" height="16"> <?php echo $job['salarykurs'], ' ', number_format($job['salary'], 2, ',', '.'), ' ', $job['salarytype'] ?></p>
                </div>
                <div class="keterangan2">
                    <p class="full"><?php echo $job['type'] ?></pc>
                </div>
            </div>
        </div>
        <div class="desc" style="margin-top: -23rem;">
            <div class="job_desc">
                <h5>Job Description</h5>
                <p><?php echo $job['jobdesc'] ?></p>
            </div>

        </div>
        <div class="overview">
            <?php $ambil = $koneksi->query("SELECT * FROM proposal WHERE job_id='$_GET[id]'");
            ($proposal = $ambil->fetch_assoc());
            if ($proposal['driver_id'] == $_SESSION['username']) {
            ?>
                <button type="submit" class=" btn btn-primary  col-8" disabled style="background-color:#F9AB00 ;"> Job Applied</button>
            <?php } else { ?>
                <form method="POST">
                    <button type="submit" name="apply" class=" btn btn-primary  col-8" style="background-color:#F9AB00 ;"> Apply Now</button>
                </form>
            <?php } ?>
            <div class="job_overview">
                <h5 style="color:black;font-size: 16px;">Job Overview</h5>
                <div class="button1" style="margin-bottom:8px;">
                    <img src="img/date_blue.png" alt="" style="margin-right: 10px; width: 22px; height: 22px;">
                    <div class="text3">
                        <h6>Date Posted</h6>
                        <p><?php echo date('F d, Y', strtotime($job['postdate'])); ?></p>
                    </div>
                </div>
                <div class="button1">
                    <img src="img/location_blue.png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                    <div class="text3">
                        <h6>Location</h6>
                        <p><?php echo $job['joblocation'] ?></p>
                    </div>
                </div>
                <div class="button1">
                    <img src="img/cash_blue.png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                    <div class="text3">
                        <h6>Offered Sallary</h6>
                        <p><?php echo $job['salarykurs'], ' ', number_format($job['salary'], 2, ',', '.'), ' ', $job['salarytype'] ?></p>
                    </div>
                </div>
                <div class="button1">
                    <img src="img/experience_blue.png" alt="" style="margin-right: 10px;width: 22px; height: 22px;">
                    <div class="text3">
                        <h6>Experience</h6>
                        <p><?php echo $job['experience'] ?></p>
                    </div>
                </div>

            </div>
            <div class="job_skill">
                <h5 style="color:black; font-size: 16px;">Job Skill</h5>
                <div class="button2">
                    <p><?php echo $job['category'] ?></p>
                </div>
            </div>
            <div class="emp_profile">
                <img style="border-radius:7px ;" src="upload/<?php echo $job['employerpic'] ?>" alt="" width="80px" height="80px">
                <div class="text2">
                    <h6 style="color:black;"><?php echo $job['nama'] ?></h6>
                    <a href="emp-profile-view.php?id=<?php echo $job['employer_id']; ?>">View Employer Profile</a>
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
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>