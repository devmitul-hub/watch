<?php
include("connection.php");
if (isset($_GET['delete_id'])) {
    $del_id = $_GET['delete_id'];
    $delQu = "DELETE FROM category WHERE category_id ='$del_id'";
    $delEx = mysqli_query($conn, $delQu);
    if ($delEx) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Category delete Successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'manage_category.php';
                }
            });
        });
    </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Category delete error',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'manage_category.php';
                }
            });
        });
    </script>";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9">
    </script>