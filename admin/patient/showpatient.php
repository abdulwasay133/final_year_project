<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM patients AS pat INNER JOIN doctors AS doc ON pat.doctor_id = doc.d_id");
$stmt->execute();
$patients = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Doctor</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($patients > 0 ){
    foreach($patients as $patient){
        $output .= "
        <tr>
                                <td>{$patient['p_id']}</td>
                                <td>{$patient['p_name']}</td>
                                <td>{$patient['p_phone']}</td>
                                <td>{$patient['p_age']}</td>
                                <td>{$patient['p_sex']}</td>
                                <td>{$patient['d_name']}</td>
                                <td>
                                    <button class='bi bi-pencil btn btn-primary edit btn-sm' data-pid='{$patient['p_id']}'></button>
                                    <button class='bi bi-trash btn btn-danger delete btn-sm' data-pid='{$patient['p_id']}'></button>
                                </td>
                            </tr>";
    }
    $output .= "</tbody>
                </table>";
                echo $output;

}else{
    echo "<h4>Data Not Found !</h4>";
}
?>