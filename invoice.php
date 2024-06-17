<?php
session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid`='" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Thank You For Your Order</title>

    </head>

    <body>

        <div class="container text-start mt-3">
            <a href="home.php" class="text-decoration-none text-info">
                <img src="resources/Images/back.png" alt="Loading...." style="width: 25px; cursor: pointer;" />
                &nbsp;Back to Home
            </a>
        </div>



        <div class="container mt-3 mb-4">


            <div class="border border-secondary border-3 bg-custom shadow-custom px-5 py-1 rounded-4 bg-body-tertiary" id="orderInvoice">


                <div class=" text-center pt-4 col-12">
                    <img src="resources/Images/orgficon.png" alt="Loading...." style="width: 150px; cursor: pointer;" />
                </div>


                <div class="row">
                    <div class="col-md-6 mt-lg-1 mt-5 text-lg-start text-center">
                        <h4>Order ID : <span class="text-success">&nbsp;#<?php echo $d["order_id"] ?></span></h4>
                        <h5>Date :&nbsp;<span class="text-success"><?php echo $d["order_date"] ?> </span></h5>
                    </div>

                    <div class="col-md-6 text-lg-end text-center mt-lg-3 mt-4">
                        <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">I N V O I C E</h1>
                        <h5 style="font-family: poppins;" class="text-dark">Falcon Shoes</h5>
                        <h5 style="font-family: poppins;" class="text-dark">No.64 </h5>
                        <h5 style="font-family: poppins;" class="text-dark">Nathduwa,Kelaniya ,Sri Lanka</h5>
                    </div>
                </div>

                <div class="mt-5 mt-lg-3">
                    <span class="fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["fname"] ?>&nbsp;<?php echo $user["lname"] ?></span> <br>
                    <span class="fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["mobile"] ?></span> <br>
                    <span class="fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["no"] ?></span>
                    <span class="fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["line_1"] ?>,
                        <span class="fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["line_2"] ?></span>
                </div>

                <div class="table-responsive mt-5 ">
                    <table class="table table-bordered border-1 table-group-divider table-hover table-secondary ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark">Product Name</th>
                                <th scope="col" class="text-dark">Brand Name</th>
                                <th scope="col" class="text-dark">Category</th>
                                <th scope="col" class="text-dark">Color</th>
                                <th scope="col" class="text-dark">Size</th>
                                <th scope="col" class="text-dark">Unit Price</th>
                                <th scope="col" class="text-dark">Qty</th>
                                <th scope="col" class="text-dark">Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            <?php
                            $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN  `stock` ON `order_item`.`stock_stock_id`=`stock`.`stock_id` 
                            INNER JOIN `product` ON `stock`.product_id =`product`.`id` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` 
                            INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id` 
                            INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id` 
                            INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` WHERE `order_item`.`order_history_ohid`='" . $orderHistoryId . "'");

                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();
                            ?>
                                <tr>
                                    <td class="text-dark"><?php echo $d2["name"] ?></td>
                                    <td class="text-dark"><?php echo $d2["brand_name"] ?></td>
                                    <td class="text-dark"><?php echo $d2["cat_name"] ?></td>
                                    <td class="text-dark"><?php echo $d2["color_name"] ?></td>
                                    <td class="text-dark"><?php echo $d2["size_name"] ?></td>
                                    <td class="text-dark"><?php echo $d2["price"] ?></td>
                                    <td class="text-dark"><?php echo $d2["oid_qty"] ?></td>
                                    <td class="text-dark">Rs.<?php echo ($d2["price"] * $d2["oid_qty"]) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="7" class="text-center fw-semibold text-primary">Total Amount</td>
                                <td class="text-primary fw-semibold">Rs.<?php echo $d["amount"] - 450 ?>/=</td>
                            </tr>
                            <?php
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-lg-end text-center mt-5">
                    <h5>Number Of Items : <apan class="text-success"><?php echo $num2 ?></apan>
                    </h5>
                    <h5>Delivery Fee : <apan class="text-success">Rs.450/=</apan>
                    </h5>
                    <h5>Net Amount : <apan class="text-success">Rs.<?php echo $d["amount"] ?>/=</apan>
                    </h5>
                </div>
            </div>


            <div class="text-center mt-4 mb-4">
                <button class="btn btn-warning col-12 col-md-3 py-2 rounded-3 spv spvbg" onclick="orderInvoicePrint();">Print Invoice &nbsp;<i class="fa-solid fa-print fa-lg" style="color: #ffffff;"></i></button>
            </div>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:home.php");
}
?>