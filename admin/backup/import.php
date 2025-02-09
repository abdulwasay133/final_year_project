<?php
$mysqli = new mysqli("localhost", "root", "", "backuptest");
$mysqli->query('SET foreign_key_checks = 0');
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
        echo $row[0].",\n";
    }
}
$mysqli->query('SET foreign_key_checks = 1');
$mysqli->close();

$connection = mysqli_connect('localhost','root','','backuptest');
$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
fclose($handle);
echo 'Successfully imported';
