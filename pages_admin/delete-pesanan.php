<?php
require '../koneksi.php';
$id = $_GET["id"];
 
if( hapusPesanan($id) > 0 ) {
    echo "<script>
    alert('Order successfully deleted!');
    window.location = './index-admin.php?page=pesanan';
</script>";
}else{
    echo "<script>
        alert('Order failed to delete!');
        window.location = './index-admin.php?page=pesanan';
    </script>";
}

?>