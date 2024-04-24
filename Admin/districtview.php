<?php
include("header.php");
?>
<!-- partial -->
<?php
require_once("../dboperation.php");
$obj = new dboperation();
$query = "select * from tbl_district";
$result = $obj->executequery($query);
$s = 1;
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> District View</h3>
        </div>
        <div class="row">


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">District</h4>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <!-- Location Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI.NO</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                            <th colspan="2" align="center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($display = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $s++ ?></td>
                                                <td><?php echo $display["district"] ?></td>
                                                <td><a href="districtedit.php?disid=<?php echo $display["districtid"]; ?>" class="btn btn-outline-success">Edit</a></td>
                                                <td><a href="districtdelete.php?disid=<?php echo $display["districtid"]; ?>" class="btn btn-outline-danger">DELETE</a></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<?php
include("footer.php");
?>