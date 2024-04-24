<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT COUNT(*) as 'bookingcount', c.categoryname FROM tbl_category c INNER JOIN tbl_booking b ON b.categoryid = c.categoryid WHERE b.bookingstatus = 'PAID' OR b.bookingstatus = 'FULLYPAID' GROUP BY c.categoryid;";
$result = $obj->executequery($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "['" . $row["categoryname"] . "', " . $row["bookingcount"] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Percentage',
                pieHole: 0.4
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Report </h3>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pie Chart showing the Count of Orders in Each Category</h4>
                            <div class="card-body table-border-style">
                                <div id="piechart" style="width: 100%; height: 500px; margin: 0 auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
</div>
<?php
include("footer.php");
?>