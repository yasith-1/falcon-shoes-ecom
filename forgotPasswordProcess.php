<?php

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $num = $rs->num_rows;

    if ($num > 0) {

        $vcode = uniqid();
        Database::iud("UPDATE `user` SET `v_code`='" . $vcode . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yasithprabaswara1@gmail.com';    //From email
        $mail->Password = 'wpfepgsyuhrmlfin';               //App password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('yasithprabaswara1@gmail.com', 'Reset Password');
        $mail->addReplyTo('yasithprabaswara1@gmail.com', 'Reset Password');
        $mail->addAddress($email);

        // content
        $mail->isHTML(true);
        $mail->Subject = 'Falcon Shoes Account password Reset';
        $bodyContent = '<h1 style="color:green;">Your Verification Code is ' . $vcode . '</h1>';
        $mail->Body    = '<table style="width: 100%; font-family: poppins; ">
        <tbody>
            <tr>
                <td align="center">
                    <table style="max-width: 600px;">
                        <td align="center">
                            <a href="#" style="font-size: 35px; font-weight: bold; text-decoration: none; font-family: poppins;">Falcon Shoes</a>
                            <hr>
                        </td>


                        <tr>
                            <td>

                                <h1 style="font-size: 45px; font-weight: 600; text-decoration: none; font-family: poppins;">Your Verification Code </h1>
                                <p style="margin-bottom: 24px;">You can change Your Password by Using Code Bellow</p>
                                <div style="display: flex; justify-content: center; margin-top: 25px;">
                                    <h4 href="#" style="text-decoration: none; display: inline-block; border-radius: 8px;  padding: 8px; color: black; width: 150px; justify-content: center; display: flex;">
                                        <span style="color:black; font-size 40px;">' . $vcode . '</span>
                                    </h4>
                                </div>

                                <p style="margin-top: 25px;">If you didn\'t ask to reset password , you can ignore this email</p>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">
                                <p style="font-weight: 500;">&copy; 2024 https://www.facebook.com/profile.php?id=61556478444616 || All Right Reserved</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>


        </tbody>
    </table>';

        if (!$mail->send()) {
            echo 'Verification code sending failed.';
        } else {
            echo 'success';
        }
    } else {
        echo ("Invalid Email Address.");
    }
} else {
    echo ("Please enter your Email Address in Email Field.");
}
