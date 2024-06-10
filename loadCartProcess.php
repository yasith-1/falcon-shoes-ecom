<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];
$nettotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id`=`stock`.`stock_id` 
INNER JOIN `product` ON `stock`.`product_id`=`product`.`id`
INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` WHERE `cart`.`user_user_id`='" . $user["user_id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // Load cart 

?>
    <div class="container " style="margin-top: 70px;">
        <h3 class="text-center" style="font-family: poppins; font-size: 35px;">Shopping Cart</h3>
    </div>

    <div class="container">

        <?php
        for ($i = 0; $i < $num; $i++) {
            $d = $row = $rs->fetch_assoc();
            $total = $d["price"] * $d["cart_qty"];
            $nettotal += $total;
        ?>
            <!-- Cart Items -->
            <div class="row col-lg-10 offset-lg-1 border border-1 rounded-3 p-3 shadow-lg bg-body-tertiary justify-content-between mt-3">
                <div class="d-flex align-items-center col-12 col-md-5">
                    <img src="<?php echo $d["path"] ?>" alt="" class="rounded-4 shadow-lg img-fluid" style="max-height: 130px;">

                    <div class="ms-3 ms-md-5 mt-3 mt-md-0">
                        <h5 class="text-info" style="font-family: poppins; letter-spacing: 1px;"><?php echo $d["name"] ?></h5>
                        <p class="text-muted mb-1">Color: <?php echo $d["color_name"] ?></p>
                        <p class="text-muted mb-1">Size: <?php echo $d["size_name"] ?></p>
                        <h5 class="text-warning">Price: Rs.<?php echo $d["price"] ?></h5>
                    </div>
                </div>

                <div class="d-flex align-items-center col-12 col-md-4 mt-3 mt-md-0 gap-2">
                    <button class="btn btn-light" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');"> <i class="fa-solid fa-minus" style="color: #000000;"></i> </button>
                    <input type="number" class="form-control text-center" style="max-width: 100px;" id="qty<?php echo $d['cart_id'] ?>" value="<?php echo $d["cart_qty"] ?>" disabled>
                    <button class="btn btn-light" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');"> <i class="fa-solid fa-plus" style="color: #000000;"></i> </button>
                </div>

                <div class="d-flex align-items-center col-12 col-md-2 mt-3 mt-md-0">
                    <h5 class="text-muted">Total: <span class="text-warning">Rs.<?php echo $total ?></span></h5>
                </div>

                <div class="d-flex align-items-center col-12 col-md-1 mt-3 mt-md-0">
                    <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>');"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                </div>
            </div>
            <!-- Cart Items -->
        <?php
        }
        ?>

        <!-- Total summary -->
        <div class="col-12 col-lg-4 border border-1 rounded-3 p-3 shadow-lg bg-body-tertiary d-flex flex-column mt-3 mx-auto ">
            <div class="text-center col-md-12">
                <h4 class="text-light" style="font-family: poppins;">Total Cart Summary</h4>
            </div>


            <div class="mt-3 row col-md-12">
                <h6 class="text-light"><i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i> &nbsp;Number Of Items: <span class="text-warning"><?php echo $num ?></span></h6>
                <h6 class="text-light"><i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i> &nbsp;Delivery Fee: <span class="text-warning">Rs.450</span></h6>
                <h6 class="text-light"><i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i> &nbsp;Total Amount: <span class="text-warning">Rs.<?php echo $nettotal + 450 ?></span></h6>

            </div>


            <!-- payment icons -->
            <div class="row mt-4">

                <div class="col-3 d-flex justify-content-center">
                    <img src="payment/visa_img.png" alt="loading... " class="border border-1 shadow-lg p-1 rounded-3">
                </div>

                <div class="col-3 d-flex justify-content-center">
                    <img src="payment/mastercard_img.png" alt="loading..." class="border border-1 shadow-lg p-1 rounded-3">
                </div>

                <div class="col-3 d-flex justify-content-center">
                    <img src="payment/paypal_img.png" alt="loading..." class="border border-1 shadow-lg p-1 rounded-3">
                </div>

                <div class="col-3 d-flex justify-content-center">
                    <img src="payment/american_express_img.png" alt="loading..." class="border border-1 shadow-lg p-1 rounded-3">
                </div>

            </div>
            <!-- payment icons -->


            <div class="text-center col-md-12 mt-4">
                <button class="btn btn-success mt-2 col-6 col-lg-4" onclick="checkOut();">Check Out</button>
            </div>
        </div>
        <!-- Total summary -->
    </div>
<?php
} else {
    // cart Empty
?>
    <!-- Continue Shopping cart empty -->
    <div class="d-flex justify-content-center flex-column align-items-center" style="height: 85vh; ">
        <div class="col-12 mb-3 text-center">
            <h4 class="text-muted">Your Cart is Empty</h4>
            <a href="home.php" class="btn btn-primary col-lg-2 col-4">Continue Shopping</a>
            <div class="mt-4">
                <img src="resources/Images/sad.png" alt="loading..." width="90px">
            </div>
        </div>
    </div>
    <!-- Continue Shopping cart empty-->
<?php
}
?>