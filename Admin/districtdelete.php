<?php 
  $id=$_GET['disid'];
  require_once("../dboperation.php");
$obj=new dboperation();
    $query="delete from tbl_district where districtid=$id";
    $result=$obj->executequery($query);
    if($result==0)
    {
      echo '<script>alert("District not deleted");window.location="districtview.php"</script>';
    }
    else
    {
      echo '<script>alert("District deleted");window.location="districtview.php"</script>';
    }

?>