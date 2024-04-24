<?php
require_once("../dboperation.php");
$obj = new dboperation();
session_start();
$sid=$_SESSION["loginid"];
$snumber=$_POST['serialnumber'];
$total=$_POST['total'];
$adv=$_POST['adv'];
echo $sql="INSERT INTO `tbl_payment`(`shopid`, `serialno`, `advanceamount`, `fullamount`, `status`) VALUES($sid,$snumber,$adv,$total,'ADVANCEPAID')";
$res=$obj->executequery($sql);
if($res == 0)
{
    echo '<script>alert("Order Not Confirmed");window.location="order.php"</script>';
    
}
else{
    echo '<script>alert("Order Confirmed");window.location="order.php"</script>';
     $sql="UPDATE `tbl_booking` SET `bookingstatus`='PAID' WHERE `serialno`=$snumber";
    $res=$obj->executequery($sql);
    $sql="UPDATE `tbl_sales` SET `status`='PAID' WHERE `serialno`=$snumber";
    $res=$obj->executequery($sql);
}
?>
