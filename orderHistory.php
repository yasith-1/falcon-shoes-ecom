<?php

session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
    </head>

    <body onload="cartalertnavbar();">
        <!-- Nav Bar -->
        <?php include "navBar.php"; ?>
        <!-- Nav Bar -->

        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php
                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_user_id`='" . $user["user_id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                ?>
                    <div class="col-12 text-center mt-5 mb-3">
                        <h3 style="font-family: poppins;">Order History</h3>
                    </div>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <!-- order history card -->
                        <div class="col-12 col-md-10 col-lg-8 p-3 border border-1 border-secondary rounded-3 bg-body-tertiary mb-3 shadow-lg">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Order Id :&nbsp;<span class="text-info">#<?php echo $d["order_id"]; ?></span></h5>
                                <p class="text-muted"><?php echo $d["order_date"]; ?></p>
                            </div>

                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-bordered table-group-divider">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Product Name</th>
                                            <th scope="col" class="text-center">Qty</th>
                                            <th scope="col" class="text-center">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` =`stock`.`stock_id` 
                                        INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` WHERE `order_item`.`order_history_ohid`='" . $d["ohid"] . "'");
                                        $num2 = $rs2->num_rows;

                                        for ($x = 0; $x < $num2; $x++) {
                                            $d2 = $rs2->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $d2["name"]; ?></td>
                                                <td class="text-center"><?php echo $d2["oid_qty"]; ?></td>
                                                <td class="text-center">Rs.<?php echo ($d2["oid_qty"] * $d2["price"]); ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex flex-column align-items-end pe-3">
                                <h6 class="text-muted" style="font-family: poppins;">Delivery Fee &nbsp;: <span class="text-muted">450/=</span></h6>
                                <div class="mt-2">
                                    <h4 style="font-family: poppins;">Net Amount &nbsp;: <span class="text-warning"><?php echo $d["amount"]; ?>/=</span></h4>
                                </div>
                            </div>
                        </div>
                        <!-- order history card -->
                    <?php
                    }
                    ?>
                <?php
                } else {
                ?>
                    <div class="col-12 text-center mt-5">
                        <h2>You have not placed any order yet</h2>
                        <a href="home.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}
?>