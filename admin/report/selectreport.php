<?php
include "../db.php";
echo "";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("SELECT * FROM test AS t LEFT JOIN subtest AS st ON t.t_id = st.tid WHERE `tid` = '$id'");
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
foreach($results as $result){
    $tid = $result['id'];
    if($result['refrange'] == 'head'){
        $output.="<tr>
        <td><b>".$result['sub_name']."</b></td>
        <td> </td>
        <td>".$result['unit']."</td>
        <td><input type='hidden' class='form-control w-75 result' data-id='$tid'></td>
    </tr>";

    }else{
                            $output.="<tr>
                                    <td>".$result['sub_name']."</td>
                                    <td>".$result['refrange']."</td>
                                    <td>".$result['unit']."</td>
                                    <td><input type='text' class='form-control w-75 result' data-id='$tid'></td>
                                </tr>";
                            }
                            }
                        $output.="</tbody>
                        </table>   </div>
";
echo $output;

?>