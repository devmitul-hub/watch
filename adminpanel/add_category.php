<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {

    $path = "image/";
    $filename = $_FILES['category_image']['name'];
    $tmpname = $_FILES['category_image']['tmp_name'];
    
    $category_name = $_POST['category_name'];
    $category_image = $filename;
    $date = date('Y-m-d H:i:s');

    $query = "insert into category(category_name,category_image,date_time) values('$category_name','$category_image', '$date')";
    // echo $query;
    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($tmpname,$path.$filename);
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Category added Successfully',
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
            text: 'Category add error',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'add_category.php';
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
                    <h1>Add Category</h1>
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
                       
                        <form method="post" runat="server" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name"
                                        placeholder="Enter category_name">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Category Image</label>
                                    <input type="file" class="form-control" name="category_image" id="imgInp">
                                </div>
                                <div class="form-group">
                                    <img id="blah" src="#" alt="category Image" style="height:100px" />
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
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
<script>imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9">
</script>
</body>

</html>
<?php
include("footer.php");
?>