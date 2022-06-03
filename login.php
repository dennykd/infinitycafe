<?php

session_start();
require 'koneksi.php';

if( isset($_SESSION["login"])) {
  header ("location: index.php");
  exit;
}

if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
  // cek username
  if( mysqli_num_rows($result) == 1 ) {
  // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify( $password, $row["password"])) {
          $_SESSION["login"] = true;
          $_SESSION["logindata"] = query("SELECT * FROM tb_users WHERE username = '$username'")[0];
          echo "<script>
          alert('Login success!');
          document.location = 'index.php';
          </script>";
          exit;
        }elseif($_POST["username"] == "admin" && $_POST["password"] == "admin"){
          $_SESSION["admin"] = true;
          echo "<script>
          alert('You are logged in as admin');
          document.location = './pages_admin/index-admin.php';
          </script>";
          exit;
        }else {
          echo "<script>
          alert('Data not found');
          document.location = 'login.php';
          </script>";
        }
  }

  $error = true;
} 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="form.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/13696713a4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet"/> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"/> 
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="logo/infinite.png" rel="icon" class="text-white">
    <title>Login</title>
  </head>
  <body>
    </div>
    <section class="login">
      <div class="container">
        <div class="row g-0 box mt-3">
          <div class="col-lg-5">
            <img src="img/login.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5 mt-5 pb-5 mb-5">
            <h1>Welcome To <span class="fw-bold">Infinity Cafe</span> </h1>
            <h4 class="fw-normal">Sign into your account</h4>
            <hr>
            <form action="" method="post" class="mt-4">
              <div class="form-row">
                <div class="col-lg-9">
                  <input type="text" name="username" class="form-control my-3 p-3" placeholder="Enter Your Username" autocomplete="off" />
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-9">
                  <input type="password" name="password" class="form-control my-3 p-3" placeholder="Enter Your Password" autocomplete="off" />
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-9">
                  <button type="submit" name="login" class="btn1 mt-2 mb-3">Login</button>
                </div>
              </div>
              <p>Don't have an account? <a class="daftar-login " href="registrasi.php">Register here</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>