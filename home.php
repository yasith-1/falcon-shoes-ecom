<?php include "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes | Home</title>
</head>

<body data-bs-theme="dark" onload="loadhomeproduct(0); cartalertnavbar();">



    <!-- Nav bar file linked ------------->
    <?php include "navbar.php"; ?>
    <!-- Nav bar file linked ------------->

    <div class="container-fluid mt-5">
        <div class="col-10 offset-1 col-lg-10 offset-lg-1 col-sm-10 offset-sm-1 d-flex pt-4">

            <!-- carousel -->
            <div class="carousel " style="margin-top: 80px;">
                <!-- list item -->
                <div class="list">
                    <div class="item">
                        <img src="image/img1.jpeg" />
                        <div class="content mycontent">
                            <div class="author">@Contact Admin : Yasith.. </div>
                            <div class="title">FALCON SHOES</div>
                            <div class="topic">Vietnam Shoes</div>
                            <div class="des">
                                <!-- lorem 50 -->
                                Premium Quality | Vietnam Imported | Nike Shoes
                            </div>
                            <!-- <div class="mt-3 position-fixed">
                                <button class="btn btn-danger btnborder" style="cursor: pointer;">SEE MORE</button> &nbsp;
                                <button class="btn btn-primary btnborder" style="cursor: pointer;">SUBSCRIBE</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="item ">
                        <img src="image/img2.jpeg" />
                        <div class="content">
                            <div class="author">@Contact Admin : Yasith.. </div>
                            <div class="title">FALCON SHOES</div>
                            <div class="topic">Vietnam Import</div>
                            <div class="des">
                                Premium Quality | Vietnam Imported | Nike Shoes
                            </div>
                            <!-- <div class="mt-3 position-fixed">
                                <button class="btn btn-danger btnborder" style="cursor: pointer;">SEE MORE</button> &nbsp;
                                <button class="btn btn-primary btnborder" style="cursor: pointer;">SUBSCRIBE</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="item">
                        <img src="image/img3.jpeg" />
                        <div class="content">
                            <div class="author">@Contact Admin : Yasith.. </div>
                            <div class="title">FALCON SHOES</div>
                            <div class="topic">Vietnam Import</div>
                            <div class="des">
                                Premium Quality | Vietnam Imported | Nike Shoes
                            </div>
                            <!-- <div class="mt-3 position-fixed">
                                <button class="btn btn-danger btnborder" style="cursor: pointer;">SEE MORE</button> &nbsp;
                                <button class="btn btn-primary btnborder" style="cursor: pointer;">SUBSCRIBE</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="item">
                        <img src="image/img4.jpeg" />
                        <div class="content">
                            <div class="author">@Contact Admin : Yasith.. </div>
                            <div class="title">FALCON SHOES</div>
                            <div class="topic">Vietnam Import</div>
                            <div class="des">
                                Premium Quality | Vietnam Imported | Nike Shoes
                            </div>
                            <!-- <div class="mt-3 position-fixed">
                                <button class="btn btn-danger btnborder" style="cursor: pointer;">SEE MORE</button> &nbsp;
                                <button class="btn btn-primary btnborder" style="cursor: pointer;">SUBSCRIBE</button>
                            </div> -->
                        </div>
                    </div>

                    <div class="item">
                        <img src="image/img5.jpeg" />
                        <div class="content">
                            <div class="author">@Contact Admin : Yasith.. </div>
                            <div class="title">FALCON SHOES</div>
                            <div class="topic">Vietnam Import</div>
                            <div class="des">
                                Premium Quality | Vietnam Imported | Nike Shoes
                            </div>
                            <!-- <div class="mt-3 position-fixed">
                                <button class="btn btn-danger btnborder" style="cursor: pointer;">SEE MORE</button> &nbsp;
                                <button class="btn btn-primary btnborder" style="cursor: pointer;">SUBSCRIBE</button>
                            </div> -->
                        </div>
                    </div>

                    <div class="item">
                        <img src="image/img6.jpeg" />
                        <div class="content">
                            <div class="author">@Contact Admin : Yasith.. </div>
                            <div class="title">FALCON SHOES</div>
                            <div class="topic">Vietnam Import</div>
                            <div class="des">
                                Premium Quality | Vietnam Imported | Nike Shoes
                            </div>
                            <!-- <div class="mt-3 position-fixed">
                                <button class="btn btn-danger btnborder" style="cursor: pointer;">SEE MORE</button> &nbsp;
                                <button class="btn btn-primary btnborder" style="cursor: pointer;">SUBSCRIBE</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- list thumnail -->
                <div class="thumbnail">

                    <div class="item">
                        <img src="image/img1.jpeg" />
                        <!-- <div class="content">
                            <div class="title">Nike Air Force Vietnam</div>
                            <div class="description">White</div>
                        </div> -->
                    </div>

                    <div class="item">
                        <img src="image/img2.jpeg" />
                        <!-- <div class="content">
                            <div class="title">Nike Air Force Vietnam</div>
                            <div class="description">White</div>
                        </div> -->
                    </div>

                    <div class="item">
                        <img src="image/img3.jpeg" />
                        <!-- <div class="content">
                            <div class="title">Nike Air Force Vietnam</div>
                            <div class="description">Gray</div>
                        </div> -->
                    </div>

                    <div class="item">
                        <img src="image/img4.jpeg" />
                        <!-- <div class="content">
                            <div class="title">Nike Air Force Vietnam</div>
                            <div class="description">Black</div>
                        </div> -->
                    </div>

                    <div class="item">
                        <img src="image/img5.jpeg" />
                        <!-- <div class="content">
                            <div class="title">Nike Air Force Vietnam</div>
                            <div class="description">Pink</div>
                        </div> -->
                    </div>

                    <div class="item">
                        <img src="image/img6.jpeg" />
                        <!-- <div class="content">
                            <div class="title">Nike Air Force Vietnam</div>
                            <div class="description">Red</div>
                        </div> -->
                    </div>
                </div>
                <!-- next prev -->

                <div class="arrows fixed-bottom ms-5">
                    <button id="prev"><i class="fa-solid fa-circle-left  "></i></button>
                    <button id="next"><i class="fa-solid fa-circle-right "></i></button>


                </div>
                <!-- time running -->
                <div class="time"></div>
            </div>
        </div>
    </div>



    <hr class="border border-success mb-5">
    <!-- middel icons -->

    <div class="col-10 offset-1 " style="margin-top: 100px; margin-bottom: 100px;">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-12 text-center mt-sm-2 micospvbg">
                <img src="resources/Images/delivery.png" alt="loading..." class="micon">
                <h5 class="mt-1">Fast Delivery</h5>
                <p>Island wide Fast Delivery </p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center mt-sm-2 micospvbg">
                <img src="resources/Images/payment.png" alt="loading..." class="micon">
                <h5 class="mt-1">Secure Payment</h5>
                <p>shop with confidence, every time, everywhere</p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center mt-sm-2 micospvbg">
                <img src="resources/Images/cod.png" alt="loading..." class="micon">
                <h5 class="mt-1">COD Accepted</h5>
                <p>Pay us easily at your doorstep</p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center mt-sm-2 micospvbg">
                <img src="resources/Images/exchanging.png" alt="loading..." class="micon">
                <h5 class="mt-1">14 days Return Accept</h5>
                <p>love it or swap it. Your satisfaction, guaranteed </p>
            </div>

        </div>
    </div>


    <!-- middel icons -->
    <hr class="border border-success mb-5">





    <!-- Adavnce  Search area -->

    <div class="mb-5 col-12 d-flex justify-content-center ">
        <button class="btn btn-outline-light col-lg-5 col-md-5 col-12" onclick="viewFilter();">Open Advance Search <i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <!-- Adavnce Search area -->






    <!-- products ------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="col-10 offset-1 mt-5 mb-5">

        <!-- Advance Search -->
        <div class="d-none " id="filterId">
            <div class="card mb-5">
                <div class="card-header bg-body-tertiary rounded-3 text-center">
                    <h4 style="font-family: poppins;"> Advance Search</h4>
                </div>
                <div class="card-body">



                    <div class="border border-warning mt-4 p-5  mb-5 rounded-4">
                        <div class="row">


                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label class="form-label col-3">color</label>
                                <select class="form-select  col-9 text-center" id="color">
                                    <option value="0">Select color</option>

                                    <?php
                                    $rs1 = Database::search("SELECT * FROM `color`");
                                    $num1 = $rs1->num_rows;

                                    for ($i = 0; $i < $num1; $i++) {
                                        $d1 = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d1["color_id"] ?>"><?php echo $d1["color_name"] ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>




                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                <label class="form-label col-3">Category</label>
                                <select class="form-select  col-9 text-center" id="cat">
                                    <option value="0">Select Category</option>

                                    <?php
                                    $rs2 = Database::search("SELECT * FROM `category`");
                                    $num2 = $rs2->num_rows;

                                    for ($i = 0; $i < $num2; $i++) {
                                        $d2 = $rs2->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d2["cat_id"] ?>"><?php echo $d2["cat_name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                                <label class="form-label col-3">Brand</label>
                                <select class="form-select  col-9 text-center" id="brand">
                                    <option value="0">Select Brand</option>
                                    <?php
                                    $rs3 = Database::search("SELECT * FROM `brand`");
                                    $num3 = $rs3->num_rows;

                                    for ($i = 0; $i < $num3; $i++) {
                                        $d3 = $rs3->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d3["brand_id"] ?>"><?php echo $d3["brand_name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3 ">
                                <label class="form-label col-3">Size</label>
                                <select class="form-select  col-9 text-center" id="size">
                                    <option value="0">Select Size</option>
                                    <?php
                                    $rs4 = Database::search("SELECT * FROM `size`");
                                    $num4 = $rs4->num_rows;

                                    for ($i = 0; $i < $num4; $i++) {
                                        $d4 = $rs4->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d4["size_id"] ?>"><?php echo $d4["size_name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="col-md-6 mt-4">
                                <input type="text" class="form-control" placeholder="Minimum price" id="min" />
                            </div>

                            <div class="col-md-6 mt-4 ">
                                <input type="text" class="form-control" placeholder="Maximum price" id="max" />
                            </div>


                            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                <button class="btn btn-outline-light col-lg-3 col-sm-4 col-md-4 " onclick="advSearchProduct(0);"> Search</button>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- Advance Search -->



        <!-- Items per Page -->
        <!-- <div class="col-10 offset-1 justify-content-center d-flex mb-5 me-lg-5 gap-3">
            <div class="col-4 ">
                <select class="form-select shadow-lg bg-body-tertiary bg-transparent text-center" id="itemcount">

                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                </select>
            </div>

            <div>
                <button class="btn btn-primary" onclick="countItemPerpage();">Sort</button>
            </div>

        </div> -->

        <!-- Items Per Page -->




        <!-- products ------------------------------------------------------------------------------------------------------------------------------->
        <div class="row gap-5 d-flex justify-content-center align-items-center" id="pid">


        </div>
        <!-- products ------------------------------------------------------------------------------------------------------------------------------->

    </div>


    <hr class="border-secondary border-2">

    <div class="d-flex justify-content-center mt-5">
        <h2 style="font-family: poppins;" class="micon">&#129505&nbsp; WELCOME SHOE LOVERS ! &nbsp;&#129505</h2>
    </div>

    <!-- video clip   -->

    <div class="d-flex justify-content-center ">
        <div class="row col-7 col-md-6 border-secondary rounded-3 shadow-lg">
            <div class="ratio ratio-16x9">
                <video autoplay muted loop>
                    <source src="resources/videoclips/shoe_lover.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>


    <!-- video clip   -->



    <?php include "footer.php"; ?>

    <script src="script.js"></script>
    <script src="app.js"> </script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>