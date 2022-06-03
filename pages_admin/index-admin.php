
<?php

session_start();
  
if( !isset($_SESSION["admin"])) {
  header ("location: ../login.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('../parts/inc_meta.php');?>
    <title>Panel Admin</title>
  </head>
  <body>
    <!-- header -->
    <header>
      <?php include('./inc_nav_admin.php');?>
    </header>
    <!-- body -->
    <main style="min-height: 700px;">

<div class="row no-gutters mt-5" style="min-height: 700px;">
          <div class="sidebar-admin col-md-2 bg-dark mt-2 pe-3 pt-4">
          <ul class="nav flex-column ms-3 mb-5">
            <li class="nav-item-">
                <a class="nav-link nav-admin active text-white" aria-current="page" href="?page=dashboard"><i class="fas fa-tachometer-alt me-3"></i>Dashboard</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link nav-admin text-white" href="?page=pelanggan"><i class="fas fa-address-book me-3"></i>Customer List</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link nav-admin text-white" href="?page=pesanan"><i class="fas fa-shopping-cart me-3"></i>Order List</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link nav-admin text-white" href="?page=menu"><i class="fas fa-clipboard-list me-3"></i>Menu List</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link nav-admin text-white" href="?page=komentar"><i class="fas fa-comment-dots me-3"></i>Comment List</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link nav-admin text-white" href="?page=pdf"><i class="fas fa-book me-3"></i>Generate Report</a><hr class="bg-secondary">
            </li>
            </ul>
          </div>
          <div class="col-md-10">
          <?php
          $_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
          switch ($_pages) {
            case "pelanggan":
              include('./daftar-pelanggan.php');
              break;
            case "dashboard":
              include('./dashboard.php');
              break;
            case "menu":
              include('./daftar-menu.php');
              break;
            case "pesanan":
              include('./daftar-pesanan.php');
              break;
            case "pembayaran":
              include('./pembayaran.php');
              break;
            case "pembayaran":
              include('./pembayaran.php');
              break;
            case "tambahpelanggan":
              include('./tambah-pelanggan.php');
              break;
            case "ubahpelanggan":
              include('./ubah-pelanggan.php');
              break;
            case "tambahmenu":
              include('./tambah-menu.php');
              break;
            case "ubahmenu":
              include('./ubah-menu.php');
              break;
            case "komentar":
              include('./daftar-komentar.php');
              break;
            case "pdf":
                include('./generate-pdf.php');
                break;
            default:
              include('./dashboard.php');
          }
        ?>
        </div>
</div>
    </main>
    <!-- footer -->
    <footer class="py-5 bg-dark text-light">
      <?php include('./inc_footer_admin.php');?>
    </footer>
    <!-- js -->
    <?php require_once('../parts/inc_js.php');?>
  </body>
</html>
