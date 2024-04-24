<?php
$loginid=$_GET['loginid'];
require_once("../dboperation.php");
$obj = new dboperation();
$sql="UPDATE `tbl_login` SET `status`='Confirm' WHERE `loginid`=$loginid";
$result=$obj->executequery($sql);
 if($result==1)
 {
    echo '<script>alert("Shop confirmed");window.location="shopconfirmation.php"</script>';
 }
 else
 {
   echo '<script>alert("Shop not confirmed");window.location="shopconfirmation.php"</script>';
 }
 ?>