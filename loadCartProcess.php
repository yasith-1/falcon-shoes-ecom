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


    <div class="container-fluid">

        <!-- Bread crumb -->
        <span>

            <!-- Title -->
            <h3 class="text-center " style="font-family: poppins; font-size: 35px;">Shopping Cart</h3>
            <!-- Title -->

            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-left: 150px;">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </span>
        <!-- Bread crumb -->



        <?php
        for ($i = 0; $i < $num; $i++) {
            $d = $row = $rs->fetch_assoc();
            $total = $d["price"] * $d["cart_qty"];
            $nettotal += $total;
        ?>
            <!-- Cart Items -->
            <div class="row col-lg-10 offset-lg-1 glass-panel p-3 justify-content-between mb-3">
                <div class="d-flex align-items-center col-12 col-md-5">
                    <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src="<?php echo $d["path"] ?>" alt="" class="rounded-4 shadow-lg img-fluid spv" style="max-height: 130px;"></a>

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

        <div class="col-12 col-lg-10 offset-lg-1 d-flex justify-content-end mt-3 mb-3 ">
            <!-- Total summary -->
            <div class="col-12 col-lg-5 glass-panel p-3 d-flex flex-column ">
                <div class="text-center col-md-12">
                    <h4 class="text-light" style="font-family: poppins;">Total Cart Summary</h4>
                </div>


                <div class="mt-3 row col-md-12">
                    <h6 class="text-light"><i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i> &nbsp;Number Of Items: <span class="text-warning"><?php echo $num ?></span></h6>
                    <h6 class="text-light mt-1"><i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i> &nbsp;Delivery Fee: <span class="text-warning">Rs.450</span></h6>
                    <h6 class="text-light mt-1"><i class="fa-solid fa-circle-check" style="color: #ffd43b;"></i> &nbsp;Total Amount: <span class="text-warning">Rs.<?php echo $nettotal + 450 ?></span></h6>

                </div>


                <!-- payment icons -->
                <div class="row mt-4">

                    <div class="col-3 d-flex justify-content-center">
                        <img src="payment/visa_img.png" alt="loading... " class="border border-1 shadow-lg p-1 rounded-3 spv spvbg">
                    </div>

                    <div class="col-3 d-flex justify-content-center">
                        <img src="payment/mastercard_img.png" alt="loading..." class="border border-1 shadow-lg p-1 rounded-3 spv spvbg">
                    </div>

                    <div class="col-3 d-flex justify-content-center">
                        <img src="payment/paypal_img.png" alt="loading..." class="border border-1 shadow-lg p-1 rounded-3 spv spvbg">
                    </div>

                    <div class="col-3 d-flex justify-content-center">
                        <img src="payment/american_express_img.png" alt="loading..." class="border border-1 shadow-lg p-1 rounded-3 spv spvbg">
                    </div>

                </div>
                <!-- payment icons -->


                <div class="text-center col-12 mt-4 mb-2">
                    <button class="btn btn-warning mt-2 col-7 col-md-5 spv spvbg " style="font-family: poppins;" onclick="checkOut();">Check Out</button>
                </div>
            </div>
            <!-- Total summary -->
        </div>
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