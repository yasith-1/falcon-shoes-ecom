<?php
include "connection.php";
$stockId = $_GET["s"];
// echo ($stockId);

if (isset($stockId)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`.`id` 
    INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
    INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
    INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` 
    INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` WHERE `stock`.`stock_id`='" . $stockId . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iCT9pYPvCp70zBDINw/N2lEWvkJqQfwRuhaY3j2yL7EAu6ovwlVlqRO0" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
        <style>

        </style>
    </head>

    <body class="singleproductbody" onload="cartalertnavbar();">


        <?php include "navbar.php"; ?>


        <div class="container " style="margin-top:100;">
            <div class="row shadow-lg bg-body-tertiary rounded-4 mt-5 p-3 ps-1">
                <div class="col-sm-12 col-md-12 col-lg-6 d-flex justify-content-center align-items-center flex-column">


                    <img src="<?php echo $d["path"] ?>" class="rounded-4 shadow-lg " alt="Product Image" height="400px">


                    <div class="text-center mt-3 product-rating ">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.7(21)</span>
                    </div>

                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                    <h3 class="fs-3 fw-bold text-center text-info" style="font-family: poppins; letter-spacing: 2px;"><?php echo $d["name"] ?></h3>
                    <div class="product-details">

                        <div class="d-flex align-items-center  ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;
                            <h6 class=" fw-normal  mt-1 ">Brand &nbsp;: &nbsp;<?php echo $d["brand_name"] ?></h6>
                        </div>

                        <div class="d-flex align-items-center  ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;
                            <h6 class=" fw-normal  mt-1">Category &nbsp;: &nbsp;<?php echo $d["cat_name"] ?></h6>
                        </div>

                        <div class="d-flex align-items-center  ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;
                            <h6 class=" fw-normal  mt-1">Color &nbsp;: &nbsp;<?php echo $d["color_name"] ?></h6>
                        </div>

                        <div class="d-flex align-items-center mt">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;
                            <h5 class="product-price mt-1 text-info" style="font-family: poppins;">Rs &nbsp;: &nbsp;<?php echo $d["price"] ?></h5>
                        </div>


                        <p class="mb-3 mt-3 "> &rarr;&nbsp;Description &nbsp;: &nbsp; <?php echo $d["description"] ?></p>

                        <div class="d-flex justify-content-start mt-3 gap-2 col-lg-6 col-12">
                            <label for="quantity" class="form-label mt-1"> &rarr;&nbsp;Quantity &nbsp;: &nbsp;</label>
                            <div>
                                <input type="text" class="form-control " id="qty" placeholder="Enter quantity" min="1">
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mt-1 gap-2 col-lg-6 col-12">
                            <label for="quantity" class="form-label mt-1"> &rarr;&nbsp;Available Stock &nbsp;: &nbsp;<?php if ($d["qty"] == 0) {
                                                                                                                            echo ("Out Of Stock");
                                                                                                                        } else {
                                                                                                                            echo $d["qty"];
                                                                                                                        } ?></label>
                        </div>




                        <div class="row gap-3 mt-5 d-flex justify-content-center pb-sm-5">
                            <button class="btn btn-success col-sm-8 col-md-8 col-lg-5" onclick="addtoCart('<?php echo $d['stock_id'] ?>');">Add to Cart</button>
                            <button class="btn btn-warning col-sm-8 col-md-8 col-lg-5" onclick="buyNow('<?php echo $d['stock_id'] ?>');">Buy Now</button>
                        </div>


                    </div>
                </div>
            </div>



        </div>




        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>

<?php

} else {
    header("location:home.php");
}

?>