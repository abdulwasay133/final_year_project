<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT * FROM company WHERE `user_id`='$user_id' ");
$stmt->execute();
$comp = $stmt->fetch(PDO::FETCH_ASSOC);

// echo "ok";
$file = $_FILES['file']['name'];
$ext = pathinfo($file,PATHINFO_EXTENSION);
if($ext == 'png'){
    $name = $comp['reg_no'].".".$ext;
    $path = "../images/".$name;
     move_uploaded_file($_FILES['file']['tmp_name'],$path);

}else{
    echo "<script>alert('Please Upload PNG file Only')</script>";
}
?>