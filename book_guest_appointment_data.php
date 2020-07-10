<?php 

    require_once "inc/conn.php";

    if(isset($_POST['submit']))
    {

        $email = $_POST['email'];
        $org_date = $_POST['booking_date'];
        $taketime = $_POST['booking_time'];
        $emp_name = $_POST['emp_name'];

        $current_date = date("Y-d-m");
        $booking_date = date("Y-d-m", strtotime($org_date));


        if($booking_date < $current_date){
            echo '<script type="text/javascript"> alert("Booking date must be today onwards")</script>';
            ?>
                <script>
    window.onload = function() {
    window.history.back();
}
 </script>
            <?php
        }else{
            
        }

        
        // echo $booking_time;
        $arr = explode(":", $taketime, 2);
        $first = $arr[0];
        $second = $arr[1];

//My Logic to get time in proper format

        if($first >= 12){

                $one = $first - 12; 
                 if ($one == 0) {
                    $one = "12";
                }
                $two = ":";
                $three = $second;
                $four = " PM";
                $booking_time = $one.$two.$three.$four;
                
        }else{

                $one = $first;
                 if ($one == 0) {
                    $one = "12";
                }
                $two = ":";
                $three = $second;
                $four = " AM";
                $booking_time = $one.$two.$three.$four;
                 
        }


        $booking_with = $_POST['booking_with'];
        $booking_with_hod = $_POST['booking_with_hod'];

        if($booking_with == "Y"){
            $booking_with = $booking_with_hod;
        }
        else{

        }
     
        $subject=$_POST['subject'];

        // $partner_array = $_POST['meeting_partner'];
        // $meeting_partner = implode(', ', $partner_array);

        $guest = "yes";



 // Get Extisting booking time

        $view_arts_query5="select * from appointments";
        $run5=mysqli_query($conn,$view_arts_query5);
        $t=0;
        while($row=mysqli_fetch_array($run5))
        {
            $existing_booking_time = $row['booking_time'];
            $existing_booking_date = $row['booking_date'];
            $existing_booking_with = $row['booking_with'];  
        }

       if($existing_booking_time != $booking_time){


        $sql="INSERT INTO `appointments` (`email`,`booking_date`,`booking_time`,`emp_name`,`booking_with`,`subject`,`guest`)VALUES ('$email','$booking_date','$booking_time','$emp_name','$booking_with','$subject','$guest');";

        // echo $sql; die;
        
        $run=mysqli_query($conn,$sql);
        
        // echo "$run";
        if($run)
        {   
                // echo '<script type="text/javascript"> alert("Profile Updated")</script>';

            echo "<script>window.open('guest_appointments.php','_self')</script>";
                
                ?> 

            <!--     <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
             </script> -->
             <?php
        }
        else
        {
            echo '<script type="text/javascript"> alert("Data Not Updated")</script>';
        }

    }
    else{
          echo '<script type="text/javascript"> alert("This Date and Time is already booked please try another one")</script>';

              ?>
                <script>
    window.onload = function() {
    window.history.back();
}
 </script>
            <?php
            }






















      
    }

?>
