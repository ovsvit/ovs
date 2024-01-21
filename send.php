<?php
session_start();
include("db.php");
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
    $mail->Username='ovsgproject@gmail.com';
    $mail->Password='vozifmqbfpbzunfu';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $m=$_POST["email"];
    echo
    "
    <script>
    alert('$m');
 
    </script>
    ";

    $mail->setFrom('ovsgproject@gmail.com');
    $query="select Email from voter_register where Email='$m'";
    $res = mysqli_query($conn, $query);
    if ($res && $res->num_rows > 0) {
      $row = $res->fetch_assoc();
      $eml = $row['Email'];
  } else {
      echo "<script>alert('Invalid mail id'); document.location.href='conf_mail.php';</script>";
  }
  
    if (!$res) {
      echo
      "
      <script>
      alert('Invalid mail id');
      document.location.href='conf_mail.php';
      </script>
      ";

    } else {
        
     // $row = $result->fetch_assoc();
     // $row = $result->fetch_assoc();
if (filter_var($eml, FILTER_VALIDATE_EMAIL)) {
  $mail->addAddress($eml);
} else {
  echo "<script>alert('Invalid email address'); document.location.href='conf_mail.php';</script>";
}

      //$mail->addAddress($eml);

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
      document.location.href='votesuccess.php';
      </script>
      ";
    }
   

}

?>
