<?php
include "../db.php";
include "../header.php";
if(isset($_POST['sub'])){
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sales = $dbpdo->prepare("SELECT SUM(p_charges) AS total FROM patients WHERE `date` BETWEEN '$start' AND '$end'");
    $sales->execute();
    $sale = $sales->fetch(PDO::FETCH_ASSOC);

    $docpays = $dbpdo->prepare("SELECT SUM(amount) AS total FROM doctorpayment WHERE `date` BETWEEN '$start' AND '$end'");
    $docpays->execute();
    $docpay = $docpays->fetch(PDO::FETCH_ASSOC);

    $expenses = $dbpdo->prepare("SELECT SUM(amount) AS total FROM expense WHERE `date` BETWEEN '$start' AND '$end'");
    $expenses->execute();
    $expense = $expenses->fetch(PDO::FETCH_ASSOC);
    
}
?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                         <form  method="POST">
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
                        
                        </div>
                    </form>
                       <div class="row mt-5">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header"><h4>Sales</h4></div>
                            
                            <div class="card-body">
                            <h3 id="sale"><?php
                            if(isset($sale)){
                             echo $sale['total'] ; 
                            }
                             ?></h3>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header"><h4>Expense</h4></div>
                            
                            <div class="card-body">
                            <h3 id="expense"><?php
                            if(isset($expense)){
                             echo $expense['total'] ; 
                            }
                             ?></h3>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header"><h4>Doctor Pay</h4></div>
                            
                            <div class="card-body">
                            <h3 id="doctorpay"><?php
                            if(isset($docpay)){
                             echo $docpay['total'] ; 
                            }
                             ?></h3>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header"><h4>Profit</h4></div>
                            
                            <div class="card-body">
                            <h3 id="doctorpay"><?php
                            if(isset($docpay) && isset($expense) && isset($sale)){
                                $doc = $docpay['total'];
                                $exp = $expense['total'];
                                $sal = $sale['total'];
                             echo $sal-($doc+$exp)  ; 
                            }
                             ?></h3>
                            </div>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</body>