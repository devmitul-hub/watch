<?php
session_start();
include("connection.php");

if (isset($_POST['add_product'])) {
    $path = 'image/';
    $filename = $_FILES['pro_image']['name'];
    $tmpname = $_FILES['pro_image']['tmp_name'];

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_disc = $_POST['product_disc'];
    $pro_image = $filename;
    $product_price = $_POST['pro_price'];
    $pro_discount = $_POST['pro_discount'];
    $pro_quantity = $_POST['pro_quantity'];
    $date = date('Y-m-d H:i:s');

    $query = "INSERT  INTO  product(pro_name,pro_cate_id,pro_disc,pro_img,pro_price,pro_discount,pro_quantity,date_time) values('$product_name',$product_category,'$product_disc','$pro_image','$product_price',$pro_discount,$pro_quantity,'$date')";
    $result = mysqli_query($conn, $query);
    // echo $result;
    // exit;
    if ($result) {
        move_uploaded_file($tmpname, $path . $filename);
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Product Add Successfully',
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
            text: 'try again',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'add_product.php';
            }
        });
    });
  </script>";
    }
}

include("header.php");
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Add product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Offer</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Offer</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name"
                                        placeholder="Enter product name">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Product category</label>
                                    <select class="form-control" name="product_category" fdprocessedid="cvkasw"
                                        required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $select = mysqli_query($conn, "SELECT * FROM category");
                                        while ($fetch = mysqli_fetch_array($select)) {
                                            ?>
                                            <option value="<?php echo $fetch['category_id']; ?>">
                                                <?php echo $fetch['category_name']; ?>
                                            </option>
                                            <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Product Discription</label>
                                    <input type="text" class="form-control" name="product_disc" id="product_disc"
                                        placeholder="Enter product Discription">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Product image</label>
                                    <input type="file" class="form-control" name="pro_image" id="pro_image">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Product price</label>
                                    <input type="text" class="form-control" name="pro_price" id="product_price"
                                        placeholder="Enter product price">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Product discount price</label>
                                    <input type="text" class="form-control" name="pro_discount" id="product_price"
                                        placeholder="Enter product discount price">
                                </div>
                                <div class="form-group">
                                    <label for="pro_quantity">Product quantity</label>
                                    <input type="text" class="form-control" name="pro_quantity" id="pro_quantity"
                                        placeholder="Enter product quantity ">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="add_product" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>
<?php
include("footer.php");
?>