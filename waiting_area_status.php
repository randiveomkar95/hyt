<?php 
require_once('inc/conn.php');

$id = $_GET['id'];
$status = $_GET['status'];
// echo $status; die;
if($status == "Yes")
{

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM appointments WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    
    $query = "UPDATE appointments SET waiting_area = 'Yes' WHERE id=".$id;
    mysqli_query($conn,$query);
    echo 1;
   
    echo "<script>window.open('dashboard.php','_self');</script> ";
     exit;
  }
}
}


if($status == "No")
{

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM appointments WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    
    $query = "UPDATE appointments SET waiting_area = 'No' WHERE id=".$id;
    mysqli_query($conn,$query);
    echo 1;
   
    echo "<script>window.open('dashboard.php','_self');</script> ";
     exit;
  }
}
}





echo 0;
exit;