<?php
session_start();
include 'connection.php';
include("header.php");

$update_id = $_GET['update_id'];
// echo $update_id;
if (isset($_POST['update_product'])) {
    $path = "image/";
    $filename = $_FILES["category_image"]['name'];
    $tmpname = $_FILES["category_image"]["tmp_name"];

    print_r($filename);

    $pro_name = $_POST['pro_name'];
    $product_category = $_POST['product_category'];
    $pro_disc = $_POST['pro_disc'];
    $pro_img = $filename;
    $pro_price = $_POST['pro_price'];
    $pro_discount = $_POST['pro_discount'];
    $pro_quantity = $_POST['pro_quantity'];
    if ($pro_img != '') {
        $q = "UPDATE product SET pro_name='$pro_name', pro_cate_id='$product_category', pro_disc='$pro_disc', pro_img='$pro_img', pro_price='$pro_price',pro_discount='$pro_discount',pro_quantity='$pro_quantity' WHERE pro_id='$update_id'";
        $result = mysqli_query($conn, $q);
        move_uploaded_file($tmpname, $path . $filename);

        if ($result) {
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'product update Successfully',
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
            text: 'product update  error',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'update_product.php';
            }
        });
    });
</script>";
        }
    } else {
        $q = "UPDATE product SET pro_name='$pro_name', pro_cate_id='$product_category', pro_disc='$pro_disc', pro_price='$pro_price',pro_discount='$pro_discount',pro_quantity='$pro_quantity' WHERE pro_id='$update_id'";
        $result = mysqli_query($conn, $q);

        if ($result) {
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'product update Successfully',
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
            text: 'product update  error',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'update_product.php';
            }
        });
    });
</script>";
        }
    }
}

$query = mysqli_query($conn, "SELECT * FROM product where pro_id=" . $update_id);
$row = mysqli_fetch_array($query);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Product </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Category</li>
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
                            <h3 class="card-title">Product Category</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Product Name</label>
                                    <input type="text" class="form-control" name="pro_name" id="category_name"
                                        placeholder="Enter Category_name" value="<?php echo $row['pro_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Product Category </label>
                                    <select class="form-control" name="product_category" required=""
                                        fdprocessedid="cvkasw">
                                        <option value="Select Category">Select Category</option>
                                        <?php
                                        $select_cat_tab = "SELECT * FROM category";
                                        $query = $conn->query($select_cat_tab);
                                        while ($fetch = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $row['pro_cate_id']; ?>" <?php if ($row['pro_cate_id'] == $fetch['category_id']) {
                                                   echo "selected";
                                               } ?>> <?php echo $fetch['category_name']; ?> </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category_name">product discription</label>
                                    <input type="text" class="form-control" name="pro_disc" id="category_name"
                                        placeholder="Enter Category_name" value="<?php echo $row['pro_disc']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="category_image">Product Image</label>
                                    <input type="file" name="category_image" id="imgInp">
                                </div>
                                <div class="form-group">
                                    <img id="blah"
                                        src="./image/<?php echo isset($row["pro_img"]) ? $row["pro_img"] : ''; ?>"
                                        alt="Category Image" style="height:100px" />
                                </div>

                                <div class="form-group">
                                    <label for="category_name">product quantity</label>
                                    <input type="text" class="form-control" name="pro_quantity" id="pro_quantity"
                                        placeholder="Enter product quantity"
                                        value="<?php echo $row['pro_quantity']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">product price</label>
                                    <input type="text" class="form-control" name="pro_price" id="category_name"
                                        placeholder="Enter Product Name" value="<?php echo $row['pro_price']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">product discount price</label>
                                    <input type="text" class="form-control" name="pro_discount" id="category_name"
                                        placeholder="Enter Product discount "
                                        value="<?php echo $row['pro_discount']; ?>">
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success" name="update_product" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<script>imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }</script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>
<?php include 'footer.php'; ?>