<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'sobatspectrum') or die(mysqli_error($koneksi));

if (!isset($_GET["code"])) {
    exit("Halaman tidak ditemukan");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($koneksi, "SELECT email FROM resetpasswords WHERE code='$code'");
if (mysqli_num_rows($getEmailQuery) == 0) {
    exit("Halaman tidak ditemukan");
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    $query = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE email='$email'");

    if ($query) {
        $query = mysqli_query($koneksi, "DELETE FROM resetpasswords WHERE code='$code'");
        // exit("Password telah diperbarui");
        echo "<script>
        alert('Password telah diperbarui');
        document.location.href = 'login.php'
     </script>";
    } else {
        // exit("Terdapat kesalahan");
        echo "<script>
        alert('Terdapat kesalahan');
        document.location.href = 'reset_password.php'
     </script>";
    }
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
      <h1>Input New Passowrd</h1>
      <div class="titel" for="password" ><i class="fas fa-user"></i> Password Baru</div>
      <div class="input-box">
        <input type="text" name="password" id="password" placeholder="Masukkan password baru" required="required">
      </div>
      <button  class="login-btn" type="submit" id="resetpassword" name="submit" >Kirim</button>
  </form>
</body>
</html>
