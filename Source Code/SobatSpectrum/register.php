<?php
require "proses/function.php";

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('User baru berhasil ditambahkan');
            document.location.href = 'login.php'
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style-login.css">
</head>
<body>
  <form action="" method="post" id="login-form"  >
      <h1>Register</h1>
      <div class="titel" ><i class="fas fa-user"></i> Username</div>
      <div class="input-box">
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required="required" >
      </div>
      <div class="titel" ><i class="fas fa-user"></i> Nama</div>
      <div class="input-box">
          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="required" >
      </div>
      <div class="titel" ><i class="fas fa-user"></i> Email</div>
      <div class="input-box">
          <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="required" >
      </div>
      <div class="titel" ><i class="fas fa-lock"></i> Password</div>
      <div class="input-box">
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required="required" >
      </div>
      <div class="titel" ><i class="fas fa-lock"></i> Konfirmasi Password</div>
      <div class="input-box">
        <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan Password" required="required" >
      </div><br>
      <label><input type="checkbox" value="murid" required="required"  name="hakakses"> Data yang anda masukkan sudah benar</label>
      <br>
      <button  class="login-btn" type="submit" name="register" >Register</button>
      <center><div style="margin-top: 20px;" >already have an account<a href="login.php" > Sign In</a></div></center>
  </form>
</body>