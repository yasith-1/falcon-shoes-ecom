<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$password = $_POST["p"];
$no = $_POST["no"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];
$city = $_POST["city"];
$pcode = $_POST["pc"];


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
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password Must Contain 5 to 20 Characters.");
} else if (empty($no)) {
    echo ("please Enter Your Address No");
} elseif (strlen($no) > 10) {
    echo ("Address No Must Contain 10 Characters.");
} elseif (empty($line1)) {
    echo ("Enter Address Line 01");
} elseif (strlen($line1) > 50) {
    echo ("Address Line 01 No Must Contain 50 Characters.");
} elseif (empty($line2)) {
    echo ("Enter Address Line 02");
} elseif (strlen($line2) > 50) {
    echo ("Address Line 02 Must Contain 50 Characters.");
} elseif (empty($city)) {
    echo ("Enter Your City");
} elseif (strlen($city) > 20) {
    echo ("City Must Contain 20 Characters.");
} else {



    // Update Query

    Database::iud("UPDATE `user` SET `fname`='" . $fname . "' , `lname`='" . $lname . "' , `email`='" . $email . "' , `mobile`='" . $mobile . "' ,`password`='" . $password . "' , `no`='" . $no . "' ,
    `line_1`='" . $line1 . "' , `line_2`='" . $line2 . "' , `city`='".$city."' WHERE `user_id`='" . $user["user_id"] . "'");

    // Database::iud("UPDATE `user` SET `fname`='" . $fname . "' , `lname`='" . $lname . "' , `email`='" . $email . "' , `mobile`='" . $mobile . "' ,`password`='" . $password . "'  WHERE `user_id`='" . $user["user_id"] . "'");


    $rs = Database::search("SELECT * FROM `user` WHERE `user_id`='" . $user["user_id"] . "'");

    $d = $rs->fetch_assoc();

    $_SESSION["u"] = $d;



    echo ("Success");
}
