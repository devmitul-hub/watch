<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> -->

<!-- Custom CSS -->
<?php
include("connection.php");
include("header.php");
session_start();

$u_id = $_SESSION['user_data']['user_id'];

if (isset($_POST["place_order"])) {

    $select_cart = $conn->query("SELECT * FROM cart WHERE user_id='" . $u_id . "' AND status='cart'");
    $totol_row = mysqli_num_rows($select_cart);
    // jetla cart ma data hase aatli var for loop farse
    for ($c_data = 0; $c_data < $totol_row; $c_data++) {
        $fetch_cart = mysqli_fetch_array($select_cart);


        $order_data = [
            'user_id' => $fetch_cart['user_id'],
            'cart_id' => $fetch_cart['cart_id'],
            'pro_name' => $fetch_cart['pro_name'],
            'pro_price' => $fetch_cart['pro_price'],
            'pro_quantity' => $fetch_cart['quantity'],
            'total' => $fetch_cart['total'],
            'grand_total' => $_SESSION['sub_total'],
            'date_time' => date('Y-m-d H-i-s')
        ];



        // add_product in minus quantity 
        $select_pro = $conn->query("SELECT * FROM product WHERE pro_name='" . $fetch_cart['pro_name'] . "'");
        $fetch_select_pro = mysqli_fetch_array($select_pro);

        // // echo "<pre>";
        $up_quantity = $fetch_select_pro['pro_quantity'] - $fetch_cart['quantity'];


        $up_quantity_tbl = $conn->query("UPDATE product set pro_quantity='" . $up_quantity . "' WHERE pro_name='" . $fetch_cart['pro_name'] . "'");

        // // out of stoke and availabel 
        if ($up_quantity == 0) {
            $out_of_stoke = "out of stoke";
            $up_pro_status_tbl = $conn->query("UPDATE product set pro_status='" . $out_of_stoke . "' WHERE pro_name='" . $fetch_cart['pro_name'] . "'");
        }


        // // cart table in status cart to change order
        $select_cart_data = $conn->query("SELECT * FROM cart where cart_id='" . $fetch_cart['cart_id'] . "'");
        $fetch_cart_data = mysqli_fetch_array($select_cart_data);
        $order_time = date('Y-m-d H-i-s');
        $up_status = $conn->query("UPDATE cart set order_time='$order_time', status='order' WHERE status='cart'");


        // insert data in order tbl
        $col = implode(',', array_keys($order_data));
        $vals = implode("','", array_values($order_data));

        $order_insert = mysqli_query($conn, "INSERT INTO order_details ($col) VALUES ('$vals')");

    }

    if ($order_insert) {
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Continue to Checkout',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'order_details.php';
            }
        });
    });
  </script>";
    } else {
        echo "<script>alert('try again');</script>";
    }
}
$user_id = $_SESSION['user_data']['user_id'];

?>
<style>
    body {
        background-color: #f8f9fa;
    }

    span {
        font-weight: bold;
        color: black;
    }

    .product-name {
        font-size: 18px !important;
        color: black !important;
    }

    .product-price {
        font-size: 15px !important;
    }

    .cart-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .cart-item img {
        width: 100px;
        height: auto;
    }

    option {
        color: black !important;
        font-size: 15px;
    }

    .cart-item .product-name {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .quantity-select {
        color: black !important;
        font-size: 17px !important;

    }

    .cart-item .product-price {
        font-size: 1.1rem;
        color: #28a745;
    }

    th {
        color: black !important;
        font-size: 15px;
    }

    td {
        color: black !important;
        font-size: 15px;
    }

    .cart-item .quantity-input {
        width: 60px;
    }

    .cart-summary {
        background-color: #f8f9fa;
        padding: 20px;
        border: 5px solid #dee2e6;
        border-radius: 5px;
    }

    .cart-summary h5 {
        font-size: 1.3rem;
        font-weight: bold;
    }

    .cart-summary .total-price {
        font-size: 1.5rem;
        color: #007bff;
    }

    .btn-update,
    .btn-remove {
        font-size: 0.9rem;
    }

    .checkout-btn {
        background-color: #007bff;
        color: white;
        width: 245px !important;
        font-size: 15px;
    }

    p {
        font-size: 13px;
    }

    .quantity-select {
        height: 24px;
        width: 85px;
        font-size: 13px;
    }

    .option {
        color: black !important;
    }

    .checkout-btn:hover {
        background-color: #0056b3;
    }

    .cart_summary {
        width: 265px;
        /* margin-top: 25px; */
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }
</style>
</head>

<body>

    <form method="POST">
        <section class="page__title__wrapper text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page__title__inner">
                            <h1 class="text-white">Cart</h1>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <h3 class="mb-0 me-3 text-white">Home</h3>
                        <i class="fa-solid fa-chevrons-right me-2 text-white"></i>
                        <h3 class="mb-0 text-white">Cart</h3>
                    </div>
                </div>
            </div>
        </section>
        <div class="container m-5">
            <div class="row">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border: 2px solid black;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $count = 1;
                            $query = $conn->query("SELECT * FROM cart WHERE user_id='" . $user_id . "' AND status='cart' ");
                            $sub_total = 0;
                            while ($fetch = mysqli_fetch_array($query)) {
                                $cart_id = $fetch['cart_id'];
                                $sub_total += $fetch['total'];
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><img src="./adminpanel/image/<?php echo $fetch['pro_img']; ?>" alt=""
                                            style="height:100px; width:100px;"></td>
                                    <td><?php echo $fetch['pro_name']; ?></td>
                                    <td id="<?php echo $pro_price_id; ?>"><?php echo $fetch['pro_price']; ?></td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="cart_id" value="<?php echo $fetch['cart_id']; ?>">
                                            <input type="hidden" name="cart_price"
                                                value="<?php echo $fetch['pro_price']; ?>">
                                            <select class="form-select quantity-select" name="quantity-select">
                                                <?php
                                                $pro_ids = $fetch['pro_id'];
                                                $sel_pro_unit = "SELECT pro_quantity FROM product WHERE pro_id = '$pro_ids'";
                                                $sel_pro_unit_Ex = $conn->query($sel_pro_unit);

                                                $fetch_pro_unit = $sel_pro_unit_Ex->fetch_assoc();

                                                for ($quan = 1; $quan <= $fetch_pro_unit['pro_quantity']; $quan++) {
                                                    ?>
                                                    <option value="<?php echo $quan; ?>" <?php
                                                       if ($quan == $fetch['quantity']) {
                                                           echo "selected";
                                                       }
                                                       ?>><?php echo $quan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </form>

                                    </td>
                                    </td>
                                    <!-- <td><input type="number" name="qty" id="<?php echo $qty_id; ?>" /></td> -->
                                    <td><?php echo $fetch['total']; ?></td>
                                    <td><a href="delete_cart.php?delet_cart_id=<?php echo $fetch['cart_id'] ?>"
                                            onclick="return confirm('are you sure you want to delete this record');"
                                            class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"
                                                style="color:white"></i></a></td>
                                </tr>
                                <?php
                                $count++;
                            }
                            ?>
                            <tr>
                                <td colspan="6" align="right">Total Amount:</td>
                                <td id="fetch_total_sub"><?php echo $sub_total; ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <!-- Cart Summary -->
                <div class="col-md-2 justify-content-end">
                    <div class="cart_summary text-dark" style="border: 2px solid black;">
                        <h3 class="text-dark text-center"> <span>GRAND TOTAL</span></h3>
                        <hr>
                        <p class="text-dark"><span>Subtotal :</span> ₹<?php echo $sub_total; ?></p>
                        <p class="total-price text-dark"> <span> Total : </span> ₹<?php echo
                            $_SESSION['sub_total'] = $sub_total; ?></p>

                        <input type="submit" value="place order" name="place_order" class="place_ordersss">

    </form>


    </div>
    </div>
    </div>
    </div>
    </form>
    <script>
        $(document).ready(function () {
            $('.quantity-select').change(function () {
                var form = $(this).closest('form');
                var cart_price = parseFloat(form.find('input[name="cart_price"]').val());
                var carts_id = parseFloat(form.find('input[name="cart_id"]').val());
                var qun = parseInt($(this).val());
                var total = cart_price * qun;

                console.log(`cart price : ${cart_price}`);
                console.log(`cart id : ${carts_id}`);
                console.log(`cart Quan : ${qun}`);
                console.log(`cart total : ${total}`);
                // console.log(carts_id);
                // console.log(qun);
                // console.log(total);
                $.ajax({
                    url: "up_quantity.php",
                    type: "POST",
                    data: {
                        quantity: qun,
                        carts_id: carts_id,
                        total: total

                    },
                    success: function (data) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
    <!-- // Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include("footer.php");
    ?>
</body>

</html>