<?php
include("header.php");
?>

<?php
require_once("../dboperation.php");
$obj = new dboperation();
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Report</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Between Two Dates</h4>
                        <div class="card-body table-border-style">
                            <form action="orderbetweendatesaction.php" method="post">
                                <div class="form-group row">
                                    <label for="firstDate" class="col-sm-3 col-form-label">Enter First Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="firstDate" name="firstDate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="secondDate" class="col-sm-3 col-form-label">Enter Second Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="secondDate" name="secondDate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Generate Report</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include("footer.php");
?>
