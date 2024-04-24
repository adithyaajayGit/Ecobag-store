<?php
require_once("../../dboperation.php");
$obj = new dboperation();
$query = "SELECT ownername,shopname FROM `tbl_shopowner`";
$productResult = $obj->executequery($query);
$filename = "Export_Shopowners_excel.xls";
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
