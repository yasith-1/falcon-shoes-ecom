<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `product` 
    INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
    INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
    INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` 
    INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` ORDER BY `product`.`id` ASC");

    $num = $rs->num_rows;
?>


    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/Images/falcon.png" />
        <title>Product Report</title>
        <style>
            @media print {

                .printbtn,
                .footer {
                    display: none !important;
                }

                body {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }

                .tabel th,
                .tabel td {
                    page-break-inside: avoid;
                }

                .tabel img {
                    max-width: 100px;
                    height: auto;
                }
            }
        </style>
    </head>

    <body class="reportbackground bg-body-tertiary">

        <div class="container mt-4 printbtn">
            <a href="adminReport.php" class="text-decoration-none text-info"> <img src="resources/Images/back.png" alt="Loading...." style="width: 25px; cursor: pointer;" /> &nbsp;Go Back</a>
        </div>

        <div class="justify-content-center align-items-center d-flex " id="productinvoice">
            <div class="container mt-4">
                <h2 class="text-center fw-semibold " style="font-family: poppins;">PRODUCT REPORT</h2>
                <table class="table table-hover table-bordered mt-5 text-center table-responsive-md table-responsive-lg tabel table-group-divider table-secondary">

                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Brand Name</th>
                            <th>Description</th>
                            <th>Color</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Image</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                        ?>

                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["brand_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><?php echo $d["color_name"] ?></td>
                                <td><?php echo $d["cat_name"] ?></td>
                                <td><?php echo $d["size_name"] ?></td>
                                <td><img src="<?php echo $d["path"] ?>" height="100"></td>
                            </tr>

                        <?php
                        }

                        ?>

                    </tbody>
                </table>

                <div class="d-none" id="productwatermark">
                    <div class="text-center mt-5 mb-5 ">
                        <img src="resources/Images/watermark.png" alt="loading..." class="opacity-50 " style="border-radius: 15px; width: 400px;">
                    </div>
                </div>

            </div>
        </div>

        <div class="row d-flex justify-content-center mt-5 mb-5 gap-4 printbtn">
            <button class="btn btn-success text-light col-lg-3 col-sm-4 py-2 rounded-3 " onclick="printproductreport();">Print &nbsp;<i class="fa-solid fa-print fa-lg" style="color: #ffffff;"></i></button>
            <button class="btn btn-danger text-light col-lg-3 col-sm-4 py-2 rounded-3 " id="download" onclick="downloadProductReport();">Download &nbsp;<i class="fa-solid fa-download fa-lg" style="color: #ffffff;"></i></button>
        </div>

        <?php include "footer.php"; ?>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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