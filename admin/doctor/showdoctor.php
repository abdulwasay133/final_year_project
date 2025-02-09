<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM doctors");
$stmt->execute();
$doctors = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($doctors > 0 ){
    foreach($doctors as $doctor){
        $output .= "
        <tr>
                                <td>{$doctor['d_id']}</td>
                                <td>{$doctor['d_name']}</td>
                                <td>{$doctor['d_phone']}</td>
                                <td>{$doctor['d_address']}</td>
                                <td>
                                    <button class='bi bi-pencil btn btn-primary edit btn-sm' data-id='{$doctor['d_id']}'></button>
                                    <button class='bi bi-trash btn btn-danger delete btn-sm' data-id='{$doctor['d_id']}'></button>
                                </td>
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