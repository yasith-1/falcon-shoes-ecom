<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"])) {
    // Empty Image 
    echo ("empty");
} else {
    // Upload Image 

    $rs = Database::search("SELECT * FROM `user` WHERE user_id='" . $user["user_id"] . "'");
    $d = $rs->fetch_assoc();

    if (!empty($d["img_path"])) {
        unlink($d["img_path"]); // Delete already uploaded image
    }

    $path = "resources/profileimg/" . uniqid() . ".png";
    move_uploaded_file($_FILES["i"]["tmp_name"], $path);

    Database::iud("UPDATE `user` SET `img_path`='" . $path . "' WHERE user_id='" . $user["user_id"] . "'");
    echo ($path);
}
