<?php
require_once("../../dboperation.php");
$obj = new dboperation();
$query = "SELECT s.ownername,s.shopname,b.serialno, p.advanceamount,p.fullamount,(p.fullamount- p.advanceamount) as 'Balance' FROM `tbl_payment` p INNER JOIN tbl_shopowner s INNER join tbl_booking b WHERE p.serialno=b.serialno and b.shopid=s.loginid GROUP BY p.serialno;";
$productResult = $obj->executequery($query);
    $filename = "Export_paymentexcel.xls";
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
