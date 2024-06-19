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
        .variation-images img {
            height: 100px;
            cursor: pointer;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100" onload="cartalertnavbar();">

    <div class="container" style="margin-top: 50px;">
        <!-- Bread crumb -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Name</li>
            </ol>
        </nav>
        <!-- Bread crumb -->

        <div class="card mt-5 mb-3 bg-body-tertiary rounded-4 px-3 spvbg">
            <div class="row g-0">
                <div class="col-12 col-lg-6 p-4 d-flex flex-column align-items-center">
                    <img id="mainImage" src="resources/Images/marketcart.jpeg" class="img-fluid rounded-4 shadow-lg spv" height="90%" alt="Main Image">
                    <div class="text-center mt-3 product-rating ">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.7(21)</span>
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-4 d-flex flex-column align-items-start">
                    <!-- Variation images -->
                    <div class="variation-images d-flex flex-column">
                        <img src="resources/Images/variation1.jpeg" class="rounded-4 shadow-sm" alt="Variation Image 1" onclick="document.getElementById('mainImage').src='resources/Images/variation1.jpeg'">
                        <img src="resources/Images/variation2.jpeg" class="rounded-4 shadow-sm" alt="Variation Image 2" onclick="document.getElementById('mainImage').src='resources/Images/variation2.jpeg'">
                        <img src="resources/Images/variation3.jpeg" class="rounded-4 shadow-sm" alt="Variation Image 3" onclick="document.getElementById('mainImage').src='resources/Images/variation3.jpeg'">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card-body px-4 pt-3">
                        <h3 class="fs-3 fw-semibold text-center " style="font-family: poppins; letter-spacing: 2px; color: orange;">Product Name</h3>
                        <hr style="width: 50%; margin-left: auto; margin-right: auto;">

                        <div class="d-flex align-items-center mt-3 ">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h6 class="fw-normal mt-1">Brand : Brand Name</h6>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h6 class="fw-normal mt-1">Category : Category Name</h6>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h6 class="fw-normal mt-1">Color : Color Name</h6>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i>
                            &nbsp;&nbsp;
                            <h5 class="product-price mt-1 text-info" style="font-family: poppins;">Rs. Price</h5>
                        </div>

                        <p class="mb-3 mt-3 "> &rarr;&nbsp;Description : Product Description</p>

                        <div class="d-flex justify-content-start mt-3 gap-2 col-lg-6 col-12">
                            <label for="quantity" class="form-label mt-1"> &rarr;&nbsp;Available Stock :&nbsp;&nbsp;<span class="badge w-auto text-bg-danger">In Stock</span></label>
                        </div>

                        <div class="d-flex justify-content-start flex-row mt-3 gap-2 ">
                            <label for="qty" class="form-label mt-1"> &rarr;&nbsp;Add Quantity &nbsp;: &nbsp;</label>
                            <div>
                                <input type="number" class="form-control w-50 text-center rounded-4 border-secondary" id="qty" placeholder="Qty" min="1">
                            </div>
                        </div>

                        <div class="row g-2 gap-4 mt-5 d-flex justify-content-center pb-sm-2">
                            <button class="btn btn-success col-sm-8 col-12 col-md-5 spv" style="font-family: poppins;" onclick="addtoCart();">Add to Cart</button>
                            <button class="btn btn-warning col-sm-8 col-12 col-md-5 spv" style="font-family: poppins;" onclick="buyNow();">Buy Now</button>
                        </div>

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
