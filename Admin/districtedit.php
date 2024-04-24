<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$id = $_GET["disid"];
$sql = "select * from tbl_district where districtid=$id";
$result = $obj->executequery($sql);
$display = mysqli_fetch_array($result);
?>
<!-- partial -->

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">District Registration</h4>
            <form class="forms-sample" action="districteditaction.php" method="POST">
              <div class="form-group">
                <label for="exampleInputName1">District Name</label>
                <input name="district" type="text" class="form-control" value="<?php echo $display['district']; ?>" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                <input type="hidden" value="<?php echo $display['districtid']; ?>" name="id">
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
    </form>
  </div>
  <?php
  include("footer.php");
  ?>
</div>