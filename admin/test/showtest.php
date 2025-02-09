<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM test AS t LEFT JOIN categories AS c ON t.t_category = c.cat_id");
$stmt->execute();
$tests = $stmt->fetchAll();
$output = "<table id='example' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
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
                                <td>{$test['cat_name']}</td>
                                <td>{$test['t_short']}</td>
                                <td>{$test['t_group']}</td>
                                <td>{$test['t_charges']}</td>
                                <td>
                                    <button class='bi bi-pencil btn btn-primary edit btn-sm' data-id='{$test['t_id']}'></button>
                                    <button class='bi bi-trash btn btn-danger delete btn-sm' data-id='{$test['t_id']}'></button>
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