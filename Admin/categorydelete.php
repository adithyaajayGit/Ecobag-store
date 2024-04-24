<?php 
  $catid=$_GET['catid'];
  require_once("../dboperation.php");
  $obj=new dboperation();

    $query="delete from tbl_category where categoryid=$catid";
    $result=$obj->executequery($query);
    if($result==0)
    {
      echo '<script>alert("Failed!!!");window.location="categoryview.php"</script>';
    }
    else
    {
      echo '<script>alert("Deleted");window.location="categoryview.php"</script>';
    }

?>