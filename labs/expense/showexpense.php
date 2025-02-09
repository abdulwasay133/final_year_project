<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT e.id,e.amount,e.user_id,e.date,e.description FROM expense AS e JOIN users as u ON e.user_id = u.id WHERE u.id = $user_id");
$stmt->execute();
$expenses = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($expenses > 0 ){
    foreach($expenses as $expense){
        $output .= "
        <tr>
                                <td>{$expense['id']}</td>
                                <td>{$expense['amount']}</td>
                                <td>{$expense['date']}</td>
                                <td>{$expense['description']}</td>
                                <td>
                                    <button class='btn btn-primary edit btn-sm' data-id='{$expense['id']}'><i class='ri-edit-box-line'></i></button>
                                    <button class='btn btn-danger delete btn-sm' data-id='{$expense['id']}'><i class='ri-delete-bin-line'></i></button>
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