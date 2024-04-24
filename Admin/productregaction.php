<?php
require_once("../dboperation.php");
$obj = new dboperation();
$id = $_POST['categoryid'];
$name = $_POST['productname'];
$material = $_POST['productmaterial'];

$image1 = $_FILES['productimage1']['name'];
move_uploaded_file($_FILES["productimage1"]["tmp_name"], "../uploads/" . $image1);

$image2 = $_FILES['productimage2']['name'];
move_uploaded_file($_FILES["productimage2"]["tmp_name"], "../uploads/" . $image2);

$price = $_POST["productprice"];
$des = $_POST['productdescription'];


$sql = "select * from tbl_product where productname='$name'";
$res = $obj->executequery($sql);
$row = mysqli_num_rows($res);
if ($row > 0) {
    echo '<script>alert("Product already exists");window.location="productview.php"</script>';
} else {
    $sql = "INSERT INTO tbl_product(categoryid,productname, productmaterial, productimage1, productimage2, productprice,productdescription) VALUES($id,'$name','$material','$image1','$image2',$price,'$des')";
    $res = $obj->executequery($sql);
    if ($res == 1) {
        echo '<script>alert("Product inserted");window.location="productview.php"</script>';
    } else {
        echo '<script>alert("Product not inserted");window.location="productview.php"</script>';
    }
}
?>
