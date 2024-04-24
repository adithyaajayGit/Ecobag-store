<?php
require_once("../dboperation.php");
$obj = new dboperation();
$id=$_POST['bookingid'];
$sid=$_POST['sid'];
$date=$_POST['date'];
$sql="UPDATE `tbl_booking` SET `duedate`='$date',`bookingstatus`='APPROVED' where bookingid=$id";
$res=$obj->executequery($sql);
 $sql1="Select b.`bookingdate`,email,ownername from tbl_shopowner s INNER JOIN tbl_booking b where s.loginid=$sid AND s.loginid=b.shopid
";
$res1=$obj->executequery($sql1);
$dis=mysqli_fetch_array($res1);
$email=$dis['email'];
$name=$dis['ownername'];
$bdate=$dis['bookingdate'];

if($res!=0)
{
    echo '<script>alert("Order Confirmed");</script>';
    $sql="UPDATE `tbl_sales` SET ,`status`='APPROVED' where bookingid=$id";
    $res1=$obj->executequery($sql);
    $bodyContent="Dear $name,

    Thank you for shopping with us.

    We're pleased to inform you that your order, placed on $bdate, has successfully arrived on $date. We hope you are satisfied with your purchase.

    To complete your order, please proceed to the pay the remaining balance to settle, you can do so by visiting your account on our website or following the payment instructions provided during the checkout process.

    If you have any questions or need further assistance, please don't hesitate to contact our customer support team. We're here to help.

    Thank you for choosing our services! We look forward to serving you again in the future.

    Sincerely,
    Eco Bag
";
    $mailtoaddress=$email;
    require('phpmaileraccept.php');
}
else
{
   echo '<script>alert("Order Not Confirmed");window.location="orderconfirmation.php"</script>';

}
?>
