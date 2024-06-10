<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
// $colorId = $_POST["c"];
$price = $_POST["up"];

if (empty($productId)) {
    echo ("Select Product Name");
} else if (empty($qty)) {
    echo ("Please Enter quantity");
} else if (!is_numeric($qty)) {
    echo ("Only Numbers can be entered for Quantity");
} else if (strlen($qty) > 10) {
    echo ("Quantity be less than 10 Characters");
} else if (empty($price)) {
    echo ("Please enter Unit Price");
} else if (!is_numeric($price)) {
    echo ("Only Numbers can be entered for Unit Price");
} else if (strlen($price) > 10) {
    echo ("Unit Price should be less than 10 Characters");
} else {

    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $productId . "' AND `price` = '" . $price . "' ");
    // $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $productId . "' AND `price` = '" . $price . "' AND `color_color_id` = '" . $colorId . "'");


    // $rs = Database::search("SELECT * FROM `stock` INNER JOIN `color` ON `stock`.`color_color_id`=`color`.`color_id` WHERE `product_id`='" . $productId . "' AND `color_color_id`='" . $colorId . "' AND
    // `price`='" . $price . "' ORDER BY `stock`.`stock_id` ASC ");

    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        // Update Query
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_id"] . "'");
        echo ("success");
    } else {
        // Insert Query
        Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('" . $price . "','" . $qty . "','" . $productId . "')");
        // Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`,`color_id`) VALUES ('" . $price . "','" . $qty . "','" . $productId . "' ,'" . $colorId . "' ) ");
        echo ("New Stock Added Successfully");
    }
}
