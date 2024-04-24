<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
// $query = "SELECT * FROM `tbl_sales` sl INNER JOIN tbl_shopowner s where s.loginid=sl.shopid AND sl.status='REQUESTED' GROUP BY s.loginid";
$query="SELECT sl.*,s.*
FROM tbl_sales sl
INNER JOIN tbl_shopowner s ON s.loginid = sl.shopid
WHERE sl.status = 'REQUESTED'
AND sl.serialno IN (
    SELECT b.serialno
    FROM tbl_booking b
    WHERE b.bookingstatus = 'ADDEDTOCART'
    GROUP BY b.serialno
    HAVING COUNT(*) >= 1
);
";
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
                        <h4 class="card-title">Order View</h4>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <!-- Location Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI.NO</th>
                                            <th>Shopowner Name</th>
                                            <th>Shop Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($display = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $s++ ?></td>
                                                <td><?php echo $display["ownername"] ?></td>
                                                <td><?php echo $display["shopname"] ?></td>
                                                <td><a href="orderconfirmationview.php?shopid=<?php echo $display["shopid"]; ?>" class="btn btn-outline-success">View More</a></td>

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