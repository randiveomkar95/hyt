<?php 
include "inc/conn.php";

$id = $_GET['id'];
$time = $_GET['time'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM employee WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "UPDATE employee SET waiting_time = '$time' WHERE id=".$id;
    mysqli_query($conn,$query);
    echo 1;
   
    header('Location:madam_dashboard.php');
     exit;
  }
}

echo 0;
exit;