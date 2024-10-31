<?php
include 'connection.php';

// echo "test";
// exit;
if (isset($_POST['carts_id'])) {
    $quantity = $_POST['quantity'];
    $carts_id = $_POST['carts_id'];
    // print_r($carts_id);
    // exit;
    $total = $_POST['total'];
    $update_cart_data = "UPDATE cart SET quantity='$quantity',total='$total' WHERE cart_id='$carts_id'";
    $update_cart_Ex = $conn->query($update_cart_data);
    
}


?>

<!-- <script>console.log('');</script> -->