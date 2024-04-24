<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
$query = "select * from tbl_district";
$result = $obj->executequery($query);
?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">District</h4>
            <form class="forms-sample" action="" method="POST" name="viewform">

              <div class="form-group">
                <label for="exampleFormControlSelect2">Choose District</label>
                <select class="form-control" id="district" name="district" onchange="this.form.submit()">
                  <option>----------Select District----------</option>
                  <?php
                  while ($display = mysqli_fetch_array($result)) {
                  ?>
                    <option value="<?php echo $display["districtid"] ?>">
                      <?php echo $display["district"] ?></option>

                  <?php } ?>
                </select>
              </div>
          </div>
          </form>
        </div>
      </div>
      <?php
      if (isset($_POST["district"])) {

        // echo "aa";
        $district_id1 = $_POST["district"];
        $district_id = $_POST["district"];

        $sql = "SELECT * FROM tbl_place WHERE districtid='$district_id'";
        $res = $obj->executequery($sql);
        $s = 1;
      ?>
        <script>
          document.getElementById("district").value = <?php echo $district_id1; ?>
        </script>
        <a href="locationreg.php?district_id=<?php echo $district_id1 ?>" class="btn btn-outline-primary">Add Location </a>
    </div>
    <br><br>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
    <div class="card-header">

      <h5>Location View</h5>



      
          <!-- Location Table -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SI.NO</th>
                <th>Name</th>
                <th colspan="2" align="center">Actions</th>
              </tr>
            </thead>
            <?php
            // if (isset($_POST["district"])) {

            ?>
            <tbody>
              <?php
              while ($display = mysqli_fetch_array($res)) {
              ?>
                <tr>
                  <td><?php echo $s++ ?></td>
                  <td><?php echo $display["placename"] ?></td>
                  <td><a href="editloc.php?disid=<?php echo $display["placeid"]; ?>" class="btn btn-outline-success">Edit</a></td>
                  <td><a href="deleteloc.php?disid=<?php echo $display["placeid"]; ?>" class="btn btn-outline-danger">DELETE</a></td>

                </tr>
              <?php
              }
              ?>
            <?php
          }

            ?>
            </tbody>

          </table>
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