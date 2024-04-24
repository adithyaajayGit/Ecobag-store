<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sql = "Select * from tbl_shopowner s INNER JOIN tbl_login log inner join tbl_district d inner JOIN tbl_place p where s.loginid=$login_id AND d.districtid=s.districtid AND p.placeid=s.placeid and log.loginid=s.loginid";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
?>

<head>

    <script src="js.js"></script>
    <script src="js/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            //alert("a")
            $("#district").change(function() {
               // alert("as")
                var districtid = $(this).val();
               // alert(districtid)
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
        <h2>Regisrtation</h2>
    </div>


</div>

<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-6" style="margin-left: 325px;">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>Registrtation</h2>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="shopownerregupdateaction.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" style="color:black;" value="<?php echo $display['ownername']; ?>" class="form-control" name="name" placeholder="Name" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" style="color:black;" class="form-control" value="<?php echo $display['shopname']; ?>" name="shopname" placeholder="Shop name" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" style="color:black;" class="form-control" value="<?php echo $display['contactnumber']; ?>" name="phonenumber" placeholder="Phone number" pattern="[0-9]{10}" required title="Must contain 10 digits">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" style="color:black;" class="form-control" value="<?php echo $display['email']; ?>" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="must enter a valid email address" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php
                                    $sql = "SELECT * FROM tbl_district";
                                    $res = $obj->executequery($sql);
                                    ?>
                                    <label for="exampleFormControlSelect3">Choose District</label>
                                    <select class="form-control form-control-sm" name="district" id="district" style="color: black;">
                                    <option  value="<?php echo $display['districtid']; ?>" ><?php echo $display['district']; ?></option>
                                        <?php
                                        while ($row = mysqli_fetch_array($res)) {
                                            $districtId = $row['districtid'];
                                            $districtName = $row['district'];
                                            $selected = ($districtId == $display['districtid']) ? "selected" : "";
                                        ?>
                                            <option value="<?php echo $districtId; ?>" <?php echo $selected; ?>><?php echo $districtName; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <?php
                                    $sql = "SELECT * FROM tbl_place";
                                    $res = $obj->executequery($sql);
                                    ?>
                                    <label for="exampleFormControlSelect3">Choose Place</label>
                                    <select class="form-control form-control-sm" id="ddllocation"  style="color: black;"name="place">
                                    <option  value="<?php echo $display['placeid']; ?>" ><?php echo $display['placename']; ?></option>
                                        <?php
                                        while ($row1 = mysqli_fetch_array($res)) {
                                            $placeId = $row1['placeid'];
                                            $placeName = $row1['placename'];
                                            $selected = ($placeId == $display['placeid']) ? "selected" : "";
                                        ?>
                                            <option value="<?php echo $placeId; ?>" <?php echo $selected; ?>><?php echo $placeName; ?></option>
                                        <?php } ?>
                                    </select>

                                    <!-- <label for="exampleFormControlSelect3">Choose Place</label>
                                <select class="form-control form-control-sm" id="ddllocation" name="place">
                                    <option selected disabled>---------Choose Place---------</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($res)) { ?>
                                        <option value="<?php echo $row['placeid']; ?>"><?php echo $row['placename']; ?> </option>";
                                    <?php } ?>

                                </select> -->
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Pin</label>
                                    <input type="text" value="<?php echo $display['pin']; ?>" class="form-control" name="pin" placeholder="Pin Number" name="username" pattern="[0-9]{6}" required title="Must contain only six digit" style="color:black;">
                                </div>
                            </div>




                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-15">Submit</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->
<?php
include("footer.php")
?>
