<?php
include "../admin/db.php";

$id = $_POST['id'];

$stmt = $dbpdo->prepare("SELECT * FROM patient_test as pt INNER JOIN patients as p ON pt.pid = p.p_id INNER JOIN test as t ON pt.tid = t.t_id WHERE pt.pid = '$id' AND pt.status = 1");
$stmt->execute();
$reports = $stmt->fetchAll();
$output=" <div><table class='table'>
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>";
                            $sno = 0;
                            foreach($reports as $rec){
                                $sno++;
                                $output.="<tr>
                                        
                    
                    <td>".$sno."</td>
                    <td>".$rec['t_name']."</td>
                    <td><input type='checkbox'  name='reports[]' value=".$rec['id']." class='form-check-input p-2 shadow' /> </td>
                    
                    
                                    </tr>";
                                }
                            $output.="</tbody>
                            </table>   </div>
    ";
    echo $output;
?>