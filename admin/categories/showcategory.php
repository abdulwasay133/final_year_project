<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll();
$output = "<table id='myTable' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
if($categories > 0 ){
    foreach($categories as $category){
        $output .= "
        <tr>
                                <td>{$category['cat_id']}</td>
                                <td>{$category['cat_name']}</td>
                                <td>
                                    <button class='bi bi-pencil btn btn-primary edit btn-sm' data-id='{$category['cat_id']}'></button>
                                    <button class='bi bi-trash btn btn-danger delete btn-sm' data-id='{$category['cat_id']}'></button>
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