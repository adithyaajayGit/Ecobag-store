<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
$shopid=$_GET['shopid'];
$query = "SELECT * FROM `tbl_booking` b inner join tbl_category c INNER JOIN tbl_product p where b.shopid=$shopid and c.categoryid=b.categoryid AND p.productid=b.productid and b.bookingstatus='REJECTED'";
$result = $obj->executequery($query);
$s = 1;
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Order Details </h3>
        </div>
        <div class="row">


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View More</h4>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <!-- Location Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI.NO</th>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Booking Date</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($display = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $s++ ?></td>
                                                <td><?php echo $display["categoryname"] ?></td>
                                                <td><?php echo $display["productname"] ?></td>
                                                <td><?php echo $display["quantity"] ?></td>
                                                <td><?php echo $display["bookingdate"] ?></td>
                                                <td><?php echo $display["totalprice"] ?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
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