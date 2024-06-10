<?php

include "connection.php";
$uid = $_POST["u"];

if (empty($uid)) {
    # empty
    echo ("Please Enter Your User ID");
} else {
    # success
    $rs = Database::search("SELECT * FROM `user` WHERE `user_id`='$uid' AND `user_type_id`='2' ");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {

            Database::iud("UPDATE `user` SET `status`='0' WHERE `user_id`='" . $uid . "' ");
            echo ("Deactivated");
        }

        if ($d["status"] == 0) {
            //    Active
            Database::iud("UPDATE `user` SET `status`='1' WHERE `user_id`='" . $uid . "' ");
            echo ("Ativated");
        }
    } else {
        echo ("Invalid User ID ");
    }
}
