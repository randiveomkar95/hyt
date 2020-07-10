<?php 

    include "inc/conn.php";

    if(isset($_POST['submit']))
    {

    $id=$_POST['id'];
    $revert_booking_date=$_POST['revert_booking_date'];
    $taketime=$_POST['revert_booking_time'];

    
    
 
    
  
       $arr = explode(":", $taketime, 2);
       $first = $arr[0];
       $second = $arr[1];

//My Logic to get time in proper format

        if($first >= 12){

                $one = $first - 12; 
                $two = ":";
                $three = $second;
                $four = " PM";
                $revert_booking_time = $one.$two.$three;
                
        }else{

                $one = $first;
                $two = ":";
                $three = $second;
                $four = " AM";
                $revert_booking_time = $one.$two.$three;
                 
        }



    $sql="update appointments SET revert_booking_date='$revert_booking_date',revert_booking_time='$revert_booking_time' WHERE id='$id' ";
    
    $run=mysqli_query($conn,$sql);
    // echo "$sql"; die;
    if($run)
    {   
          ?> 

        <script>
    window.onload = function() {
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
