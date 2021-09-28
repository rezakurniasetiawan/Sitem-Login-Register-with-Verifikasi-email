<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'sobatspectrum') or die(mysqli_error($koneksi));
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

function registrasi($data) {
    global $koneksi;    

    $username = strtolower(stripslashes($data["username"]));
    $nama = (stripslashes($data["nama"]));
    $email = (stripslashes($data["email"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $code = md5($email.date('Y-m-d'));
    $hakakses = (stripslashes($data["hakakses"]));

    //cek konfirm password
    if ($password != $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";
        return false;
    }
    

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //insert  database

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/OAuth.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/POP3.php';
    require 'phpmailer/src/SMTP.php';
    $sql = "SELECT * FROM user where email = '$email'";
    $query = mysqli_query($koneksi,$sql);
    if(mysqli_num_rows($query) > 0 ){
        echo "<script>
                alert('Username sudah terdaftar sebelumnya. Mohon inputkan ulang');
            </script>";
    }
    else{
        $sql = "INSERT INTO user (nama,email,username,password,hakakses,verif_code)VALUES('$nama','$email','$username','$password','$hakakses','$code')";
        $query = mysqli_query($koneksi, $sql);

        //Import PHPMailer classes into the global namespace


    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    //SMTP::DEBUG_OFF = off (for production use)
    //SMTP::DEBUG_CLIENT = client messages
    //SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
    //if your network does not support SMTP over IPv6,
    //though this may cause issues with TLS

    //Set the SMTP port number:
    // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
    // - 587 for SMTP+STARTTLS
    $mail->Port = 587;

    //Set the encryption mechanism to use:
    // - SMTPS (implicit TLS on port 465) or
    // - STARTTLS (explicit TLS on port 587)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'haisarimi6@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'pentolbakar';

    //Set who the message is to be sent from
    //Note that with gmail you can only use your account address (same as `Username`)
    //or predefined aliases that you have configured within your account.
    //Do not use user-submitted addresses in here
    $mail->setFrom('no-replay@sobatspectrum.com', 'Sobat Spectrum Service');

    //Set an alternative reply-to address
    //This is a good place to put user-submitted addresses
    
    //$mail->addReplyTo('replyto@example.com', 'First Last');

    //Set who the message is to be sent to
    $mail->addAddress($email, $nama);

    //Set the subject line
    $mail->Subject = 'Verification Account Sobat Spectrum';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body

    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

    //Replace the plain text body with one created manually
    $body = "Hai, ".$nama."Please verif your email before access our website : <br> http://localhost/sobatSpectrum/proses/confirmEmail.php?code=".$code;
    
    $mail->Body = $body;

    $mail-> AltBody = 'Verification Account';



    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo "<script>
            alert('Register Sukses Silahkan Login. Cek EMail kamu sekarang');
            document.location.href = 'login.php'
            </script>";
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }

    }
}

?>