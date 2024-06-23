<?php
include "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];
    $rs = Database::search("SELECT * FROM `user` WHERE `user_id`='" . $user["user_id"] . "'");
    // $rs = Database::search("SELECT * FROM `user` INNER JOIN `address` ON `user`.`user_id`=`address`.`user_user_id` WHERE `user`.`user_id`='" . $user["user_id"] . "'");
    $d = $rs->fetch_assoc();




?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>User Profile | eShop</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>

    </head>

    <body class="userprofileimage" onload="cartalertnavbar();">

        <?php include "navbar.php"; ?>

        <div class="container " style="margin-top: 70px;">
            <div class="row">

                <div class="col-12 ">
                    <div class="row ">

                        <div class="col-12 mt-4 mb-4 ">
                            <div class="row">

                                <div class=" col-12 mt-4 mb-4 ">
                                    <h2 class="fw-bold text-center mb-3" style="font-family: poppins; letter-spacing: 3px; ">USER INFO</h2>
                                </div>

                                <div class="col-md-4  col-sm-12 border  border-light rounded-3 mt-sm-3 mt-lg-0 ">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <img src=" <?php if (!empty($d["img_path"])) {
                                                        echo $d["img_path"];
                                                    } else {
                                                        echo ("resources\images\profile.png");
                                                    }
                                                    ?> " class="rounded mt-5  shadow" style="width: 150px;" id="i" />

                                        <span class="fw-semibold text-info mt-3" style="font-family: poppins; letter-spacing: 1px;"><?php echo $d["fname"] ?></span>
                                        <span class="fw-semibold text-info" style="font-family: poppins; letter-spacing: 1px;"><?php echo $d["lname"] ?></span>

                                        <div class="mt-4 px-4 py-2 rounded-5">
                                            <span class="badge fw-semibold text-bg-light p-2" style="font-family: poppins; letter-spacing: 1px;"><?php echo $user["email"] ?></span>
                                        </div>


                                        <input type="file" class="form-control  border-0 " style="margin-top: 120px;" id="imageuploader" />
                                        <!-- <label for="imageuploader" class="btn btn-primary" style="cursor: pointer;">Upolad Image</label> -->

                                        <button for="imageuploader" class="btn btn-success mt-3" onclick="uploadimg();">Upload Profile Image</button>

                                        <!-- <button for="imageuploader" class="btn btn-outline-danger mt-5" onclick="deleteimg();">Remove Profile</button> -->

                                    </div>
                                </div>

                                <div class="col-md-7   border border-secondary rounded-3 ms-lg-1 mt-sm-3 mt-lg-0 ">
                                    <div class="p-4">

                                        <div class="col-12 mt-3  d-flex flex-row justify-content-center">
                                            <h4 class="fw-semibold text-center mt-2" style="font-family: poppins;">Profile Settings</h4>&nbsp;
                                            <img src="resources/Images/user_profile.png" alt="" srcset="" style="width: 40px;">
                                        </div>

                                        <div class="row mt-3 bg-transparent">

                                            <div class="col-lg-6 col-md-12 mt-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control bg-transparent border-info" value="<?php echo $d["fname"] ?> " id="fname" />
                                            </div>

                                            <div class="col-lg-6 col-md-12 mt-3">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control bg-transparent border-info" value="<?php echo $d["lname"] ?>" id="lname" />
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control bg-transparent border-info " readonly style="cursor: not-allowed;" value="<?php echo $d["email"] ?>" id="email" />
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label class="form-label">Mobile</label>
                                                <input type="number" class="form-control bg-transparent border-info" value="<?php echo $d["mobile"] ?>" id="mobile" />
                                            </div>

                                            <div class="col-6 mt-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control bg-transparent border-info disabled" readonly style="cursor: not-allowed;" value="<?php echo $d["username"] ?>" disabled />
                                            </div>

                                            <div class="col-6 mt-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control bg-transparent border-info disabled" readonly style="cursor: not-allowed;" value="<?php echo $d["password"] ?>" id="pw" />
                                                    <span class="input-group-text bg-primary" id="btn3" onclick="userpassword();">
                                                        <i class="fa-regular fa-eye text-white"></i>
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="col-4 mt-3">
                                                <label class="form-label">No</label>

                                                <input type="text" class="form-control bg-transparent border-info" value="<?php echo $d["no"] ?>" id="no" />
                                            </div>


                                            <div class="col-8 mt-3">
                                                <label class="form-label">Address Line 01</label>
                                                <input type="text" class="form-control bg-transparent border-info" value="<?php echo $d["line_1"] ?>" id="line1" />
                                            </div>


                                            <div class="col-6 mt-3">
                                                <label class="form-label">Address Line 02</label>
                                                <input type="text" class="form-control bg-transparent border-info" value="<?php echo $d["line_2"] ?>" id="line2" />
                                            </div>


                                            <div class="col-6 mt-3">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control bg-transparent border-info" value="<?php echo $d["city"] ?>" id="city" />
                                            </div>


                                            <!-- <div class="col-6 mt-3">
                                                <label class="form-label">Postal code</label>
                                                <input type="text" class="form-control bg-transparent border-info" value="" id="pcode" />
                                            </div> -->





                                            <!-- <div class="col-6">
                                            <label class="form-label">Province</label>
                                            <select class="form-select bg-transparent bg-black">
                                                <option value="0">Select Province</option>
                                                <option value="1">Colombo</option>
                                            </select>
                                        </div> -->

                                            <!-- <div class="col-6">
                                            <label class="form-label">District</label>
                                            <select class="form-select bg-transparent bg-secondary">
                                                <option value="0">Select District</option>
                                                <option value="1">Kaluthara</option>

                                            </select>
                                        </div> -->

                                            <!-- <div class="col-6">
                                            <label class="form-label">City</label>
                                            <select class="form-select bg-transparent bg-black">
                                                <option value="0">Select City</option>
                                                <option value="1">Kaluthara</option>

                                            </select>
                                        </div> -->

                                            <!-- <div class="col-6">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" class="form-control bg-transparent" />
                                        </div> -->

                                            <!-- <div class="col-12">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control bg-transparent" value="Male" readonly />
                                        </div>  -->

                                            <div class="col-lg-6 col-sm-12 d-grid mt-5">
                                                <button class="btn btn-success" onclick="updateUserData();">Update My Profile</button>
                                            </div>

                                            <div class="col-lg-6 col-sm-12 d-grid mt-5">
                                                <button class="btn btn-danger" onclick="clearUserData();">Clear Data</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="col-md-4 text-center">
                                <div class="row">
                                    <span class="fw-bold text-secondary-50 mt-5">Display ads</span>
                                </div>
                            </div> -->

                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>

        <?php include "footer.php"; ?>

        <script src="app.js"> </script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </body>

    </html>

<?php

} else {

    header("location:index.php");
}


?>