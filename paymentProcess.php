<?php
session_start();
include "connection.php";
$user = $_SESSION["u"];

$addrs = Database::search("SELECT * FROM `user` WHERE `user_id`='" . $user["user_id"] . "'");
$addrsdata = $addrs->fetch_assoc();

$stocklist = array();
$qtylist = array();


if (isset($addrsdata["no"]) && ($addrsdata["line_1"]) && ($addrsdata["line_2"]) && ($addrsdata["city"])) {

    if (isset($_POST["cart"]) && $_POST["cart"] == "true") {
        //    From cart

        $rs = database::search("SELECT * FROM `cart` WHERE `user_user_id`='" . $user["user_id"] . "'");
        $num = $rs->num_rows;

        for ($i = 0; $i < $num; $i++) {
            $d = $rs->fetch_assoc();

            $stocklist[] = $d["stock_stock_id"];
            $qtylist[] = $d["cart_qty"];
        }
    } else {

        // From buy now

        $stocklist[] = $_POST["stockId"];
        $qtylist[] = $_POST["qty"];
    }

    $merchantId = "1226868";
    $merchantSecret = "MTI1NDI0OTU5MzI4NTczMDI0MzYxMDU1NzE0OTI2MjE2NjgzMDA5";
    $items = "";
    $netTotal = 0;
    $currency = "LKR";
    $orderId = uniqid();


    for ($i = 0; $i < sizeof($stocklist); $i++) {

        $rs2 = Database::search("SELECT * FROM `stock` INNER JOIN  `product` ON `stock`.`product_id`=`product`.`id` WHERE `stock`.`stock_id`='" . $stocklist[$i] . "'");
        $d2 = $rs2->fetch_assoc();
        $stockQty = $d2["qty"];

        if ($stockQty >=  $qtylist[$i]) {
            //Stock available

            $items .= $d2["name"];

            if ($i != sizeof($stocklist) - 1) {
                $items .= ", ";
            }

            $netTotal += (intval($d2["price"]) * intval($qtylist[$i]));
        } else {
            echo ("Product has out of stock");
        }
    }

    // Delivery fee
    $netTotal += 450;

    // payhere hash
    $hash = strtoupper(
        md5(
            $merchantId .
                $orderId .
                number_format($netTotal, 2, '.', '') .
                $currency .
                strtoupper(md5($merchantSecret))
        )
    );

    $payment = array();
    $payment["sandbox"] = true;
    $payment["merchant_id"] = $merchantId;
    $payment["first_name"] = $user["fname"];
    $payment["last_name"] = $user["lname"];
    $payment["email"] = $user["email"];
    $payment["phone"] = $user["mobile"];
    $payment["address"] = $user["no"] . "," . $user["line_1"];
    $payment["city"] = $user["line_2"];
    $payment["country"] = "Sri Lanka";
    $payment["order_id"] = $orderId;
    $payment["items"] = $items;
    $payment["currency"] = $currency;
    $payment["amount"] = number_format($netTotal, 2, '.', '');
    $payment["hash"] = $hash;
    $payment["return_url"] = "";
    $payment["cancel_url"] = "";
    $payment["notify_url"] = "";

    echo json_encode($payment);
} else {
   echo("filladdress");
}
