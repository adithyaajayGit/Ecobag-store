<!-- productreg.php -->

<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Product Registration</h4>
                        <form class="forms-sample" action="productregaction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">

                                <?php
                                $category_id = $_GET["category_id"];
                                $sql = "select * from tbl_category where categoryid='$category_id'";
                                $res = $obj->executequery($sql);
                                $display = mysqli_fetch_array($res);
                                ?>

                                <input type="hidden" name="categoryid" value="<?php echo $category_id ?>">

                                <label class="col-sm-3 col-form-label">Category Name</label>
                                <div>
                                    <input type="text" class="form-control" name="categoryname" value="<?php echo $display["categoryname"] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter product Name " name="productname" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Material</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter product material " name="productmaterial" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Image 1</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" placeholder="Enter 1st product image " name="productimage1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Image 2</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" placeholder="Enter 2nd product image " name="productimage2" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter product price " name="productprice" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="productdescription" placeholder="Enter product description " required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2" name="Submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include("footer.php")
?>