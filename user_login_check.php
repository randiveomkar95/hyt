<?php

session_start();
include "inc/conn.php";
if(isset($_POST['submit']))
 {
    $email=$_POST['email'];
    $password=$_POST['password'];

   
    $query="select * from user_screen where email='$email' and password='$password'";
    $run=mysqli_query($conn,$query);
        if(mysqli_num_rows($run)>0) 
        {       $_SESSION['email']=$email;
                echo "<script> window.open('index.php','_self')</script>";
                
        } else 
        {
            echo"<script>alert('Incorrect Email or Password')</script>";
                    echo "<script> window.open('user_login.php','_self')</script>";
        }
    }


?>