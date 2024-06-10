<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC");
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
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
    </head>

    <body>

        <div class="container mt-4 printbtn">
            <a href="adminReport.php" class="text-decoration-none text-info"><img src="resources/Images/back.png" alt="Loading...." style="width: 25px; cursor: pointer;" /> &nbsp;Go Back</a>
        </div>

        <div class="justify-content-center align-content-center d-flex" id="stockinvoice">
            <div class="container mt-4">
                <h2 class="text-center fw-semibold" style="font-family: poppins;">STOCK REPORT</h2>
                <table class="table table-hover table-bordered mt-5 text-center table-responsive-md table-responsive-sm table-responsive-lg table-group-divider table-secondary">

                    <thead>
                        <tr>
                            <th>Stock ID</th>
                            <th>Product Name</th>
                            <th>Stock Qty</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                        ?>

                            <tr>
                                <td><?php echo $d["stock_id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["qty"] ?></td>
                                <td><?php echo $d["price"] ?></td>
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

        <div class="row d-flex justify-content-center mt-5 mb-5 gap-4">
            <button class="btn btn-success text-light col-lg-3 col-sm-4 py-2 rounded-3" onclick="printstockreport();">Print &nbsp;<i class="fa-solid fa-print fa-lg" style="color: #ffffff;"></i></button>
            <button class="btn btn-danger text-light col-lg-3 col-sm-4 py-2 rounded-3 " id="download" onclick="downloadStockReport();">Download &nbsp;<i class="fa-solid fa-download fa-lg" style="color: #ffffff;"></i></button>
        </div>









        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a valid admin");
}

?>