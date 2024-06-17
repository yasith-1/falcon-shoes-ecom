<?php

session_start();

$email = "";
$password = "";

if (isset($_COOKIE["email"])) {

    $email = $_COOKIE["email"];
}

if (isset($_COOKIE["password"])) {

    $password = $_COOKIE["password"];
}



?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100 adminSigninBody">



    <div class="container d-flex justify-content-center" style="margin-top: 20px;">

        <div class="card mb-3 border border-3 shadow-lg rounded-4" style="height: 100%; width: fit-content;">
            <div class="row g-0">

                <!-- image -->
                <div class="col-12 col-lg-6 p-3">
                    <img src="resources/Images/collection.jpeg" class="img-fluid rounded-start rounded-4" alt="loading...">
                </div>
                <!-- image -->

                <!-- Form -->
                <div class="col-12 col-md-12 col-lg-6 p-5 pt-2">
                    <div class="card-body g-4">
                        <h2 class="card-title text-center" style="font-family: poppins; letter-spacing: 2px;">ADMIN LOGIN</h2>


                        <div class="col-11" style="margin-top: 70px;">
                            <label class="form-label " style="font-family: poppins;font-size: 15px;">&nbsp;<i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp; Email </label>
                            <input type="email" class="form-control rounded-4 border-secondary" id="aemail" value="<?php echo $email  ?> ">
                        </div>

                        <div class="mt-4 col-11">
                            <label class="form-label" style="font-family: poppins; font-size: 15px;">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp; Password </label>
                            <input type="password" class="form-control rounded-4 border-secondary" id="apw" value="<?php echo $password ?>">
                        </div>

                        <div class="mt-4 col-11">
                            <input type="checkbox" class="form-check-input border-secondary" id="arm" /> &nbsp;
                            <label for="form-label ">Remember Me</label>
                        </div>

                        <!-- Sign in button -->
                        <div class="mt-5 col-11 px-5 ">
                            <button type="button" class="btn btn-warning col-12" onclick="adminSignin();">Sign In &nbsp;&nbsp;<i class="fa-solid fa-right-to-bracket"></i>
                            &nbsp;&nbsp; <span class="spinner-border text-dark spinner-border-sm d-none" id="spinner" aria-hidden="true"></span></button>
                        </div>
                        <!-- Sign in button -->


                    </div>
                </div>
            </div>
            <!-- Form -->

        </div>

    </div>












    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>