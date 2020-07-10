<?php 
include "inc/conn.php";

$id = $_GET['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM employee WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "UPDATE employee SET status = 'Rejected' WHERE id=".$id;
    mysqli_query($conn,$query);
    echo 1;
   
    echo "<script>window.open('madam_dashboard.php','_self');</script> ";
     exit;
  }
}

echo 0;
exit;