<?php
include "connection.php";

$email = $_POST["e"];


if (empty($email)) {
    echo ("Type User Email");
} elseif (strlen($email) > 100) {
    echo ("Email Address Must Contain LOWER THAN 100 characters");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
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
