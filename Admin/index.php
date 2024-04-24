<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT COUNT(*) as 'bookingcount', c.categoryname FROM tbl_category c INNER JOIN tbl_booking b ON b.categoryid = c.categoryid WHERE b.bookingstatus = 'PAID' GROUP BY c.categoryid;";
$result = $obj->executequery($sql);
$sql1="SELECT c.categoryid, c.categoryname, p.categoryid, p.productname, COUNT(b.bookingid) AS booking_count FROM tbl_category c JOIN tbl_product p ON c.categoryid = p.categoryid LEFT JOIN tbl_booking b ON p.productid = b.productid GROUP BY c.categoryid, c.categoryname, p.productid, p.productname ORDER BY c.categoryid, p.productid";
$res = $obj->executequery($sql1);
?>
<!DOCTYPE html>
<html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <style>
                /* Add this style to remove the link color */
                a {
                  color: inherit;
                }
              </style>
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <a href="allorder.php" style="text-decoration: none; color: inherit;">
                <h4 class="font-weight-normal mb-3">Total Number of Orders<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                <?php
                $sql3 = "SELECT COUNT(*) as 'total' FROM `tbl_booking` b INNER JOIN tbl_shopowner s INNER JOIN tbl_category c INNER JOIN tbl_product p INNER JOIN tbl_sales sl where sl.serialno=b.serialno and c.categoryid=b.categoryid AND p.productid=b.productid and b.bookingstatus='PAID' AND s.loginid=b.shopid";
                $result1 = $obj->executequery($sql3);
                $dis = mysqli_fetch_array($result1);
                ?>
                <h2 class="mb-5"><?php echo $dis['total']; ?> </h2>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <a href="allorder.php" style="text-decoration: none; color: inherit;">
                <h4 class="font-weight-normal mb-3">Total Number of Rejected Orders<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                <?php 
                $sql4 = "SELECT COUNT(*) as 'reject' FROM `tbl_booking` b INNER JOIN tbl_shopowner s INNER JOIN tbl_category c INNER JOIN tbl_product p INNER JOIN tbl_sales sl where sl.serialno=b.serialno and c.categoryid=b.categoryid AND p.productid=b.productid and b.bookingstatus='REJECTED' AND s.loginid=b.shopid";
                $result2 = $obj->executequery($sql4);
                $disp = mysqli_fetch_array($result2);
                ?>
                <h2 class="mb-5"><?php echo $disp['reject']; ?> </h2>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <a href="completedallorder.php" style="text-decoration: none; color: inherit;">
              <h4 class="font-weight-normal mb-3">Completed Orders <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
              <?php 
                $sql45 = "SELECT COUNT(*) as 'reject' from `tbl_booking` b INNER JOIN tbl_shopowner s INNER JOIN tbl_category c INNER JOIN tbl_product p INNER JOIN tbl_sales sl where sl.serialno=b.serialno and c.categoryid=b.categoryid AND p.productid=b.productid and b.bookingstatus='FULLYPAID' AND s.loginid=b.shopid
                ";
                $result5 = $obj->executequery($sql45);
                $disp1 = mysqli_fetch_array($result5);
                ?>
                <h2 class="mb-5"><?php echo $disp1['reject']; ?> </h2>      
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="clearfix">
                <h4 class="card-title float-left">Booking Count of Each Product</h4>
                <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
              </div>
              <canvas id="sale-chart" class="mt-4"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-5 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Orders in Each Category</h4>
              <a href="category_pie.php">
                <div class="card-body table-border-style">
                  <div id="piechart" style="width: 390px; height: 300px;"></div>
                </div>
              </a>
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

    // JavaScript code for creating and displaying the pie chart
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawPieChart);

    function drawPieChart() {
      var data = google.visualization.arrayToDataTable([
        ['Category', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "['" . $row["categoryname"] . "', " . $row["bookingcount"] . "],";
        }
        ?>
      ]);

      var options = {
        pieHole: 0.4,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>
</body>

</html>
  </div>
<?php
include("footer.php");
?>