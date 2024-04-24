<!-- productreg.php -->
<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sid = $_GET['shopid'];
$bookingid = $_GET['bookingid'];
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Details</h4>
                        <form class="forms-sample" action="orderacceptaction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <?php
                                    $tomorrow = date('Y-m-d', strtotime('+1 day'));
                                    ?>
                                    <input type="date" class="form-control" name="date" placeholder="Enter a date" min="<?php echo $tomorrow; ?>">
                                </div>
                            </div>
                            <input type="hidden" name="bookingid" value="<?php echo $bookingid; ?>">
                            <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                            <div class="form-group row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-gradient-success" name="Submit">Accept Order</button>
                                </div>
                            </div>
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