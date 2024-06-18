<?php
session_start();
if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-wEmeIV1mKuiNpF+37l6mT3DQz7pgtfnHbx7k5H5H/AjnnsxZr/a2iaJTM/rbW/TM" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
    </head>

    <body>
        <!-- Nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- Nav bar -->

        <div class="container " style="margin-top: 70px;">
            <div class="row justify-content-center">
                <!-- <div class="col-12 text-center mb-4">
                    <h2 style="font-family: poppins;">Product Management</h2>
                </div> -->

                <div class="row g-4 ">
                    <!-- Brand Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white fw-bold" style="font-family: poppins; font-size: 15px;">
                                Set Your Brand
                            </div>
                            <div class="text-center mt-2">
                                <img src="resources/Images/brand.png" class="card-img-top" alt="Brand Image" style="width: 100px;">
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control mb-3" id="brand" placeholder="ex: Puma">
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary rounded-5" onclick="brandRegister();">Brand Register</button>
                            </div>
                        </div>
                    </div>
                    <!-- Category Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white fw-bold" style="font-family: poppins; font-size: 15px;">
                                Set Your Category
                            </div>
                            <div class="text-center mt-2">
                                <img src="resources/Images/category.png" class="card-img-top" alt="Category Image" style="width: 100px;">
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control mb-3" id="cat" placeholder="ex: Men's">
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary rounded-5" onclick="categoryReg();">Category Register</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mt-3">
                    <!-- Color Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white fw-bold" style="font-family: poppins; font-size: 15px;">
                                Set Your Color
                            </div>
                            <div class="text-center mt-2">
                                <img src="resources/Images/color.png" class="card-img-top" alt="Color Image" style="width: 100px;">
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control mb-3" id="color" placeholder="ex: Blue">
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary rounded-5" onclick="colorReg();">Color Register</button>
                            </div>
                        </div>
                    </div>
                    <!-- Size Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white fw-bold" style="font-family: poppins; font-size: 15px;">
                                Set Your Size
                            </div>
                            <div class="text-center mt-2">
                                <img src="resources/Images/size.png" class="card-img-top" alt="Size Image" style="width: 100px;">
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control mb-3" id="size" placeholder="ex: EU-40">
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary rounded-5" onclick="sizeReg();">Size Register</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <?php include "footer.php"; ?>


        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybGZepSAbHUN3GHI/9lQ8smklUE7wI2oPpMmH0PnWJ8K9E0TM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QNH2KEZBZaeYJ5itG3mPfXhCXXQvsOYh5iPb2aJA5z5VSJUaNXq8B60Zxp/8txk6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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