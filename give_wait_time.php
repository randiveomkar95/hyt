<?php 
require_once('inc/conn.php');
  
$id = $_GET['id'];
$time = $_GET['time'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM appointments WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "UPDATE appointments SET waiting_time = '$time' WHERE id=".$id;
    mysqli_query($conn,$query);

            ?> 

        <script>
    window.onload = function() {
    // similar behavior as an HTTP redirect
    window.history.back();
}
 </script>
 <?php
    // echo 1;
   
     // echo "<script>window.open('dashboard.php','_self');</script> ";
     exit;
  }
}

echo 0;
exit;