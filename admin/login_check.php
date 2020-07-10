<?php
session_start();
include "inc/conn.php";
if(isset($_POST['submit'])) {

    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from admin where email='$email' and password='$password'";

    $run=mysqli_query($conn,$query);

    if(mysqli_num_rows($run)>0) 
    {

            echo "<script> window.open('index.php','_self')</script>";
            $_SESSION['email']=$email;
            
            // echo $email; die;

    } else 
    {
        echo"<script>alert('Incorrect Email or Password')</script>";
                echo "<script> window.open('login.php','_self')</script>";
    }

}
?>