<?php
include "../admin/db.php";
session_start();
$cnic = $_SESSION['patient']['cnic'];

$stmt = $dbpdo->prepare("SELECT * 
FROM patients AS p 
LEFT JOIN prescriptions AS pre ON p.p_id = pre.patient_id 
WHERE p.p_status = 1 AND p.p_cnic = $cnic");
$stmt->execute();
$patients = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-striped truncate m-0'>
                        <thead>
                            <th class='text-center'>ID</th>
                            <th class='text-center'>Name</th>
                            <th class='text-center'>Phone</th>
                            <th class='text-center'>NIC</th>
                            <th class='text-center'>Gender</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>Action</th>
                            <th class='text-center'>Prescription</th>
                        </thead>
                        <tbody>";
if($patients > 0 ){
    $sno=0;
    foreach($patients as $patient){

        $sno +=1;
        $output .= "
        <tr>
                                <td class='text-center'>{$sno}</td>
                                <td class='text-center'>{$patient['p_name']}</td>
                                <td class='text-center'>{$patient['p_phone']}</td>
                                <td class='text-center'>{$patient['p_cnic']}</td>
                                <td class='text-center'>{$patient['p_sex']}</td>
                                <td class='text-center'>{$patient['date']}</td>
                                <td class='text-center'>
                                    <button class='btn btn-info btn-sm display' data-id='{$patient['p_id']}'>View</button> </td>";
                                    if($patient['prescription']){
                                        $output .="<td class='text-center'> <button class='btn btn-info btn-sm showpres' data-bs-toggle='modal' data-bs-target='#modalPhone' data-id='{$patient['p_id']}'>Prescription</button>";
                                    }
                                    $output .="</td>
                            </tr>
        ";
    }
    $output .= "</tbody>
                </table>";
                echo $output;

}else{
    echo "<h4>Data Not Found !</h4>";
}
?>