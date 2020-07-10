<?php 

    require_once "inc/conn.php";
    if(isset($_POST['submit']))
    {

        $meeting_id = $_POST['meeting_id'];
        $emp_id = $_POST['emp_id'];
        echo $meeting_id;
        echo "<br>";
        echo $emp_id;
        die;


        

        // $email = $_POST['email'];
        // $emp_name = $_POST['emp_name'];
        // $booking_with = $_POST['booking_with'];
        // $subject=$_POST['subject'];

       $sql="update appointments SET waiting_area='Yes' WHERE id='$meeting_id' ";

        // echo $sql; die;
        
        $run=mysqli_query($conn,$sql);
        
        // echo "$run";
        if($run)
        {   
             // echo '<script type="text/javascript"> alert("Profile Updated")</script>';

            // echo "<script>window.open('employee_appointment_status.php','_self')</script>";
                
                ?> 

                <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
             </script>
             <?php
        }
        else
        {
            echo '<script type="text/javascript"> alert("Data Not Updated")</script>';
        }
      
    }

?>