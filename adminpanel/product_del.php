<?php
include 'connection.php';

$delete_id = $_GET['del_id'];
$query = "DELETE FROM product WHERE pro_id = '$delete_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'delete product Successfully',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'manage_product.php';
        }
    });
});
</script>";
} else {
    echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Error',
        text: 'product delete  error',
        icon: 'error',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'manage_product.php';
        }
    });
});
</script>";
}

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>