<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
$sql1 = "SELECT c.categoryid, c.categoryname, p.categoryid, p.productname, COUNT(b.bookingid) AS booking_count FROM tbl_category c JOIN tbl_product p ON c.categoryid = p.categoryid LEFT JOIN tbl_booking b ON p.productid = b.productid GROUP BY c.categoryid, c.categoryname, p.productid, p.productname ORDER BY c.categoryid, p.productid";
$res = $obj->executequery($sql1);
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <h4 class="card-title">Bar Chart showing the Count of Orders for Each Product</h4>
                            <div class="card-body table-border-style">
                                <canvas id="sale-chart" style="width: 100%; height: 500px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript code for creating and displaying the bar chart
        var ctx = document.getElementById("sale-chart").getContext("2d");

        var productNames = [
            <?php
            $res->data_seek(0);
            while ($dis = mysqli_fetch_array($res)) {
                echo "'" . $dis["productname"] . "',";
            }
            ?>
        ];

        var bookingCounts = [
            <?php
            $res->data_seek(0);
            while ($dis = mysqli_fetch_array($res)) {
                echo $dis["booking_count"] . ",";
            }
            ?>
        ];

        var saleChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: productNames,
                datasets: [{
                    label: "Booking Count",
                    data: bookingCounts,
                    backgroundColor: "rgba(75, 192, 192, 0.6)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                    hoverBackgroundColor: "rgba(75, 192, 192, 0.9)",
                    hoverBorderColor: "rgba(75, 192, 192, 1)",
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        barPercentage: 0.5,
                    },
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    </script>
</body>

</html>
</div>
<?php
include("footer.php");
?>
