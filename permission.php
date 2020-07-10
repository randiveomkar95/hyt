<?php 
require_once('inc/conn.php');

$id = $_GET['id'];
$email = $_GET['email'];

    $query = "UPDATE group_appointments SET permission = 'Yes' WHERE meeting_id='$id' and email = '$email' ";
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
   
    // echo "<script>window.open('dashboard.php','_self');</script> ";
     exit;

// echo 0;
exit;