<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["oid"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid`='" . $orderHistoryId . "'");
$num = $rs->num_rows;
$d = $rs->fetch_assoc();

?>

<div class=" text-center pt-4 col-12">
    <img src="resources/Images/ficon1.png" alt="Loading...." style="width: 150px; cursor: pointer;" />
</div>


<div class="row">
    <div class="col-md-6 mt-lg-1 mt-5 text-lg-start text-center">
        <h4 class="text-dark">Order ID : <span class="text-success">&nbsp;#<?php echo $d["order_id"] ?></span></h4>
        <h5 class="text-dark">Date :&nbsp;<span class="text-success"><?php echo $d["order_date"] ?> </span></h5>
    </div>

    <div class="col-md-6 text-end  mt-lg-3 mt-4">
        <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="text-dark">I N V O I C E</h1>
        <h5 style="font-family: poppins;" class="text-dark">Falcon Shoes</h5>
        <h5 style="font-family: poppins;" class="text-dark">No.64 </h5>
        <h5 style="font-family: poppins;" class="text-dark">Nathduwa,Kelaniya ,Sri Lanka</h5>
    </div>
</div>

<div class="mt-5 mt-lg-3">
    <span class="text-dark fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["fname"] ?>&nbsp;<?php echo $user["lname"] ?></span> <br>
    <span class="text-dark fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["mobile"] ?></span> <br>
    <span class="text-dark fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["no"] ?></span>
    <span class="text-dark fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["line_1"] ?>
    <span class="text-dark fs-5 fw-normal" style="font-family: poppins;"><?php echo $user["line_2"] ?></span>
</div>

<div class="table-responsive mt-5 ">
    <table class="table table-bordered border-1 table-group-divider table-hover text-center table-secondary ">
        <thead>
            <tr>
                <th scope="col" class="text-dark">Product Name</th>
                <th scope="col" class="text-dark">Brand Name</th>
                <th scope="col" class="text-dark">Category</th>
                <th scope="col" class="text-dark">Color</th>
                <th scope="col" class="text-dark">Size</th>
                <th scope="col" class="text-dark">Qty</th>
                <th scope="col" class="text-dark">Price</th>
            </tr>
        </thead>
        <tbody class="table-success">
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
                    <td class="text-dark"><?php echo $d2["oid_qty"] ?></td>
                    <td class="text-dark">Rs.<?php echo ($d2["price"] * $d2["oid_qty"]) ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<div class="text-end  mt-5">
    <h5 class="text-dark">Number Of Items : <apan class="text-success"><?php echo $num2 ?></apan>
    </h5>
    <h5 class="text-dark">Delivery Fee : <apan class="text-success">Rs.450/=</apan>
    </h5>
    <h5 class="text-dark">Net Amount : <apan class="text-success">Rs.<?php echo $d["amount"] ?>/=</apan>
    </h5>
</div>
<?php

?>