<?php
require_once __DIR__ . '/includes/session.php';

$email    = '';
$password = '';

if (isset($_COOKIE['admin_rm_email'])) {
    $email = htmlspecialchars($_COOKIE['admin_rm_email'], ENT_QUOTES, 'UTF-8');
}
// SECURITY: Never pre-fill password fields from cookies
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100 adminSigninBody">



    <div class="container d-flex justify-content-center" style="margin-top: 20px;">

        <div class="card mb-3 border border-2 border-warning-subtle shadow-lg rounded-4 bg-transparent pb-0 pt-0">
            <div class="row g-0">

                <!-- image -->
                <div class="col-12 col-lg-6 p-3 d-flex border-end">
                    <img src="resources/Images/shoecart.jpeg" class="img-fluid rounded-start rounded-4" style="max-height: 600px;" alt="loading...">
                </div>
                <!-- image -->

                <!-- Form -->
                <div class="col-12 col-md-12 col-lg-6 p-5 pt-2 pb-0">
                    <div class="card-body g-4 p-2">
                        <h2 class="card-title text-center" style="font-family: poppins; letter-spacing: 2px;">ADMIN LOGIN</h2>


                        <div class="col-12" style="margin-top: 70px;">
                            <label class="form-label " style="font-family: poppins;font-size: 15px;">&nbsp;<i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp; Email </label>
                            <input type="email" class="form-control rounded-5 bg-transparent border-secondary" id="aemail" value="<?php echo $email  ?> ">
                        </div>

                        <div class="mt-4 col-12">
                            <label class="form-label" style="font-family: poppins; font-size: 15px;">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp; Password </label>
                            <input type="password" class="form-control rounded-5 bg-transparent border-secondary" id="apw" placeholder="Enter password">
                        </div>

                        <div class="mt-4 col-12">
                            <input type="checkbox" class="form-check-input border-secondary" id="arm" /> &nbsp;
                            <label for="form-label ">Remember Me</label>
                        </div>

                        <!-- Sign in button -->
                        <div class="mt-5 col-12 px-5 ">
                            <button type="button" class="btn btn-warning col-12 spv spvbg" onclick="adminSignin();">Sign In &nbsp;&nbsp;<i class="fa-solid fa-right-to-bracket"></i>
                                &nbsp;&nbsp; <span class="spinner-border text-dark spinner-border-sm d-none" id="spinner" aria-hidden="true"></span></button>
                        </div>
                        <!-- Sign in button -->

                    </div>

                    <!-- social links -->
                    <div class=" d-flex justify-content-center pt-5" style="margin-top: 100px;">
                        <ul class="d-flex flex-row gap-5" style="list-style: none;">
                            <a href="https://www.facebook.com/profile.php?id=61556478444616" class="text-light" target="_blank">
                                <li class="vspv"><i class="bi bi-facebook h4 bicon"></i></li>
                            </a>
                            <a href="" class="text-light" target="_blank">
                                <li class="vspv"><i class="bi bi-instagram h4 bicon"></i></li>
                            </a>
                            <a href="" class="text-light" target="_blank">
                                <li class="vspv"><i class="bi bi-whatsapp h4 bicon"></i></li>
                            </a>
                            <a href="" class="text-light" target="_blank">
                                <li class="vspv"><i class="bi bi-github h4 bicon"></i></li>
                            </a>
                        </ul>
                    </div>
                    <!-- social links -->
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