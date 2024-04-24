<?php
include_once("dboperation.php");
$obj = new dboperation();
if(isset($_POST["Submit"]))
{
    $seldistrictid = $_POST["seldistrictid"];
    $locationname = $_POST["locationname"];
 

    $sql="select * from tbllocation where location_name='$locationname'";
    $res = $obj->executequery($sql);
    $rows = mysqli_num_rows($res);

    if($rows == 1)
    {
        echo "<script>alert('Already Exist');window.location='Locationview.php' </script>";
    }
    else{
        $sql="INSERT INTO `tbllocation`(`district_id`, `location_name`) 
        VALUES ('$seldistrictid','$locationname')";
         $obj->executequery($sql);
         echo "<script>alert('Saved Successfully');window.location='Locationview.php' </script>";
    }
}

?>