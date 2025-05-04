<?php
include "../db.php";
session_start();
$id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT * FROM custome_test WHERE user_id = '$id'");
$stmt->execute();
$tests = $stmt->fetchAll();
$output = "<table id='example' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Short</th>
                            <th>Group</th>
                            <th>Charges</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($tests > 0 ){
    foreach($tests as $test){
        $output .= "
        <tr>
                                <td>{$test['t_id']}</td>
                                <td>{$test['t_name']}</td>
                                <td>{$test['shortName']}</td>
                                <td>{$test['grouping']}</td>
                                <td>{$test['t_charges']}</td>
                                <td>
                                    <button class='btn btn-primary edit btn-sm' data-id='{$test['t_id']}'><i class='ri-pencil-line'></i></button>
                                    <button class='btn btn-danger delete btn-sm' data-id='{$test['t_id']}'><i class='ri-delete-bin-line'></i></button>
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