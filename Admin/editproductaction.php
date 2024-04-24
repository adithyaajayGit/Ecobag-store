<?php
$id=$_POST['productid'];
$name = $_POST['productname'];
$material = $_POST['productmaterial'];

$image1 = $_FILES['productimage1']['name'];
move_uploaded_file($_FILES["productimage1"]["tmp_name"], "../uploads/" . $image1);

$image2 = $_FILES['productimage2']['name'];
move_uploaded_file($_FILES["productimage2"]["tmp_name"], "../uploads/" . $image2);

$price = $_POST["productprice"];
$des = $_POST['productdescription'];

 require_once("../dboperation.php");

 $obj=new dboperation();

 if($image1!="" && $image2!="")
 {
  move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../uploads/".$image1);
  move_uploaded_file($_FILES["productimage2"]["tmp_name"],"../uploads/".$image2);
  $query="UPDATE `tbl_product` SET `productname`='$name',`productmaterial`='$material',`productimage1`='$image1',`productimage2`='$image2',`productprice`='$price',`productdescription`='$des' WHERE productid=$id";
  $result=$obj->executequery($query);
 }
else if($image1!="" || $image2!="")
{
  if($image2!="")
{
move_uploaded_file($_FILES["productimage2"]["tmp_name"],"../uploads/".$image2);
 $query="UPDATE tbl_product set productname='$name',productmaterial='$material',productimage2='$image2',productprice='$price',productdescription='$des' where productid=$id";
$result=$obj->executequery($query);
}
else if($image1!="")
{
  move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../uploads/".$image1);
  $query="UPDATE tbl_product set productname='$name',productmaterial='$material',productimage1='$image1',productprice='$price',productdescription='$des' where productid=$id";
  $result=$obj->executequery($query);
}

}
else
{
 $query="UPDATE tbl_product set productname='$name',productmaterial='$material',productprice='$price',productdescription='$des' where productid=$id";
$result=$obj->executequery($query);
}
 if($result==1)
 {
   echo '<script>alert("Product updated");window.location="productview.php"</script>';
 }
 else
 {
   echo '<script>alert("Product not updated");window.location="productview.php"</script>';
 }
 ?>
