<?php
require_once("../dboperation.php");
$obj=new dboperation();
$district=$_POST['district'];
$sql="SELECT `district` FROM `tbl_district` WHERE `district`='$district'";
$result=$obj->executequery($sql);
$res=mysqli_num_rows($result);
$id=$_POST['id'];
if( $res != 0)
{
    echo '<script>alert("District already Exists");window.location="districtview.php"</script>';
}
else{
$res=0;
$sql="UPDATE `tbl_district` SET `district`='$district' WHERE districtid=$id";
$res=$obj->executequery($sql);
if($res==1)
{
    echo '<script>alert("District Updated");window.location="districtview.php"</script>';
}
else
{
    echo '<script>alert("District not Updated ");window.location="districtview.php"</script>';
}
}
?>
