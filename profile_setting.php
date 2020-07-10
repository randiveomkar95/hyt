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


<!-- Basic Information -->
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Basic Information</h4>
		<form method="post" action="profile_setting_update.php">
			<div class="row form-row">
			<div class="col-md-6">
			<div class="form-group">
			<label>name <span class="text-danger">*</span></label>
			<input type="text" name="name" class="form-control" placeholder="<?php echo $name; ?>" required>
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			<label>Designation <span class="text-danger">*</span></label>
			<input type="text" name="designation" class="form-control" placeholder="<?php echo $designation;?>" required>
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			<label>Email <span class="text-danger">*</span></label>
			<input type="email" class="form-control" readonly value="<?php echo $_SESSION['email']; ?>" >
			<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
			</div>
			</div>
			</div>
			<div class="submit-section submit-btn-bottom">
			<center>
			<button type="submit" name="update" class="col-md-3 btn btn-primary submit-btn">Save Changes</button>
			</div>
            
		</form>
	</div>
</div>
<!-- /Basic Information -->
							
		
<!-- Clinic Info -->
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Profile Picture</h4>
		<div class="row form-row">

			<div class="col-md-12">
				<div class="form-group">
					<label>Upload Image</label>
					<form method="post" action="profile_photo_update.php" enctype="multipart/form-data">		
						<input type="file" name="image" class="upload">
						<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" required>
							<div class="submit-section submit-btn-bottom">
							<center>
							<button type="submit" name="update" class="col-md-3 btn btn-primary submit-btn">Upload</button>
							</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /Clinic Info -->



</div>
</div>
</div>
</div>
</div>
</div>

		
<!-- /Page Content -->


<?php include('inc/footer.php'); ?>