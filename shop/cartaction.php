<?php
session_start();
require_once("../dboperation.php");
$obj = new dboperation();
$sid=$_SESSION['loginid'];
$totalamount=$_POST['totalprice'];
$saledate=date("Y-m-d");

$sql="SELECT ifnull(COUNT(*),0)+2001  as 'serialno' FROM tbl_sales";
$res=$obj->executequery($sql);
$row=mysqli_fetch_array($res);
$serialno=$row['serialno'];
$sql1="update tbl_booking set serialno='$serialno' where shopid='$sid' and bookingstatus='ADDEDTOCART'";
$res1=$obj->executequery($sql1);
$sql2="INSERT INTO `tbl_sales`(`shopid`, `amount`, `status`, `salesdate`, `serialno`) VALUES('$sid','$totalamount','REQUESTED','$saledate','$serialno')";
$res2=$obj->executequery($sql2);
// $row=mysqli_num_rows($res2);
if($res2!=0 && $res1!=0)
{
    echo '<script>alert("Order Placed... Please Wait for Admin Confirmation..");window.location="cart.php"</script>';
}
else{
    echo '<script>alert("Order Not Placed");window.location="cart.php"</script>';
}
?>