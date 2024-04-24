<?php
session_start();
$username=$_POST["username"];
$password=$_POST["password"];
require_once("../dboperation.php");
$obj=new dboperation();
$sql="select * from tbl_login where username='$username' and password='$password'";
$res=$obj->executequery($sql);
$row=mysqli_fetch_array($res);
if(mysqli_num_rows($res)==1)
{
    $_SESSION["loginid"]=$row["loginid"];
    $_SESSION["username"]=$username;
    if($row['status']=='NotConfirmed')
    {
    echo '<script>alert("Account is not confirmed. Please wait");window.location="login.php"</script>'; 
  }
  else{
    if($row['role']=='Admin')
    {
        header("location:../Admin/index.php");
    }
   else if($row['role']=='Shopowner')
   {  
       header("location:../shop/index.php");
    }
  }
    
}
else
{
    echo '<script>alert("invalid input/password");window.location="login.php"</script>'; 
}
?>
