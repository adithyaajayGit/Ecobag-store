<?php 
  $id=$_GET['proid'];
  require_once("../dboperation.php");
  $obj=new dboperation();

    $query="delete from tbl_product where productid=$id";
    $result=$obj->executequery($query);
    if($result==0)
    {
      echo '<script>alert("Product not deleted");window.location="productview.php"</script>';
    }
    else
    {
      echo '<script>alert("Product deleted");window.location="productview.php"</script>';
    }

?>