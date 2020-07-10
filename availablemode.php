<?php

session_start();
if(!isset($_SESSION["email"])){

// 	echo "<script>window.open('login.php','_self')</script>";
}


?>
<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>

 <?php
    include("inc/conn.php");
    $email= $_SESSION["email"];
    $view_arts_query="select * from authorities where email='$email'";
    $run=mysqli_query($conn,$view_arts_query);
    $t=0;
    while($row=mysqli_fetch_array($run))
    {
      $image = $row['image'];
      $name = $row['name'];
      $type = $row['type'];
      $mode = $row['modes'];
      $designation = $row['designation'];
      $image = $row['image'];
      $imageURL = 'assets/img/'.$row["image"];
  }	
  ?>
						</div>
<div class="col-md-7 col-lg-8 col-xl-9">


<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" style="margin-left: 200px;">  

						<?php if($modes == "available"){ echo "Available mode is already Activate";} else{ echo "You are going to activate Available Mode"; }; ?>
						</h3>

						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times; </span></button> -->
					</div>
					<form method="post" action="mode_status_update.php">

					
						<div class="modal-body">
							<center>
			
							

<!-- 							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div> -->	
							<input type="hidden" name="mode" value="available">
							<input type="hidden" name="email" value="<?php echo $email; ?>">
							<div class="submit-section text-center">
								<button type="submit" name="update" class="btn btn-primary submit-btn" style="<?php if($modes == "available"){ echo "display:none";} else{ echo ""; }; ?>"> Activate</button>
								<!-- <button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							 -->
							</div>
						</div>
					</form>
				</div>

</div>
</div>
</div>
</div>
</div>
</div>

		
<!-- /Page Content -->


<?php include('inc/footer.php'); ?>