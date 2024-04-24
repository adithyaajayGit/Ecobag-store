<?php
include("header.php");
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
            <form class="forms-sample" action="districtaction.php" method="POST">
              <div class="form-group">
                <label for="exampleInputName1">District Name</label>
                <input name="district" type="text" class="form-control" id="exampleInputName1" placeholder="Name" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
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