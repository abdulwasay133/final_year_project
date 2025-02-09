<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT * FROM staff WHERE user_id = $user_id");
$stmt->execute();
$Employees = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-striped truncate m-0'>
                        <thead>
                            <th class='text-center'>ID</th>
                            <th class='text-center'>Name</th>
                            <th class='text-center'>Email</th>
                            <th class='text-center'>Password</th>
                            <th class='text-center'>Phone</th>
                            <th class='text-center'>Designation</th>
                            <th class='text-center'>Address</th>
                            <th class='text-center'>Action</th>
                        </thead>
                        <tbody>";
if($Employees > 0 ){
    $sno=0;
    foreach($Employees as $employee){
        $sno +=1;
        $output .= "
        <tr>
                                <td class='text-center'>{$sno}</td>
                                <td class='text-center'>{$employee['name']}</td>
                                <td class='text-center'>{$employee['email']}</td>
                                <td class='text-center'>{$employee['password']}</td>
                                <td class='text-center'>{$employee['phone']}</td>
                                <td class='text-center'>{$employee['designation']}</td>
                                <td class='text-center'>{$employee['address']}</td>
                                <td class='text-center'>
                                    <button class='btn btn-info btn-sm edit' data-id='{$employee['id']}'><i class='ri-mark-pen-line'></i></button>
                                    <button class='btn btn-danger btn-sm mb-1 delete' data-id='{$employee['id']}'><i class='ri-delete-bin-line'></i></button>
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