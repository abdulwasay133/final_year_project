<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM doctors where `status` = 1");
$stmt->execute();
$doctors = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>email</th>
                            <th>Address</th>
                        </thead>
                        <tbody>";
if($doctors > 0 ){
    foreach($doctors as $doctor){
        $output .= "
        <tr>
                                <td>{$doctor['d_id']}</td>
                                <td>{$doctor['d_name']}</td>
                                <td>{$doctor['d_phone']}</td>
                                <td>{$doctor['d_email']}</td>
                                <td>{$doctor['d_address']}</td>
                               
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