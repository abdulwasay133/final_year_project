<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM doctors WHERE `status`  = 0 ");
$stmt->execute();
$requests = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Lab Name</th>
                            <th>Phone</th>
                            <th>Eamil</th>
                            <th>Registration</th>
                            <th>Owner</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($requests > 0 ){
    foreach($requests as $request){
        $output .= "
        <tr>
                                <td>{$request['d_id']}</td>
                                <td>{$request['d_name']}</td>
                                <td>{$request['d_phone']}</td>
                                <td>{$request['d_email']}</td>
                                <td>{$request['d_district']}</td>
                                <td>{$request['d_province']}</td>
                                <td>{$request['d_address']}</td>
                                <td>
                                    <button class='btn btn-primary edit btn-sm' data-id='{$request['d_id']}'><i class='ri-user-follow-line'></i></button>
                                    <button class='btn btn-danger delete btn-sm' data-id='{$request['d_id']}'><i class='ri-user-unfollow-line'></i></button>
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