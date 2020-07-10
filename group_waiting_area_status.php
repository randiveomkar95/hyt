<?php 

require_once('inc/conn.php');
$id = $_GET['id'];
$status = $_GET['status'];
$email = $_GET['email'];
$emp_name = $_GET['emp_name'];

// $view_arts_query="select * from group_appointments where meeting_id='$id' and email = '$email'";
// $run=mysqli_query($conn,$view_arts_query);
// $t=0;
// while($row=mysqli_fetch_array($run))
// {
//   $waiting_area = $row['waiting_area'];
// }
// echo $waiting_area; die;

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM appointments WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){

    // $query = "UPDATE group_appointments SET waiting_area = 'Yes' WHERE meeting_id='$id' and email = '$email'";
    $query = $sql="INSERT INTO `group_appointments` (`meeting_id`,`email`,`waiting_area`,`emp_name`)VALUES ('$id','$email','$status','$emp_name');";

    // echo $query; die; 
    mysqli_query($conn,$query);
    // echo 1;
    
                ?> 

                <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
             </script>
             <?php
   
    // echo "<script>window.open('group_appointment.php','_self');</script> ";
     exit;
  }
}