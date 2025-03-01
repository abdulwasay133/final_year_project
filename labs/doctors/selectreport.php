<?php
include "../db.php";

$id = $_POST['id'];
$q = "SELECT * FROM saverecords AS sr JOIN patient_test AS pt ON sr.trid = pt.id
 JOIN patients AS p ON pt.pid = p.p_id
  JOIN test AS t ON pt.tid = t.t_id 
  JOIN doctors AS d ON p.doctor_id = d.d_id 
  JOIN categories AS c ON t.t_category = c.cat_id 
  JOIN subtest AS st ON st.id = sr.subid WHERE sr.trid = '$id'";
$stmt = $dbpdo->prepare($q);
$stmt->execute();
$results = $stmt->fetchAll();
$output=" <div><table class='table'>
                            <thead>
                                <th>Test Name</th>
                                <th>Normal Range</th>
                                <th>Unit</th>
                                <th>Result</th>
                            </thead>
                            <tbody>";
foreach($results as $rec){
                            $output.="<tr>
                                    
                <td>".$rec['sub_name']."</td>
                <td>".$rec['refrange']."</td>
                <td>".$rec['unit']."</td>
                
                                    <td><input type='text' readonly class='form-control w-75 result' value='".$rec['result']."' '></td>
                                </tr>";
                            }
                        $output.="</tbody>
                        </table>   </div>
";
echo $output;

?>