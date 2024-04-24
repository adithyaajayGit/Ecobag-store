<?php
require_once("../dboperation.php");
$obj=new dboperation();

$name=$_POST['name'];
$img=$_FILES['img']['name'];

move_uploaded_file($_FILES["img"]["tmp_name"],"../uploads/".$img);

$sql="select * from tbl_category where categoryname='$name'";
$res=$obj->executequery($sql);
$row=mysqli_num_rows($res);
if($row > 0)
{
    echo '<script>alert("Category already exists");window.location="categoryname.php"</script>';
}
else
{
$sql="INSERT into tbl_category(categoryname,image)values('$name','$img')";
$res=$obj->executequery($sql);
if($res==1)
{
    echo '<script>alert("Category inserted");window.location="categoryview.php"</script>';
}
else
{
    echo '<script>alert("Category not inserted!");window.location="categoryname.php"</script>';
}
}

?>
