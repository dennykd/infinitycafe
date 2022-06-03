<?php

$id = $_GET["id"];
 
if( hapusPesanan($id) > 0 ) {
    echo "<script>
    alert('Order successfully canceled!');
    window.location = './index.php?page=history';
</script>";
}else{
    echo "<script>
        alert('Order failed to cancel!');
        window.location = './index.php?page=history';
    </script>";
}

?>