<?php
include("header.php");
$user_id = $_SESSION['user_data']['user_id'];

$product_details = $_GET['product_pass_id'];

$query = $conn->query("SELECT * FROM product where pro_id='" . $product_details . "'");
$fetch = mysqli_fetch_array($query);


if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_data'])) {
        session_start();
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Please Login First Then Add To Cart',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        });
      </script>";
    } else {
        $cartdata = [
            'user_id' => $user_id,
            'pro_id' => $fetch['pro_id'],
            'pro_name' => $fetch['pro_name'],
            'pro_price' => $fetch['pro_price'],
            'quantity' => 1,
            'total' => $fetch['pro_price'],
            'pro_img' => $fetch['pro_img'],
            'date_time' => date("Y-m-d H:i:s")
        ];

        $col = implode(',', array_keys($cartdata));
        $val = implode("','", array_values($cartdata));

        $insert = $conn->query("INSERT INTO cart ($col) VALUES ('$val')");

        if ($insert) {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Added to cart successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'cart.php';
                }
            });
        });
        </script>";
        } else {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cart error',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'product_page.php';
                }
            });
        });
        </script>";
        }
    }
}

?>
<div class="container">
    <div class="product-container">
        <div class="product-image">
            <form method="POST">
                <img src="./adminpanel/image/<?php echo $fetch['pro_img']; ?>" data-aos="fade-up"
                    data-aos-anchor-placement="bottom-bottom">
                <div class="thumbnail-images">
                    <img src="./adminpanel/image/<?php echo $fetch['pro_img']; ?>" data-aos="fade-up"
                        data-aos-anchor-placement="bottom-bottom">
                    <img src="./adminpanel/image/<?php echo $fetch['pro_img']; ?>" data-aos="fade-up"
                        data-aos-anchor-placement="bottom-bottom">
                </div>
        </div>
        <div class="product-details">
            <h1 class="pro_del_h1"><?php echo $fetch['pro_name']; ?></h1>
            <h3 class="description"><?php echo $fetch['pro_disc']; ?></h3>
            <div class="price">
            <span class="original-price">₹<?php echo $fetch['pro_discount']."<br>"; ?></span>

                <h3 class="current-price">₹<?php echo $fetch['pro_price']; ?></h3>
            </div>
            <form method="POST">
                <button name="add_to_cart" type="submit" class="add_to_cart">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i> Add To Cart
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    AOS.init();
</script>
<?php
include("footer.php");
?>