<?php
require '../koneksi.php';
// $ambil = query("SELECT * FROM tb_kontak");

//pagination
$limit = 5;
$pagePagi = isset($_GET['pagePagi']) ? $_GET['pagePagi'] : 1;
$start = ($pagePagi - 1) * $limit;
$result = $conn->query("SELECT * FROM tb_kontak LIMIT $start, $limit");
$komentar = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id_kontak) AS id FROM tb_kontak");
$komentarCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $komentarCount[0]['id'];
// $total = isset($userCount['id']) ? count($userCount['id']) : 0;
$pages = ceil($total / $limit);

$previous = $pagePagi - 1;
$next = $pagePagi + 1;

// jika tombol cari dipencet
if( isset($_POST["cari"])){
	$komentar = cariKomentar($_POST["keyword"]);
}
	
?>
<center>
<h3 class="mt-4"><b>COMMENT LIST</b></h3>
<hr class="bg-secondary">
</center>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h4>Comment Data</h4>
		  <form action="" method="post">
			  <input type="text" name="keyword" autocomplete="off" placeholder="Enter keyword..." >
			  <button type="submit" name="cari" class="bg-light">Find</button>
		  </form>
        </div>
        <div class="table-responsive">
			<table class="table table-hover text-center">
					<tr>
						<th scope="col">No</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Comment</th>	
					</tr>
				<?php $i =1; ?>
				<?php foreach( $komentar as $data) : ?>
					<tr>
						<th><?= $i; ?></th>
						<td><?php echo $data['first_name']; ?></td>
						<td><?php echo $data['last_name']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['no_telp']; ?></td>
						<td><?php echo $data['komentar']; ?></td>
					</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>
		<nav aria-label="Page navigation "
			<ul class="pagination justify-content-center">
				<li class="page-item">
				<a class="page-link" href="?page=komentar&pagePagi=<?= $previous; ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<?php for($i = 1; $i<=$pages; $i++) : ?>
				<li class="page-item"><a class="page-link" href="?page=komentar&pagePagi=<?= $i; ?>"><?= $i; ?></a></li>
				<?php endfor; ?>
				<li class="page-item">
				<a class="page-link" href="?page=komentar&pagePagi=<?= $next; ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
			</ul>
			</nav>
	  </div>
	</div>
  </div>
</div>