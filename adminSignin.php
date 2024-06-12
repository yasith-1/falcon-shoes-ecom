<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
</head>

<body class="adminSigninBody">

    <div class="col-lg-10 col-sm-12 col-md-12 bg-transparent px-2 ">
        <div class="row">

            <div class="col-5  text-center backgroundImage d-lg-block d-none ">

            </div>


            <div class="col-lg-7 col-md-12 d-flex align-items-center justify-content-center border border-start-0 border-secondary" style=" box-shadow: 0px 0px 15px 1px rgba(70, 70, 70, 0.301);">


                <div class="row">

                    <div class="col-10 offset-1 text-center mb-3">
                        <h3 class="text-light" style="font-family: poppins; font-size: 35px; font-weight: 500;">ADMIN LOG IN</h3>
                    </div>

                    <?php

                    session_start();

                    $username = "";
                    $password = "";

                    if (isset($_COOKIE["username"])) {

                        $username = $_COOKIE["username"];
                    }

                    if (isset($_COOKIE["password"])) {

                        $password = $_COOKIE["password"];
                    }



                    ?>

                    <div class="col-10 offset-1 mt-5 px-5 bg-transparent">
                        <label class="form-label inputfont text-light" style="font-family: poppins;font-size: 17px;">&nbsp;<i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp; Username </label>
                        <input type="email" class="form-control bg-transparent text-light" id="aun" value="<?php echo $username  ?> ">
                    </div>

                    <div class="col-10 offset-1 mt-5 mb-5 px-5 bg-transparent">
                        <label class="form-label inputfont text-light" style="font-family: poppins; font-size: 17px;">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp; Password </label>
                        <input type="password" class="form-control bg-transparent text-light" id="apw" value="<?php echo $password ?>">
                    </div>

                    <div class="col-10 offset-1  mb-3 px-5 bg-transparent">
                        <input type="checkbox" class="form-check-input bg-transparent border-light maininputfield" id="arm" /> &nbsp;
                        <label for="form-label" class="inputfont text-light">Remember Me</label>
                    </div>

                    <!-- <div class="col-5  mb-3 px-5 bg-transparent">
                        <a href="" class="inputfont text-primary " style="text-decoration: underline; text-underline-offset: 5px;">Forgotten Password ?</a>
                    </div> -->


                    <div class="mt-5 mb-5 px-5 col-8 offset-2">
                        <button type="button" class="btn btn-success col-12 text-light" onclick="adminSignin();"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp; Sign In</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>