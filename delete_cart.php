<?php
include("connection.php");
$get_delet = $_GET['delet_cart_id'];

$update = $conn->query("update cart set status='delete' where cart_id='" . $get_delet . "'");
if ($update) {
    header("location:cart.php");
}else{
    echo "<script>alert('try again');</script>";
}
?>