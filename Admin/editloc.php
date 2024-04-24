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
            <h5>Location Update</h5>
            <a href="" style="margin-left: 717px;"></a>
          </div>
          <div class="card-body">
            <form action="editlocaction.php" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">District</label>

                  <?php
                  $placeid = $_GET['disid'];
                  $sql = "select * from tbl_district where districtid=(select districtid from tbl_place where placeid=$placeid)";
                  $res = $obj->executequery($sql);
                  $display = mysqli_fetch_array($res);
                  ?>

                  <input type="text" class="form-control" name="districtname" value="<?php echo  $display["district"] ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Location Name</label>
                  <?php
                  $sql = "select * from tbl_place where placeid=$placeid";
                  $res = $obj->executequery($sql);
                  $dis = mysqli_fetch_array($res);
                  ?>
                  <input type="text" class="form-control" value="<?php echo $dis["placename"] ?>" name="locationname" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                  <input type="hidden" name="placeid" value="<?php echo $dis["placeid"] ?>">
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

  <?php
  include("footer.php")
  ?>

</section>