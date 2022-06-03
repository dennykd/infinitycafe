<?php
$datauser = $_SESSION["logindata"];

?>
<div class="banner-image w-100 d-flex justify-content-center align-items-center">
      <div class="content mt-5 text-center">
        <h1 class="text-white text-3">RESERVATION</h1>
        <p class="text-2 text-white">Let's enjoy the new vibes by making a reservation below!</p>
      </div>
</div>
<!-- RESERVATION START -->
<section id="reservation" class="reservation py-7 py-md-9 pb-2 bg-dark text-white">
<div class="container mt-5">
  <div class="row justify-content-lg-center mb-4">
    <div class="col-lg-8 mt-5">
      <form class="reservationForm" action="" method="post">
        <div class="row gx-3">
          <div class="col-md-6">
          <input type="hidden" name="id_user" value="<?= $datauser["id_user"]?>">
            <!-- FULL NAME -->
            <div class="mb-3">
              <label class="visually" for="nama_lengkap">Full Name</label>
              <input type="text" class="form-control" name="nama_lengkap" placeholder="Enter your full name" autocomplete="off">
            </div>
            <!-- PHONE NUMBER -->
            <div class="mb-3">
            <label class="visually" for="no_telp">Phone Number</label>
              <input type="tel" class="form-control" name="no_telp" placeholder="Enter your phone number" autocomplete="off">
            </div>
            <!-- EMAIL ADDRESS -->
            <div class="mb-3">
            <label class="visually" for="email">Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email address" autocomplete="off">
            </div>
            <!-- TABLE -->
            <div class="mb-3">
                  <label class="visually" for="tables">Tables</label>
                  <select name="tables" class="form-select" >
                  <option value="0" selected="" disabled>Tables</option>
                    <option value="1">Table 01</option>
                    <option value="2">Table 02</option>
                    <option value="3">Table 03</option>
                    <option value="4">Table 04</option>
                    <option value="5">Table 05</option>
                  </select>
            </div>
          </div>
          <div class="col-md-6">
            <!-- GUESTS -->
            <div class="mb-3">
              <label class="visually" for="jumlah">Guests</label>
              <select name="jumlah" class="form-select" >
                <option value="1">1 person</option>
                <option value="2">2 person</option>
                <option value="3">3 person</option>
                <option value="4">4 person</option>
                <option value="5">5 person</option>
              </select>
            </div>
            <!-- DATE -->
            <div class="mb-3">
              <label class="visually" for="tgl_pesan">Date</label>
              <input type="date" name="tgl_pesan" class="form-control" value="" >
            </div>
            <!-- TIME -->
            <div class="mb-3">
              <label class="visually" for="start_time">Start Time</label>
              <input type="time" class="form-control" name="start_time" value="">
            </div>
            <div class="mb-3">
              <label class="visually" for="end_time">End Time</label>
              <input type="time" class="form-control" name="end_time" value="">
            </div>
          </div>
          <!-- BUTTON -->
          <div class="col text-center mt-3">
              <button class="btn btn-outline-light rounded-pill" name="pesan" type="submit">Reserve a Table</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<!-- RESERVATION END -->