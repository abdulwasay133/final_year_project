<?php
session_start();
if($_SESSION['user']['status']==true ){
  
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIMS Dashboards</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="assets/images/favicon.svg">


    <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="assets/css/main.min.css">

    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

    <!-- Data Tables -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/dataTables.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"> -->
    <style>
  div.dt-buttons {
    position: absolute;
    top: 0;
    left: 450;
}
</style>
  </head>

  <body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

      <!-- App header starts -->
      <div class="app-header d-flex align-items-center">

        <!-- Toggle buttons starts -->
<?php
include('topbar.php');
?>
      <!-- App header ends -->

      <!-- Main container starts -->
      <div class="main-container">

        <!-- Sidebar wrapper starts -->
        <?php
        
include('navbar.php');



if(array_key_exists('name',$_SESSION['user'])){


?>
        <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">
          <div class="app-body">
<?php
$user_id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT * FROM company WHERE user_id = $user_id");
$stmt->execute();
$comp = $stmt->fetch(PDO::FETCH_ASSOC);
?>
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-xxl-9 col-sm-12">
                <div class="card mb-3 bg-3">
                  <div class="card-body">
                    <div class="mh-230">
                      <div class="py-4 px-3 text-white">
                        <h6>Good Morning,</h6>
                        <h2><?php echo $comp['name']; ?></h2>
                        <h5>Company Details.</h5>
                        <div class="mt-4 d-flex gap-3">
                          <div class="d-flex align-items-center">
                            <div class="icon-box lg bg-arctic rounded-2 me-3">
                            <i class="ri-user-add-fill fs-4"></i>
                              <!-- <i class="ri-surgical-mask-line fs-4"></i> -->
                            </div>
                            <div class="d-flex flex-column">
                            <?php
$stmt = $dbpdo->prepare("SELECT COUNT(*) AS user
FROM `patients` 
WHERE `date` >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND user_id = $user_id 
");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                              <h2 class="m-0 lh-1"><?php echo $user['user']; ?></h2>
                              <p class="m-0">Patients</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="icon-box lg bg-lime rounded-2 me-3">
                            <i class="ri-hand-coin-fill fs-4"></i>
                            </div>
                            <div class="d-flex flex-column">
                            <?php
$stmt = $dbpdo->prepare("SELECT SUM(p_charges) AS charge
FROM `patients` 
WHERE `date` >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND user_id = $user_id 
");
$stmt->execute();
$charge = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                              <h2 class="m-0 lh-1"><?php echo $charge['charge']; ?></h2>
                              <p class="m-0">Amount</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="icon-box lg bg-danger rounded-2 me-3">
                            <i class="ri-coin-fill fs-4"></i>
                            </div>
                            <div class="d-flex flex-column">
                            <?php
$stmt = $dbpdo->prepare("SELECT SUM(amount) AS amount
FROM `expense` 
WHERE `date` >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND user_id = $user_id 
");
$stmt->execute();
$amount = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                              <h2 class="m-0 lh-1"><?php echo $amount['amount']; ?></h2>
                              <p class="m-0">Expense</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-12">
                <div class="card mb-3 bg-lime">
                  <div class="card-body">
                    <div class="mh-230 text-white">
                      <h5>Patients</h5>
                      <div class="text-body chart-height-md">
                      <?php

$stmt = $dbpdo->prepare("SELECT DATE(`date`) AS `date`, DAYNAME(`date`) AS day_name, COUNT(*) AS count_of_patients
FROM `patients`
WHERE `date` BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() AND user_id = $user_id
GROUP BY DATE(`date`)
");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
                        <div id="docActivity"></div>
                      </div>
                      <div class="text-center">
                         Patients weekly Graph
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="row gx-3">
              <div class="col-sm-12">

              </div>
              <div class="col-xxl-6 col-sm-12">
                <div class="card mb-3">
                  <div class="card-header">

                    <h5 class="card-title">Income</h5>
                  </div>
                  <div class="card-body">
                  <?php

$stmt = $dbpdo->prepare("SELECT 
    YEAR(`date`) AS year, 
    DATE_FORMAT(`date`, '%b') AS month, 
    SUM(`p_charges`) AS total_sales, 
    COUNT(`p_id`) AS total_patients
FROM `patients`
WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND user_id = '$user_id'
GROUP BY YEAR(`date`), MONTH(`date`)
ORDER BY YEAR(`date`), MONTH(`date`);
");
$stmt->execute();
$income = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
                    <div id="income"></div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-6 col-sm-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Most common reports</h5>
                  </div>
                  <div class="card-body">
                  <?php

$stmt = $dbpdo->prepare("SELECT 
    `tid` ,`t_name`, 
    COUNT(*) AS occurrence_count 
FROM 
    `patient_test` JOIN test as t ON tid = t.t_id
GROUP BY 
    `tid` 
ORDER BY 
    occurrence_count DESC
LIMIT 10
");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
                    <div id="orders"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->

          <!-- App footer starts -->

          <!-- App footer ends -->
          <div class="app-footer bg-white">
            <span>© LabReport 2025</span>
          </div>
    <!-- ************* JavaScript Files ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <!-- ************* Vendor Js Files ************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    <script src="assets/vendor/apex/apexcharts.min.js"></script>

    <!-- Raty JS -->
    <script src="assets/vendor/rating/raty.js"></script>
    <script src="assets/vendor/rating/raty-custom.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

  </body>

</html>
<script>
// ********* Orders Graph **********

var orders = <?php echo json_encode($orders); ?>;

  var order = orders.map((item)=>  item.occurrence_count );
  var tests = orders.map((item)=> item.t_name);

  
var options = {
  chart: {
    height: 300,
    type: "bar",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '20%',
    },
  },
  stroke: {
    show: true,
    width: 6,
    colors: ['transparent']
  },
  series: [
    {
      name: "Reports",
      data: order,
    }
  ],
  grid: {
    borderColor: "#d8dee6",
    strokeDashArray: 5,
    xaxis: {
      lines: {
        show: true,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0,
    },
  },
  xaxis: {
    categories: tests,
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  colors: ["#116aef", "#ff3939", "#436ccf", "#dcad10", "#828382"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#116aef", "#ff3939", "#436ccf", "#dcad10", "#828382"],
    strokeColor: "#ffffff",
    strokeWidth: 1,
    hover: {
      size: 7,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#orders"), options);

chart.render();

// ********** Year Income **********

var income = <?php echo json_encode($income); ?>;


  var months = income.map((item)=>  item.month );
  var patients = income.map((item)=> item.total_patients);
  var amounts = income.map((item)=> item.total_sales);

var options = {
  chart: {
    height: 300,
    type: "line",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: 3,
  },
  series: [
    {
      name: "Patients",
      data: patients,
    },
    {
      name: "Income",
      data: amounts,
    }
  ],
  grid: {
    borderColor: "#d8dee6",
    strokeDashArray: 5,
    xaxis: {
      lines: {
        show: true,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0,
    },
  },
  xaxis: {
    categories: months,
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  colors: ["#116AEF", "#0ebb13", "#5394F5", "#75AAF9", "#96BFFC", "#B7D4FF"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#116AEF", "#0ebb13", "#5394F5", "#75AAF9", "#96BFFC", "#B7D4FF"],
    strokeColor: "#ffffff",
    strokeWidth: 1,
    hover: {
      size: 7,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#income"), options);

chart.render();



// ******Weekly Patients Graph **********
  var weekly = <?php echo json_encode($data); ?>;
  
   // Extract dates and counts
   var dates = weekly.map((item)=>  item.day_name );
  var counts = weekly.map((item)=> item.count_of_patients);
  var options = {
  chart: {
    height: 150,
    type: "bar",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      columnWidth: "70%",
      borderRadius: 2,
      distributed: true,
      dataLabels: {
        position: "center",
      },
    },
  },
  series: [
    {
      name: "Patients",
      data: counts,
    },
  ],
  legend: {
    show: false,
  },
  xaxis: {
    categories: dates,
    axisBorder: {
      show: false,
    },
    labels: {
      show: true,
    },
  },
  yaxis: {
    show: false,
  },
  grid: {
    borderColor: "#d8dee6",
    strokeDashArray: 5,
    xaxis: {
      lines: {
        show: true,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
  colors: [
    "rgba(255, 255, 255, 0.7)", "rgba(255, 255, 255, 0.6)", "rgba(255, 255, 255, 0.5)", "rgba(255, 255, 255, 0.4)", "rgba(255, 255, 255, 0.3)", "rgba(255, 255, 255, 0.2)", "rgba(255, 255, 255, 0.2)"
  ],
};
var chart = new ApexCharts(document.querySelector("#docActivity"), options);
chart.render();
</script>
<?php
  }else{
    $user_id = $_SESSION['user']['d_id'];
    ?>
        <div class="app-container">
        <div class="app-body">
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-xxl-9 col-sm-12">
                <div class="card mb-3 bg-3">
                  <div class="card-body">
                    <div class="mh-230">
                      <div class="py-4 px-3 text-white">
                        <h6>Good Morning,</h6>
                        <h2><?php echo $_SESSION['user']['d_name']; ?></h2>
                        <h5>Patients Details.</h5>
                        <div class="mt-4 d-flex gap-3">
                          <div class="d-flex align-items-center">
                            <div class="icon-box lg bg-arctic rounded-2 me-3">
                            <i class="ri-user-add-fill fs-4"></i>
                              <!-- <i class="ri-surgical-mask-line fs-4"></i> -->
                            </div>
                            <div class="d-flex flex-column">
                            <?php
$stmt = $dbpdo->prepare("SELECT COUNT(*) AS patient
FROM `patients` 
WHERE doctor_id = $user_id 
");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                              <h2 class="m-0 lh-1"><?php echo $user['patient']; ?></h2>
                              <p class="m-0">Total Patients</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="icon-box lg bg-lime rounded-2 me-3">
                            <i class="ri-hand-coin-fill fs-4"></i>
                            </div>
                            <div class="d-flex flex-column">
                            <?php
$stmt = $dbpdo->prepare("SELECT COUNT(*) AS pending
FROM `patients` 
WHERE doctor_id = $user_id AND p_status = 0
");
$stmt->execute();
$pending = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                              <h2 class="m-0 lh-1"><?php echo $pending['pending']; ?></h2>
                              <p class="m-0">Pending</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="icon-box lg bg-danger rounded-2 me-3">
                            <i class="ri-coin-fill fs-4"></i>
                            </div>
                            <div class="d-flex flex-column">
                            <?php
$stmt = $dbpdo->prepare("SELECT COUNT(*) AS complete
FROM `patients` 
WHERE doctor_id = $user_id AND p_status = 1
");
$stmt->execute();
$complete = $stmt->fetch(PDO::FETCH_ASSOC);
?>
                              <h2 class="m-0 lh-1"><?php echo $complete['complete']; ?></h2>
                              <p class="m-0">Completed</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-12">
                <div class="card mb-3 bg-lime">
                  <div class="card-body">
                    <div class="mh-230 text-white">
                      <h5>Patients</h5>
                      <div class="text-body chart-height-md">
                      <?php

$stmt = $dbpdo->prepare("SELECT DATE(`date`) AS `date`, DAYNAME(`date`) AS day_name, COUNT(*) AS count_of_patients
FROM `patients`
WHERE `date` BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() AND doctor_id = $user_id
GROUP BY DATE(`date`)
");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
                        <div id="docActivity"></div>
                      </div>
                      <div class="text-center">
                         Patients weekly Graph
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>






<?php
  }
 }else{
  header("Location: http://localhost/labreport/labs/waiting.php");
}
?>


