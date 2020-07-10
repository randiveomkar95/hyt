<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
							 <?php
						        include("inc/conn.php");
						        $email= $_SESSION["email"];
						        $view_arts_query="select * from admin where email='$email'";
						        $run=mysqli_query($conn,$view_arts_query);
						        $t=0;
						        while($row=mysqli_fetch_array($run))
						        {
						          $image = $row['image'];
						          $name = $row['name'];
						          $email = $row['email'];
						          $dob = $row['dob'];
						          $mobile = $row['mobile'];
						          $address = $row['address'];
						          $designation = $row['designation'];
						          $image = $row['image'];
						          $imageURL = 'assets/img/'.$row["image"];
						      }
						      ?>					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?php echo $imageURL; ?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $name; ?></h4>
										<h6 class="text-muted"><?php echo $email; ?></h6>
										<h6 class="text-muted"><?php echo $mobile; ?></h6>
										<div class="user-Location"> <?php echo $address; ?></div>
										<!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
									</div>
									<div class="col-auto profile-btn">
										
										<a href="logout.php" class="btn btn-primary">
											Logout
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">Information</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#dp_tab">Profile Picture</a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name : </p>
														<p class="col-sm-10"><?php echo $name; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth : </p>
														<p class="col-sm-10"><?php echo $dob; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID :</p>
														<p class="col-sm-10"><?php echo $email; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile : </p>
														<p class="col-sm-10"><?php echo $mobile; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address : </p>
														<p class="col-sm-10 mb-0"><?php echo $address; ?></p>
													</div>
												</div>
											</div>
											
	<!-- Edit Details Modal -->
	<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personal Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="profile_update.php">
						<div class="row form-row">
							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label>Full Name</label>
									<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
								</div>
							</div>
			
		<div class="col-12">
			<div class="form-group">
				<label>Date of Birth</label>
				<div class="">
					<input type="text" name="dob" class="form-control" value="<?php echo $dob; ?>">
				</div>
			</div>
		</div>
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label>Email ID</label>
									<input type="email" class="form-control" name="email"value="<?php echo $email; ?>" readonly>

								</div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label>Mobile</label>
									<input type="text" name="mobile" value="<?php echo $mobile; ?>" class="form-control">
								</div>
							</div>

							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label>Designation</label>
									<input type="text" name="designation" value="<?php echo $designation; ?>" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<h5 class="form-title"><span>Address</span></h5>
							</div>
							<div class="col-12">
								<div class="form-group">
								<label>Address</label>
									<input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
								</div>
							</div>
							
						</div>
						<button type="submit" name="update" class="btn btn-primary btn-block">Save Changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form method="post" action="password_update.php">
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="o_pass" required class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="n_pass" required class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="cn_pass" required class="form-control">
															<input type="hidden" name="email"  value="<?php echo $_SESSION['email']; ?>">
														</div>
														<button class="btn btn-primary" type="submit" name="update">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->								
								<!-- Change Password Tab -->
								<div id="dp_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Profile Picture</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
												<form method="post" action="change_image.php" enctype="multipart/form-data">
										<div class="form-group">
											<!-- <label>Change</label> -->

											<input type="file" name="image" required class="form-group">

											<input type="hidden" name="email"  value="<?php echo $_SESSION['email']; ?>">
										</div>
														
															
													
														<button class="btn btn-primary" type="submit" name="change_image">Change</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>


		
    </body>

</html>