<?php
require_once("../../dboperation.php");
$obj = new dboperation();
$query = "SELECT s.ownername,s.shopname,c.categoryname,p.productname,b.productprice,b.quantity,b.totalprice, b.bookingdate,b.duedate,b.serialno FROM `tbl_booking` b INNER JOIN tbl_shopowner s INNER JOIN tbl_category c INNER JOIN tbl_product p INNER JOIN tbl_sales sl where sl.serialno=b.serialno and c.categoryid=b.categoryid AND p.productid=b.productid and b.bookingstatus='PAID' AND s.loginid=b.shopid";
$productResult = $obj->executequery($query);
    $filename = "Export_Allorderexcel.xls";
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
