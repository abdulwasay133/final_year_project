<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "labreport";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();
$id = $_SESSION['user']['id'];

$tables = $_POST['tables'];
$name = $_POST['name'];
$shortName = $_POST['shortName'];
$price = $_POST['price'];
$group = $_POST['group'];


$stmt = $conn->prepare("INSERT INTO custome_test (`t_id`, `t_name`, `shortName`, `t_charges`, `grouping`, `table_html`,`user_id`) VALUES (null, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdsd", $name, $shortName, $price, $group, $tables, $id);


$stmt->execute();

  
  echo json_encode(["status" => "success"]);
 ?>