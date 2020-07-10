<?php 

    include "inc/conn.php";
    if(isset($_POST['update']))
    $email= $_POST["email"];
    $view_arts_query="select * from authorities where email='$email'";
    $run=mysqli_query($conn,$view_arts_query);
    $t=0;
    while($row=mysqli_fetch_array($run))
    {
      $password = $row['password'];
    }   
    $o_pass = $_POST['o_pass'];
    $n_pass=$_POST['n_pass'];
    $cn_pass=$_POST['cn_pass'];

    if ($password != $o_pass) {
     echo '<script type="text/javascript"> alert("Old Password is Incorrect")</script>';
    ?> 

        <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
        </script>
 <?php
    }

    elseif ($n_pass != $cn_pass) {
             echo '<script type="text/javascript"> alert("New Password and Confirm Password is not same")</script>';
    ?> 

        <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
        </script>
 <?php
    }

    else{

    $sql="update authorities SET password='$cn_pass' WHERE email='$email' ";
    // echo $sql; die;
    $run=mysqli_query($conn,$sql);
    // echo "$run";
    if($run)
    {   
        // echo '<script type="text/javascript"> alert("Profile Updated")</script>';
        
        ?> 
echo '<script type="text/javascript"> alert("Password Updated")</script>';
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
