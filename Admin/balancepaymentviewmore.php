<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
$sid=$_GET['shopid'];
$query = "SELECT b.serialno, p.advanceamount,p.fullamount,(p.fullamount- p.advanceamount) as 'Balance' FROM `tbl_payment` p INNER JOIN tbl_shopowner s INNER join tbl_booking b WHERE p.serialno=b.serialno and b.shopid=s.loginid And s.loginid=$sid AND p.status='ADVANCEPAID' GROUP BY p.serialno";
$result = $obj->executequery($query);
$s = 1;
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Payment </h3>
            <!-- <a href="EXCEL\Paymentorderreport.php" ><button class="excelHtml5">Export</button></a> -->
        </div>
        <div class="row">


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Payment</h4>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <!-- Location Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI.NO</th>
                                            <th>Serial NO.</th>
                                            <th>Advance Paid</th>
                                            <th>Full amount</th>
                                            <th>Balance Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($display = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $s++ ?></td>
                                                <td><?php echo $display["serialno"] ?></td>
                                                <td><?php echo $display["advanceamount"] ?></td>
                                                <td><?php echo $display["fullamount"] ?></td>
                                                <td><?php echo $display["Balance"] ?></td>
                                                <td><a href="balancepaymentaction.php?snumber=<?php echo $display['serialno'];?>"><button class="btn btn-outline-success">Paid</button></a></td>
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