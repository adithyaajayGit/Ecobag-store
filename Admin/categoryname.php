<?php
include("header.php");
?>



<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Category Registration </h3>
    </div>
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category</h4>

            <form class="forms-sample" action="categorynameaction.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName1">Categoryname</label>
                <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
              </div>

              <div class="form-group">
                <label>Image Upload</label>
                <div class="input-group col-xs-12">
                  <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="img" required>

                </div>
              </div>


              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
    </form>
  </div>
</div>
</div>
</div>
</div>

<?php
include("footer.php");
?>