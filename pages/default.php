<?php
$datauser = $_SESSION["logindata"];

?>

<!-- HEADER START -->
<section class="header">
  <div class="banner-image vh-100 d-flex justify-content-center align-items-center">
    <div class="content text-center">
      <h1 class="text-white text-3">INFINITY CAFE</h1>
      <hr style="background-color: #f5a637; height: 3px; opacity: 100%; margin-top: -5px;">
      <p class="text-2 text-white">A unique café located in the heart of Bali. Always fresh coffee and biscuits.<br> Open for indoor dining and to-go orders.</p>
      <a class="btn btn-outline-light border-2 rounded-pill" href="#reservation">Make Reservation</a>
    </div>
  </div>  
</section>
<!-- HEADER END -->

<!-- ABOUT START -->
<section class="about pt-5">
  <h1 class="mt-5 text-center fw-bold"><span>ABOUT</span> US</h1>
  <div class="container-fluid mt-5 bg-dark text-white border-top border-bottom border-dark">
    <div class="row m-5">
        <img src="img/aboutus.jpg" class="col-md-4 col-sm float-md-start float-sm-start float-start rounded-circle" alt="Coffee">
        <div class="about-text col-md-8 col-sm pt-5">
            <h1>What makes our coffee special?</h1>
            <p>I wanted to take this time to let you know how grateful we are to have you choosing us for your coffee needs. Quality coffee is a passion for me and I am so thankful for your patronage which allows me to do this. I wanted to share a little about our coffees, and why I think they are so special</p>
            <p>we buy our coffee from only the most reputable farms and mills in Banyuwangi, We buy only from reputable farmers and millers at volumes equal to several hundred acres. We grade our coffees into different sizes and quality</p>
            <p>throw out the lower quality beans and blind taste our grades and types individually to find the best roasting temperature that bring out the best taste for that specific size and coffee bean - different roasting temperatures for different coffee. We do this constantly to maintain a consistent and high-quality roast every time. 
  </p>
            <p>As you may have already experienced, you don't have to add cream and sweetener to drink our coffee - it has a smoother and less acidic taste without cream because of this aging process. You may have waited a bit longer for your coffee but we can guarantee you received the freshest coffee anywhere.</p>
        </div>        
    </div>
  </div>
</section>
<!-- ABOUT END -->

<!-- CONTENT START -->
<section class="content pt-5">
<div class="text-center mt-5">
    <!-- Heading -->
    <h1 class="mb-5 fw-bold"><span>OUR</span> VIBES</h1>
</div>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/vibes1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/vibes2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/vibes3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/vibes4.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
<!-- CONTENT END -->

<!-- MENU START -->
<section class="menu py-7 py-md-9 border-bottom border-dark pt-5" id="tab">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 text-center">
          <!-- Heading -->
          <h1 class="mb-5 fw-bold"><span>OUR</span> MENU</h1>
      </div>
    </div>
  </div>
  <div class="nav nav-tabs bg-dark justify-content-center mb-6 border-top border-bottom border-dark border-5 p-1"  role="tablist">
    <a class="nav-link text-tab <?= $class=$kategori == 'Coffee-based drinks'? 'active':NULL?> fw-bold" href="?menu=Coffee-based drinks&#tab" >Coffee-based drinks</a>
    <a class="nav-link text-tab <?= $class=$kategori == 'Non-coffee drinks'? 'active':NULL?> fw-bold" href="?menu=Non-coffee drinks&#tab" >Non-coffee drinks</a>
    <a class="nav-link text-tab <?= $class=$kategori == 'Food and snacks'? 'active':NULL?> fw-bold" href="?menu=Food and snacks&#tab" >Food & snacks</a>
  </div>
  <div class="row mx-5">
    <div class="row mx-auto">
        <div class="col-12">
          <!-- Content -->
          <div class="tab-content" id="menuContent">
            <div class="tab-pane fade show active" id="mains" role="tabpanel" aria-labelledby="mainsTab">
              <div class="row">
                
                <?php foreach ($collect as $data):?>
                  <div class="col-12 col-md-6">
                    <div class="py-3 border-bottom">
                      <div class="row">
                        <div class="col-3 align-self-center">
                          <!-- Image -->
                          <div class="ratio ratio-1x1">
                            <img class="img-menu object-fit-cover rounded-circle shadow p-1 mb-5 bg-body rounded" src="img/menu/<?= $data["gambar_menu"]; ?>">
                          </div>
                        </div>
                        <div class="col-7">
                          <!-- Heading -->
                          <h5 class="mb-2 fw-bolder"><?= $data["nama_menu"]; ?></h5>
                          <!-- Text -->
                          <p class="mb-0"><?= $data["keterangan"]; ?></p>
                        </div>
                        <div class="col-2">
                          <!-- Price -->
                          <div class=" price fs-4 fw-bold text-center"><?= $data["harga"]; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>

              </div>
            </div>                
          </div>
        </div>              
    </div>
  </div>
</section>
<!-- MENU END -->

<!-- RESERVATION START -->
<div class="heading pt-5" id="reservation">
  <h1 class="mt-5 text-center resevation-text fw-bold"><span>MAKE</span> RESERVATION</h1>
</div>
<section id="reservation" class="reservation py-7 py-md-9 pb-2 bg-dark text-white">
<div class="container">
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

<!-- GALLERY START -->
<section class="gallery min-vh-100 pt-5" id="galeri">
  <div class="container-lg">
    <div class="row justify-content-center mt-5 mb-3">
      <div class="col-12 col-md-8 col-lg-6 text-center">
          <!-- Heading -->
          <h1 class="mb-2 fw-bold"><span>OUR</span> GALLERY</h1>
      </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
      <div class="col">
        <img src="img/7.jpg" class="gallery-item" alt="Gallery1">
      </div>
      <div class="col">
        <img src="img/8.jpg" class="gallery-item" alt="Gallery2">
      </div>
      <div class="col">
        <img src="img/9.jpg" class="gallery-item" alt="Gallery3">
      </div>
      <div class="col">
        <img src="img/10.jpg" class="gallery-item" alt="Gallery4">
      </div>
      <div class="col">
        <img src="img/11.jpg" class="gallery-item" alt="Gallery5">
      </div>
      <div class="col">
        <img src="img/12.jpg" class="gallery-item" alt="Gallery6">
      </div>
      <div class="col">
        <img src="img/13.jpg" class="gallery-item" alt="Gallery7">
      </div>
      <div class="col">
        <img src="img/14.jpg" class="gallery-item" alt="Gallery8">
      </div>
      <div class="col">
        <img src="img/15.jpg" class="gallery-item" alt="Gallery9">
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="gallery-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="img/1.jpg" class="modal-img" alt="Modal Image">
      </div>
    </div>
  </div>
</div>

<!-- GALLERY END -->
<div class="topcontrol" title="Scroll Back to Top" style="position: fixed; bottom: 10px; right: 10px; opacity: 1; cursor: pointer;">
  <i class="fas fa-arrow-alt-circlecle-up fa-3x"></i>
</div>

