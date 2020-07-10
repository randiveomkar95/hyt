 <!---------- Restrict Unauthorized Access ---------->
<?php 
  $logout = $_GET['logout'];
 if ($logout == 0) {
	 	echo "<script>alert('You have no permission to Logout.. Please contact your admin!!!')</script>"; ?>
	<script>
	    window.onload = function() 
	    {
	    	window.history.back();
		}
    </script>  <?php }
    else{
    	 session_start();
 unset($_SESSION["email"]);
   
echo "<script>window.location.replace('login.php');</script>";
    }
    	
     ?>
 <!---------- Restrict Unauthorized Access End ---------->