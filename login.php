
<html>

<head>
    <title>Login | DailyDriver</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <!-- link font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- link style css -->
    <link rel="stylesheet" href="css/login.css">
    <!-- link bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<style>

</style>

<body style="font-family: 'Roboto';">
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-info alert-dismissible' id='wrongpass' role='alert'>";
            echo "<span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>";
            echo "  <strong>       Incorrect</strong> Username or Password";
            echo "</div>";
        }
    }

    ?>

    <div class="header mb-5">
        <a href="index.php"> <img src="img/Logo (1).png" alt=""> </a>
    </div>
    <div class="container">
        <img class="authcircle" src="img/Circle BG.png">
        <div class="row gx-90 ">

            <div class="col-lg-4 col-md-12">

            </div>

            <div class="col-lg-4 col-md-6 p-0">
                <div class="card" style="border-radius: 0.5rem">
                    <div class="card-body p-5">
                        <div class="mb-md-6 mt-md-3 pb-4">

                            <h3><b>Welcome Back</b></h3>
                            <h5 style="margin-bottom: 2rem; font-size:medium">Masuk Akun</h5>
                            <form action="cek_login.php" method="POST">

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="username" class="form-control form-control-m" placeholder="Username" required="required" />
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-m" placeholder="Password" required="required" />
                                </div>
                                <input type="submit" value="Masuk" class="btn btn-lg masuk" style="background-color: #F9AB00; width: 100%; font-size: medium;">
                            </form>



                            <div class="ingat_saya d-flex justify-content-between my-4">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Ingat Saya
                                    </label>
                                </div>
                                <a href=""> Lupa Password?</a>
                            </div>
                            <div class="daftar d-flex mt-1">
                                <h6>Belum punya akun?</h6>
                                <h6><a href="daftar.php"> Daftarkan Dirimu.</a></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6">

            </div>

        </div>
    </div>
</body>

<!-- view and hide password -->
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });
</script>

<script type="text/javascript">
    $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert-dismissible").alert('close');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>