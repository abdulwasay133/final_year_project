<?php
include "../db.php";
// echo "ok";
$file = $_FILES['file']['name'];
$ext = pathinfo($file,PATHINFO_EXTENSION);
if($ext == 'png'){
    $name = 'lablogo'.".".$ext;
    $path = "../images/".$name;
     move_uploaded_file($_FILES['file']['tmp_name'],$path);

}else{
    echo "<script>alert('Please Upload PNG file Only')</script>";
}
?>