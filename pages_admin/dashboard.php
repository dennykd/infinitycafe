<?php
require '../koneksi.php';
$query1 = $conn->query("SELECT * FROM tb_users");
$query2 = $conn->query("SELECT * FROM tb_pesan");
$query3 = $conn->query("SELECT * FROM tb_menu");
$query4 = $conn->query("SELECT * FROM tb_kontak");

$jml_pelanggan = mysqli_num_rows($query1);
$jml_pesanan = mysqli_num_rows($query2);
$jml_menu = mysqli_num_rows($query3);
$jml_komentar = mysqli_num_rows($query4);
?>
<center>
    <h3 class="mt-4"><b>DASHBOARD</b></h3>
    <hr class="bg-secondary">
</center>

<div class="row text-white m-4 gap-5 justify-content-md-center">
    <div class="card bg-info" style="width: 18rem;">
        <div class="card-body">
            <div class="card-body-icon"><i class="fas fa-address-book me-1"></i>
            <h5 class="card-title" style="display: inline;">TOTAL CUSTOMERS</h5></div>
            <div class="display-4 fw-bolder"><?php echo number_format($jml_pelanggan,0,",","."); ?></div>
            <a href="./index-admin.php?page=pelanggan"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right"></i></p></a>
        </div>
    </div>
    <div class="card bg-warning" style="width: 18rem;">
        <div class="card-body">
            <div class="card-body-icon"><i class="fas fa-shopping-cart me-1"></i>
            <h5 class="card-title" style="display: inline;">TOTAL ORDERS</h5></div>
            <div class="display-4 fw-bolder"><?php echo number_format($jml_pesanan,0,",","."); ?></div>
            <a href="./index-admin.php?page=pesanan"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right"></i></p></a>
        </div>
    </div>
</div>
<div class="row text-white m-4 gap-5 justify-content-md-center">
    <div class="card bg-success" style="width: 18rem;">
        <div class="card-body">
            <div class="card-body-icon"><i class="fas fa-clipboard-list me-1"></i>
            <h5 class="card-title" style="display: inline;">TOTAL MENUS</h5></div>
            <div class="display-4 fw-bolder"><?php echo number_format($jml_menu,0,",","."); ?></div>
            <a href="./index-admin.php?page=menu"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right"></i></p></a>
        </div>
    </div>
    <div class="card bg-danger" style="width: 18rem;">
        <div class="card-body">
            <div class="card-body-icon"><i class="fas fa-comment-dots me-1"></i>
            <h5 class="card-title" style="display: inline;">TOTAL COMMENTS</h5></div>
            <div class="display-4 fw-bolder"><?php echo number_format($jml_komentar,0,",","."); ?></div>
            <a href="./index-admin.php?page=komentar"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right"></i></p></a>
        </div>
    </div>
</div>