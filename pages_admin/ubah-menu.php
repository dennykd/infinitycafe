<?php
require '../koneksi.php';

$id = $_GET["id"];

$menu = query("SELECT * FROM tb_menu WHERE id_menu =$id")[0];

if(isset($_POST["submit"])){
    
    if(ubahMenu($_POST) > 0){
        echo "<script>
        alert('Data changed successfully!');
        document.location.href = '?page=menu';
    </script>";
    } else{
        echo "<script>
        alert('Data failed to change!');
        // document.location.href = '?page=menu';
    </script> Ditambahkan";
    }
}
?>



<center>
    <h3 class="mt-4"><b>UBAH DATA MENU</b></h3>
    <hr class="bg-secondary">
</center>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_menu" value="<?= $menu["id_menu"]?>">
             <div class="m-4">
                <label class="form-label" for="nama_menu">Nama :</label>
                <input class="form-control" type="text" name="nama_menu" id="nama_menu" autocomplete="off" value="<?= $menu["nama_menu"] ?>">
            </div>
            <div class="m-4">
                <label class="form-label" for="keterangan">Keterangan :</label>
                <input class="form-control" type="text" name="keterangan" id="keterangan" autocomplete="off" value="<?= $menu["keterangan"] ?>">
            </div>
            <div class="m-4">
                <label class="form-label" for="kategori">Kategori :</label>
                <select class="form-control" name="kategori" id="kategori" autocomplete="off" value="<?= $menu["kategori"] ?>">
                    <option>Coffee-based drinks</option>
                    <option>Non-coffee drinks</option>
                    <option>Food and snacks</option>
                </select>
            </div>
            <div class="m-4">
                <label class="form-label" for="harga">Harga :</label>
                <input class="form-control" type="text" name="harga" id="harga" autocomplete="off" value="<?= $menu["harga"] ?>">
            </div>
            <div class="m-4">
                <label class="form-label" for="gambar_menu">Gambar :</label>
                <input class="form-control" type="file" name="gambar_menu" id="gambar_menu" value="<?= $menu["gambar_menu"] ?>">
            </div>
            <input type="hidden" name="oldImage" value="<?= $menu["gambar_menu"] ?>">
            <div class="m-4">
                <button class="btn btn-dark" type="submit" name="submit">Ubah Data</button>
        </div>
    </form>