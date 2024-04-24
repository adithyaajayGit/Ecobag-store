<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sql = "select * from tbl_login where loginid=$loginid";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
$password = $display['password']; // Replace this with code to fetch the user's password
?>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var link = document.createElement("a");

        // Set the href attribute (URL)
        link.href = "Guest/forgotpassword.php";

        // Set the link text
        link.textContent = "Forgot Password?";

        // Set other attributes if needed, such as target for opening in a new tab
        link.target = "_blank";

        // Append the link to a container or the document body
        // Initially, hide the link
        link.style.display = "none";
        document.body.appendChild(link);

        $(document).ready(function() {
            $('#currentPassword').on('blur', function() {
                validatePassword();
            });

            $('#newPassword, #renewPassword').on('keyup', function() {
                validatePassword();
            });
        });

        function validatePassword() {
            var currentPassword = $('#currentPassword').val();
            // Check if currentPassword matches the stored password
            if (currentPassword !== "<?php echo $password; ?>") {
                $('#passwordError').text('Current password does not match.');

                // Show the link
                link.style.display = "inline";
            } else {
                $('#passwordError').text('');

                // Hide the link
                link.style.display = "none";
            }
            enableDisableChangePasswordButton();
        }

        function enableDisableChangePasswordButton() {
            var currentPasswordError = $('#passwordError').text() !== '';
            var passwordMatchError = $('#passwordMatchError').text() !== '';

            if (!currentPasswordError && !passwordMatchError) {
                $('#changePasswordButton').prop('disabled', false);
            } else {
                $('#changePasswordButton').prop('disabled', true);
            }
        }

        function togglePasswordVisibility(inputId, spanId) {
            var passwordInput = document.getElementById(inputId);
            var toggleButton = document.getElementById(spanId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = "<i class='fas fa-eye-slash'></i>";
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = "<i class='fas fa-eye'></i>";
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        #forgotPasswordLink {
            color: #007bff;
            /* Link color */
            text-decoration: underline;
            /* Underline the link */
            cursor: pointer;
            /* Show a hand cursor when hovering over the link */
        }
    </style>



</head>
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>Password</h2>
    </div>
</div>

<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-6" style="margin-left: 325px;">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>Change Password</h2>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="changepasswordaction.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="txtusername" placeholder="Your username" style="color:black;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">

                                    <label>Current Password</label>
                                    <div style="display: flex;">
                                        <input type="password" class="form-control" name="txtpassword" placeholder="Current password" id="currentPassword" style="color:black;">
                                        <span id="togglePassword" onclick="togglePasswordVisibility('currentPassword', 'toggleCurrentPassword')"><i class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                                <div class="text-danger" id="passwordError"></div>
                            </div>





                            <div class="col-12">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <div style="display: flex;">
                                        <input type="password" class="form-control" name="txtnewpassword" placeholder="New password" id="newPassword" style="color:black;">
                                        <span id="togglePassword" onclick="togglePasswordVisibility('newPassword', 'toggleNewPassword')"><i class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div style="display: flex;">
                                        <input type="password" class="form-control" name="txtnewpasswordcon" placeholder="Confirm new password" id="renewPassword" style="color:black;">
                                        <span id="togglePassword" onclick="togglePasswordVisibility('renewPassword', 'toggleRenewPassword')"><i class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-danger" id="passwordMatchError"></div>
                        <div class="col-12">
                            <button type="submit" class="btn alazea-btn mt-15" id="changePasswordButton" disabled>Submit</button>
                        </div>

                        <div class="col-12">
                            <!-- Add the "Forgot Password?" link here -->
                            <a href="..\Guest\forgotpassword.php" id="forgotPasswordLink">Forgot Password?</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Contact Area End ##### -->
<?php
include("footer.php")
?>