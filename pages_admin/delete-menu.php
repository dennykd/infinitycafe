<?php
require '../koneksi.php';
$id = $_GET["id"];
 
if( hapusMenu($id) > 0 ) {
    echo "<script>
    alert('Data successfully deleted!');
    window.location = './index-admin.php?page=menu';
</script>";
}else{
    echo "<script>
        alert('Data failed to delete!');
        window.location = './index-admin.php?page=menu';
    </script>";
}

?>