<?php 
session_start();
include('koneksi.php');

if( !isset($_SESSION["login"])) {
  header ("location: login.php");
  exit;
}

if ( isset($_POST["pesan"])) {

$error = pesan($_POST);
    if( $error > 0) {
      echo "<script>
            alert('Order success!');
            document.location = 'index.php?page=history';
            </script>"; 
    } else if($error == 0){
      echo "<script>
      alert('The table you ordered at that hour has already been booked!');
      </script>";
    }else{
      echo "<script>
            alert('Order failed!');
            </script>"; 
    }
}


$kategori = "Coffee-based drinks";
if(isset($_GET["menu"])){
  $kategori = $_GET["menu"];
  
}

$collect = query("SELECT * FROM tb_menu WHERE kategori ='$kategori'"); 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once('./parts/inc_meta.php');?>
    <title>Infinity Cafe</title>
  </head>
  <body>
    <!-- header -->
    <header>
      <?php include('./parts/inc_nav.php');?>
    </header>
    <!-- body -->
    <main>
      <div class="my-5">
        <?php include('./pages.php');?>
      </div>
    </main>
    <!-- footer -->
    <footer class="py-5 bg-dark text-light">
      <?php include('./parts/inc_footer.php');?>
    </footer>
    <!-- js -->
    <?php require_once('./parts/inc_js.php');?>
  </body>
</html>
