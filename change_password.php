<?php

session_start();
if(!isset($_SESSION["email"])){

	echo "<script>window.open('login.php','_self')</script>";
}


?>

<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>


		
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Change Your Password</h4><br>
								<form method="post" action="password_update.php">
									<div class="row form-row">
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Old Password <span class="text-danger">*</span></label>
												<input type="password" name="o_pass" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>New Password <span class="text-danger">*</span></label>
												<input type="password" name="n_pass" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Confirm New Password <span class="text-danger">*</span></label>
												<input type="password" name="cn_pass" class="form-control">
												<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
											</div>
										</div>

							
										
									</div>
								<div class="submit-section submit-btn-bottom">
								<center>
								<button type="submit" name="update" class="col-md-3 btn btn-primary submit-btn">Change Password</button>
								</div>

								</div></form>
							</div>
							<!-- /Basic Information -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<br><br><br><br><br>
<?php include('inc/footer.php'); ?>