<?php 

    include "inc/conn.php";

    if(isset($_POST['update']))

    $email = $_POST['email'];
    $name=$_POST['name'];
    $designation=$_POST['designation'];

    $sql="update authorities SET name='$name',designation='$designation' WHERE email='$email' ";

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


?>
