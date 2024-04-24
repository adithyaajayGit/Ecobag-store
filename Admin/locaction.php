<?php
include_once("../dboperation.php");
$obj=new dboperation();

    $seldistrictid=$_POST["district_id"];
    $locationname=$_POST["locationname"];
    $sql="select * from tbl_place where placename='$locationname'";
    $res=$obj->executequery($sql);
    $row=mysqli_num_rows($res);
    if($row ==1)
    {
       echo"<script>alert('Location already exist');window.location='locationview.php'</script>";
    }
    else{
        $sql="insert into tbl_place(placename,districtid)values('$locationname','$seldistrictid')";
        $obj->executequery($sql);

        echo"<script>alert('Location saved successfully');window.location='locationview.php'</script>";
    }

?>