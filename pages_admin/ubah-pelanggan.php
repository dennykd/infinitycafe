<?php
require '../koneksi.php';
$id = $_GET["id"];
 
if( ubah($id) > 0 ) {
    echo "<script>
    alert('Data changed successfully!');
    window.location = './index-admin.php?page=pelanggan';
</script>";
}else{
    echo "<script>
        alert('Data failed to change!');
        window.location = './index-admin.php?page=pelanggan';
    </script>";
}

?>