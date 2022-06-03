
<div class="banner-image w-100 d-flex justify-content-center align-items-center">
      <div class="content mt-5 text-center">
        <h1 class="text-white text-3">MENU</h1>
        <p class="text-2 text-white">From the best specialty drinks menu to-heart warming foods, let's try it now</p>
      </div>
</div>
<!-- MENU START -->
<section class="menu py-7 py-md-9 border-bottom border-dark mt-5" id="tab">
  <div class="nav nav-tabs bg-dark justify-content-center mb-6 border-top border-bottom border-dark border-5 p-1"  role="tablist">
    <a class="nav-link text-tab <?= $class=$kategori == 'Coffee-based drinks'? 'active':NULL?> fw-bold" href="?page=menu&menu=Coffee-based drinks&#tab" >Coffee-based drinks</a>
    <a class="nav-link text-tab <?= $class=$kategori == 'Non-coffee drinks'? 'active':NULL?> fw-bold" href="?page=menu&menu=Non-coffee drinks&#tab" >Non-coffee drinks</a>
    <a class="nav-link text-tab <?= $class=$kategori == 'Food and snacks'? 'active':NULL?> fw-bold" href="?page=menu&menu=Food and snacks&#tab" >Food & snacks</a>
  </div>
  <div class="row mx-5 mt-5 mb-5">
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