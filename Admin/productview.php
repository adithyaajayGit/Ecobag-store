<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
$query = "SELECT * FROM tbl_category";
$result = $obj->executequery($query);
?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">Product View</h4>
            <form class="forms-sample" action="" method="POST" name="viewform">

              <div class="form-group">
                <label for="exampleFormControlSelect2">Choose Category</label>
                <select class="form-control" name="selcategoryid" id="selcategoryid" onchange="this.form.submit()">
                  <option>--------Select Category-----------</option>
                  <?php
                  // Loop through each row of the result
                  while ($display = mysqli_fetch_array($result)) {
                  ?>
                    <!-- Display the district name as an option in the select dropdown -->
                    <option value="<?php echo $display["categoryid"] ?>"> <?php echo $display["categoryname"] ?> </option>
                    </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
          </div>
          </form>
        </div>
      </div>
      <?php

if (isset($_POST["selcategoryid"])) {

  $category_id = $_POST["selcategoryid"];
  $sql = "SELECT * FROM tbl_product WHERE categoryid='$category_id'";
  $res = $obj->executequery($sql);


  $s = 1;

?>


      <?php


      // if (isset($_POST["selcategoryid"])) {

      //   $category_id1 = $_POST["selcategoryid"];
      // }
      ?>


        <script>
          document.getElementById("selcategoryid").value = <?php echo $category_id1; ?>
        </script>
        <a href="productreg.php?category_id=<?php echo $category_id ?>"class="btn btn-outline-primary">Add Product </a>
      
    </div>
    <br><br>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
    <div class="card-header">
      <h5>Product</h5>
          <!-- Location Table -->
          <table class="table table-striped">
            <thead>
            <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Material</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Price</th>
                    <th>Description</th>


                    <th colspan="2">Actions</th>
                  </tr>
            </thead>
           
           <tbody>
                    <?php

                    while ($display = mysqli_fetch_array($res)) {
                    ?>
                      <tr>

                        <td><?php echo $s++ ?></td>

                        <td><?php echo $display["productname"]; ?></td>
                        <td><?php echo $display["productmaterial"]; ?></td>
                        <td><img src="../uploads/<?php echo $display["productimage1"]; ?>" width="100" height="100"></img></td>
                        <td><img src="../uploads/<?php echo $display["productimage2"]; ?>" width="100px" height="100px"></img></td>
                        <td><?php echo $display["productprice"]; ?></td>
                        <td><?php echo $display["productdescription"]; ?></td>
                        <td><a href="editproduct.php?proid=<?php echo $display["productid"]; ?>" class="btn btn-outline-success">Edit</a></td>
                        <td><a href="deleteproduct.php?proid=<?php echo $display["productid"]; ?>" class="btn btn-outline-danger">DELETE</a></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>

          </table>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include("footer.php");
?>
</section>