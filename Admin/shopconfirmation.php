<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
$query = "SELECT s.loginid,`ownername`,`shopname`,placename, district,`contactnumber`,`email`,status from tbl_shopowner s INNER JOIN tbl_district d INNER JOIN tbl_place p INNER JOIN tbl_login l where s.districtid=d.districtid AND s.placeid=p.placeid and s.loginid=l.loginid AND l.status='NotConfirmed' ";
$result = $obj->executequery($query);
$s = 1;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST" name="viewform">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Shop Confirmation</h4>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>SI</th>
                                                    <th>Owner Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Place</th>
                                                    <th>District</th>
                                                    <th>Contact Number</th>
                                                    <th>Email</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($display = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $s++; ?></td>
                                                        <td><?php echo $display["ownername"] ?></td>
                                                        <td><?php echo $display["shopname"] ?></td>
                                                        <td><?php echo $display["placename"] ?></td>
                                                        <td><?php echo $display["district"] ?></td>
                                                        <td><?php echo $display["contactnumber"] ?></td>
                                                        <td><?php echo $display["email"] ?></td>
                                                        <td><a href="shopconfirmationaction.php?loginid=<?php echo $display["loginid"]; ?>" class="btn btn-gradient-success btn-fw"> Confirm</a></td>
                                                        
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
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
include("footer.php");
?>
</section>