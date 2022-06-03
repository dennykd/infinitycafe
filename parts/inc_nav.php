<?php

$id_user = $_SESSION["logindata"]["id_user"];

$user = query("SELECT * FROM tb_users WHERE id_user ='$id_user'")[0];

?>
<!-- Navbar  -->
<nav class="navbar nav-index fixed-top navbar-expand-lg navbar-dark p-md-3">
      <div class="container">
        <a class="nav-brand" href="index.php"><img src="logo/infinite.png" class="logo me-1 mb-1" alt="">INFINITY</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse gap-3" id="navbarNav">
          <div class="mx-auto"></div>
          <div class="nav-item">
              <a href="?page=aboutus">About Us</a>
              <a href="?page=menu">Menu</a>
              <a href="?page=reservation">Reservation</a>
              <a href="?page=galeri">Gallery</a>
              <a href="?page=contact">Contact</a>
          </div>
            <div class="dropdown">
              <button class="btn btn-outline-dark border-white border-2 dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                My Account
              </button>
              <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item " href="" data-bs-toggle="modal" data-bs-target="#profile">Profile</a></li>
                <li><a class="dropdown-item " href="?page=history">Detail Reservation</a></li>
                <li><a class="dropdown-item " href="logout.php">Logout</a></li>
              </ul>
            </div>
        </div>
      </div>
</nav>   

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="profileLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileLabel">Info Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="id_user" value="<?= $user["id_user"]?>">
              <div class="m-4">
                  <label class="form-label" for="username">Username :</label>
                  <input class="form-control" type="text" name="username" id="username" value="<?= $user["username"] ?>" disabled>
              </div>
              <div class="m-4">
                  <label class="form-label" for="email">Email :</label>
                  <input class="form-control" type="text" name="email" id="email" value="<?= $user["email"] ?>" disabled>
              </div>
              <div class="m-4">
                  <label class="form-label" for="level">Status :</label>
                  <input class="form-control" type="text" name="level" id="level" value="<?= $user["level"] ?>" disabled>
              </div>
              <!-- <div class="m-4">
                  <button class="btn btn-dark" type="submit" name="submit">Ubah Data</button>
              </div> -->
        </form>
      </div>
    </div>
  </div>
</div>