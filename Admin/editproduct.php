<!-- productreg.php -->

<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>

<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product Updation</h4>
            <form class="forms-sample" action="editproductaction.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <?php
                    $proid = $_GET['proid'];
                    $sql = "SELECT * FROM tbl_category where categoryid=(select categoryid from tbl_product where productid=$proid)";
                    $res = $obj->executequery($sql);
                    $display = mysqli_fetch_array($res);
                    ?>

                    <label class="col-sm-3 col-form-label">Category Name</label>
                    <div>
                        <input type="text" class="form-control" name="categoryname" value="<?php echo $display["categoryname"] ?>" readonly>
                    </div>

                    <?php
                    $sql = "select * from tbl_product where productid='$proid'";
                    $res = $obj->executequery($sql);
                    $display = mysqli_fetch_array($res);
                    ?>

                    <input type="hidden" name="productid" value="<?php echo $display['productid'] ?>">
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $display["productname"] ?>" name="productname" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Material</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $display["productmaterial"] ?>" name="productmaterial">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image 1</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" value="<?php echo $display["productimage1"] ?>" name="productimage1"><br>
                        <img src="../uploads/<?php echo $display["productimage1"]; ?>" width="100" height="100"></img>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image 2</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" value="<?php echo $display["productimage2"] ?>" name="productimage2"><br>
                        <img src="../uploads/<?php echo $display["productimage2"]; ?>" width="100" height="100"></img>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $display["productprice"] ?>" name="productprice">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="productdescription"> <?php echo $display["productdescription"] ?> </textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2" name="Submit">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
include("footer.php")
?>