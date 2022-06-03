<!DOCTYPE html>
<head>
	<title>Infinity Cafe</title>
</head>
<body>
 
	<center>
		<h3>ORDER REPORT</h3> <hr/><br/>
	</center>
 
	<?php 
	require '../koneksi.php';
	?>
    
        <div class="table-responsive">
				<table class="table table-hover text-center" border="1" style="width: 100%">
					<tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order Status</th>		
					</tr>

				<?php 
                $i = 1;
                $sql = mysqli_query($conn,"SELECT * FROM tb_pesan");
                while($data = mysqli_fetch_array($sql)){
                ?>
					<tr>
						<th><?= $i; ?></th>
						<td><?php echo $data['nama_lengkap']; ?></td>
						<td><?php echo $data['no_telp']; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
                        <td><?php $data['status_pesanan']; 
                                if ($data['status_pesanan'] == 0) {
                                    echo 'Successed';
                                    } elseif ($data['status_pesanan'] == 1) {
                                    echo 'Done';
                                    } else{
                                    echo 'Invalid';
                                    } 
                            ?>
                        </td>
					</tr>
                    <?php $i++; ?>
                    <?php } ?>
			    </table>
        </div>
	<script>
		window.print();
	</script>
</body>
