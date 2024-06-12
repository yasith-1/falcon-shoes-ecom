<?php
session_start();
include "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_user_id`='" . $user["user_id"] . "'");

    $num = $rs->num_rows;

    echo ($num);
} else {
    echo ("nouser");
}
