<?php
$datauser = $_SESSION["logindata"]['id_user'];

$ambilpesan = query("SELECT * FROM tb_pesan WHERE id_user ='$datauser'");

?>
<div class="banner-image w-100 d-flex justify-content-center align-items-center">
      <div class="content mt-5 text-center">
        <h1 class="text-white text-3">DETAIL RESERVATION</h1>
        <p class="text-2 text-white">Take us with you, enjoy your day!</p>
      </div>
</div>
<!-- START HISTORY -->
<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h4>Details Reservation</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Fullname</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Tables</th>
                <th scope="col">Guests</th>
                <th scope="col">Order Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Order Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php $i =1; ?>
				<?php foreach( $ambilpesan as $data) : ?>
				<tbody>
					<tr>
						<th><?= $i; ?></th>
						<td><?php echo $data['nama_lengkap']; ?></td>
						<td><?php echo $data['no_telp']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['tables']; ?></td>
						<td><?php echo $data['jumlah']; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
						<td><?php echo $data['start_time']; ?></td>
						<td><?php echo $data['end_time']; ?></td>
						<td><?php
                    if ($data['status_pesanan'] == 0) {
                    echo 'Successed';
                    } elseif ($data['status_pesanan'] == 1) {
                    echo 'Done';
                    } else{
                    echo 'Invalid';
                    }
                ?>
						</td>
            <td>
            <a class="hapus btn btn-danger" href="./index.php?page=batal&id=<?php echo $data['id_pesan']; ?>" onclick="return confirm('are you sure?');">Cancel</a>		
            </td>			
					</tr>
				</tbody>
				<?php $i++; ?>
				<?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
