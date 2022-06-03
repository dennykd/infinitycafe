<?php
require '../koneksi.php';
$id = $_GET["id"];
 
if( hapus($id) > 0 ) {
    echo "<script>
    alert('Data deleted successfully!');
    document.location.href = './index-admin.php?page=pelanggan';
</script>";
}else{
    echo "<script>
        alert('Data failed to delete!');
        document.location.href = './index-admin.php?page=pelanggan';
    </script>";
}

?>