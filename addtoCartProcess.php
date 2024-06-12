<?php
include "connection.php";
session_start();


$stockId = $_POST["s"];
$qty = $_POST["q"];
// $size = $_POST["si"];

// echo($stockId);


if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];
    $rs = Database::search("SELECT * FROM `stock` WHERE `stock_id`='" . $stockId . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        // echo("In stock");

        $d = $rs->fetch_assoc();
        $stockqty = $d["qty"];

        $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_user_id`='" . $user["user_id"] . "' AND `stock_stock_id`='" . $stockId . "'");
        $num2 = $rs2->num_rows;

        if ($num2 > 0) {
            // Update

            $d2 = $rs2->fetch_assoc();
            $newqty = $qty + $d2["cart_qty"];

            if ($stockqty >= $newqty) {
                // Update qury
                Database::iud("UPDATE `cart` SET `cart_qty`='" . $newqty . "' WHERE `cart_id`='" . $d2["cart_id"] . "'");
                echo ("Cart Item Updated Successfully");
            } else {
                echo ("Stock Quantity has been exceeded !");
            }
        } else {
            // Insert

            if ($stockqty >= $qty) {
                // Insert qury
                Database::iud("INSERT INTO `cart` (`cart_qty`,`user_user_id`,`stock_stock_id`) VALUES ('" . $qty . "','" . $user["user_id"] . "','" . $stockId . "')");
                echo ("Cart Item Added Successfully");
            } else {
                echo ("Stock Quantity has been exceeded !");
            }
        }
    } else {
        echo ("Your Stock is not found");
    }
} else {
    echo ("nouser");
}
