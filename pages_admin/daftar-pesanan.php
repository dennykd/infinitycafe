<?php
require '../koneksi.php';
// $ambildata = query("SELECT * FROM tb_pesan");

//pagination
$limit = 5;
$pagePagi = isset($_GET['pagePagi']) ? $_GET['pagePagi'] : 1;
$start = ($pagePagi - 1) * $limit;
$result = $conn->query("SELECT * FROM tb_pesan LIMIT $start, $limit");
$pesanan = $result->fetch_all(MYSQLI_ASSOC);

// menentukan banyak pages yang ada
$result1 = $conn->query("SELECT count(id_pesan) AS id FROM tb_pesan");
$pesanCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $pesanCount[0]['id'];
$pages = ceil($total / $limit);

$previous = $pagePagi - 1;
$next = $pagePagi + 1;

// jika tombol cari dipencet
if( isset($_POST["cari"])){
	$pesanan = cariPesanan($_POST["keyword"]);
}
	
?>
<center>
<h3 class="mt-4"><b>ORDER LIST</b></h3>
<hr class="bg-secondary">
</center>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h4>Order Data</h4>
		  <form action="" method="post">
			  <input type="text" name="keyword" autocomplete="off" placeholder="Enter keyword..." >
			  <button type="submit" name="cari" class="bg-light">Find</button>
		  </form>
        </div>
        <div class="table-responsive">
			<table class="table table-hover text-center" id="tablepesanan">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Customer Name</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Email</th>
						<th scope="col">Table</th>
						<th scope="col">Guests</th>
						<th scope="col">Date</th>	
						<th scope="col">Start Time</th>	
						<th scope="col">End Time</th>	
						<th scope="col">Status</th>	
						<th scope="col">Action</th>	
					</tr>
				<?php $i =1; ?>
				<?php foreach( $pesanan as $data) : ?>
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
							<a class="hapus btn btn-danger" href="./ubah-pesanan.php?id=<?php echo $data['id_pesan']; ?>" onclick="return confirm('are you sure to done this message?');">Done</a>					
						</td>
					</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>
		<nav aria-label="Page navigation "
			<ul class="pagination justify-content-center">
				<li class="page-item">
				<a class="page-link" href="?page=pesanan&pagePagi=<?= $previous; ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<?php for($i = 1; $i<=$pages; $i++) : ?>
				<li class="page-item"><a class="page-link" href="?page=pesanan&pagePagi=<?= $i; ?>"><?= $i; ?></a></li>
				<?php endfor; ?>
				<li class="page-item">
				<a class="page-link" href="?page=pesanan&pagePagi=<?= $next; ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
			</ul>
		</nav>
	</div>
</div>