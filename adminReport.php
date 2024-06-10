<?php
session_start();

if (isset($_SESSION["a"])) {
?>



    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
    </head>

    <body>

        <!-- Nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- Nav bar -->

        <div class="col-10 " style="margin-top: 100px; margin-bottom: 100px;">

            <div class="row col-12  offset-1 d-flex justify-content-center align-items-center">

                <div class="text-center">
                    <h1 style="font-family: poppins;">Business Reports</h1>
                </div>

                <div class="text-center mt-4 mb-5 ">
                    <img src="resources/Images/static.png" alt="Loading...." style="width: 50px;">
                </div>

                <!-- Stock Report -->
                <div class="card text-center col-lg-3 col-md-6 col-sm-12 mt-5 ms-5">
                    <div class="card-header bg-warning text-dark fw-semibold fs-5 ">
                        Print OR Download Stock Report
                    </div>
                    <div class="card-body py-5">

                        <div class="text-center mt-3 mb-3 ">
                            <img src="resources/Images/stock.png" alt="Loading....">
                        </div>

                        <div class=" mt-5 text-center">
                            <a href="adminReportStock.php" target="_blank"><button class="btn btn-outline-info col-12 ">Stock Report &nbsp; <i class="fa-solid fa-up-right-from-square fa-sm" style="color: #ffffff;"></i></button></a>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <a href="https://www.facebook.com/profile.php?id=61556478444616" target="_blank" class="text-warning">www.falconshoes.com</a>
                    </div>
                </div>
                <!-- Stock Report -->



                <!-- Product Report -->
                <div class="card text-center col-lg-3 col-md-6 col-sm-12 mt-5 ms-5">
                    <div class="card-header bg-warning text-dark fw-semibold fs-5">
                        Print OR Download Product Report
                    </div>
                    <div class="card-body py-5">

                        <div class="text-center mt-3 mb-3 ">
                            <img src="resources/Images/product.png" alt="Loading....">
                        </div>

                        <div class=" mt-5 text-center">
                            <a href="adminReportProduct.php" target="_blank"><button class="btn btn-outline-info col-12 ">Product Report &nbsp; <i class="fa-solid fa-up-right-from-square fa-sm" style="color: #ffffff;"></i></button></a>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <a href="https://www.facebook.com/profile.php?id=61556478444616" target="_blank" class="text-warning">www.falconshoes.com</a>
                    </div>
                </div>
                <!-- Product Report -->



                <!-- User Report -->
                <div class="card text-center col-lg-3 col-md-6 col-sm-12 mt-5 ms-5">
                    <div class="card-header bg-warning text-dark fw-semibold fs-5">
                        Print OR Download User Report
                    </div>

                    <div class="card-body py-5 ">

                        <div class="text-center mt-3 mb-3 ">
                            <img src="resources/Images/user.png" alt="Loading....">
                        </div>


                        <div class=" mt-5 text-center">
                            <a href="userReport.php"><button class="btn btn-outline-info col-12 ">User Report &nbsp; <i class="fa-solid fa-up-right-from-square fa-sm" style="color: #ffffff;"></i></button></a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="https://www.facebook.com/profile.php?id=61556478444616" target="_blank" class=" text-warning">www.falconshoes.com</a>
                    </div>
                </div>
                <!-- User Report -->






            </div>
        </div>




        <?php include "footer.php"; ?>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

    </html>

<?php
} else {
    echo ("You are not a valid admin");
?>
    <br><br>
    <a href="adminSignin.php">Go Back</a>
<?php
}


?>