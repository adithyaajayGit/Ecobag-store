<?php
session_start();
include_once("../dboperation.php");
$obj=new dboperation();
 $sql="select * from tbl_login where loginid=".$_SESSION['loginid'];
$result=$obj->executequery($sql);
$display=mysqli_fetch_array($result);

 $uname=$_POST["txtusername"];
 $pass=$_POST['txtpassword'];
$newpwd=$_POST['txtnewpassword'];
$con=$_POST['txtnewpasswordcon'];

if($pass==$display["password"])
{
    if($con == $newpwd)
    {
        $sql1="update tbl_login set password='$newpwd' where loginid=".$_SESSION['loginid'];
    $result1=$obj->executequery($sql1);

    if($result1==1)
    {
        echo "<script>alert('Password Changed Successfully....');window.location='index.php' </script>"; 
    }
    
    }else{
        echo "<script>alert('New Password and Confirm Password are not match....');window.location='changepassword.php' </script>"; 
    }
     
}
else
{
    echo "<script>alert('Entered password is wrong....');window.location='index.php' </script>"; 
}
?>