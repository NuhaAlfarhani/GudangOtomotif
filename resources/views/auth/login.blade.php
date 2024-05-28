<?php
// require 'function.php'; 

// if(isset($_POST['login'])){
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email ='$email' and password='$password'");

//     $hitung = mysqli_num_rows($cekdatabase);

//     if($hitung>0){
//         $_SESSION['log']= 'True';
//         header('location:index.php');
//     } else {
//         header('location:login.php');

//     };

// };

// if(!isset($_SESSION['log'])){

// }else{
//     header('location:index.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hino Arista Cikarang </title>
    <link rel ="icon" type="image/png/jpg" href="{{ asset('assets')}}/images/Hino-logo-2048x2048.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/login-style.css">
</head>
<body>
    <div class="logo-container">
        <img src="image/Hino-logo-2048x2048.png" alt="Logo" id="logo">
        <h1>LOGIN MENU</h1>
    </div>
</body>
</html>
<html>
<head>
<title>Halaman Web dengan Background</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1></h1>
    <!-- Konten lainnya -->
</body>
</html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles3.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">HINO ARISTA CIKARANG SILAHKAN LOGIN
                                    </h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email </label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Masukan Email atau usermame" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4"name="password" id="inputPassword" type="password" placeholder="Masukan password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-o">
                                                <button class="btn btn-primary" name='login'>Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           