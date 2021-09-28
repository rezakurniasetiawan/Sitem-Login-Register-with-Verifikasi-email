<?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'sobatspectrum') or die(mysqli_error($koneksi));

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM user where verif_code = '$code'";
        $query = mysqli_query($koneksi,$sql);
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            $id = $user['id'];
            $sql =  "UPDATE user set is_verified=1 where id=$id";
            $query = mysqli_query($koneksi,$sql);
            if($query){
                echo "<script>
            alert('VERIFIKASI BERHASIL. Silahkan Login');
            document.location.href = '../login.php'
            </script>";
            }else{
                echo "VERIFIKASI GAGAL ERROR : ".$query;
            }
        }else {
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else {
        echo "code ga nih";
    }

?>