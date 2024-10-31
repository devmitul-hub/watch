<?php
include("connection.php");
include("header.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>product :</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Product Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="add_product.php" class="btn btn-success pull-right" style="padding:10px; width:20%; font-size:22px !important;background-color: #1e0342;">Add</a><br><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Product Name</th>
                                        <th width="20%">Product discription</th>
                                        <th width="20%">Product image</th>
                                        <th width="20%">Product price</th>
                                        <th width="20%">Product discount</th>
                                        <th width="20%">Product quantity</th>
                                        <th width="20%">Product status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = "1";

                                    $query = mysqli_query($conn, "SELECT * FROM product");
                                    while ($pro_fetch = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $pro_fetch['pro_name']; ?></td>
                                            <td><?php echo $pro_fetch['pro_disc']; ?></td>
                                            <td>
                                                <img src="image/<?php echo $pro_fetch['pro_img']; ?>"
                                                    style="height:100px;width: 100px;" alt="Uploaded Image">

                                            </td>
                                            <td>
                                                <?php echo $pro_fetch['pro_price']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pro_fetch['pro_discount']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pro_fetch['pro_quantity']; ?>
                                            </td>
                                            <?php if ($pro_fetch['pro_status'] == 'available') { ?>
                                                <td><span class="badge badge-success"> <?php echo $pro_fetch['pro_status']; ?>
                                                </td></span>
                                            <?php } else { ?>
                                                <td><span class="badge rounded-pill bg-danger">
                                                        <?php echo $pro_fetch['pro_status']; ?></td></span>
                                                <?php
                                            } ?>
                                            <td>
                                                <a href="update_product.php?update_id=<?php echo $pro_fetch['pro_id']; ?>"><i
                                                        class="fas fa-edit text-success"></i></a>&nbsp; &nbsp;
                                                <a href="product_del.php?del_id=<?php echo $pro_fetch['pro_id']; ?>"
                                                    onclick="return checkdelete();"><i
                                                        class="fas fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<script>
    function checkdelete() {
        return confirm('Are You Sure You Want To Delete This Product');
    }
</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script type="text/javascript">
    function checkDel(id) {
        if (confirm("Are you sure to delete it?")) {
            window.location.href = "product_category_del.php?id=" + id;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>
<?php
include("footer.php");
?>