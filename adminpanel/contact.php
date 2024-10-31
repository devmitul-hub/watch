<?php
include("connection.php");
include("header.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-size: 40px !important;">Contact: </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">contact</li>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="5%">Name</th>
                                        <th width="5%">Email</th>
                                        <th width="5%">Contact</th>

                                        <th width="5%">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = "1";

                                    $query = mysqli_query($conn, "SELECT * FROM contact");
                                    while ($pro_fetch = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $pro_fetch['name']; ?></td>
                                            <td><?php echo $pro_fetch['email']; ?></td>
                                            <td><?php echo $pro_fetch['contact']; ?></td>
                                            <td><?php echo $pro_fetch['message']; ?></td>
                                            
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