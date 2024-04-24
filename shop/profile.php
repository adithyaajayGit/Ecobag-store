<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT * FROM tbl_shopowner s INNER JOIN tbl_place p INNER JOIN tbl_district d WHERE s.loginid=$login_id AND s.placeid=p.placeid AND s.districtid=d.districtid;";
$res=$obj->executequery($sql);
$display=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Include necessary CSS and JavaScript libraries -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js.js"></script>
</head>
<body>
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>Profile</h2>
    </div>
</div>

<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>Profile</h2>
                </div>
                <!-- Registration Form -->
                <form action="shopownerregaction.php" method="post">
                    <div class="card">
                        <div class="card-body">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#profile-overview">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="shopownerregedit.php">Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="changepassword.php">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <!-- Profile Overview Tab -->
                                <div class="tab-pane fade show active" id="profile-overview">
                                    <!-- Display user's profile overview here -->
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic"><?php //echo $user_email; ?></p>

                                    <h5 class="card-title">Profile Details</h5>
                                    <!-- Display user's profile details here -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['ownername'];?></div>
                                    </div><br>
                                    <!-- Add more profile details as needed -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Shop Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['shopname']; ?></div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Place</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['placename']; ?></div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">District</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['district']; ?></div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Pin</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['pin']; ?></div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone Number</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['contactnumber']; ?></div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $display['email']; ?></div>
                                    </div>
                                </div>
                                <!-- Edit Profile Tab -->
                                <div class="tab-pane fade pt-3" id="profile-edit">
                                    <!-- Edit Profile Form -->
                                    <form method="POST" action="/aucbay/admin/profile_edit.php" enctype="multipart/form-data">
                                        <input type="hidden" name="email" id="email" value="<?php //echo $user_email; ?>">
                                        <!-- Profile Picture Upload Field -->
                                        <div class="row mb-3">
                                            <label for="profilePicture" class="col-md-4 col-lg-3 col-form-label">Profile Picture</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                                                <small class="form-text text-muted">Upload a profile picture (optional).</small>
                                            </div>
                                        </div>
                                        <!-- Full Name -->
                                        <div class="row mb-3">
                                            <label for="firstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="firstName" type="text" class="form-control" id="firstName" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="lastName" type="text" class="form-control" id="lastName" value="<?php //echo $lastName; ?>">
                                            </div>
                                        </div>
                                        <!-- About -->
                                        <div class="row mb-3">
                                            <label for="house_name" class="col-md-4 col-lg-3 col-form-label">House Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="house_name" class="form-control" id="house_name" value="<?php //echo $house_name; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="phonenumber" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phonenumber" class="form-control" id="phonenumber" value="<?php //echo $phonenumber; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="street" class="col-md-4 col-lg-3 col-form-label">Street</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="street" class="form-control" id="street" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="district" class="col-md-4 col-lg-3 col-form-label">District</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="district" class="form-control" id="district" value="<?php //echo $district; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pincode" class="col-md-4 col-lg-3 col-form-label">Pincode</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="pincode" class="form-control" id="pincode" value="<?php //echo $pincode; ?>">
                                            </div>
                                        </div>
                                        <!-- Save Changes Button -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                    <!-- End Edit Profile Form -->
                                </div>
                                <!-- Change Password Tab -->
                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="POST" action="update_password.php">
                                        <input type="hidden" name="email" id="email" value="<?php //echo $user_email; ?>">
                                        <!-- Add fields for changing password here -->
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="currentPassword" type="password" class="form-control" id="currentPassword" required>
                                            </div>
                                        </div>
                                        <!-- Display the error message here -->
                                        <div class="text-danger" id="passwordError"></div>
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewPassword" type="password" class="form-control" id="renewPassword" required>
                                            </div>
                                        </div>
                                        <div class="text-danger" id="passwordMatchError"></div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" id="changePasswordButton" disabled>Change Password</button>
                                        </div>
                                    </form>
                                    <!-- End Change Password Form -->
                                </div>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->
<div>
    <br><br>
<?php
include("footer.php")
?>
</div>


</body>
</html>
