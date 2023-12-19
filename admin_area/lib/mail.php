<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-weight: 300;
            font-size: 12px;
            line-height: 30px;
            color: #272727;
            background: rgb(25, 199, 155);
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #contact input {
            font: 400 12px/16px;
            width: 100%;
            border: 1px solid #CCC;
            background: #FFF;
            margin: 10 5px;
            padding: 10px;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 30px;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 50px 0;
        }


        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
            width: 100%;
        }

        button {
            cursor: pointer;
            width: 100%;
            border: none;
            background: rgb(17, 146, 60);
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 20px;
        }

        button:hover {
            background-color: rgb(15, 95, 42);
        }
    </style>
</head>

<body>
    <div class="container">
        <form id="contact" action="mail.php" method="post">
            <h1>GỬI KHUYẾN MÃI</h1>


            <fieldset>
                <input placeholder="Nhập email khách hàng" name="email" type="email" tabindex="2">
            </fieldset>

            <fieldset>
                <textarea name="message" placeholder="Nhập nội dung" tabindex="5"></textarea>
            </fieldset>

            <fieldset>
                <button type="submit" name="send" id="contact-submit">Gửi</button>
            </fieldset>
            <fieldset>
                <a href="../index.php">Quay về trang chủ</a>
            </fieldset>
        </form>
    </div>
</body>

</html>






<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = "smtp-mail.outlook.com"; // specify main and backup server
    $mail->Port = 587; // set the port to use
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Username = "trleminhduy@outlook.com"; //Địa chỉ gmail sử dụng để gửi email
    $mail->Password = "minhduy2002"; // your SMTP password or your gmail password
    $from = "trleminhduy@outlook.com"; // Khi người sử dụng bấm reply sẽ gửi đến email này
    $to = $_REQUEST["email"]; // Email người nhận (email thực)
    $name = "Xin chao anh/chi"; // Tên người nhận
    $mail->From = $from;
    $mail->FromName = "Cua hang Nostalgia"; // Tên người gửi 
    $mail->AddAddress($to, $name);
    $mail->AddReplyTo($from, "Phong cham soc khach hang");
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = "NEW SEASON SALE!";
    $mail->Body = " " . $_REQUEST["message"] . "<hr> Click here for more information: <a href=''</a>";
    if (!$mail->Send()) {
        echo "<h3>Err: " . $mail->ErrorInfo . '</h3>';
    } else {
        echo "<h3>Send mail thành công</h3>";
        echo "<a href='../index.php'>Trở về trang chủ</a>";
    }
    ;
}