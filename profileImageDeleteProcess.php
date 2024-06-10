<?php
session_start();
include "connection.php";
$user = $_SESSION["u"];

if (isset($user["img_path"])) {
    // No uploded profile image
    echo ("empty");
} else {

    //   profile image set
    Database::iud("UPDATE `user` SET `img_path`='' WHERE `user_id`='" . $user["user_id"] . "'");
    echo ("success");
}
