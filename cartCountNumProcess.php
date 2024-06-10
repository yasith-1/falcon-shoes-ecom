<?php
session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {
    $rs = Database::search("SELECT * FROM `cart` WHERE `user_user_id`='" . $user["user_id"] . "'");
    $num = $rs->num_rows;
    echo ($num);
}
