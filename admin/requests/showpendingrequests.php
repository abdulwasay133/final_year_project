<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT c.user_id,c.id,c.name,c.reg_no,c.mobile,c.website,c.email,c.owner_name,c.dob,c.address FROM company AS c 
JOIN users AS u 
WHERE c.user_id = u.id AND u.status = 0");
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
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($requests > 0 ){
    foreach($requests as $request){
        $output .= "
        <tr>
                                <td>{$request['id']}</td>
                                <td>{$request['name']}</td>
                                <td>{$request['mobile']}</td>
                                <td>{$request['email']}</td>
                                <td>{$request['reg_no']}</td>
                                <td>{$request['owner_name']}</td>
                                <td>{$request['dob']}</td>
                                <td>{$request['address']}</td>
                                <td>
                                    <button class='btn btn-primary edit btn-sm' data-id='{$request['user_id']}'><i class='ri-user-follow-line'></i></button>
                                    <button class='btn btn-danger delete btn-sm' data-id='{$request['user_id']}'><i class='ri-user-unfollow-line'></i></button>
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