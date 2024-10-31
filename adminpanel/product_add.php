<?php
  include ("connection.php");
  include("header.php");

  if(isset($_POST['submit']))
  {
    echo "<script>window.location.href='product.php';</script>";
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $button_link = $_POST['button_link'];
    $temp = explode(".",$_FILES['image']['name']);
    $image = round(microtime(true)) . '.' . end($temp);
    $move = move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$image);
    $category_id = $_POST['category'];
   
    $query = "insert into tbl_product(title,description,price,button_link,image,category_id) values('".$title."','".$description."','".$price."','".$button_link."','".$image."','".$category_id."')";
    $result = mysqli_query($conn,$query);

    header('location:product.php');
  }

  

?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Add</h1>
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
                <h3 class="card-title">Product</h3>
              </div>
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" >
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" >
                  </div>
                  <div class="form-group">
                    <label for="btn_link">Button Link</label>
                    <input type="text" class="form-control" name="button_link" id="btn_link" placeholder="Enter Button Link" >
                  </div>
                  <div class="form-group">
                    <label for="dropdown">Category</label>
                    <select class="form-control" name="category">
                      <option value="">Select Category</option>
                      <?php
                       $query_cat = "SELECT  id,category_name FROM tbl_product_category";
                       $result_cat = mysqli_query($conn,$query_cat);
                       while ($row_cat = mysqli_fetch_array($result_cat)) {   
                      ?>
                      <option value="<?php echo $row_cat['id'];?>"><?php echo $row_cat['category_name'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" onchange="readURL(this);"><br>
                    <img id="img" src="photos/<?php echo $row_cat['image']; ?>"  width="100px" height="100px"/>
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
  <!-- /.content-wrapper -->

  



<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#img').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
</body>
</html>
<?php include 'footer.php';?>
