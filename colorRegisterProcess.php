<?php
include "connection.php";

$color = $_POST["c"];
// echo($color);


if (empty($color)) {
    echo ("Please Enter Color Name");
} elseif (strlen($color) > 20) {
    echo ("Your Color Name Should Be less than 20 characters");
} else {
    Database::iud("INSERT INTO `color` (`color_name`) VALUES ('" . $color . "') ");
    echo("success");
}
