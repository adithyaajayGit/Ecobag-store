<?php
include("header.php");
require_once("../dboperation.php");
$obj = new dboperation();


?>

<!DOCTYPE html>
<html>

<head>
    
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product View</h4>
                            <form class="forms-sample" action="" method="POST" name="viewform">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Choose Category</label>
                                    <select class="form-control" name="selcategoryid" id="selcategoryid" onchange="this.form.submit()">
                                        <option>--------Select Category-----------</option>
                                        <?php
                                        // Loop through each row of the result
                                        $categoryQuery = "SELECT * FROM tbl_category";
                                        $categories = $obj->executequery($categoryQuery);
                                        while ($category = mysqli_fetch_array($categories)) {
                                        ?>
                                            <!-- Display the category name as an option in the select dropdown -->
                                            <option value="<?php echo $category["categoryid"] ?>"> <?php echo $category["categoryname"] ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST["selcategoryid"])) {
                $category_id = $_POST["selcategoryid"];
                $sql = "SELECT p.productname, COUNT(b.productid) as ordercount FROM tbl_product p 
                        LEFT JOIN tbl_booking b ON p.productid = b.productid 
                        WHERE p.categoryid = '$category_id' 
                        GROUP BY p.productname";
                $result = $obj->executequery($sql);
            
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            <?php if (!is_null($result)) { ?>
                var data = google.visualization.arrayToDataTable([
                    ['Product', 'Orders'],
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "['" . $row["productname"] . "', " . $row["ordercount"] . "],";
                    }
                    ?>
                ]);
            <?php } else { ?>
                // No category selected, display default data (if needed)
                var data = google.visualization.arrayToDataTable([
                    ['Product', 'Orders'],
                    ['Default Product', 0],
                ]);
            <?php } ?>

            var options = {
                title: 'Products Ordered in the Category',
                pieHole: 0.4
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h5>Product</h5>
                            <div class="row">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Pie Chart showing the Products Ordered in the Category</h4>
                                            <div class="card-body table-border-style">
                                                <div id="piechart" style="width: 100%; height: 500px; margin: 0 auto;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        } else {
                // Initial selection (no category chosen)
                $result = null;
            }
            ?>
        </div>
    </div>
</body>
                                    </div>
<?php
include("footer.php");
?>
</html>
