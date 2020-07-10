<?php 

    include "inc/conn.php";

    if(isset($_POST['update']))
    {

    $id=$_POST['id'];
    $email=$_POST['email'];
    $dashboard = $_POST['dashboard'];
    $profile_setting = $_POST['profile_setting'];
    $change_password = $_POST['change_password'];
    $logout = $_POST['logout'];
    $book_appointments = $_POST['book_appointments'];

    $sql="update user_control SET dashboard='$dashboard',profile_setting='$profile_setting',change_password='$change_password',logout='$logout',book_appointments='$book_appointments' WHERE email='$email'";
    // echo $sql; die;
    $run=mysqli_query($conn,$sql);
    // echo "$run"; 
        if($run)
        {   
            // echo '<script type="text/javascript"> alert("Profile Updated")</script>';
            ?>

            <script>
            window.onload = function()
            {
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
