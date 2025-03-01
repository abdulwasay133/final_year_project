<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['d_id'];
$stmt = $dbpdo->prepare("SELECT * FROM `patients` AS p JOIN patient_test as pt ON p.p_id = pt.pid JOIN prescriptions as pre ON p.p_id = pre.patient_id 
WHERE `p_status` = 1 AND p.doctor_id = $user_id GROUP BY p_id");
$stmt->execute();
$records = $stmt->fetchAll();
$output = "<div class='row'>";
                        if($records > 0 ){
                            foreach($records as $record){
                                $id= $record['p_id'];
                                $output .= "
            <div class='col-xxl-3 col-sm-6 col-12 '>
                <div class='card mb-3 '>
                  <div class='card-body'>
                    <div class='text-center'>
                      <a href='doctors-profile.html' class='d-flex align-items-center flex-column'>
                        <h3>{$record['p_name']}</h3>
                        <h6 class='text-truncate'>{$record['p_phone']}</h6>
                        <p>Sex:{$record['p_sex']} , Age:{$record['p_age']}</p>
                      </a>

                      <a href='completereportdetail.php?id=$id' class='btn btn-primary'>
                        View
                      </a>

                    </div>
                  </div>
                </div>
              </div>";
                            }
                            $output .= "</div>";
                                        echo $output;
                        
                        }else{
                            echo "Data Not Found !";
                        }
    ?>