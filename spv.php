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
</head>

<body class=" d-flex juctify-content-center align-items-center min-vh-100" onload="cartalertnavbar();">



    <div class="container">
        <div class="card mb-3 shadow-lg bg-body-tertiary rounded-4 px-3">
            <div class="row g-0">
                <div class="col-12 col-lg-6 p-4 d-flex flex-column">
                    <img src="resources/productimg/665c76965aadf.png" class="img-fluid rounded-4 spv" height="100%" alt="...">

                    <div class="text-center mt-3 product-rating ">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.7(21)</span>
                    </div>
                </div>



                <div class="col-12 col-lg-6">
                    <div class="card-body px-4 pt-3">

                        <h3 class="fs-3 fw-bold text-center text-info" style="font-family: poppins; letter-spacing: 2px;">Name</h3>

                        <div class="d-flex align-items-center mt-3 ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h6 class=" fw-normal  mt-1 ">Brand : &nbsp; <?php echo $d["brand_name"] ?> </h6>
                        </div>

                        <div class="d-flex align-items-center  ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h6 class=" fw-normal  mt-1">Category : &nbsp; <?php echo $d["cat_name"] ?> </h6>
                        </div>

                        <div class="d-flex align-items-center  ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h6 class=" fw-normal  mt-1">Color :&nbsp; <?php echo $d["color_name"] ?> </h6>
                        </div>

                        <div class="d-flex align-items-center mt">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h5 class="product-price mt-1 text-info" style="font-family: poppins;">Rs.<?php echo $d["price"] ?> </h5>
                        </div>


                        <p class="mb-3 mt-3 "> &rarr;&nbsp;Description :&nbsp; <?php echo $d["description"] ?> </p>

                        <div class="d-flex justify-content-start flex-row mt-3 gap-2 ">
                            <label for="qty" class="form-label mt-1"> &rarr;&nbsp;Quantity &nbsp;: &nbsp;</label>
                            <div>
                                <input type="text" class="form-control " id="qty" placeholder="Enter quantity" min="1">
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mt-3 gap-2 col-lg-6 col-12">
                            <label for="quantity" class="form-label mt-1"> &rarr;&nbsp;Available Stock :&nbsp;</label>
                        </div>


                        <div class="row g-4 gap-4 mt-5 d-flex justify-content-center pb-sm-2">
                            <button class="btn btn-success col-sm-8 col-12 col-md-5 spv" onclick="addtoCart('<?php echo $d['stock_id'] ?>');">Add to Cart</button>
                            <button class="btn btn-warning col-sm-8 col-12 col-md-5 spv" onclick="buyNow('<?php echo $d['stock_id'] ?>');">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>