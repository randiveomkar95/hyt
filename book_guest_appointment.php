<?php

session_start();
if(!isset($_SESSION["email"])){

// 	echo "<script>window.open('login.php','_self')</script>";
}

?>
<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>


						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">

							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Book Guest Appointment</h4>
								<form method="post" action="book_guest_appointment_data.php">
									<div class="row form-row">
										
										<div class="col-md-12">
											<div class="form-group">
												<label>Guest Name <span class="text-danger">*</span></label>
												<input type="text" name="emp_name" class="form-control"  required>
											</div>
										</div>

																				
										<div class="col-md-12">
											<div class="form-group">
												<label>Selct Date <span class="text-danger">*</span></label>
												<input type="date" name="booking_date" class="form-control"  required>
											</div>
										</div>

										
										<div class="col-md-12">
											<div class="form-group">
												<label>Select Time <span class="text-danger">*</span></label>
												<input type="time" name="booking_time" class="form-control"  required>

										

												<input type="hidden" name="email" value="<?php echo $email; ?>">
												
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label>Meeting with</label>
												<select id = "HOD" name="booking_with" class="form-control" onchange = "ShowHideDiv()">
													<option value="madam@admin.com">Director</option>			
													<option value="sir@admin.com">Managing Director</option>		
													<option value="vice@admin.com">Vice President</option>
													<option value="ceo@admin.com">CEO</option>
													<option value="Y">HOD</option>
												 </select>
											</div>
										</div>

					<div class="col-md-12">
						<div class="form-group">
								<script type="text/javascript">
								    function ShowHideDiv() {
								        var HOD = document.getElementById("HOD");
								        var single = document.getElementById("single");
								        single.style.display = HOD.value == "Y" ? "block" : "none";
								    }
								</script>
					<!-- 			<span>Meeting With</span>
								    <select id = "HOD" class="form-control" onchange = "ShowHideDiv()">


								        <option value="N">Single</option>
								        <option value="Y">Combine</option>  


								    </select>
								<hr /> -->
								<div id="single" style="display: none">
								 <div class="form-group">
									<label>Select HOD From The List </label>
								   <select name="booking_with_hod" id="multi_search_filter" class="form-control selectpicker">




					   <?php
												    $view_arts_query="select * from authorities where type ='hod' order by id desc";
												    $run=mysqli_query($conn,$view_arts_query);
												    $t=0;
												    while($row=mysqli_fetch_array($run))
												    {
												      

		
					    echo '<option value="'.$row["email"].'">'.$row["name"].'</option>'; 
					   }
					   ?>


															   </select>
															 </div>
								</div>
							</div>
						</div>

										<div class="col-md-12">
											<div class="form-group">
												<label>Subject</label>
												<textarea class="form-control" name="subject" rows="5" required></textarea>
											</div>
										</div>

									</div>
								<div class="submit-section submit-btn-bottom">
								<center>
								<button type="submit" name="submit" class="col-md-3 btn btn-primary submit-btn">Book Appointment</button>
								</div>

								</div></form>
							</div>
							<!-- /Basic Information -->
							

							
		
						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->

<?php include('inc/footer.php'); ?>