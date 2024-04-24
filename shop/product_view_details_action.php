<?php
require_once("../dboperation.php");
session_start();
$sid = $_SESSION['loginid'];
$obj = new dboperation();
$catid = $_POST["cid"];
$productid = $_POST["pid"];

$quanity = $_POST["qty"];
$sql = "SELECT * FROM tbl_product WHERE productid=$productid";
$result = $obj->executequery($sql);
$dis = mysqli_fetch_array($result);

$price = $dis["productprice"];
$date = date('y/m/d');
$total = ($price * $quanity);
$sql = "INSERT INTO `tbl_booking`(`categoryid`, `productid`, `shopid`, `quantity`, `bookingdate`, `productprice`, `totalprice`, `bookingstatus`) VALUES
 ($catid,$productid,$sid,$quanity,'$date',$price,$total,'ADDEDTOCART')";
$res = $obj->executequery($sql);

if ($res > 0) {
    echo '<script>alert("Product Added");window.location="category_view.php"</script>';
} else {
    echo '<script>alert("Product Not Added");window.location="category_view.php"</script>';
}
?>
