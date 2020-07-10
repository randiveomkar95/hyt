<?php 
require_once('inc/conn.php');

$id = $_GET['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM appointments WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    
    $query = "UPDATE appointments SET status = 'Accepted',meeting_status = 'Started' WHERE id=".$id;
    // echo $query; die;
    mysqli_query($conn,$query);
    // echo 1;
           ?> 

        <script>
            window.onload = function() {
            window.history.back();
        }
 </script>
 <?php
    // echo "<script>window.open('current_meeting.php','_self');</script> ";
     exit;
  }
}

// echo 0;
exit;