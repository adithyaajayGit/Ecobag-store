<?php
require("header.php");
require("nav_bar.php");

?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="../uploads/<?php echo $photo; ?>" alt="profile" class="rounded-circle">
            <h2><?php echo $fullName; ?></h2>
            <h3><?php echo $user_email; ?></h3>


       
          </div>
        </div>
      </div>

      <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmationModalLabel">Apply for Volunteer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to apply for volunteer status?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="confirmApply">Yes, Apply</button>
            </div>
          </div>
        </div>
      </div>





      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <!-- Display user's profile overview here -->
                <!-- Example: -->
                <h5 class="card-title">About</h5>
                <p class="small fst-italic"><?php echo $user_email; ?></p>

                <h5 class="card-title">Profile Details</h5>
                <!-- Display user's profile details here -->
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?php echo $fullName; ?></div>
                </div>

                <!-- Add more profile details as needed -->
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">House Name</div>
                  <div class="col-lg-9 col-md-8"><?php echo $house_name; ?></div>
                </div>

              </div>
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    <!-- Edit Profile Form -->
    <form method="POST" action="/aucbay/admin/profile_edit.php" enctype="multipart/form-data">
        <input type="hidden" name="email" id="email" value="<?php echo $user_email; ?>">

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
                <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $firstName; ?>">
            </div>
        </div>

                  <div class="row mb-3">
                    <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="lastName" type="text" class="form-control" id="lastName" value="<?php echo $lastName; ?>">
                    </div>
                  </div>

                  <!-- About -->
                  <div class="row mb-3">
                    <label for="" class="col-md-4 col-lg-3 col-form-label">House Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="house_name" class="form-control" id="house_name" value="<?php echo $house_name; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phonenumber" class="form-control" id="phonenumber" value="<?php echo $phonenumber; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="street" class="col-md-4 col-lg-3 col-form-label">Street</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="street" class="form-control" id="street" value="<?php echo $street; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="district" class="col-md-4 col-lg-3 col-form-label">District</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="district" class="form-control" id="district" value="<?php echo $district; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pincode" class="col-md-4 col-lg-3 col-form-label">Pincode</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="pincode" class="form-control" id="pincode" value="<?php echo $pincode; ?>">
                    </div>
                  </div>

           <!-- Save Changes Button -->
           <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
             
             
              <!-- Change Password Form -->
                <form method="POST" action="update_password.php">
                  <input type="hidden" name="email" id="email" value="<?php echo $user_email; ?>">
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
      </div>
    </div>
  </section>
</main>


      <!-- End #main -->


<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>Aucbay.Co</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>




<script>
  $(document).ready(function () {
    $('#currentPassword').on('blur', function () {
      var currentPassword = $(this).val();
      var storedPassword = "<?php echo $password; ?>"; // Get the stored password from PHP

      if (currentPassword !== storedPassword) {
        $('#passwordError').text('Current password does not match.');
        currentPasswordError = true;
      } else {
        $('#passwordError').text(''); // Clear any previous error message
        currentPasswordError = false;
      }
      enableDisableChangePasswordButton();
    });

    $('#newPassword, #renewPassword').on('keyup', function () {
      var newPassword = $('#newPassword').val();
      var renewPassword = $('#renewPassword').val();

      if (newPassword !== renewPassword) {
        $('#passwordMatchError').text('Passwords do not match.');
        passwordMatchError = true;
      } else {
        $('#passwordMatchError').text('');
        passwordMatchError = false;
      }
      enableDisableChangePasswordButton();
    });
  });

  function enableDisableChangePasswordButton() {
    if (!currentPasswordError && !passwordMatchError) {
      $('#changePasswordButton').prop('disabled', false);
    } else {
      $('#changePasswordButton').prop('disabled', true);
    }
  }
</script>
