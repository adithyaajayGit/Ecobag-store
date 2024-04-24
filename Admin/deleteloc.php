<?php 
  $placeid=$_GET['disid'];
  require_once("../dboperation.php");
$obj=new dboperation();
    $query="delete from tbl_place where placeid=$placeid";
    $result=$obj->executequery($query);
    if($result==0)
    {
      echo '<script>alert("Location not deleted");window.location="locationview.php"</script>';
    }
    else
    {
      echo '<script>alert("Location deleted");window.location="locationview.php"</script>';
    }

?>