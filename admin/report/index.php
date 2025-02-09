<?php
include "../db.php";
include "../header.php";
session_start();
if($_SESSION['user']){

?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
       <div class="card shadow">
        <div class="card-header bg-dark text-light"><h4>All Pending Patients</h4></div>
        <div class="card-body">
    <div id="data"></div>
    
</div>
       </div>

        </div>
        </div>
    </div>
</body>
<?php
 }else{
  header("Location: http://localhost/labreport/login.php");
}
?>
<script>
$(document).ready(function(){
function showtest(){
    $.ajax({
        url:"showtest.php",
        type: "POST",
        success:function(data){
            $('#data').html(data);
        }
    });
}
showtest()
})
    

</script>