 <?php 
  include "inc/conn.php";
 if(isset($_POST['change_image']))
    {

    $image=$_FILES["image"]["name"];

    $temp_name1=$_FILES["image"]["tmp_name"];

    move_uploaded_file($temp_name1,"assets/img/$image");

    $email=$_POST['email'];

    $sql="update admin SET image='$image' WHERE email='$email' ";
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