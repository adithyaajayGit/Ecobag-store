<?php
require_once("../dboperation.php");
$obj=new dboperation();
$district=$_POST['district'];
$sql="SELECT `district` FROM `tbl_district` WHERE `district`='$district'";
$result=$obj->executequery($sql);
$res=mysqli_num_rows($result);
if( $res != 0)
{
    echo '<script>alert("District already Exists");window.location="districtreg.php"</script>';
}
else{
$res=0;
$sql="insert into tbl_district(district)values('$district')";
$res=$obj->executequery($sql);
if($res==1)
{
    echo '<script>alert("District added");window.location="districtreg.php"</script>';
}
else
{
    echo '<script>alert("District not added");window.location="districtreg.php"</script>';
}
}
?>
