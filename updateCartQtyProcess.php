<?php

include "connection.php";
$cartId = $_POST["c"];
$newqty = $_POST["q"];
// echo ($newqty);



$rs = Database::search("SELECT * FROM `cart`INNER JOIN `stock` ON `cart`.`stock_stock_id`=`stock`.`stock_id` WHERE `cart`.`cart_id`='" . $cartId . "' ");

$num = $rs->num_rows;

if ($num > 0) {
    // Cart Item Found

    $d = $rs->fetch_assoc();

    if ($d["qty"] >= $newqty) {
        // Update query
        Database::iud("UPDATE `cart` SET `cart_qty`='" . $newqty . "' WHERE `cart_id`='" . $cartId . "'");
        echo ("success");
    } else {
        echo ("Your Product Quentity Exceeded !");
    }
} else {
    echo ("Cart Item Not Found");
}
