<?php 

    include "inc/conn.php";
    if(isset($_POST['update']))
    {
        $Authority=$_POST['booking_with'];
        $email=$_POST['email'];
        $mode=$_POST['mode'];
        $EmailList[]=$_POST['EmailList'];
      
        $sql="update authorities SET modes='$mode' WHERE email='$email' and type != 'employee' ";
        // echo $sql; die;
        $data1 = implode("\n",$EmailList);
        $EmailListData = str_replace(' ', '', $data1);
        $run=mysqli_query($conn,$sql);
        // echo "$run";


            if($run)
            {   
                 echo '<script type="text/javascript"> window.open("dashboard.php","_self")</script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Data Not Updated")</script>';
            }

        if($mode == "DND")
        {
            $subject = "Update Notification From HYT Software";
            $auth = $Authority;
            $message1 = "has activated DND Mode please reschedule your meeting";
            $message = $auth." ". $message1;
            $headers = "From: hyt@gmail.com";
            mail($EmailListData,$subject,$message,$headers);
        }elseif ($mode == "available") {
            $subject = "Update Notification From HYT Software";
            $auth = $Authority;
            $message1 = "has activated Available Mode and available for meetings";
            $message = $auth." ". $message1;
            $headers = "From: hyt@gmail.com";
            mail($EmailListData,$subject,$message,$headers);
        }elseif  ($mode == "meeting") {
            $subject = "Update Notification From HYT Software";
            $auth = $Authority;
            $message1 = "has activated Meeting Modeplease reschedule your meeting";
            $message = $auth." ". $message1;
            $headers = "From: hyt@gmail.com";
            mail($EmailListData,$subject,$message,$headers);
        }else{
            
        }

    }
?>