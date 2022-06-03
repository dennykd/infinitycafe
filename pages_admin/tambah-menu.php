<?php
require '../koneksi.php';


if(isset($_POST["submit"])){
    

    if(tambahMenu($_POST) > 0){
        echo "<script>
        alert('Data added successfully!');
        document.location.href = '?page=menu';
    </script>";
    } else{
        echo "<script>
        alert('Data failed to add!');
        document.location.href = '?page=menu';
    </script> Ditambahkan";
    }
}
?>



<center>
    <h3 class="mt-4"><b>TAMBAH DATA MENU</b></h3>
    <hr class="bg-secondary">
</center>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="m-4">
                <label class="form-label" for="nama_menu">Nama :</label>
                <input class="form-control" type="text" name="nama_menu" id="nama_menu" autocomplete="off" >
            </div>
            <div class="m-4">
                <label class="form-label" for="keterangan">Keterangan :</label>
                <input class="form-control" type="text" name="keterangan" id="keterangan" autocomplete="off">
            </div>
            <div class="m-4">
                <label class="form-label" for="kategori">Kategori :</label>
                <select class="form-control" name="kategori" id="kategori" >
                    <option>Coffee-based drinks</option>
                    <option>Non-coffee drinks</option>
                    <option>Food and snacks</option>
                </select>
            </div>
            <div class="m-4">
                <label class="form-label" for="harga">Harga :</label>
                <input class="form-control" type="text" name="harga" id="harga" autocomplete="off">
            </div>
            <div class="m-4">
                <label class="form-label" for="gambar_menu">Gambar :</label>
                <input class="form-control" type="file" name="gambar_menu" id="gambar_menu" >
            </div>
            <div class="m-4">
                <button class="btn btn-dark" type="submit" name="submit">Tambah Data</button>
            </div>
    </form>