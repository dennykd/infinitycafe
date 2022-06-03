<?php

$conn = mysqli_connect("localhost", "root", "", "db_restoran");

function registrasi($data) {
  global $conn;

  $username = mysqli_real_escape_string($conn, $data["username"]);
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  
  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username'");
  if( mysqli_fetch_assoc($result) ) {
      echo "<script>
              alert('username sudah terdaftar!');
            </script>";
    return false;
  }
  
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO tb_users VALUES(NULL, '$username', '$email', '$password', '')");

  return mysqli_affected_rows($conn);
}

function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($datauser){
  global $conn;

  $username = $datauser["username"];
  $email = $datauser["email"];
  $password = $datauser["password"];
  $level = $datauser["level"];

  $tambah = "INSERT INTO tb_users VALUES(NULL, '$username', '$email', '$password', '$level')";

  mysqli_query($conn, $tambah);
  return mysqli_affected_rows($conn);
}

function hapus($id) {
  global $conn;

  $hapus = "DELETE FROM tb_users WHERE id_user = $id";
  mysqli_query($conn,$hapus);
  return mysqli_affected_rows($conn);
}

function ubah($id) {
  global $conn;
  
  $ubah = "UPDATE tb_users SET
  level = 'Pelanggan'
  WHERE id_user = $id
  ";

  mysqli_query($conn, $ubah);
  return mysqli_affected_rows($conn);
}

function cari($keyword) {
  $query = "SELECT * FROM tb_users WHERE 
            username LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            level LIKE '%$keyword%'
            ";
  return query($query);
}

function tambahMenu($datamenu){
  global $conn;

  $nama_menu = $datamenu["nama_menu"];
  $keterangan = $datamenu["keterangan"];
  $kategori = $datamenu["kategori"];
  $harga = $datamenu["harga"];

  // upload gambar
  $gambar_menu = upload();
  if( !$gambar_menu){
    return false;
  }

  $tambah = "INSERT INTO tb_menu VALUES(NULL, '$nama_menu', '$keterangan', '$kategori', '$harga','$gambar_menu')";

  mysqli_query($conn, $tambah);
  return mysqli_affected_rows($conn);
}

function upload(){
  $namaGambar = $_FILES['gambar_menu']['name'];
  $ukuranFile = $_FILES['gambar_menu']['size'];
  $error = $_FILES['gambar_menu']['error'];
  $tmpName = $_FILES['gambar_menu']['tmp_name'];

  // cek apakah gambar telah diupload
  if( $error === 4) {
    echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!');
    </script>";
    return false;
  }
  // cek type gambar yang diupload
  $typeGambarValid = ['jpg', 'jpeg', 'png'];
  $typeGambar = explode('.', $namaGambar);
  $typeGambar = strtolower(end($typeGambar));
  if( !in_array($typeGambar, $typeGambarValid)) {
    echo "<script>
        alert('File Yang Anda Masukkan Salah!');
    </script>";
    return false;
  }

  // cek ukuran file
  if( $ukuranFile > 2000000 ) {
    echo "<script>
        alert('File Yang Anda Masukkan Terlalu Besar !');
    </script>";
    return false;
  }
  // lolos pengecekan, siap diupload
  move_uploaded_file($tmpName, '../img/menu/' . $namaGambar);

  return $namaGambar;

}

function up(){
  $namaGambar = $_FILES['gambar_menu']['name'];
  $ukuranFile = $_FILES['gambar_menu']['size'];
  $error = $_FILES['gambar_menu']['error'];
  $tmpName = $_FILES['gambar_menu']['tmp_name'];
  move_uploaded_file($tmpName, '../img/menu/' . $namaGambar);

  return $namaGambar;
}

function ubahMenu($datamenu) {
  global $conn;

  $id = $datamenu["id_menu"];
  $nama_menu = $datamenu["nama_menu"];
  $keterangan = $datamenu["keterangan"];
  $kategori = $datamenu["kategori"];
  $harga = $datamenu["harga"];
  $gambar_menu =up();

  if( $_FILES["gambar_menu"]["error"]===4){
    $gambar_menu = $datamenu["oldImage"];
  }

  $ubah = "UPDATE tb_menu SET 
  nama_menu = '$nama_menu',
  keterangan = '$keterangan',
  kategori = '$kategori',
  harga = '$harga',
  gambar_menu = '$gambar_menu'
  WHERE id_menu = $id
  ";

  mysqli_query($conn, $ubah);
  return mysqli_affected_rows($conn);
}

function hapusMenu($id) {
  global $conn;

  $hapusMenu = "DELETE FROM tb_menu WHERE id_menu = $id";
  mysqli_query($conn,$hapusMenu);
  return mysqli_affected_rows($conn);
}

function cariMenu($keyword) {
  $query = "SELECT * FROM tb_menu WHERE 
            nama_menu LIKE '%$keyword%' OR
            keterangan LIKE '%$keyword%' OR
            kategori LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            gambar_menu LIKE '%$keyword%'
            ";
  return query($query);
}

function pesan($data){
  global $conn;

  $id_user = $data["id_user"];
  $nama = $data["nama_lengkap"];
  $nomer = $data["no_telp"];
  $email = $data["email"];
  $table = $data["tables"];
  $jumlah = $data["jumlah"];
  $tgl = $data["tgl_pesan"];
  $start = $data["start_time"];
  $end = $data["end_time"];


  $checked = query("SELECT * FROM tb_pesan WHERE tables = $table AND tgl_pesan = '$tgl' AND CAST(start_time AS TIME) BETWEEN '$start' AND '$end' OR CAST(end_time AS TIME) BETWEEN '$start' AND '$end'");
  
  $pesan = "INSERT INTO tb_pesan VALUES(NULL, '$id_user', '$nama', '$nomer', '$email','$table', '$jumlah', '$tgl', '$start', '$end', 0)";
  
  if(count($checked)>0){
    return 0;
  } else {
    mysqli_query($conn, $pesan);
  }
  return mysqli_affected_rows($conn);
}

function cariPesanan($keyword) {
  $query = "SELECT * FROM tb_pesan WHERE 
            nama_lengkap LIKE '%$keyword%' OR
            no_telp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jumlah LIKE '%$keyword%' OR
            tgl_pesan LIKE '%$keyword%' OR
            start_time LIKE '%$keyword%' OR
            end_time LIKE '%$keyword%' OR
            status_pesanan LIKE '%$keyword%'
            ";
  return query($query);
}

function hapusPesanan($id) {
  global $conn;

  $hapusPesanan = "DELETE FROM tb_pesan WHERE id_pesan = $id";
  mysqli_query($conn,$hapusPesanan);
  return mysqli_affected_rows($conn);
}

function ubahPesanan($id) {
  global $conn;

  $ubahPesanan = "UPDATE tb_pesan SET 
  status_pesanan = 1
  WHERE id_pesan = $id
  ";

  mysqli_query($conn, $ubahPesanan);
  return mysqli_affected_rows($conn);
}

function komen($data){
  global $conn;
  
  $first_name = $data["first_name"];
  $last_name = $data["last_name"];
  $email = $data["email"];
  $nomor = $data["no_telp"];
  $komentar = $data["komentar"];
  $komen = "INSERT INTO tb_kontak VALUES(NULL, '$first_name', '$last_name', '$email','$nomor', '$komentar')";

  mysqli_query($conn, $komen);
  return mysqli_affected_rows($conn);
}

function cariKomentar($keyword) {
  $query = "SELECT * FROM tb_kontak WHERE 
            first_name LIKE '%$keyword%' OR
            last_name LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            no_telp LIKE '%$keyword%' OR
            komentar LIKE '%$keyword%'
            ";
  return query($query);
}
?>