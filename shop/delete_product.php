<?php
require_once("../dboperation.php");
$obj = new dboperation();

if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    $sql = "DELETE FROM `tbl_booking` WHERE `bookingid`=$bid";
    $res = $obj->executequery($sql);
    
    if ($res == 0) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
