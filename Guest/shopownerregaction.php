<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();

function generateRandomString($length = 10) 
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $randomString = substr(str_shuffle($characters), 0, $length);

   return $randomString;
}

$name=$_POST['name'];
$shopname=$_POST['shopname'];
$phone=$_POST['phonenumber'];
$email=$_POST['email'];
$did=$_POST['district'];
$pid=$_POST['place'];
$username=$_POST['username'];
$pin=$_POST['pin'];

$sql="select * from tbl_login where username='$username'";
$res=$obj->executequery($sql);
$rows=mysqli_num_rows($res);

if($rows>0)
{
    echo '<script>alert("Username already exists");window.location="shopownerreg.php"</script>';
}
else
{
$password = generateRandomString();
    $sql="insert into tbl_login (username,password,status,role) values('$username','$password','NotConfirmed','Shopowner')";
    $res=$obj->executequery($sql);
    $loginid=mysqli_insert_id($obj->conn);
    $sql="insert into tbl_shopowner(ownername,shopname,districtid,placeid,contactnumber,email,loginid,pin) values('$name','$shopname','$did','$pid',$phone,'$email',$loginid,$pin)";
    $res=$obj->executequery($sql);
    $bodyContent="Dear $name,

    Thank you for signing up and welcome to our community! We are thrilled to have you on board.
    
    Here are your login credentials:
    
    Username: $username;
    Password: $password;
    
    For security reasons, we've provided you with a temporary password. We recommend changing it to something more secure after your first login. You can do this by visiting your profile settings.
    
    Once again, welcome to our community. We look forward to your participation!
    
    Best regards,
    Eco Bag    
    ";
    $mailtoaddress=$email;
    require('phpmailerreg.php');
}
?>