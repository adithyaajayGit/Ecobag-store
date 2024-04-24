<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>

<head>
  <title>jQuery Ajax Example</title>
  <script src="js.js"></script>
  <script src="js/jquery.min.js"></script>


  <script>
    $(document).ready(function() {
      //alert("a")
      $("#district").change(function() {
        //alert("as")
        var districtid = $(this).val();
        //alert(districtid)
        $.ajax({
          url: "ajaxloc.php",
          method: "POST",
          data: {
            districtid: districtid
          },
          success: function(response) {
            $("#ddllocation").html(response);
          },
          error: function() {
            $("#ddllocation").html("error occured while getting location!");
          }
        });
      });
    });
  </script>
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
      <div class="col-12 col-lg-6" style="margin-left: 250px;">
        <!-- Section Heading -->
        <div class="section-heading">
          <h2>Forgot Password</h2>
        </div>
        <!-- Contact Form Area -->
        <div class="contact-form-area mb-100">
          <form action="forgotpasswordaction.php" method="post">
            <div class="row">

              <script>
                .form - gap {
                  padding - top: 70 px;
                }
              </script>

              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
              <div class="form-gap"></div>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="text-center">
                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                    <h2 class="text-center">Forgot Password?</h2>
                    <p>You can reset your password here.</p>
                    <div class="panel-body">

                      <form id="register-form" role="form" action="forgotpasswordaction.php" autocomplete="off" class="form" method="post">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                            <input id="txtusername" name="txtusername" placeholder="Enter Username" class="form-control" type="text" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <input name="recover-submit" class="btn alazea-btn mt-15" value="Reset Password" type="submit">
                          <!-- <button type="submit" class="btn alazea-btn mt-15">Submit</button> -->

                        </div>

                        <input type="hidden" class="hide" name="token" id="token" value="">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</section>
<!-- ##### Contact Area End ##### -->
<?php
include("footer.php")
?>
<?php
