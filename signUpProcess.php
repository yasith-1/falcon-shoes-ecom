<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"];

if (empty($fname)) {
    echo ("Please Enter Your First Name.");
} else if (strlen($fname) > 20) {
    echo ("First Name Must Contain LOWER THAN 20 characters.");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name.");
} else if (strlen($lname) > 20) {
    echo ("Last Name Must Contain LOWER THAN 20 characters.");
} else if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address Must Contain LOWER THAN 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number.");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number Must Contain 10 characters.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else if (empty($username)) {
    echo ("Please Enter Your username.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password Must Contain 5 to 20 Characters.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'OR `username`='" . $username . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("User with the same Email Address or Mobile Number already exists.");
    } else {

        // INSERT DATA

        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`mobile`,`username`,`password`,`user_type_id`) VALUES 
        ('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $username . "','" . $password . "','2')");

        echo ("Success");
    }
}
