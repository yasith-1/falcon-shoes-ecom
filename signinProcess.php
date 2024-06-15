<?php
session_start();
include "connection.php";

// $username = $_POST["u"];
$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address Must Contain LOWER THAN 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($password)) {
    echo ("Please enter your Password.");
} else if (strlen($password) > 20 || strlen($password) < 5) {
    echo ("Password must contain BETWEEN 5 to 20 characters.");
} else {

    // $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();
    $hash =  password_verify($password, $d["password"]);


    if ($num == 1 && $hash == 1) {

        if ($d["status"] == 1) {
            // Active user
            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {
                // Set cookie

                // setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                // Destroy cookie
                // setcookie("username", "", -1);
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            // Inactive user
            echo ("Inactive User");
        }
    } else {
        echo ("Invalid Email OR Password.");
    }
}
