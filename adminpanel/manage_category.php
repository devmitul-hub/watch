<?php
include "header.php";
?>
<div class="container mt-4" style="margin: 320px;">
    <h1>Manage category</h1>
    <div class="#">
        <a class="btn btn-success m-2" id="addNewSlide" href="add_category.php"  style="padding:10px; width:20%; font-size:22px !important;background-color: #1e0342;">Add</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr class="bg-dark text-center">
                    <th scope="col" style="width: 5%;">Id</th>
                    <th scope="col" style="width: 15%;">Category Name</th>
                    <th scope="col" style="width: 25%;">Category Image</th>
                    <th scope="col" colspan="2" style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                include("connection.php");
                $sel_offer = "SELECT * FROM category";
                $count = 1;
                $sel_offer_Ex = mysqli_query($conn, $sel_offer);
                while ($data = mysqli_fetch_array($sel_offer_Ex)) {
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $data['category_name']; ?></td>
                        <td class="text-center">
                            <!-- <h1>Display uploaded Image:</h1> -->
                            <img src="image/<?php echo $data['category_image']; ?>" style="height:100px; ,width: 100px;"
                                alt="Uploaded Image">
                        </td>


                        <td><a href="update_category.php?update_id=<?php echo $data['category_id']; ?>"
                                class="btn btn-sm btn-success">Edit</a></td>
                        <td><a href="delete_category.php?delete_id=<?php echo $data['category_id']; ?>"
                                class="btn btn-sm btn-danger" onclick="return checkdelete();">Delete</a></td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function checkdelete() {
            return confirm('Are You Sure You Want To Delete This Category');
        }
    </script>
</div>
<?php

include "footer.php";
?>