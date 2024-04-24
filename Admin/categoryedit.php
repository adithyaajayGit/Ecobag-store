<!-- editloc.php -->

<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h5>Category Update</h5>
                        <a href="" style="margin-left: 717px;"></a>
                    </div>
                    <div class="card-body">
                        <form action="categoryeditaction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Category</label>

                                    <?php
                                    $catid = $_GET['catid'];
                                    $sql = "select * from tbl_category where categoryid=$catid";
                                    $res = $obj->executequery($sql);
                                    $display = mysqli_fetch_array($res);
                                    ?>

                                    <!-- <input type="hidden" name="district_id" value="<?php echo  $district_id ?>"> -->
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Category Name</label>
                                        <input type="text" class="form-control" value="<?php echo $display["categoryname"] ?>" name="categoryname" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>

                                        <label for="inputPassword4">Category Image</label><br>
                                        <img src="../uploads/<?php echo $display["image"]; ?>" width="100" height="100"></img>
                                        <input type="file" class="form-control" value="<?php echo $display["image"] ?>" name="image"><br>
                                        <input type="hidden" name="catid" value="<?php echo $display["categoryid"] ?>" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn  btn-primary" name="Update">UPDATE</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
    
<div><?php
        include("footer.php")
        ?></div>
</section>
