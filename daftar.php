<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();

$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
if (isset($_POST['register'])) {
    // menghilangkan backshlases
    $username = stripslashes($_POST['username']);
    //cara sederhana mengamankan dari sql injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $level     = $_POST['level'];
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($koneksi, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($koneksi, $password);
    $repass   = stripslashes($_POST['repassword']);
    $repass   = mysqli_real_escape_string($koneksi, $repass);
    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($level)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
        //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
        if ($password == $repass) {
            //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
            if (cek_nama($username, $koneksi) == 0) {

                //insert data ke database
                $query = "INSERT INTO user_account (username,email, password, level ) VALUES ('$username','$email','$password','$level')";
                $result   = mysqli_query($koneksi, $query);
                //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                if ($result) {
                    $_SESSION['username'] = $username;

                    header('Location: isi-profile.php');

                    //jika gagal maka akan menampilkan pesan error
                } else {
                    $error =  'Username sudah terdaftar, coba gunakan username lain';
                }
            } else {
                $error =  'Username sudah terdaftar !!';
            }
        } else {
            $validate = 'Password tidak sama !!';
        }
    } else {
        $error =  'Data tidak boleh kosong !!';
    }
}
//fungsi untuk mengecek username apakah sudah terdaftar atau belum
function cek_nama($username, $koneksi)
{
    $nama = mysqli_real_escape_string($koneksi, $username);
    $query = "SELECT * FROM users WHERE username = $nama";
    if ($result = mysqli_query($koneksi, $query)) return mysqli_num_rows($result);
}
?>
<html>

<head>
    <title>Sign Up | DailyDriver</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- link style css -->
    <link rel="stylesheet" href="css/daftar.css">
    <!-- link bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body style="font-family: 'Roboto'; background-color:#2F2EA6">
    <?php if ($error != '') { ?>
        <div class='alert alert-info alert-dismissible' id='wrongpass' role='alert'>
            <span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>
            <?= $error; ?>
        </div>";
    <?php } ?>
    <?php if ($validate != '') { ?>
        <div class='alert alert-info alert-dismissible' id='wrongpass' role='alert'>
            <span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>
            <?= $validate; ?>
        </div>";
    <?php } ?>
    <div class="header">
        <img src="img/Logo (1).png" alt="">
    </div>
    <div class="daftar_form">

        <div class="form">
            <h3 style="margin-top: 2rem;"><b>Pendaftaran</b></h3>
            <h5 style="margin-bottom: 10px;">Mohon isi data berikut dengan benar.</h5>

            <form action="" method="POST">

                <div class="row my-4">
                    <div class="btn-group">
                        <input type="radio" class="btn-check" name="level" value="driver" id="option1" autocomplete="off" checked />
                        <label class="btn btn-primary" for="option1">Driver</label>

                        <input type="radio" class="btn-check" name="level" value="employer" id="option2" autocomplete="off" />
                        <label class="btn btn-primary" for="option2">Employer</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="username" required="required">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="email" required="required">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="password" required="required">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Confirm Password" aria-label="repassword" required="required">

                    </div>
                </div>
                <div class="button mt-4">
                    <input type="submit" value="Daftar" name="register" class="btn btn-lg btndaftar" style="background-color: #F9AB00; width: 100%; color:white; font-size: medium;">

                </div>
                <div class="ingat_saya d-flex justify-content-between my-4">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" required name="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Saya menyetujui <a href="">Syarat dan Ketentuan</a> dan <a href=""> Kebijakan
                                Privasi</a> yang berlaku
                        </label>
                    </div>
                </div>
            </form>


            <div class="daftar d-flex mt-3 mb-5">
                <h6>Sudah punya akun? <a href="login.php"> Masuk di sini.</a> </h6>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>