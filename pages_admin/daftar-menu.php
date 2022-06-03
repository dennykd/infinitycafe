<?php
require '../koneksi.php';
// $ambildata = query("SELECT * FROM tb_menu");

//pagination
$limit = 6;
$pagePagi = isset($_GET['pagePagi']) ? $_GET['pagePagi'] : 1;
$start = ($pagePagi - 1) * $limit;
$result = $conn->query("SELECT * FROM tb_menu LIMIT $start, $limit");
$menu = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id_menu) AS id FROM tb_menu");
$menuCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $menuCount[0]['id'];
// $total = isset($userCount['id']) ? count($userCount['id']) : 0;
$pages = ceil($total / $limit);

$previous = $pagePagi - 1;
$next = $pagePagi + 1;

// jika tombol cari dipencet
if( isset($_POST["cari"])){
	$menu = cariMenu($_POST["keyword"]);
}
	
?>
<center>
<h3 class="mt-4"><b>MENU LIST</b></h3>
<hr class="bg-secondary">
</center>
<div class="container">
  	<div class="row justify-content-md-center">
    	<div class="col-md-12">
    		<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 style="display: inline;">Menu Data | </h4><a class="btn btn-light mb-2" href="?page=tambahmenu">Add</a>
						<form action="" method="post">
						<input type="text" name="keyword" autocomplete="off" placeholder="Enter keyword..." >
						<button type="submit" name="cari" class="bg-light">Find</button>
					</form>
				</div>
				<div class="table-responsive">
					<table class="table table-hover text-center" id="tablemenu">
							<tr>
								<th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>	
                                <th scope="col">Action</th>	
							</tr>
						<?php $i =1; ?>
						<?php foreach( $menu as $data) : ?>
							<tr>
								<th><?= $i; ?></th>
								<td><?php echo $data['nama_menu']; ?></td>
								<td><?php echo $data['keterangan']; ?></td>
								<td><?php echo $data['kategori']; ?></td>
								<td><?php echo $data['harga']; ?></td>
								<td><img src="../img/menu/<?php echo $data['gambar_menu']; ?>" width="100" ></td>
								<td>
									<a class="ubah btn btn-primary" href="?page=ubahmenu&id=<?php echo $data['id_menu']; ?>">Edit</a> |
									<a class="hapus btn btn-danger" href="./delete-menu.php?id=<?php echo $data['id_menu']; ?>" onclick="return confirm('are you sure?');">Delete</a>					
								</td>
							</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</table>
				</div>
				<nav aria-label="Page navigation "
					<ul class="pagination justify-content-center">
						<li class="page-item">
						<a class="page-link" href="?page=menu&pagePagi=<?= $previous; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
						</li>
						<?php for($i = 1; $i<=$pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="?page=menu&pagePagi=<?= $i; ?>"><?= $i; ?></a></li>
						<?php endfor; ?>
						<li class="page-item">
						<a class="page-link" href="?page=menu&pagePagi=<?= $next; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
  	</div>
</div>