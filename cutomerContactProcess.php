<?php
include "connection.php";

$name = $_POST["n"];
$email = $_POST["e"];
$msg = $_POST["m"];

if (empty($name)) {
    echo ("Enter your Name ");
} else if (strlen($name) > 30) {
    echo ("Name must be contain 30 characters only");
} else if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (strlen($email) > 45) {
    echo ("Email Address Must Contain LOWER THAN 45 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($msg)) {
    echo ("Type your Message ");
} else {



    $rs = Database::search("SELECT * FROM `contact` WHERE `name`='" . $name . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        // Update query
        Database::iud("UPDATE `contact` SET `name`='" . $name . "' ,`email`='" . $email . "',`msg`='" . $msg . "' WHERE `email`='" . $email . "'");
        echo ("Update");
    } else {
        //Insert query
        Database::iud("INSERT INTO `contact` (`name`,`email`,`msg`) VALUES ('" . $name . "','" . $email . "','" . $msg . "')");
        echo ("success");
    }
}
