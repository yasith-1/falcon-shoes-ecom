<?php
include "connection.php";

$cat = $_POST["c"];

if (empty($cat)) {
    echo ("Please Enter Category Name");
} else if (strlen($cat) > 20) {
    echo ("Your Category Name Should Be less than 20 characters");
} else {
    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name`='" . $cat . "' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Category Name Already Exists");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $cat . "') ");
        echo ("success");
    }
}
?>