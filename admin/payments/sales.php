<?php
include "../db.php";
include "../header.php";
if(isset($_POST['sub'])){
$start = $_POST['start'];
$end = $_POST['end'];
$stmt = $dbpdo->prepare("SELECT * FROM patients WHERE `date` BETWEEN '$start' AND '$end' GROUP BY `date`");
}else{
$stmt = $dbpdo->prepare("SELECT * FROM patients GROUP BY `date`");
}
$stmt->execute();
$records = $stmt->fetchAll();

$data="[";
$lable = "[";
foreach($records as $record){
    $data .=$record['p_charges'].',';
    $lable .="'".date("M",strtotime($record['date']))."',";
}
$data=rtrim($data,",")."]";
$lable=rtrim($lable,",")."]";


?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body"> <form  method="POST">
                        <div class="row">
                           
                            <div class="col-md-4">
                                Starting Date
                            <input type="date" name="start" class="form-control mt-1">
                            </div>
                            <div class="col-md-4">
                                Ending Date
                            <input type="date" name="end" class="form-control mt-1">
                            </div>
                            <div class="col-md-4">
                                <input class="btn btn-dark mt-4" type="submit" name="sub" value="Search">
                            </div>
                        
                        </div></form>
                       <div id="chart" class="mt-3"></div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</body>
<script>
    record = '';
    function finddata(){
        $.ajax({
            url:"createsalechart.php",
            type:"POST",
            success:function(results){
console.log(results);
record = results
       
            }
        });
    }
    finddata();
    var options = {
          series: [{
            name: "Desktops",
            data: <?php echo $data ?>
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Monthly Sales Graph',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], 
            opacity: 0.5
          },
        },
        xaxis: {
          categories: <?php echo $lable ?>,
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>