<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail=new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='jumanabegum.m2021@vitstudent.ac.in';
    $mail->Password='lxbkooykizcjkgbs';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('jumanabegum.m2021@vitstudent.ac.in');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    //$mail->Subject=$_POST["subject"];
    //$mail->Body=$_POST["message"];

    // Set the subject from the form or a default value
       $mail->Subject = isset($_POST["subject"]) ? $_POST["subject"] : 'Confirmation';

    // Set the message body from the form or a default value
      $mail->Body = !empty($_POST["message"]) ? $_POST["message"] : 'Voted successfully';

    $mail->send();

    echo
    "
    <script>
    alert('Confirmation mail has been Successfully sent');
    document.location.href='voterhome.html';
    </script>
    ";

}

?>
