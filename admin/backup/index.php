<?php 
include "../header.php";
$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "labreport");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
    $message = '<label class="text-danger">There is an error in Database Import</label>';
   }
   else
   {
    $message = '<label class="text-success">Database Successfully Imported</label>';
   }
  }
  else
  {
   $message = '<label class="text-danger">Invalid File</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select Sql File</label>';
 }
}
?>

 <body class="p-0 m-0">  
  <br /><br />  
  <div class="container">
    <div class="row">
      <div class="col-md-4">

      <div class="card">
      <div class="card-header bg-dark text-light"><h4>Import Backup File</h4></div>
      <div class="card-body">
      <div><?php echo $message; ?></div>
   <form method="post" enctype="multipart/form-data">
    <p><label>Select Sql File</label>
    <input type="file" name="database" class="form-control"/></p>
    <br />
    <input type="submit" name="import" class="btn btn-dark" value="Import" />
   </form>
      </div>
    </div>


      </div>
      <div class="col-md-4">
      <div class="card">
      <div class="card-header bg-dark text-light"><h4>Export Backup File</h4></div>
      <div class="card-body">

      <a href="export.php" class="btn btn-primary" style="margin-top:20px;">Export Database</a>
      </div>
    </div>

      </div>
    </div>

   <br />

  </div>  
 
 </body>  
</html>