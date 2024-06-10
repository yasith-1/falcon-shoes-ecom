<?php
include "connection.php";

$size = $_POST["s"];

if (empty($size)) {
    echo ("Please Enter Size");
} else if (strlen($size) > 10) {
    echo ("Your Category Name Should Be less than 10 characters");
} else {
    $rs = Database::search("SELECT * FROM `size` WHERE `size_name`='" . $size . "' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Size Already Exists");
    } else {
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('" . $size . "') ");
        echo ("success");
    }
}

?>