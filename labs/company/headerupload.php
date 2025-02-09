<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT * FROM company WHERE `user_id`='$user_id' ");
$stmt->execute();
$comp = $stmt->fetch(PDO::FETCH_ASSOC);

// echo "ok";
$file = $_FILES['header']['name'];
// echo $file;
$ext = pathinfo($file,PATHINFO_EXTENSION);
if($ext == 'jpg'){
    $name = $comp['reg_no']."header.".$ext;
    $path = "../images/".$name;
    move_uploaded_file($_FILES['header']['tmp_name'],$path);
    echo "<script>alert('File Uploaded Successfully!')</script>";
}else{
    echo "<script>alert('Please Upload PNG file Only')</script>";
}
?>