<?php

include "connection.php";

$rs2 = Database::search("SELECT `product`.`id`,`product`.`name`, SUM(`cart`.`cart_qty`) AS `total_addcart` FROM `cart`INNER JOIN `stock` ON `cart`.`stock_stock_id`=`stock`.`stock_id`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` GROUP BY `product`.`id`,`product`.`name`ORDER BY 
`total_addcart` DESC LIMIT  6;");

$num2 = $rs2->num_rows;

$label1 = array();
$data1 = array();

for ($i = 0; $i < $num2; $i++) {
    $d2 = $rs2->fetch_assoc();

    $label1[] = $d2["name"];
    $data1[] = $d2["total_addcart"];
}

$json = array();
$json["label1"] = $label1;
$json["data1"] = $data1;

echo json_encode($json);
