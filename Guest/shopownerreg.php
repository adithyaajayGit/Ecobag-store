<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>

<head>

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
                    <form action="shopownerregaction.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required style="color:black;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" class="form-control" name="shopname" placeholder="Shop name" pattern="^[A-Za_z][A-Za-z -]+$" title="Must start with capital letter followed by upper or lowercase letters" required style="color:black;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phonenumber" placeholder="Phone number" pattern="[0-9]{10}" required title="Must contain 10 digits" style="color:black;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="must enter a valid email address" required style="color:black;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php
                                    $sql = "SELECT * FROM tbl_district";
                                    $res = $obj->executequery($sql);
                                    ?>
                                    <label for="exampleFormControlSelect3">Choose District</label>
                                    <select class="form-control form-control-sm" name="district" id="district" required>
                                        <option value=""selected disabled>---------Choose District---------</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?php echo $row['districtid']; ?>" style="color:black;"><?php echo $row['district']; ?> </option >";
                                        <?php } ?>
                                        ?>
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
                                <select class="form-control form-control-sm" id="ddllocation" name="place" required>
                                    <option value="" selected disabled>---------Choose Place---------</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($res)) { ?>
                                        <option value="<?php echo $row['placeid']; ?>" style="color:black;"><?php echo $row['placename']; ?> </option>";
                                    <?php } ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Pin</label>
                                <input type="text" class="form-control" name="pin" placeholder="Pin Number" name="username" pattern="[0-9]{6}" required title="Must contain only six digit" style="color:black;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="username" placeholder="User name" name="username" pattern="[a-z]{5,15}" required title="Must contain minimum 5 and maximum 15 characters" style="color:black;">
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- <button type="submit" class="btn alazea-btn mt-15">Submit</button> -->
                            <button type="submit" class="btn alazea-btn mt-15" id="submit-button">Submit</button>
                        </div>
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

