<?php
session_start();

include('../koneksi.php');
if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
if ($_SESSION['hakakses'] != "admin") {
    die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="../assets/images/logo/sobatbimbel.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="dashboard-admin.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="admin_log_activity.php" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                                <span>Log Activity</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                                <span>Data Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                                <span>Data Tentor</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                                <span>Data Murid</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="../proses/ceklogout.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                        <?php
                                            $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM user WHERE nama='$_SESSION[nama]'");
                                            $peg    = mysqli_fetch_array($tampilPeg);
                                        ?>
                                            <h6 class="mb-0 text-gray-600"><a><?= $peg['nama'] ?></a></h6>
                                            <p class="mb-0 text-sm text-gray-600">Admin</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="../assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        <div id="main">

            <div class="page-heading">
                <?php
                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM user WHERE nama='$_SESSION[nama]'");
                    $peg    = mysqli_fetch_array($tampilPeg);
                ?>
                <h3>Hai, <a><?= $peg['nama'] ?></a> Selamat Datang di Dashboard Admin</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                                    <!-- Hoverable rows start -->
                                <section class="section">
                                    <div class="row" id="table-hover-row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Log Activity</h4>
                                                </div>
                                                <div class="card-content">
                                                    <!-- table hover -->
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Username</th>
                                                                    <th>Email</th>
                                                                    <th>Hak Akses</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                include('../koneksi.php');

                                                //membuat pagimasi
                                                $batas = 11;
                                                $halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
                                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                                $previous = $halaman - 1;
                                                $next = $halaman + 1;

                                                $data = mysqli_query($koneksi, "select * from log_activity");
                                                $jumlah_data = mysqli_num_rows($data);
                                                $total_halaman = ceil($jumlah_data / $batas);

                                                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                                                $query = "SELECT * FROM log_activity ORDER BY id ASC limit $halaman_awal, $batas";
                                                $result = mysqli_query($koneksi, $query);

                                                //mengecek apakah ada error ketika menjalankan query
                                                if (!$result) {
                                                    die("Query Error: " . mysqli_errno($koneksi) .
                                                        " - " . mysqli_error($koneksi));
                                                }

                                                //buat perulangan untuk element tabel dari data mahasiswa
                                                $no = 1; //variabel untuk membuat nomor urut
                                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                                // kemudian dicetak dengan perulangan while
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                                <tr>
                                                                    <td ><?php echo $no; ?></td>
                                                                    <td><?php echo $row['username']; ?></td>
                                                                    <td ><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['hakakses']; ?></td>
                                                                    <td><?php echo $row['date']; ?></td>
                                                                </tr>
                                                                <?php
                                                                    $no++; //untuk nomor urut terus bertambah 1
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <nav aria-label="...">
                                                            <ul class="pagination justify-content-end p-3">
                                                                <li class="page-item">
                                                                    <a class="page-link" <?php if ($halaman > 1) {
                                                                                                echo "href='?hal=$previous'";
                                                                                            } ?>><i class="bi bi-arrow-left-square-fill"></i></a>
                                                                </li>
                                                                <?php
                                                                for ($x = 1; $x <= $total_halaman; $x++) {
                                                                ?>
                                                                    <li class="page-item"><a class="page-link" href="?hal=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li class="page-item">
                                                                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                                                echo "href='?hal=$next'";
                                                                                            } ?>><i class="bi bi-arrow-right-square-fill"></i></a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Rezadev</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>