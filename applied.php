<?php
session_start();
include 'koneksi.php';



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/my_applied.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

              <title>My Applied | DailyDriver</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
 
  </head>
  <body style="background-color:#2F2EA6 ;">
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar" style="color:white;">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="images/person_4.jpg" alt="Image" class="img-fluid">
          <h3 class="name">Aldo Surya Kusuma</h3>
          <span class="country">Yogyakarta</span>
          <button type="button" class="view btn btn-sm " style="background-color: #F9AB00; color: white; border-radius: 7px;">View Profile</button>
        </div>

        
        <div class="nav-menu">
          <ul>
            <li class="accordion">
              <a href="driver-dashboard.php" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                <span class="icon-home mr-3"></span>Profile
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
              </div>
            </li>
            <li class="accordion">
              <a href="resume.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                <span class="icon-search2 mr-3"></span>My Resume
              </a>

              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
              </div>

            </li>
            <li><a href="applied.php" style="background-color:#DDE8F8 ;"><span class="icon-notifications mr-3"></span>My Applied</a></li>
            <li><a href="#"><span class="icon-location-arrow mr-3"></span>Messages</a></li>
            <li><a href="driver-changepass.php"><span class="icon-pie-chart mr-3"></span>Change Password</a></li>
            <li><a href="find-job.php"><span class="icon-book mr-3"></span>Find Jobs</a></li>
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

          <header >
            <a href="index.php">
            <img src="img/Logo (1).png" alt="" width="210.86" height="52.37">
            </a>
            <div class="notif">
              <a class=" profil_1 nav-link" href="login.html" style="color:white;"><img src="img/profile_header.png" alt="Profil" style="margin-right:0.4rem;">Aldo Surya Kusuma</a>
              <a class="bell nav-link" href="shop.html"> <img src="img/Vector (6).png" alt="notif" style="margin-top:0.5rem;"></a>
            </div>
           
        </header>

            <div class="tittle " style="margin-top: -2rem;">
              <h5 class="my-2" style="font-weight: bold;">Applied Jobs</h5>
              <p style="margin-top:-5px;">Profile / My Applied</p>
          </div>

              <div class="education">
                  <h5 style="font-weight:bold;">Applied Jobs</h5>
                <div class="tools">
                  
                </div>
                <div class="scroll" style="overflow-x:auto; white-space: nowrap;">
                  <table>
                    <tr class="job_tittle">
                      <th><h6 style="margin-right:4rem">Job Title</h6></th>
                      <th><h6 style="margin-right: 4rem;">Date Applied</h6></th>
                      <th><h6 style="margin-right: 4rem;">Status</h6></th>
                      <th><h6 style="margin-right: 4rem;">Actions</h6></th>
                    </tr>
                    <?php $ambil=$koneksi->query("SELECT * FROM employer e INNER JOIN job j ON e.username = j.employer_id INNER JOIN proposal p ON j.id = p.job_id WHERE driver_id = '$_SESSION[username]'") ;
                    
                    ?>
                    <?php while($row = $ambil->fetch_assoc()){ ?>
                    <tr class="list1">
                      <td>
                        <div class="list">
                          <img style="width:50px; height:50px; border-radius:7px; margin-top:2rem" src="upload/<?php echo $row['employerpic'] ?>" alt="list">
                          <div class="ket">
                            <h6><?php echo $row['jobtitle'] ?></h6>
                            <div class="ket_1">
                              <p><img src="img/category.png" alt="" width="18" height="17"><?php echo $row['category'] ?></p>
                              <p><img src="img/location.png" alt="" width="13" height="18"><?php echo $row['joblocation'] ?></p>
                            </div>
                        </div>
                      </td>
                      <td> 
                        <div class="ket1">
                          <h6><?php echo date('F d, Y', strtotime($row['proposal_time'])); ?></h6>
                        </div>
                    </td>
                      <td>
                        <div class="ket2">
                          <h6><?php echo $row['status'] ?></h6>
                        </div>
                      </td>
                      <td>
                        <div class="ket3">
                          <div class="gambar">
                            <div class="gambar1">
                              <a href="deleteproposal.php?id=<?php echo $row['proposal_id'] ?>"><img src="img/silang.png" alt=""></a>
                            </div>
                            <div class="gambar2">
                             <a href="job-view.php?id=<?php echo $row['id'] ?>"><img src="img/eye.png" alt=""></a> 
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                    
                  </table>
                </div>
                  </div>
                  <footer>
                    <div class="copyright">
                        <h6>© 2022 DailyDriver. All Right Reserved</h6>
                    </div>
                    <div class="sosmed">
                      <ul>
                        <li><a href=""><img src="img/facebook.png" alt="facebook" ></a></li>
                        <li><a href=""><img src="img/twitter.png" alt="twitter" ></a></li>
                        <li><a href=""><img src="img/instagram.png" alt="instagram" ></a></li>
                        <li><a href=""><img src="img/linkedin.png" alt="linkedin"></a></li>
                      </ul>
                    </div>
                </footer>
              </div>
        </div>
      </div>  
    </main>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>