<?php
session_start();
require "function.php";

try{
    if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
      $id = $_COOKIE['id'];
          $key = $_COOKIE['key'];

          //ambil username berdasarkan id
          $result = mysqli_query($koneksi, "SELECT username from user WHERE id =$id");
          $row = mysqli_fetch_assoc($result);

          //cek cookie dan username_
          if ($key === hash('sha256', $row['username'])) {
              $_SESSION['login'] = true;
          }
    } 


  if(isset($_POST["login"])){
  
    $username = $_POST["username"];
    $password = $_POST["password"];
    
  
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $_SESSION['last_login_timestamp'] = time();  
    //check user
    if( mysqli_num_rows($result) === 1){

      //cek session
      $_SESSION["login"] = true;
  
      //cek remember me
      if(isset($_POST["remember"])){
          //build cookie
          setcookie('id',$row['id'], time() +60);
          setcookie('key', hash('sha256' , $row['username']),
              time() +60);
      }
      //cek password & level hak-akses
      $row = mysqli_fetch_assoc($result);

      $_SESSION['id']    = $row['id'];
      $_SESSION['nama']    = $row['nama'];
      $_SESSION['username']    = $row['username'];
      $_SESSION['password']    = $row['password'];
      $_SESSION['email']    = $row['email'];
      $_SESSION['hakakses']    = $row['hakakses'];

      if (password_verify($password, $row["password"])){
        $_SESSION["login"] = true;
        if($row['is_verified'] == 1){

          if ($row['hakakses'] == "murid") {
            $_SESSION["login_time_stamp"] = time(); 
            $_SESSION['username'] = $username;
            $_SESSION['hakakses'] = "murid";
            
            $log_email = $row['email']; 
            $log_hakakses = $row['hakakses'];
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO log_activity (username,email,hakakses,date)VALUES('$username','$log_email','$log_hakakses','$date')";
            $query = mysqli_query($koneksi, $sql);
            
            header("Location: ../dashboard/dashboard-murid.php");
            exit();
          }
          else if ($row['hakakses'] == "admin"){
            $_SESSION['username'] = $username;
            $_SESSION['hakakses'] = "admin";

            $log_email = $row['email']; 
            $log_hakakses = $row['hakakses'];
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO log_activity (username,email,hakakses,date)VALUES('$username','$log_email','$log_hakakses','$date')";
            $query = mysqli_query($koneksi, $sql);

            header("Location: ../dashboard/dashboard-admin.php");
          }
          else if ($row['hakakses'] == "tentor"){
            $_SESSION["login_time_stamp"] = time(); 
            $_SESSION['username'] = $username;
            $_SESSION['hakakses'] = "tentor";

            $log_email = $row['email']; 
            $log_hakakses = $row['hakakses'];
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO log_activity (username,email,hakakses,date)VALUES('$username','$log_email','$log_hakakses','$date')";
            $query = mysqli_query($koneksi, $sql);

            header("Location: ../dashboard/dashboard-tentor.php");
          }
        }else {
          echo "<script>
          alert('Verifikasi Email dulu yaa');window.location='../login.php';
          </script>"; 
        } 
      }
  
    }
    else{
            
    }
    $error = true;
    if(isset($error)){
      echo "<script>
      alert('Username atau Password salah');window.location='../login.php';
      </script>"; }
  }

}catch (Error $e) {
  echo "Error caught: " . $e->getMessage();
}

  
?>