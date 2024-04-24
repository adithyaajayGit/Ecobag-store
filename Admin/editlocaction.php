<?php
 $placeid=$_POST['placeid'];
 $placename=$_POST['locationname'];
 require_once("../dboperation.php");

 $obj=new dboperation();
 $query="update tbl_place set placename='$placename' where placeid=$placeid";
 $result=$obj->executequery($query);
 if($result==1)
 {
    echo '<script>alert("Location updated");window.location="locationview.php"</script>';
 }
 else
 {
   echo '<script>alert("Location not updated");window.location="locationview.php"</script>';
 }
 ?>