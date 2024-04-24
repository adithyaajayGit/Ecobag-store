<?php
require_once("../dboperation.php");
$obj = new dboperation();

if(isset($_POST["districtid"]))
{
    $districtid = $_POST["districtid"];
    
    echo $sql="select* from tbl_place where districtid=$districtid";
    $result=$obj->executequery($sql);
    ?>
    <select name="ddllocation" id="ddllocation">
        <option value="">--select--</option>

<?php
while($r=mysqli_fetch_array($result))
{
?>
<option value="<?php echo $r["placeid"];?>"><?php echo $r["placename"];?></option>
<?php
}

}
?>