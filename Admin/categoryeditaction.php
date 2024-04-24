<?php
$catid=$_POST['catid'];
$name=$_POST['categoryname'];

$image = $_FILES['image']['name'];
move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);

 require_once("../dboperation.php");
 $obj=new dboperation();

if($image!="")
{
move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/".$image);

echo $query="UPDATE tbl_category set categoryname='$name',image='$image' where categoryid=$catid";
$result=$obj->executequery($query);
}
else
{
$query="UPDATE tbl_category set categoryname='$name',where categoryid=$catid";
$result=$obj->executequery($query);
}
 if($result==1)
 {
    echo '<script>alert("Updated");window.location="categoryview.php"</script>';
 }
 else
 {
   echo '<script>alert("Error");window.location="categoryview.php"</script>';
 }
 ?>
