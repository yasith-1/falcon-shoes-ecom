<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
</head>

<body class="signInBody" data-bs-theme="dark">


    <!-- Preloader ---------------------------------------------------------------------- -->
    <div id="loader">
        <img src="resources/loader.gif" alt="Loading..." class="loader">
    </div>

    <!-- Preloader ---------------------------------------------------------------------- -->


    <!-- <div class="row ">
        <div class="col-12 fixed-top d-lg-flex d-none justify-content-center ">
            <img src="resources/falcon.jpg" alt="" class="logo">
        </div>
    </div> -->




    <!--sign In Box--------------------------------------------------------------------------------------------------------->
    <div class="signIn_Box mt-3 ms-3" id="signIn_Box">
        <h2 class="text-center">SIGN IN</h2>


        <!-- USER COOKIE SETTING  ----------------------------------------->

        <?php

        $username = "";
        $email = '';
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }

        if (isset($_COOKIE["email"])) {
            $email = $_COOKIE["email"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }

        ?>

        <!-- USER COOKIE SETTING  ------------------------------------------>




        

        <div class="mt-3">
            <label for="form-label" class="maininputfield"> &nbsp <i class="fa-solid fa-user-tie"></i> &nbsp; Email:</label>
            <input type="email" class="form-control mt-1 inputfont bg-transparent border-light" id="useremail" value="<?php echo $email ?>" />
        </div>


        <label class="form-label mt-3 maininputfield"> &nbsp;<i class="fa-solid fa-lock"></i> &nbsp; Password </label>
        <div class="input-group col-12">
            <input type="password" class="form-control inputfont bg-transparent border-light" id="password2" value="<?php echo $password ?>">
            <button class="btn btn-outline-light" type="button" onclick="showTwo();" id="buttontwo">
                <i class="fa-regular fa-eye"></i>
            </button>
        </div>


        <div class="mt-4 ">
            <input type="checkbox" class="form-check-input bg-transparent border-light maininputfield" id="rm" /> &nbsp;
            <label for="form-label" class="inputfont">Remember Me</label>
        </div>

        <div class="mt-3 ">
            <span class="inputfont text-info" style="text-decoration: underline; text-underline-offset: 5px; cursor: pointer;" onclick="forgotPassword();">Forgotten Password?</span>
        </div>


        <div class="mt-4">
            <button class="btn btn-success col-12" onclick="signin();"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Sign In</button>
        </div>

        <div class="mt-3">
            <button class="btn btn-outline-light col-12" onclick=" changeView();"> New user? Sign Up</button>
        </div>
    </div>
    <!--sign In Box---------------------------------------------------------------------------------------------------------->









    <!-- Sign Up Box -------------------------------------------------------------------------------------------------------->

    <div class="signUp_Box mt-5 ms-3 d-none" id="signUp_Box">

        <h2 class="text-center">SIGN UP</h2>

        <div class="row">
            <div class="mt-3 col-6">
                <label class="form-label maininputfield"> &nbsp <i class="fa-solid fa-user-tie"></i> &nbsp; First Name </label>
                <input type="text" class="form-control inputfont bg-transparent border-light" id="fname" />
            </div>

            <div class="mt-3 col-6">
                <label class="form-label maininputfield">&nbsp; <i class="fa-solid fa-user-tie"></i> &nbsp; Last Name</label>
                <input type="text" class="form-control inputfont bg-transparent border-light" id="lname" />
            </div>
        </div>

        <div class="mt-3">
            <label class="form-label maininputfield"> &nbsp; <i class="fa-solid fa-envelope"></i> &nbsp; Email </label>
            <input type="email" class="form-control inputfont bg-transparent border-light" id="email" />
        </div>

        <div class="mt-3">
            <label class="form-label maininputfield">&nbsp;<i class="fa-solid fa-phone"></i> &nbsp; Mobile </label>
            <input type="text" class="form-control inputfont bg-transparent border-light" id="mobile" />
        </div>

        <div class="mt-3">
            <label for="form-label" class="maininputfield">&nbsp;<i class="fa-solid fa-file-signature"></i>&nbsp;Username</label>
            <input type="text" class="form-control mt-1 inputfont bg-transparent border-light" id="username" />
        </div>


        <label class="form-label mt-3 maininputfield"> &nbsp; <i class="fa-solid fa-lock"></i>&nbsp; Password </label>
        <div class="input-group">
            <input type="password" class="form-control inputfont  bg-transparent border-light" id="password">
            <button class="btn btn-outline-light" onclick="showOne();" type="button" id="buttonone">
                <i class="fa-regular fa-eye"></i>
            </button>
        </div>


        <div class="mt-3 d-none">
            <div class="alert alert-danger"></div>
        </div>

        <div class="mt-3">
            <button class="btn btn-success col-12" onclick="signup();"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp; Sign Up</button>
        </div>

        <div class="mt-3">
            <button class="btn btn-outline-light col-12" onclick=" changeView();">Already Have an Account? Please Sign In &nbsp;<i class="fa-solid fa-arrow-right-long"></i>&nbsp;</button>
        </div>

    </div>
    <!-- Sign Up Box ----------------------------------------------------------------------------------------------------->



    <!-- modal -->
    <div class="modal" tabindex="-1" id="fpmodal">
        <div class="modal-dialog">
            <div class="modal-content bg-body-tertiary">
                <div class="modal-header text-center text-bg-warning">
                    <h5 class="modal-title r">Forgot Password</h5>
                    <button type="button" class="btn-close border-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <!-- <div class="col-12">
                            <label class="form-label">Enter your Email </label>
                            <input type="text" class="form-control" id="fpemail" />
                        </div> -->

                        <div class="col-6 mt-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np" />
                                <button id="npb" class="btn btn-outline-secondary" type="button" onclick="showPassword1();"><i class="bi bi-eye-fill text-white"></i></button>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp" />
                                <button id="rnpb" class="btn btn-outline-secondary" type="button" onclick="showPassword2();"><i class="bi bi-eye-fill text-white"></i></button>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vcode" />
                        </div>

                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center mt-3 gap-4">
                    <button type="button" class="btn btn-success" onclick="resetPassword();">Reset</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->





    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>