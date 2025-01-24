<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
</head>

<body class="signInBody overflow-hidden loaderbg">


    <!-- Preloader ---------------------------------------------------------------------- -->
    <div id="loader">
        <img src="resources/Images/myloader.gif" alt="Loading..." class="loader">
    </div>

    <!-- Preloader ---------------------------------------------------------------------- -->





    <!-- falconshoes logo -->

    <!-- <div class="d-flex justify-content-center ">
        <img src="resources/Images/orgficon.png" alt="" style="width: 100px;">
    </div> -->

    <!-- falconshoes logo -->








    <div class="container d-flex justify-content-center align-items-center vh-100 mt-2 ">

        <!--sign In Box--------------------------------------------------------------------------------------------------------->
        <div class="signIn_Box bg-body-tertiary mt-3 rounded-4 bg-opacity-25 border border-1 border-bg-light-subtle" id="signIn_Box">
            <h2 class="text-center" style="letter-spacing: 1px;">Login</h2>


            <!-- USER COOKIE SETTING  ----------------------------------------->

            <?php

            $username = "";
            $email = '';
            $password = "";

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
                <input type="email" class="form-control mt-1 inputfont bg-transparent border-light border rounded-5" id="useremail" value="<?php echo $email ?>" />
            </div>


            <label class="form-label mt-3 maininputfield"> &nbsp;<i class="fa-solid fa-lock"></i> &nbsp; Password </label>
            <div class="input-group col-12">
                <input type="password" class="form-control inputfont bg-transparent border-light border rounded-start-5" id="password2" value="<?php echo $password ?>">
                <button class="btn border-light rounded-end-4" type="button" onclick="showTwo();" id="buttontwo">
                    <i class="fa-regular fa-eye"></i>
                </button>
            </div>


            <div class="mt-4 ">
                <input type="checkbox" class="form-check-input maininputfield border-light " id="rm" /> &nbsp;
                <label for="form-label" class="inputfont bg-transparent ">Remember Me</label>
            </div>

            <div class="mt-3 ">
                <span class="inputfont text-info spv" style="text-decoration: underline; text-underline-offset: 5px; cursor: pointer;" onclick="forgotPassword();">Forgotten Password ?</span>
            </div>


            <div class="mt-4">
                <button class="btn btn-warning spv col-12" onclick="signin();"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Sign In&nbsp;&nbsp;
                    <span class="spinner-border  spinner-border-sm d-none" id="spin" aria-hidden="true"></span></button>
            </div>

            <div class="mt-4">
                <button class="btn btn-outline-light col-12 spv" onclick=" changeView();"> New user? Sign Up &nbsp;<i class="fa-solid fa-arrow-right-long"></i>&nbsp;</button>
            </div>

            <!-- social links -->
            <div class=" d-flex justify-content-center " style="margin-top: 60px;">
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
        <!--sign In Box---------------------------------------------------------------------------------------------------------->














        <!-- Sign Up Box ------------------------------------------------------------------------------------------------------------------>
        <div class="signUp_Box mt-3 ms-3 bg-body-tertiary bg-opacity-25 border border-1 border-bg-secondary-subtle d-none" id="signUp_Box">

            <h2 class="text-center" style="letter-spacing: 1px;">Register</h2>

            <div class="row">
                <div class="mt-3 col-6">
                    <label class="form-label maininputfield"> &nbsp <i class="fa-solid fa-user-tie"></i> &nbsp; First Name </label>
                    <input type="text" class="form-control inputfont bg-transparent border-light rounded-5" id="fname" />
                </div>

                <div class="mt-3 col-6">
                    <label class="form-label maininputfield">&nbsp; <i class="fa-solid fa-user-tie"></i> &nbsp; Last Name</label>
                    <input type="text" class="form-control inputfont bg-transparent border-light rounded-5" id="lname" />
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label maininputfield"> &nbsp; <i class="fa-solid fa-envelope"></i> &nbsp; Email </label>
                <input type="email" class="form-control inputfont bg-transparent border-light rounded-5" id="email" />
            </div>

            <div class="mt-3">
                <label class="form-label maininputfield">&nbsp;<i class="fa-solid fa-phone"></i> &nbsp; Mobile </label>
                <input type="text" class="form-control inputfont bg-transparent border-light rounded-5" id="mobile" />
            </div>

            <div class="mt-3">
                <label for="form-label" class="maininputfield">&nbsp;<i class="fa-solid fa-file-signature"></i>&nbsp;Username</label>
                <input type="text" class="form-control mt-1 inputfont bg-transparent border-light rounded-5" id="username" />
            </div>


            <label class="form-label mt-3 maininputfield"> &nbsp; <i class="fa-solid fa-lock"></i>&nbsp; Password </label>
            <div class="input-group">
                <input type="password" class="form-control inputfont  bg-transparent border-light rounded-start-5" id="password">
                <button class="btn btn-outline-light rounded-end-5" onclick="showOne();" type="button" id="buttonone">
                    <i class="fa-regular fa-eye"></i>
                </button>
            </div>


            <div class="mt-3 d-none">
                <div class="alert alert-danger"></div>
            </div>

            <div class="mt-3">
                <button class="btn btn-warning spv col-12" onclick="signup();"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp; Sign Up</button>
            </div>

            <div class="mt-3">
                <button class="btn btn-outline-light spv col-12" onclick=" changeView();">Already Have an Account ? Sign In &nbsp;<i class="fa-solid fa-arrow-right-long"></i>&nbsp;</button>
            </div>


            <!-- social links -->
            <div class=" d-flex justify-content-center " style="margin-top: 60px;">
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

        <!-- Sign Up Box ------------------------------------------------------------------------------------------------------------------>

    </div>






    <!-- modal -->
    <div class="modal" tabindex="-1" id="fpmodal">
        <div class="modal-dialog float-md-end me-4">
            <div class="modal-content">
                <div class="modal-header text-center bg-warning">
                    <h5 class="modal-title text-center text-dark">Reset Password</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
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