<?php
session_start();
// $rs = Database::search("SELECT * FROM `cart`");
// $num = $rs->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
</head>

<body data-bs-theme="dark">
    <section class="bg-secondary-subtle py-lg-3 fixed-top d-lg-inline-block d-sm-flex py-sm-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <span class="text-warning text-start fw-semibold" style="font-family: poppins; font-size: 14px; letter-spacing:1px;">Welcome</span>
                    &nbsp;
                    <?php
                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>
                        <span class="text-warning text-start fw-semibold" style="font-family: poppins; font-size: 14px; letter-spacing:1px;"><?php echo $data["fname"] ?> !</span>
                        &nbsp;&nbsp;
                        <span class="text-start fw-medium r" style="font-family: poppins; font-size: 14px; letter-spacing:1px;" onclick="signout();">Log Out &nbsp;<i class="fa-solid fa-right-from-bracket btnhover" style="color: #ffffff;"></i></span>
                    <?php
                    } else {
                    ?>
                        &nbsp;&nbsp;
                        <a href="index.php" class="text-start fw-medium g" style="font-family: poppins; font-size: 14px; letter-spacing:1px;">Sign In or Register</a>&nbsp;
                    <?php
                    }
                    ?>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center me-auto">
                    <a href="userProfile.php" class="text-start fw-medium g" style="font-family: poppins; font-size: 14px; letter-spacing:1px;">My Profile</a>&nbsp;
                    &nbsp;&nbsp;
                    <a href="contactus.php"><span class="text-warning text-start fw-medium b" style="font-family: poppins; font-size: 13px; letter-spacing:1px;">Help and Contact</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- navbar --------------------------------------------------------------------------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg py-lg-2 px-0 bg-transparent bg-body-secondary mt-5 fixed-top d-sm-flex py-sm-2">
        <div class="container-fluid">
            <a class="navbar-brand ms-lg-3" href="home.php">
                <img src="resources/Images/orgficon.png" class="img-fluid spv" alt="Bootstrap" width="30" height="30">
            </a>
            <a class="navbar-brand mx-sm-5 ms-lg-3" href="home.php" style=" font-family: poppins; font-weight: bold; font-size: 26px; letter-spacing: 3px;">Falcon Shoes</a>


            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Toggle button -->


            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav ms-5 me-5 mb-2 mb-lg-0 mt-3 mt-lg-0">
                    <li class="nav-item d-flex justify-content-center align-content-center flex-grow-1">
                        <a href="home.php" class="nav-link active text-center px-0 rounded-4" aria-current="page" style="font-family: poppins; font-size: 17px;">Home</a>
                    </li>
                </ul>


                <!-- basic Search area -->
                <div class="d-flex justify-content-center align-content-center pe-3 flex-grow-1">
                    <input class="form-control pe-2 text-center rounded-3 bg-body-tertiary border border-secondary" type="search" placeholder="Search Product Here " onkeyup="searchproduct(0);" id="product" style="width: 550px;">

                    <!-- <button class="btn bg-transparent btn-secondary "><i class="fa-solid fa-magnifying-glass"></i></button> -->
                </div>
                <!-- basic Search area -->


                <!-- cart  -->
                <div class="d-flex flex-lg-grow-1 justify-content-center align-items-center mt-4 mt-lg-0">
                    <a href="cart.php"><img src="resources/Images/cart.svg" alt="loading..." style="cursor: pointer;"></a>
                    <span class="ms-3 mb-2 top-0 start-100 translate-middle badge rounded-pill bg-danger d-block" id="alertnavbar" ></span>
                </div>
                <!-- cart  -->


                <!-- Dropdown -->
                <div class="dropdown d-flex justify-content-center align-items-center mt-4 mt-lg-0 me-3">
                    <button class="btn btn-secondary bg-body-tertiary dropdown-toggle" style="font-family: poppins;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Account
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home.php">Home</a></li>
                        <li><a class="dropdown-item" href="userProfile.php">User Profile</a></li>
                        <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                        <li><a class="dropdown-item" href="orderHistory.php">Order History</a></li>
                        <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>
                        <li><a class="dropdown-item" href="contactus.php">Contact Us</a></li>
                        <!-- <li><a class="dropdown-item" href="invoice.php">Purchase History</a></li> -->
                        <li><a class="dropdown-item" href="#" onclick="signout();">LOG OUT</a></li>
                    </ul>
                </div>
                <!-- Dropdown -->
            </div>
        </div>
    </nav>
    <!-- navbar --------------------------------------------------------------------------------------------------------------------------------->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>