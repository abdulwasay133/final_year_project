<style>
  .disabled {
display: none;
}
</style>
<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];

// $stm = $dbpdo->prepare("SELECT * FROM `patients` AS p JOIN patient_test as pt ON p.p_id = pt.pid 
// WHERE p.user_id = '$user_id' 
// AND `status` = 0  GROUP BY p_id ");
// $stm->execute();
// $true = $stm->fetchAll();
// echo $true[2][0];
$true = 1;
$stmt = $dbpdo->prepare("SELECT * FROM `patients` AS p JOIN patient_test as pt ON p.p_id = pt.pid 
WHERE p.user_id = '$user_id' 
AND (`status` = 0 OR p.p_status = 0) GROUP BY p_id ");
$stmt->execute();
$records = $stmt->fetchAll();
$output = "<div class='row'> ";
                            foreach($records as $record){
                              $stm = $dbpdo->prepare("SELECT * FROM `patients` AS p JOIN patient_test as pt ON p.p_id = pt.pid 
WHERE `status` = 0 AND `p_id` = $record[p_id]  GROUP BY p_id ");
$stm->execute();
$true = $stm->fetch(PDO::FETCH_ASSOC);

if(!$true){
  $check = true;
}else{
  $check = false;
}

                                $id= $record['p_id'];
                                $output .= "
                                <div class='col-md-3'>
                <div class='card mb-3 '>
                  <div class='card-body'>
                    <div class='text-center'>
                      <a href='createreport.php?id=$id' class='d-flex align-items-center flex-column'>
                        <h3>{$record['p_name']}</h3>
                        <h6 class='text-truncate'>{$record['p_phone']}</h6>
                        <p>Sex:{$record['p_sex']} , Age:{$record['p_age']}</p>
                      </a>
                      <div>
                      <a href='createreport.php?id=$id' class='btn btn-primary'><i class='ri-file-edit-line'></i></a>
                      
                      <a href='completereport.php?id=$id' disabled=$check class='btn btn-success'><i disabled=$check class='ri-check-double-line'></i></a>
                      
                      </div>
                      </div>
                  </div>
                </div>
              </div>
              ";
            }
            $output .= "</div>";
            echo $output;
                        

    ?>
    