<?php
include("header.php");
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Password</h4>
                        <form class="forms-sample" action="changepasswordaction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Change Password</label>

                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Userame</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="txtusername" placeholder=" Your username" pattern="[a-z]{5,15}" required title="Must contain minimum 5 and maximum 15 characters">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="txtpassword" placeholder=" current password" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="txtnewpassword" placeholder="New password" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="txtnewpasswordcon" placeholder="New password" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
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