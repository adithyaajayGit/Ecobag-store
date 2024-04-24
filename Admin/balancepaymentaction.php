<?php
require_once("../dboperation.php");
$obj = new dboperation();
$snumber=$_GET['snumber'];
$sql="UPDATE `tbl_payment` SET `status`='FULLYPAID' WHERE `serialno`=$snumber";
$res=$obj->executequery($sql);
$sql="UPDATE `tbl_sales` SET `status`='FULLYPAID' where `serialno`=$snumber";
$res=$obj->executequery($sql);
$sql="UPDATE `tbl_sales` SET `status`='FULLYPAID' where `serialno`=$snumber";
$res=$obj->executequery($sql);
$sql="UPDATE `tbl_booking` SET `bookingstatus`='FULLYPAID' WHERE `serialno`=$snumber";
$res=$obj->executequery($sql);
if($res == 0)
{
    echo '<script>alert("Status not Updated");window.location="balancepayment.php"</script>';
    
}
else{
    echo '<script>alert("Status Updated");window.location="balancepayment.php"</script>';
}
?>
