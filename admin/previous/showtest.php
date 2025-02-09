<?php
include "../db.php";
$stmt = $dbpdo->prepare('SELECT * FROM `patients` AS p JOIN patient_test as pt ON p.p_id = pt.pid  WHERE `status` = 1 GROUP BY p_id');
$stmt->execute();
$records = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Make Report</th>
                        </thead>
                        <tbody>";
                        if($records > 0 ){
                            foreach($records as $record){
                                $id= $record['p_id'];
                                $output .= "
                                <tr>
                                                        <td>{$record['p_id']}</td>
                                                        <td>{$record['p_name']}</td>
                                                        <td>{$record['p_phone']}</td>
                                                        <td>{$record['p_sex']}</td>
                                                        <td>{$record['p_age']}</td>
                                                        <td>
                                                            <a href='createreport.php?id=$id' class='bi bi-eye btn btn-primary edit btn-sm'></a>
                                                            <a href='../report/reportall.php?id=$id' class='bi bi-printer btn btn-primary edit btn-sm'></a>
                                                        </td>
                                                    </tr>
                                ";
                            }
                            $output .= "</tbody>
                                        </table>";
                                        echo $output;
                        
                        }else{
                            echo "Data Not Found !";
                        }
    ?>