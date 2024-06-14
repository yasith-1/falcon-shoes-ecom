<?php
include "connection.php";
$stock_id = $_POST["stid"];
$rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` WHERE stock_id='" . $stock_id . "' ORDER BY `stock`.`stock_id` ASC");
$data = $rs->fetch_assoc();
$quentity = $data["qty"];

if ($quentity != 0) {
    Database::iud("UPDATE `stock` SET `qty`='0' WHERE `stock`.`stock_id`='" . $stock_id . "'");
    echo ("success");
} else {
    echo ("Already out of stock");
}
