<?php 

    include "inc/conn.php";

    if(isset($_POST['update']))
    {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $mobile=$_POST['mobile'];
    $designation=$_POST['designation'];

    $sql="update admin SET name='$name',email='$email',address='$address',dob='$dob',mobile='$mobile',designation='$designation' WHERE email='$email' ";

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

        }



   
?>
