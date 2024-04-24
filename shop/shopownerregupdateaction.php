<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$name=$_POST['name'];
$shopname=$_POST['shopname'];
$phone=$_POST['phonenumber'];
$email=$_POST['email'];
$did=$_POST['district'];
$pid=$_POST['place'];
$pin=$_POST['pin'];
echo $sql="UPDATE `tbl_shopowner` SET `ownername`='$name',`shopname`='$shopname',`districtid`='$did',`placeid`='$pid',`contactnumber`='$phone',`email`='$email',`pin`='$pin' WHERE loginid=$login_id";
$res=$obj->executequery($sql);

if($res>0)
{
    echo '<script>alert("Profile Updated");window.location="profile.php"</script>';
}
else
{
    echo '<script>alert("Profile not Updated");window.location="profile.php"</script>';
 
}
?>