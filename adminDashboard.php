<?php
session_start();
if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
    </head>

    <body onload="loadChart1(); loadchart2(); loadchart3()" class="adminDashBoardBody">

        <?php include "adminNavBar.php"; ?>



        <!-- chart -->
        <div class="container " style="max-height: 100%; margin-top: 150px;">

            <div class="row col-12 text-center mb-3 mt-5 d-flex justify-content-center">
                <span class="text-center text-light mb-2 fs-1" style="font-family: poppins;">Sales Review !</span>
                <img src="resources/Images/sales.png" alt="" style="width: 60px;" class="mt-1">
            </div>


            <div class="row col-12 mt-5 gap-5 d-flex justify-content-center">

                <div style="width: 100%; max-width: 600px;" class="col-sm-12 col-md-12 border border-secondary rounded-5 bg-transparent shadow-lg text-center p-3">
                    <label for="" class="form-label mb-2 fw-bold fs-5" style="font-family: Georgia, 'Times New Roman', Times, serif;">Most Sold Product - pie chart view</label>
                    <canvas id="myChart1"></canvas>
                </div>

                <div style="width: 100%; max-width: 600px;" class="col-sm-12 col-md-12 border border-secondary  rounded-5 bg-transparent shadow-lg text-center p-3">
                    <label for="" class="form-label mb-2 fw-bold fs-5" style="font-family: Georgia, 'Times New Roman', Times, serif;">Most Sold Product - doughnut chart view</label>
                    <canvas id="myChart2"></canvas>
                </div>

            </div>


            <div class="row col-12 mt-5 d-flex justify-content-center">
                <div style="width: 100%; max-width: 700px;" class="col-sm-12 col-md-12 border border-secondary rounded-5 bg-transparent shadow-lg text-center p-3 ">
                    <label for="" class="form-label mb-2 fw-bold fs-5" style="font-family: Georgia, 'Times New Roman', Times, serif;">Most Add to Cart - pie chart view</label>
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </div>
        <!-- chart -->

        <!-- JavaScript files -->
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>

<?php

} else {
    echo ("You are not a valid admin");

?>
    <br>
    <a href="adminSignin.php">Back to Log in</a>
<?php
}
?>