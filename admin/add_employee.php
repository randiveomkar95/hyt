<?php 

    require_once "inc/conn.php";
    if(isset($_POST['submit']))

    $email = $_POST['email'];
    $password=$_POST['password'];
    $type=$_POST['type'];

    // Check if Email is already exist or not

     $view_arts_query="select * from authorities where email = '$email'";
     $run=mysqli_query($conn,$view_arts_query);

     while($row=mysqli_fetch_array($run))
     {
      $existing_email = $row['email'];
     }

     if($existing_email != $email){
         $sql="INSERT INTO `authorities` (`email`,`password`,`type`)VALUES ('$email','$password','$type');";

    $run=mysqli_query($conn,$sql);
    // echo "$run";
    if($run)
    {   
        // echo '<script type="text/javascript"> alert("Profile Updated")</script>';
        
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

        $sql1="INSERT INTO `user_control` (`email`,`type`)VALUES ('$email','$type');";
        
        $run2=mysqli_query($conn,$sql1);
        if($run)
        {   
        
        }
        else
        {
           
        }
     }else{
                echo '<script type="text/javascript"> alert("Email already exist in the database please try with another email")</script>';

        echo '<script type="text/javascript"> window.open("employee.php","_self")</script>';
     }

die;
   

        
?>
