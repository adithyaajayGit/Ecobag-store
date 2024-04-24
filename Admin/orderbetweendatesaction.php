<?php
include("header.php");
$first=$_POST['firstDate'];
$second=$_POST['secondDate'];
$_SESSION["fromdate"]=$first;
$_SESSION["todate"]=$second;
require_once("../dboperation.php");
$obj = new dboperation();
$query = "SELECT s.ownername, s.shopname, c.categoryname, p.productname, b.productprice, b.quantity, b.totalprice, b.bookingdate, b.duedate, b.serialno
FROM tbl_booking b
INNER JOIN tbl_shopowner s ON b.shopid = s.loginid
INNER JOIN tbl_category c ON b.categoryid = c.categoryid
INNER JOIN tbl_product p ON b.productid = p.productid
INNER JOIN tbl_sales sl ON b.serialno = sl.serialno
WHERE b.bookingstatus = 'PAID' OR b.bookingstatus = 'FULLYPAID' AND b.bookingdate BETWEEN '$first' AND '$second'";

$result = $obj->executequery($query);
$s = 1;
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Report </h3>
            <a href="EXCEL/orderbetweentwodate.php"><button class="excelHtml5">Export</button></a>
        </div>
        <div class="row">


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Between <?php echo"$first & $second";?> </h4>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <!-- Location Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI.NO</th>
                                            <th>Ownername</th>
                                            <th>Shopname</th>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Booking Date</th>
                                            <th>Delivery Date</th>
                                            <th>Total Price</th>
                                            <th colspan="2"></th>
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
                                                <td><?php echo $display["categoryname"] ?></td>
                                                <td><?php echo $display["productname"] ?></td>
                                                <td><?php echo $display["quantity"] ?></td>
                                                <td><?php echo $display["bookingdate"] ?></td>
                                                <td><?php echo $display["duedate"] ?></td>
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