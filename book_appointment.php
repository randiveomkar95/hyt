<?php
	
session_start();
if(!isset($_SESSION["email"])){

	echo "<script>window.open('login.php','_self')</script>";
}
?>
<?php require_once('inc/header.php') ?>
<?php require_once('inc/sidebar.php') ?>

 <!---------- Restrict Unauthorized Access ---------->
<?php 
 if ($book_appointments == 0) {
	 	echo "<script>alert('You have no permission to access this page..!!!')</script>"; ?>
	<script>
	    window.onload = function() 
	    {
	    	window.history.back();
		}
    </script>  <?php } ?>
 <!---------- Restrict Unauthorized Access End ---------->	
</div>


						<div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
							<div class="row row-grid">

				<!-- Getting Employee Name -->
						 <?php
					        include("inc/conn.php");
					        $email= $_SESSION["email"];
					        $view_arts_query="select * from authorities where email = '$email'";
					        $run=mysqli_query($conn,$view_arts_query);
					        $t=0;
					        while($row=mysqli_fetch_array($run))
					        {
					          $emp_name = $row['name'];
					          $type = $row['type'];
					         
					      	}	

					      ?>
			<!-- Getting Employee Name End-->




<!-- SIR START -->
						 <?php
					        include("inc/conn.php");
					        $email= $_SESSION["email"];
					        $view_arts_query="select * from authorities where type = 'authority' and id='14'";
					        $run=mysqli_query($conn,$view_arts_query);
					        $t=0;
					        while($row=mysqli_fetch_array($run))
					        {
					          $image = $row['image'];
					          $name = $row['name'];
					          $modes = $row['modes'];
					          $sir_email = $row['email'];
					          $dob = $row['dob'];
					          $mobile = $row['mobile'];
					          $address = $row['address'];
					          $designation = $row['designation'];
					          $image = $row['image'];
					          $imageURL = 'assets/img/'.$row["image"];
					      	}	
					      ?>


								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="javascript:void()">
												<img src="<?php echo $imageURL; ?>" style="width: 300px; height: 300px;">
											</a>
									
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="javascript:void()"><?php echo $name; ?></a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality"><?php echo $designation; ?></p>
											<p class="speciality" style="text-transform: capitalize;">On<b> <?php echo $modes; ?></b> Mode</p>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> <?php echo $address; ?>
												</li>
									<!-- 			<li>
													<i class="far fa-clock"></i> Availability:  Monday to Friday
												</li> -->
											</ul>
											<div class="row row-sm">
											<!-- <div class="col-6">
													<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
												</div> -->
												<div class="col-12">
													<a href="#" class="add-new-btn" data-toggle="modal" data-target="#book_for_sir" class="btn book-btn">Apply Appointment</a>

												</div>
											</div>
										</div>
									</div>
								</div>

<!-- SIR END -->

<!-- MADAM -->

 <?php
					        include("inc/conn.php");
					        $email= $_SESSION["email"];
					        $view_arts_query="select * from authorities where type = 'authority' and id='15'";
					        $run=mysqli_query($conn,$view_arts_query);
					        $t=0;
					        while($row=mysqli_fetch_array($run))
					        {
					          $name1 = $row['name'];
					          $modes = $row['modes'];
					          $email1 = $row['email'];
					          $dob = $row['dob'];
					          $mobile = $row['mobile'];
					          $address = $row['address'];
					          $designation = $row['designation'];
					          $image = $row['image'];
					          $imageURL = 'assets/img/'.$row["image"];
					      	}	
					      ?>
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="javascript:void()">
												<img src="<?php echo $imageURL; ?>"style="width: 300px; height: 300px;">
											</a>
									
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="javascript:void()"><?php echo $name1; ?></a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality"><?php echo $designation; ?></p>
											<p class="speciality" style="text-transform: capitalize;">On<b> <?php echo $modes; ?></b> Mode</p>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> <?php echo $address; ?>
												</li>
										<!-- 		<li>
													<i class="far fa-clock"></i> Availability:  Monday to Friday
												</li> -->
											</ul>
											<div class="row row-sm">
<!-- 												<div class="col-6">
													<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
												</div> -->
												<div class="col-12">

													<a href="#" class="add-new-btn" data-toggle="modal" data-target="#book_for_madam" class="btn book-btn">Apply Appointment</a>

												</div>
											</div>
										</div>
									</div>
								</div>
<!-- MADAM END -->


<!-- CEO HOD -->

 <?php
					        include("inc/conn.php");
					        $email= $_SESSION["email"];
					        $view_arts_query="select * from authorities where type = 'hod' and type = 'ceo' and type = 'vice_president'";
					        $run=mysqli_query($conn,$view_arts_query);
					        $t=0;
					        while($row=mysqli_fetch_array($run))
					        {
					          $name1 = $row['name'];
					          $modes = $row['modes'];
					          $email1 = $row['email'];
					          $dob = $row['dob'];
					          $mobile = $row['mobile'];
					          $address = $row['address'];
					          $designation = $row['designation'];
					          $image = $row['image'];
					          $imageURL = 'assets/img/'.$row["image"];
					      	}	
					      ?>

					      <?php 


if($type != 'employee')
	{ 
		$hide = "display:none";
    }  else
    { 
     	$hide = ""; 
 	} 
?>
								<div class="col-md-6 col-lg-4 col-xl-3" style="<?php echo $hide; ?>">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="javascript:void()">
												<img src="assets/img/ceo.jpg" style="width: 300px; height: 300px;">
											</a>
									
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="javascript:void()">Vice President </a>
												 <br>
												<a href="javascript:void()">CEO</a>
												 <br>
												<a href="javascript:void()">HOD</a> 
												
											</h3><br><br>
											<!-- <p class="speciality"><?php echo $designation; ?></p> -->
										<!-- 	<p class="speciality" style="text-transform: capitalize;">On<b> <?php echo $modes; ?></b> Mode</p> -->
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> <?php echo $address; ?>
												</li>
										<!-- 		<li>
													<i class="far fa-clock"></i> Availability:  Monday to Friday
												</li> -->
											</ul>
											<div class="row row-sm">
<!-- 												<div class="col-6">
													<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
												</div> -->
												<div class="col-12">
													<a href="#" class="add-new-btn" data-toggle="modal" data-target="#book_for_ceo" class="btn book-btn">Apply Appointment</a>
												</div>
											</div>
										</div>
									</div>
								</div>
<!-- CEO HOD END -->


							</div>
						  </div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->

		<!-- Book Appointment for Madam Modal -->
		<div class="modal fade custom-modal" id="book_for_madam">
			<div class="modal-dialog modal-dialog-centered modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Booking Appointment with <?php echo $name1; ?></h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" action="book_appointment_data.php">		
						<div class="modal-body">
							
							<div class="form-group">
								<label>Select Date</label>
								<input type="date" name="booking_date" class="form-control datetimepicker" required>
								<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
								<input type="hidden" name="booking_with" value="<?php echo $email1; ?>" >
							</div>

							<div class="form-group">
								<label>Select Time</label>
								<input type="time" name="booking_time" class="form-control datetimepicker"  required>

								<input type="hidden" name="emp_name" value="<?php echo $emp_name; ?>">


							</div>
<div class="form-group">
			<script type="text/javascript">
			    function ShowHideDiv1() {
			        var combine1 = document.getElementById("combine1");
			        var single1 = document.getElementById("single1");
			        var guest1 = document.getElementById("guest1");
			        single1.style.display = combine1.value == "Y" ? "block" : "none";
			        guest1.style.display = combine1.value == "G" ? "block" : "none";
			    }
			</script>
			<input type="hidden" name="meeting_partner" value="Single">
			<span>Select Meeting Type</span>
			    <select name="meeting_partner" id = "combine1" class="form-control" onchange = "ShowHideDiv1()">
			        <option value="N">Single</option>
			        <option value="Y">Group</option>            
			        <option value="G">Guest</option>            
			    </select>
			<hr />
			<div id="single1" style="display: none">
			 <div class="form-group">
	
		<input type="text" name="dept_name" placeholder="Enter Department Name" class="form-control"><br>	 	
		<select name="meeting_partner[]" class="form-control test" multiple="multiple" style="width:180px; ">
  
            <?php
		        $view_arts_query="select * from authorities where type = 'employee'";
		        $run=mysqli_query($conn,$view_arts_query);
		        $t=0;
		        while($row=mysqli_fetch_array($run))
		        {
			        $image1=$row['image'];
					$imageURL1 = 'assets/img/'.$row["image"];

				    echo '<option value="'.$row["email"].'">  '.$row["name"].'  </option>'; 
			    } 
			?>

        </select>
				<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>	
















<!-- 
			   <select name="meeting_partner[]" id="multi_search_filter" multiple class="form-control selectpicker">
			   <?php
		        $view_arts_query="select * from authorities where type = 'employee'";
		        $run=mysqli_query($conn,$view_arts_query);
		        $t=0;
		        while($row=mysqli_fetch_array($run))
		        {


			    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>'; 
			   }
			   ?>
			   </select> -->
			 </div>
			</div>





			<div id="guest1" style="display: none">
			 <div class="form-group">
				<label>Enter Guest Name</label>

			 	<input type="text" class="form-control" name="emp_name" placeholder="Enter Guest Name">


<!-- 
			   <select name="meeting_partner[]" id="multi_search_filter" multiple class="form-control selectpicker">
			   <?php
		        $view_arts_query="select * from authorities where type = 'employee'";
		        $run=mysqli_query($conn,$view_arts_query);
		        $t=0;
		        while($row=mysqli_fetch_array($run))
		        {


			    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>'; 
			   }
			   ?>
			   </select> -->
			 </div>
			</div>


		</div>
							
							<div class="form-group">
								<label>Subject</label>
								
								<textarea class="form-control" name="subject" rows="5" required></textarea>
							</div>
							

<!-- 							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div> -->	
							<div class="submit-section text-center">
								<button type="submit" name="submit" class="btn btn-primary submit-btn">Book</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<!-- Book Appointment for madam Modal End-->


<!-- Book Appointment for Sir Modal -->
		<div class="modal fade custom-modal" id="book_for_sir">
			<div class="modal-dialog modal-dialog-centered modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Booking Appointment with <?php echo $name; ?></h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" action="book_appointment_data.php">					
						<div class="modal-body">
							
							<div class="form-group">
								<label>Select Date</label>
								<input type="date" name="booking_date" class="form-control datetimepicker" required>
								<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
								<input type="hidden" name="booking_with" value="<?php echo $sir_email; ?>" >
							</div>

							<div class="form-group">
								<label>Select Time</label>
								<input type="time" name="booking_time" class="form-control" required>


								<input type="hidden" name="emp_name" value="<?php echo $emp_name; ?>">
							</div>

							

							<div class="form-group">
								<script type="text/javascript">
							    function ShowHideDiv() {
							        var combine = document.getElementById("combine");
							        var single = document.getElementById("single");
							        var guest = document.getElementById("guest");
									
							        single.style.display = combine.value == "Y" ? "block" : "none";
							        guest.style.display = combine.value == "G1" ? "block" : "none";
							    }
								</script>
								<input type="hidden" name="meeting_partner" value="Single">
								<span>Select Meeting Type</span>
								    <select id = "combine" class="form-control" onchange = "ShowHideDiv()">
								        <option value="N">Single</option>
								        <option value="Y">Group</option>            
								        <option value="G1">Guest</option>            
								    </select>
								<hr />
								<div id="single" style="display: none">
															 <div class="form-group">
															<!-- 	<label>Select Meeting Partner (optional) </label> -->

		<input type="text" name="dept_name" placeholder="Enter Department Name" class="form-control"><br>															
		<select name="meeting_partner[]" class="form-control test" multiple="multiple" style="width:180px; ">
  
            <?php
		        $view_arts_query="select * from authorities where type = 'employee'";
		        $run=mysqli_query($conn,$view_arts_query);
		        $t=0;
		        while($row=mysqli_fetch_array($run))
		        {
			        $image1=$row['image'];
					$imageURL1 = 'assets/img/'.$row["image"];

				    echo '<option value="'.$row["email"].'">  '.$row["name"].'  </option>'; 
			    } 
			?>

        </select>
				<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>	
<!-- 															   <select name="meeting_partner[]" id="multi_search_filter" multiple class="form-control selectpicker">
															   <?php
														        $view_arts_query="select * from authorities where type = 'employee'";
														        $run=mysqli_query($conn,$view_arts_query);
														        $t=0;
														        while($row=mysqli_fetch_array($run))
														        {

												
															    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>'; 
															   }
															   ?>
															   </select> -->
															 </div>
								</div>




			<div id="guest" style="display: none">
			 <div class="form-group">
				<label>Enter Guest Name</label>

			 	<input type="text" class="form-control" name="emp_name" placeholder="Enter Guest Name">


<!-- 
			   <select name="meeting_partner[]" id="multi_search_filter" multiple class="form-control selectpicker">
			   <?php
		        $view_arts_query="select * from authorities where type = 'employee'";
		        $run=mysqli_query($conn,$view_arts_query);
		        $t=0;
		        while($row=mysqli_fetch_array($run))
		        {


			    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>'; 
			   }
			   ?>
			   </select> -->
			 </div>
			</div>


							</div>

							<div class="form-group">
								<label>Subject</label>
								<textarea class="form-control" name="subject" rows="5" required></textarea>
							</div>
							
<!-- 							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div> -->	
							<div class="submit-section text-center">
								<button type="submit" name="submit" class="btn btn-primary submit-btn">Book</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<!-- Book Appointment for sir Modal End-->




<!-- Book Appointment for CEO HOD VICE Modal -->
		<div class="modal fade custom-modal" id="book_for_ceo">
			<div class="modal-dialog modal-dialog-centered modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Booking Appointment with Vice President, CEO, HOD</h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" action="book_other_appointment_data.php">					
						<div class="modal-body">
							
							<div class="form-group">
								<label>Select Date</label>
								<input type="date" name="booking_date" class="form-control datetimepicker" required>
								<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
								<input type="hidden" name="booking_with" value="<?php echo $sir_email; ?>" >
							</div>

							<div class="form-group">
								<label>Select Time</label>
								<input type="time" name="booking_time" class="form-control" required>


								<input type="hidden" name="emp_name" value="<?php echo $emp_name; ?>">
							</div>

											<div class="form-group">
												<label>Meeting with</label>
												<select id = "HOD" name="booking_with" class="form-control" onchange = "ShowHideDiv3()">
												
													<option value="vice@admin.com">Vice President</option>
													<option value="ceo@admin.com">CEO</option>
													<option value="Y">HOD</option>
												 </select>
											</div>
									

						<div class="form-group">
								<script type="text/javascript">
								    function ShowHideDiv3() {
								        var HOD = document.getElementById("HOD");
								        var single3 = document.getElementById("single3");
								        single3.style.display = HOD.value == "Y" ? "block" : "none";
								    }
								</script>
					<!-- 			<span>Meeting With</span>
								    <select id = "HOD" class="form-control" onchange = "ShowHideDiv()">


								        <option value="N">Single</option>
								        <option value="Y">Combine</option>  


								    </select>
								<hr /> -->
								<div id="single3" style="display: none">
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
					












							

<!-- 							<div class="form-group">
<script type="text/javascript">
function ShowHideDiv() {
var combine = document.getElementById("combine");
var single = document.getElementById("single");
var guest = document.getElementById("guest");

single.style.display = combine.value == "Y" ? "block" : "none";
guest.style.display = combine.value == "G1" ? "block" : "none";
}
</script>
<input type="hidden" name="meeting_partner" value="single">
<span>Select Meeting Type</span>
<select id = "combine" class="form-control" onchange = "ShowHideDiv()">
<option value="N">Single</option>
<option value="Y">Group</option>            
<option value="G1">Guest</option>            
</select>
<hr />
<div id="single" style="display: none">
			 <div class="form-group">
			

				
<select name="meeting_partner[]" class="form-control test" multiple="multiple" style="width:180px; ">

<?php
$view_arts_query="select * from authorities where type = 'employee'";
$run=mysqli_query($conn,$view_arts_query);
$t=0;
while($row=mysqli_fetch_array($run))
{
$image1=$row['image'];
$imageURL1 = 'assets/img/'.$row["image"];

echo '<option value="'.$row["email"].'">  '.$row["name"].'  </option>'; 
} 
?>

</select>
<script>
(function($) {
$(function() {
window.fs_test = $('.test').fSelect();
});
})(jQuery);
</script>	

			 </div>
</div>

<div id="guest" style="display: none">
<div class="form-group">
<label>Enter Guest Name</label>

<input type="text" class="form-control" name="emp_name" placeholder="Enter Guest Name">
</div>
</div>


</div> -->

							<div class="form-group">
								<label>Subject</label>
								<textarea class="form-control" name="subject" rows="5" required></textarea>
							</div>
							
<!-- 							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div> -->	
							<div class="submit-section text-center">
								<button type="submit" name="submit" class="btn btn-primary submit-btn">Book</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<!-- Book Appointment for CEO HOD VICE Modal End-->


<br><br><br>



		<?php require_once('inc/footer.php'); ?>