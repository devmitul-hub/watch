<?php
include("header.php");
include("connection.php");

$update_id = $_GET['update_id'];
$query = "SELECT * FROM category    WHERE category_id = $update_id";
$result = mysqli_query($conn, query: $query);
$data = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    $path = "image/";
    $filename = $_FILES['category_image']['name'];
    $tmpname = $_FILES['category_image']['tmp_name'];
    $category_name = $_POST['category_name'];
    $category_image = $filename;
    $date = date('Y-m-d H:i:s');
    if ($category_image != "") {
        $update = "UPDATE category SET category_name='$category_name', category_image='$category_image' WHERE category_id=$update_id";
        $result_update = mysqli_query($conn, $update);
        move_uploaded_file($tempname, "images/" . $filename);
        if ($result_update) {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Category update Successfully',
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
                    text: 'Category update error',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'update_category.php';
                    }
                });
            });
        </script>";
        }
    } else {
        $update = "UPDATE category SET category_name='$category_name' WHERE category_id=$update_id";
        $result_update = mysqli_query($conn, $update);
        // move_uploaded_file($tempname, "images/" . $filename);
        if ($result_update) {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Category update Successfully',
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
                    text: 'Category update error',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'update_category.php';
                    }
                });
            });
        </script>";
        }
    }


}

?>
<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update caregory</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update category</h3>
                        </div>
                        <form id="updateForm" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control"
                                        value="<?Php echo $data['category_name']; ?>" name="category_name"
                                        id="category_name" placeholder="Enter category_name">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Category Image</label>
                                    <input type="file" class="form-control" name="category_image" id="imgInp">
                                </div>
                                <div class="form-group">
                                    <img id="blah" src="./image/<?php echo $data['category_image']; ?>"
                                        alt="category Image" style="height:100px" />
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success" name="update" value="update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }</script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9">
    </script>
</div>
<?php
include("footer.php");
?>