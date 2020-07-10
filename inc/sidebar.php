	<?php 
	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('/', $path);
	$page = $components[2];

	?>

	<div class="profile-sidebar">
	 <?php
	    include("inc/conn.php");
	    $email= $_SESSION["email"];
	    $view_arts_query="select * from authorities where email='$email'";
	    $run=mysqli_query($conn,$view_arts_query);
	    $t=0;
	    while($row=mysqli_fetch_array($run))
	    {

	      $id = $row['id'];
	      $image = $row['image'];
	      $name = $row['name'];
	      $modes = $row['modes'];
	      $designation = $row['designation'];
	      $image = $row['image'];
	      $type = $row['type'];
	      $imageURL = 'assets/img/'.$row["image"];

	      if($type != "authority"){
	      	$badge = "none";
	      }else{
	      	$badge = "";
	      }
	  ?>
		<div class="widget-profile pro-widget-content">
			<div class="profile-info-widget">
				<a href="#" class="booking-doc-img">
					<img src="<?php echo $imageURL; ?>">
				</a>
				<div class="profile-det-info">
					
					<h3><?php echo $row["name"]; ?></h3>
					
					
					<div class="patient-details">
						<h5 class="mb-0"><?php echo $row["designation"]; ?></h5><br>
						
					</div>
					<h5 style="text-transform: capitalize; <?php if($type == 'authority'){echo "display: none"; } else{ echo ""; } ?>">My ID: <?php echo $row["id"]; ?></h5>
					<h5 class="mb-0" style="text-transform: capitalize; <?php if($type != 'authority'){echo "display: none"; } else{ echo ""; } ?>"><b><?php echo $row["modes"]; ?> Mode</b></h5>
				</div>
			</div>
		</div><?php } ?>

		<div class="dashboard-widget">
			<nav class="dashboard-menu">
	 <?php
	    include("inc/conn.php");
	    $email= $_SESSION["email"];
	    $view_arts_query="select * from user_control where email='$email'";
	    $run=mysqli_query($conn,$view_arts_query);
	    $t=0;
	    while($row=mysqli_fetch_array($run))
	    {
	      $dashboard = $row['dashboard'];
	      $profile_setting = $row['profile_setting'];
	      $change_password = $row['change_password'];
	      $book_other_appointments = $row['book_other_appointments'];
	      $logout = $row['logout'];
	    } 

	    			$date = date('Y-d-m');
					$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and approve_status = 'Pending Approval' and status != 'Rejected'");
					
					// echo $email; die;
					$row = mysqli_fetch_array($result);
					$Pending_Appointments = $row[0];
	  ?>
				<ul>


					<li class="<?php if ($page == 'dashboard.php') echo 'active'?>" >
						<a href="dashboard.php" >
							<i class="fas fa-columns"></i>
							<span>Dashboard <span class="badge badge-warning" style="font-size:12px; margin-left: 100px; display: <?php echo $badge; ?>"><b id="refresh"> <?php echo $Pending_Appointments; ?></b></span></span>
						</a>		
					</li>

					<li class="<?php if ($page == 'book_appointment.php') echo 'active'?>" style="display: <?php if($book_appointments == 1){ echo "block"; }else{ echo "none"; } ?>">
						<a href="book_appointment.php">
							<i class="fas fa-columns"></i>
							<span>Apply Appointment</span>
						</a>		
					</li>


<!-- 					<li class="<?php if ($page == 'book_guest_appointment.php') echo 'active'?>" style="display: <?php if($type == 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="book_guest_appointment.php">
							<i class="fas fa-columns"></i>
							<span>Book Guest Appointment</span>
						</a>		
					</li> -->

<!-- 					<li class="<?php if ($page == 'guest_appointments.php') echo 'active'?>" style="display: <?php if($type != 'authority'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="guest_appointments.php">
							<i class="fas fa-columns"></i>
							<span>Guest Appointments</span>
						</a>		
					</li> -->

<!-- 					<li class="<?php if ($page == 'book_other_appointment.php') echo 'active'?>" style="display: <?php if($type == 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="book_other_appointment.php">
							<i class="fas fa-columns"></i>
							<span>Book Other Appointments</span>
						</a>		
					</li> -->
					 <?php
								require_once("inc/conn.php");
								$date = date('Y-d-m');
								$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and approve_status = 'Pending Approval' and meeting_type != 'Group'");

								// echo $email; die;
								$row = mysqli_fetch_array($result);
								$Pending_Appointments = $row[0];

							 ?>


<!-- 					<li class="<?php if ($page == 'approval_pending_appointments.php') echo 'active'?>" style="display: <?php if($type != 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="approval_pending_appointments.php">
							<i class="fas fa-columns"></i>
							<span>Pending Appointments <span style="margin-left: 35px;">

								<span id="refresh" class="badge badge-warning"><b> <?php echo $Pending_Appointments; ?></b></span>
							
							</span></span>
						</a>		
					</li> -->

					<li  class="<?php if ($page == 'employee_appointment_status.php') echo 'active'?>" style="display: <?php if($type == 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="employee_appointment_status.php">
							<i class="fas fa-columns"></i>
							<span>Appointment Status</span>
						</a>		
					</li>

<!-- 					<li class="<?php if ($page == 'group_appointment.php') echo 'active'?>" style="display: <?php if($type == 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="group_appointment.php">
							<i class="fas fa-columns"></i>
							<span>Group Appointments</span>
						</a>		
					</li> -->

<!-- 					<li class="<?php if ($page == 'employee_current_meeting.php') echo 'active'?>" style="display: <?php if($type == 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="employee_current_meeting.php">
							<i class="fas fa-columns"></i>
							<span>Current Group Meeting </span>
						</a>		
					</li> -->		


					 <?php
								require_once("inc/conn.php");
								$date = date('Y-d-m');
								$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and approve_status = 'Pending Approval' and meeting_type = 'Group'");

								// echo $email; die;
								$row = mysqli_fetch_array($result);
								$Pending_Appointments = $row[0];

							 ?>



<!-- 					<li class="<?php if ($page == 'authority_group_appointment.php') echo 'active'?>" style="display: <?php if($type == 'authority'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="authority_group_appointment.php">
							<i class="fas fa-columns"></i>
							<span>Group Appointments   <span style="margin-left: 50px;"><b>(<?php echo $Pending_Appointments; ?>)</b></span></span>
						</a>		
					</li> -->

<!-- 					<li class="<?php if ($page == 'current_meeting.php') echo 'active'?>" style="display: <?php if($type == 'authority'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="current_meeting.php">
							<i class="fas fa-columns"></i>
							<span>Current Group Meeting </span>
						</a>		
					</li>	 -->

					<li class="<?php if ($page == 'appointments.php') echo 'active'?>"  style="display: <?php if($type == 'authority'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="appointments.php">
							<i class="fas fa-columns"></i>
							<span>All Appointments</span>
						</a>		
					</li>

					<li class="<?php if ($page == 'employee_appointments.php') echo 'active'?>" style="display: <?php if($type == 'employee'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="employee_appointments.php">
							<i class="fas fa-columns"></i>
							<span>All Appointments</span>
						</a>		
					</li>

					<li class="<?php if ($page == 'my_appointments.php') echo 'active'?>" style="display: <?php if($type != 'employee' and $type != 'authority'){ echo "block"; }else{ echo "none"; } ?>">
						<a href="my_appointments.php">
							<i class="fas fa-columns"></i>
							<span>My Appointments</span>
						</a>		
					</li>

					<li class="<?php if ($page == 'profile_setting.php') echo 'active'?>" style="display: <?php if($profile_setting == 1){ echo "block"; }else{ echo "none"; } ?>">
						<a href="profile_setting.php">
							<i class="fas fa-user-cog"></i>
							<span>Profile Settings</span>
						</a>
					</li>

					<li class="<?php if ($page == 'change_password.php') echo 'active'?>" style="display: <?php if($change_password == 1){ echo "block"; }else{ echo "none"; } ?>">
						<a href="change_password.php">
							<i class="fas fa-lock"></i>
							<span>Change Password</span>
						</a>
					</li>
					
					<li style="display: <?php if($logout == 1){ echo "block"; }else{ echo "none"; } ?>">
						<a href="logout.php?logout=<?php echo $logout; ?>">
							<i class="fas fa-sign-out-alt"></i>
							<span>Logout</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>	
	</div> 



