<?php
function generateRandomString($length = 10) 
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $randomString = substr(str_shuffle($characters), 0, $length);

   return $randomString;
}


?>


<?php
include_once("../dboperation.php");
$obj=new dboperation();
$uname=$_POST["txtusername"];
$sql="select l.*,p.* from tbl_login l inner join 
tbl_shopowner p on l.loginid=p.loginid where l.username='$uname'";

$result=$obj->executequery($sql);
$display=mysqli_fetch_array($result);
$row=mysqli_num_rows($result);
if($row==0)
{
    echo "<script>alert('Entered username is wrong....');window.location='forgotpassword.php' </script>"; 
}

else
{
$randomString = generateRandomString();
$sql2="update tbl_login set password='$randomString' where username='$uname'";
$result=$obj->executequery($sql2);

$bodyContent="
Hello $uname,

We are delighted to inform you that your new password has been successfully generated. Please find your new password below:

New Password: $randomString

If you have any further questions or require assistance, please do not hesitate to contact our support team. We are here to help.

Thank you for choosing our services!

Best regards,
Eco Bag
";
$mailtoaddress=$display["email"];
require('phpmailer.php');

echo "<script>window.location='login.php'</script>";
    


}
?>