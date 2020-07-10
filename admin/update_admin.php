<?php 

    include "inc/conn.php";

    if(isset($_POST['update']))
    {

    $id=$_POST['id'];
    $email=$_POST['email'];
    $password=$_POST['password'];
  

    $sql="update admin SET password='$password' WHERE id='$id' ";

    $run=mysqli_query($conn,$sql);
    // echo "$run";
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
