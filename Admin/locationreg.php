<!-- locationreg.php -->

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
            <h5>Location Registration</h5>
            <a href="" style="margin-left: 717px;"></a>
          </div>
          <div class="card-body">
            <form action="locaction.php" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>District</label>

                  <?php

                  $district_id = $_GET["district_id"];
                  $sql = "select * from tbl_district where districtid='$district_id'";
                  $res = $obj->executequery($sql);
                  $display = mysqli_fetch_array($res);
                  ?>

                  <input type="hidden" name="district_id" value="<?php echo  $district_id ?>">
                  <input type="text" class="form-control" name="districtname" value="<?php echo  $display["district"] ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Location Name</label>
                  <input type="text" class="form-control" placeholder="Enter Location Name " name="locationname" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                </div>
              </div>
              <button type="submit" class="btn  btn-primary" name="Submit">Submit</button>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
  </div>

  <?php
  include("footer.php")
  ?>

</section>