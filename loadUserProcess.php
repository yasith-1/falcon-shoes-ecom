<?php

include "connection.php";

$rs = Database::search("SELECT * FROM `user` WHERE `user_type_id`='2' ");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {

    $data = $rs->fetch_assoc();
?>
    <tr>
        <th scope="row" style="font-size: 14px; background-color:green;"> <?php echo $data["user_id"]; ?> </th>
        <td style="font-size: 15px;"> <?php echo $data["fname"]; ?> </td>
        <td style="font-size: 15px;"> <?php echo $data["lname"]; ?> </td>
        <td style="font-size: 15px;"> <?php echo $data["email"]; ?> </td>
        <td style="font-size: 15px;"> <?php echo $data["mobile"]; ?> </td>
        <td style="font-size: 15px;" id="tdata"> <?php if ($data["status"] == 1) {
                                                        echo ("Active");
                                                    } else {
                                                        echo ("Deactive");
                                                    }

                                                    ?> </td>


    </tr>

<?php
}


?>