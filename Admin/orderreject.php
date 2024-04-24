<?php
require_once("../dboperation.php");
$obj = new dboperation();
$id=$_GET['bookingid'];
$sid=$_GET['shopid'];
$sql="UPDATE `tbl_booking` SET`bookingstatus`='REJECTED' WHERE`bookingid`=$id";
$res=$obj->executequery($sql);
$sql1="Select email,ownername from tbl_shopowner s where s.loginid=$sid";
$res1=$obj->executequery($sql1);
$dis=mysqli_fetch_array($res1);
$email=$dis['email'];
$name=$dis['ownername'];

if($res==0)
{
    echo '<script>alert("Order Not Rejected");window.location="orderconfirmation.php"</script>';
}
else
{
    echo '<script>alert("Order Rejected");"</script>';
    $bodyContent="Dear $name,

    Sorry, but we regret to inform you that your order has been rejected.
    
    Sincerely,
    Eco Bag";
    $mailtoaddress=$email;
    require('phpmaileraccept.php');
}
?>