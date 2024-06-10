<?php
include "connection.php";

$name = $_POST["n"];


if (empty($name)) {
    echo ("Type User Name");
} elseif (strlen($name) > 20) {
    echo ("User name Should be 20 characters only");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `fname`='" . $name . "'");
    $num = $rs->num_rows;
    $data = $rs->fetch_assoc();

    if ($num == 1) {

?>
        <tr>
            <th scope="row" style="font-size: 14px; background-color: darkolivegreen;"> <?php echo $data["user_id"]; ?> </th>
            <td style="font-size: 15px;"> <?php echo $data["fname"]; ?> </td>
            <td style="font-size: 15px;"> <?php echo $data["lname"]; ?> </td>
            <td style="font-size: 15px;"> <?php echo $data["email"]; ?> </td>
            <td style="font-size: 15px;"> <?php echo $data["mobile"]; ?> </td>
            <td style="font-size: 15px;"> <?php if ($data["status"] == 1) {
                                                echo ("Active");
                                            } else {
                                                echo ("Deactive");
                                            }

                                            ?> </td>


        </tr>

<?php
    }
}
