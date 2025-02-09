<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM expense");
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
                                    <button class='bi bi-pencil btn btn-primary edit btn-sm' data-id='{$expense['id']}'></button>
                                    <button class='bi bi-trash btn btn-danger delete btn-sm' data-id='{$expense['id']}'></button>
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