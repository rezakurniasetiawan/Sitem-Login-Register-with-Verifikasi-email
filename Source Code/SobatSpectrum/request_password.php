<?php
ob_start();
session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'sobatspectrum') or die(mysqli_error($koneksi));
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["email"])) {
    $emailTo = $_POST["email"];
    $code = uniqid(true);
    $query = mysqli_query($koneksi, "INSERT INTO resetPasswords(code,email) VALUES ('$code','$emailTo')");

    if (!$query) {
        exit("Error");
    }

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'haisarimi6@gmail.com';                     //SMTP username
        $mail->Password   = 'pentolbakar';                               //SMTP password
        $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


        //Recipients
        $mail->setFrom('no-replay@sobatbimbel.com', 'Sobat Bimbel');
        $mail->addAddress($emailTo);     //Add a recipient
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset_password.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = "<h1>Silahkan perbarui password anda</h1>
                            dengan klik <a href='$url'>di sini</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Silahkan periksa Email Anda!';
        echo "<script>
        alert('Silahkan periksa Email anda!');
     </script>";
    } catch (Exception $e) {
        echo "Gagal kirim. Mailer Error: {$mail->ErrorInfo}";
    }

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-login.css">
    <title>Forgot Password</title>
</head>
<body>
  <form action="" method="post" id="login-form"   >
      <h1>Reset your password</h1>
      <center><h5>Enter your user account's verified email address and we will send you a password reset link.</h5><br></center>
      <div class="titel" for="email" ><i class="fas fa-user"></i> Email</div>
      <div class="input-box">
        <input type="text" name="email" id="email" placeholder="Masukkan email" required="required">
      </div>
      <button  class="login-btn" type="submit" id="resetpassword" name="submit" >Kirim</button>
  </form>
</body>
</html>
