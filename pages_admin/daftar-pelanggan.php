<?php
require '../koneksi.php';

// $ambildata = mysqli_query($conn, "SELECT * FROM tb_users");

//pagination
$limit = 5;
$pagePagi = isset($_GET['pagePagi']) ? $_GET['pagePagi'] : 1;
$start = ($pagePagi - 1) * $limit;
$result = $conn->query("SELECT * FROM tb_users LIMIT $start, $limit");
$user = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id_user) AS id FROM tb_users");
$userCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $userCount[0]['id'];
// $total = isset($userCount['id']) ? count($userCount['id']) : 0;
$pages = ceil($total / $limit);

$previous = $pagePagi - 1;
$next = $pagePagi + 1;


if( isset($_POST["cari"])){
	$user = cari($_POST["keyword"]);
}
?>
<center>
<h3 class="mt-4"><b>CUSTOMER LIST</b></h3>
<hr class="bg-secondary">
</center>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4>Customer Data</h4>
					<form action="" method="post">
						<input type="text" name="keyword" autocomplete="off" placeholder="Enter keyword..." >
						<button type="submit" name="cari" class="bg-light">Find</button>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<tr>
						<th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>		
					</tr>
					<?php $i =1; ?>
					<?php foreach( $user as $data) : ?>
					<tr>
						<td><?= $i; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['level']; ?></td>
						<td>
							<a class="ubah btn btn-primary" href="?page=ubahpelanggan&id=<?php echo $data['id_user']; ?>">Edit</a> |
							<a class="hapus btn btn-danger" href="./delete-pelanggan.php?id=<?php echo $data['id_user']; ?>" onclick="return confirm('are you sure?');">Delete</a>					
						</td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</table>
			</div>
			<nav aria-label="Page navigation "
			<ul class="pagination justify-content-center">
				<li class="page-item">
				<a class="page-link" href="?page=pelanggan&pagePagi=<?= $previous; ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<?php for($i = 1; $i<=$pages; $i++) : ?>
				<li class="page-item"><a class="page-link" href="?page=pelanggan&pagePagi=<?= $i; ?>"><?= $i; ?></a></li>
				<?php endfor; ?>
				<li class="page-item">
				<a class="page-link" href="?page=pelanggan&pagePagi=<?= $next; ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
			</ul>
			</nav>
		</div>
	</div>
</div>

