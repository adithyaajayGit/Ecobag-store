<?php
require_once("../../dboperation.php");
$obj = new dboperation();
session_start();
$first=$_SESSION['fromdate'];
$second=$_SESSION['todate'];
$query = "SELECT s.ownername, s.shopname, c.categoryname, p.productname, b.productprice, b.quantity, b.totalprice, b.bookingdate, b.duedate, b.serialno
FROM tbl_booking b
INNER JOIN tbl_shopowner s ON b.shopid = s.loginid
INNER JOIN tbl_category c ON b.categoryid = c.categoryid
INNER JOIN tbl_product p ON b.productid = p.productid
INNER JOIN tbl_sales sl ON b.serialno = sl.serialno
WHERE b.bookingstatus = 'PAID' OR b.bookingstatus = 'FULLYPAID' AND b.bookingdate BETWEEN '$first' AND '$second'";
$productResult = $obj->executequery($query);

$filename = "Export_{$first}_to_{$second}_orderexcel.xls";

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>
