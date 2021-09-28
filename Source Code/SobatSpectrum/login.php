<?php  
 //login.php  
 session_start();  
 
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-login.css">
    <title>Login</title>
</head>
<body>
  <form action="proses/ceklogin.php" method="post" id="login-form"   >
      <h1>Sign In</h1>
      <div class="titel" for="username" ><i class="fas fa-user"></i> Username</div>
      <div class="input-box">
        <input type="text" name="username" id="username" placeholder="Masukkan Username" required="required">
      </div>
      <div class="titel" for="password" ><i class="fas fa-lock"></i> Password</div>
      <div class="input-box">
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required="required" >
      </div>
      <label><input type="checkbox" name="remember"> Remember me</label>
      <button  class="login-btn" type="submit" id="login" name="login" >Login</button>
      <center><div style="margin-top: 20px;" ><a href="request_password.php" > Forgot Password?</a></div></center>
      <center><div style="margin-top: 20px;" >Don't have an account?<a href="register.php" > Create One</a></div></center>
  </form>
</body>
</html>
