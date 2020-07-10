<?php

session_start();

$semail = $_SESSION["email"];
include("inc/conn.php");
$view_arts_query="select * from authorities";
$run=mysqli_query($conn,$view_arts_query);
$t=0;
while($row=mysqli_fetch_array($run))
{
    $t++;
    $email = $row['email'];
}

// echo $semail; die;
// if($email != $semail){
// 	echo "<script>window.open('login.php','_self')</script>";
// }else{
// }

if(!isset($_SESSION["email"])){
	echo "<script>window.open('login.php','_self')</script>";
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
      $type = $row['type'];
    }


    if($type == 'employee'){
    	$employee = "block";
    }else{
    	$employee = "none";
    }


    if($type == 'authority'){
    	$authority = "block";
    }else{
    	$authority = "none";
    }


    if($type == 'vice_president'){
    	$vice_president = "block";
    }else{
    	$vice_president = "none";
    }

    if($type == 'ceo'){
    	$ceo = "block";
    }else{
    	$ceo = "none";
    }

    if($type == 'hod'){
    	$hod = "block";
    }else{
    	$hod = "none";
    }


?>
 
</div>

<!-- EMPLOYEE DASHBOARD START-->
<div class="col-md-7 col-lg-8 col-xl-9" style="display:<?php echo $employee; ?>">
	<div class="row">

							 <?php
								require_once("inc/conn.php");

								$result = mysqli_query($conn,"select * FROM authorities where email='madam@admin.com'");
								$row = mysqli_fetch_array($result);
								$modes = $row["modes"];
								
								$result1 = mysqli_query($conn,"select * FROM authorities where email='sir@admin.com'");
								$row1 = mysqli_fetch_array($result1);
								$modes1 = $row1["modes"];

							 ?>


							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Director is on  <strong><?php echo $modes; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>


							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Managing Director is on  <strong><?php echo $modes1; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>


		<div class="col-md-12">
			<div class="card dash-card">
				<div class="card-body">
					<div class="row">
						 <?php
						require_once("inc/conn.php");


						$date = date('Y-d-m');
						$resultTA = mysqli_query($conn,"select count(1) FROM appointments where email = '$email' and status = 'Waiting' and booking_date = '$date'");
						$row = mysqli_fetch_array($resultTA);
						$TA = $row[0];

						


						

						$result = mysqli_query($conn,"select count(1) FROM appointments where email = '$email' and status = 'Waiting'");
						$row = mysqli_fetch_array($result);
						$waiting = $row[0];




						$result1 = mysqli_query($conn,"select count(1) FROM appointments where email = '$email' and status = 'Accepted'");
						$row1 = mysqli_fetch_array($result1);
						$accepted = $row1[0];


						$result3 = mysqli_query($conn,"select count(1) FROM appointments where email = '$email' and status = 'Rejected'");
						$row2 = mysqli_fetch_array($result3);
						$rejected = $row2[0];

						?>


						<div class="col-md-12 col-lg-3">
						<div class="dash-widget dct-border-rht">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="0">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Today's <br> Appointments</h6>
						<h3><?php echo $TA; ?></h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>


						<div class="col-md-12 col-lg-3">
						<div class="dash-widget dct-border-rht">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="0">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6  style="font-size: 14px;">Pending <br> Appointments</h6>
						<h3>0</h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>


						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="<?php echo $waiting; ?>">
										<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
									<h6s tyle="font-size: 14px;">Total <br> Appointments</h6>
									<h3><?php echo $waiting; ?></h3>
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="<?php echo $accepted; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Accepted <br> Appointments</h6>
						<h3><?php echo $accepted; ?></h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar3">
						<div class="circle-graph3" data-percent="<?php echo $rejected; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Rejected <br> Appointments</h6>
						<h3><?php echo $rejected; ?></h3>
						<!-- <p class="text-muted">06, Apr 2019</p> -->
						</div>
						</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>


		<div class="row">
			<div class="col-md-12">
				<!-- <h4 class="mb-4">Emloyee Appoinments</h4> -->
				<div class="appointment-tab">
				
					<!-- Appointment Tab -->
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">

						<li class="nav-item">
							<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Appointment List</a>
						</li>
				
						<li class="nav-item">
							<a class="nav-link" href="#pending-appointments" data-toggle="tab">Pending List</a>
						</li>
				
						<li class="nav-item">
							<a class="nav-link" href="#today-appointments" data-toggle="tab">Accepted List</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#rejected-appointments" data-toggle="tab">Rejected List</a>
						</li> 

					</ul>
					<!-- /Appointment Tab -->
					
					<div class="tab-content">
					
						<!-- Upcoming Appointment Tab -->
						<div class="tab-pane show active" id="upcoming-appointments">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_user_data1">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->
				   					
						<!-- Pending Appointment Tab -->
						<div class="tab-pane show" id="pending-appointments">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="employee_pending_list">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Pending Appointment Tab -->
				   
						<!-- Today Appointment Tab -->
						<div class="tab-pane" id="today-appointments">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_al1">
										
								  </div>

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->

						<!-- Rejected Appointment Tab -->
						<div class="tab-pane" id="rejected-appointments">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_rl1">
										
								  </div>	

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->



						
					</div>
				</div>
			</div>
		</div>
</div>
<!-- EMPLOYEE DASHBOARD END -->


<!-- AUTHORITY DASHBOARD START-->						
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
<div class="col-md-7 col-lg-8 col-xl-9" style="display:<?php echo $authority; ?>">

	<div class="card" style="<?php if($type != 'authority') {echo "display:none";} else {echo "";} ?>">

	<div class="row">
		<div class="col-md-12">
			<div class="card dash-card">
				<div class="card-body">
					<div class="row">
						
						<?php
						require_once("inc/conn.php");

						$date = date('Y-d-m');
						$date1 =strtotime("-1 day");
						$PNdate = date('Y-d-m',$date1);

						$resultOA = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email'");
						$row = mysqli_fetch_array($resultOA);
						$Overall = $row[0];

						
						$resultTA = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and waiting_area = 'Yes' and booking_date <= '$date'");
						$row = mysqli_fetch_array($resultTA);
						$TA = $row[0];

						
						$resultPN = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$PNdate'");
						$row = mysqli_fetch_array($resultPN);
						$PN = $row[0];

						$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and approve_status = 'Waiting' and booking_date = '$date'");
						$row = mysqli_fetch_array($result);
						$waiting = $row[0];

						$result1 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Accepted'  and booking_date = '$date'");
						$row1 = mysqli_fetch_array($result1);
						$accepted = $row1[0];

						$result3 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Rejected'");
						$row2 = mysqli_fetch_array($result3);
						$rejected = $row2[0];

						?>

						<div class="col-md-12 col-lg-3" style="padding-bottom:20px;">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 13px;">Total <br>Appointments</h6>


									<h3><?php echo $Overall; ?></h3>
									<p class="text-muted">Till Today</p>
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Today's <br>Appointments</h6>
									<h3><?php echo $TA; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Pending <br> Appointments</h6>
									<h3><?php echo $PN; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="<?php echo $waiting; ?>">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Waiting <br>Appointments</h6>
									<h3><?php echo $waiting; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>


						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="<?php echo $accepted; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Accepted Appointments</h6>
						<h3><?php echo $accepted; ?></h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar3">
						<div class="circle-graph3" data-percent="<?php echo $rejected; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Rejected Appointments</h6>
						<h3><?php echo $rejected; ?></h3>
						<!-- <p class="text-muted">06, Apr 2019</p> -->
						</div>
						</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row">
			<div class="col-md-12">
				<!-- <h4 class="mb-4">Emloyee Appoinments</h4> -->
				<div class="appointment-tab">

				 <?php
					require_once("inc/conn.php");
					$date = date('Y-d-m');

					$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and approve_status = 'Pending Approval' and meeting_type != 'Group' and status != 'Rejected'");
					
					// echo $email; die;
					$row = mysqli_fetch_array($result);
					$Pending_Appointments = $row[0];

					$result1 = mysqli_query($conn,"select count(1) FROM appointments where booking_with='$email' and status='Waiting' and booking_date <='$date' and waiting_area = 'Yes'");

					// echo $email; die;
					$row1 = mysqli_fetch_array($result1);
					$waitingList = $row1[0];

					$result2 = mysqli_query($conn,"select count(1) FROM appointments where booking_with='$email' and status='Accepted' and booking_date <='$date'");

					// echo $email; die;
					$row2 = mysqli_fetch_array($result2);
					$acceptedList = $row2[0];

					$result3 = mysqli_query($conn,"select count(1) FROM appointments where booking_with='$email' and status='Rejected' and booking_date <='$date'");

					// echo $email; die;
					$row3 = mysqli_fetch_array($result3);
					$rejectedList = $row3[0];

				 ?>
				
					<!-- Appointment Tab -->
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">


						<li class="nav-item">
							<a class="nav-link active" href="#pending" data-toggle="tab">Pending Appointments <!-- <span id="refresh" class="badge badge-light" style="font-size:12px;"><b> <?php echo $Pending_Appointments; ?></b></span> --></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#upcoming-appointments1" data-toggle="tab">Waiting List <!-- <span id="refresh" class="badge badge-light" style="font-size:12px;"><b> <?php echo $waitingList; ?></b></span> --></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="#pending-appointments1" data-toggle="tab">Pending List</a>
						</li>						
						<li class="nav-item">
							<a class="nav-link" href="#today-appointments1" data-toggle="tab">Accepted List <!-- <span id="refresh" class="badge badge-light" style="font-size:12px;"><b> <?php echo $acceptedList; ?></b></span> --></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#rejected-appointments1" data-toggle="tab">Rejected List <!-- <span id="refresh" class="badge badge-light" style="font-size:12px;"><b> <?php echo $rejectedList; ?></b></span> --></a>
						</li> 
					</ul>
					<!-- /Appointment Tab -->
					
					<div class="tab-content">
					
						<!-- Upcoming Appointment Tab -->
						<div class="tab-pane show active" id="pending">
							<div class="card card-table mb-0">
								<div class="card-body">
									<div id = "range_records" class="table-responsive">
										<table id="example" class="table datatable table-hover table-center mb-0" data-searching="true">
									<div class="table-responsive">
										<thead>
												<tr>
													<th>ID </th>
													<th>Employee Name</th>
													<th>Subject</th>
													<th>Partners</th>
													<th>Meeting Type</th>
													<th>Apointment At</th>
													<th style="text-align: center;">Action</th>
												</tr>
											</thead>
											<tbody>


 				 <?php

			        include("inc/conn.php");

			        $view_arts_query5="select * from authorities where email='$email'";
			        $run5=mysqli_query($conn,$view_arts_query5);
			        $t=0;
			        while($row=mysqli_fetch_array($run5))
			        {
				        $modified_at = $row['modified_at'];
				        $modes = $row['modes'];
				    }

				    if($modes == 'DND'){
						$view_arts_query="select * from appointments where booking_with='$email' and modified_at <= '$modified_at'order by id desc";
					}elseif ($modes == 'meeting') {
						$view_arts_query="select * from appointments where booking_with='$email' and modified_at <= '$modified_at' order by id desc";
					}else{
			       	 	$view_arts_query="select * from appointments where booking_with='$email'  and status != 'Rejected' order by approve_status desc";
					}


			        $run=mysqli_query($conn,$view_arts_query);
			        $t=0;
			        while($row=mysqli_fetch_array($run))
			        {
				        $t++;
				        $id = $row['id'];
				        $email = $row['email'];
				        $emp_name = $row['emp_name'];
				        $booking_date = $row['booking_date'];
				        $revert_booking_date = $row['revert_booking_date'];
				        $booking_time = $row['booking_time'];
				        $revert_booking_time = $row['revert_booking_time'];
				        $booking_with = $row['booking_with'];
				        $subject=$row['subject'];
				        $status=$row['status'];
				        $guest=$row['guest'];
				        $approve_status=$row['approve_status'];
				        $meeting_partner=$row['meeting_partner'];
				        $meeting_type=$row['meeting_type'];

				        	// Fetching Customer Profile detail:
				        	$view_arts_query1="select * from authorities where email = '$email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$name1=$row['name'];
				        		$image1=$row['image'];
				        		$imageURL1 = '../assets/img/'.$row["image"];
					        }

				        	// Fetching Authority Profile detail:
				        	$view_arts_query2="select * from authorities where email = '$booking_with'";

					        $run2=mysqli_query($conn,$view_arts_query2);
					        while($row=mysqli_fetch_array($run2))
					        {
					        	$name2=$row['name'];
					        	$auth_email = ['email'];
				        		$image2=$row['image'];
				        		$imageURL2 = '../assets/img/'.$row["image"];
					        }

					        if(empty($imageURL1)){
					        		$imageURL1 = "../assets/img/guest.png";
					        	}
					        
					        if(empty($meeting_partner)){
					        		$meeting_partner = "Employee Selected <br> Single Meeting";
					        	}
					        	
					        	if($approve_status == 'Approved'){
					        		$hiderevert = "none";
					        	}else{
					        		$hiderevert = "";
					        	}
					        	
					        	
					        if($status == "Rejected"){
					            $status1 = "Rejected";
					        }else{
					            $status1 = "Reject";
					        }

					        	$semail = $_SESSION["email"];

					        	if ($guest == 'yes') {
					        		$meeting_type="Guest";
					        	}


// echo $meeting_partner; die;

$sql = "SELECT * FROM authorities where FIND_IN_SET('omkar@ycstech.in',email)";
			      ?>
			      
						<tr style="background-color:<?php if($approve_status == 'Pending Approval'){ echo '#d5d0d085'; }else { echo '#fff'; } ?>">
							<td><?php echo $id; ?></td>
							<td>
								<h2 class="table-avatar">
									<!-- <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL1; ?>" alt="User Image"></a> -->
									
									<a href="javascript:void()">

										<?php 

										if($guest == 'yes')

											{

											echo $name1;
											echo "<br>";
											echo "<br><b> Guest Name:</b> <bR>";
											}
											
											echo $emp_name;
										



										  ?>
										 	

										 </a>
								</h2>
							</td>
							<!-- <td>#101</td> -->
							<td>
								<h2 class="table-avatar">
								
									<a href="javascript:void()"><?php echo $subject; ?> </a>
								</h2>
							</td>

							<td><?php echo $meeting_partner; ?></td>
							<td><?php echo $meeting_type; ?></td>
							<td>
							<b>	<?php echo $booking_date; ?> </b><span class="text-primary d-block"><?php echo $booking_time; ?></span>
								

								      		<br>
							<?php if(!empty($revert_booking_time)){ echo "<b>Revert Time</b><br>"; echo $revert_booking_date; ?> <span class="text-primary d-block"><?php echo $revert_booking_time;} ?>

							</td>
						
							<td>
								
						<a href="approved.php?id=<?php echo $id; ?>"><button type="button" name="accept"  class="btn btn-sm bg-primary-light delete" id="del_<?php echo $id; ?>"> <?php echo $approve_status; ?></button></a><br><br>

						<a href="#ex1<?php echo $id; ?>" rel="modal:open" style="display:<?php echo $hiderevert; ?>"><button type="button" name="revert" class="btn btn-sm bg-success-light delete" id="del_<?php echo $id; ?>" ><i class="fas fa-stopwatch"></i> Revert</button></a><br><br>
					
						<!-- 						<a href="accept.php?id=<?php echo $id; ?>" style="display:'.$hide1.'"><button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_<?php echo $id; ?>"><i class="fas fa-check"></i> Accept</button></a>
											 -->

						<a href="reject.php?id=<?php echo $id; ?>" style="display:<?php echo $hiderevert; ?>"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="<?php echo $id; ?>"><i class="fas fa-times"></i> <?php echo $status1; ?></button></a>
						
							</td>


							<div id="ex1<?php echo $id; ?>" class="modal" style="height:350px;">

  					<div class="modal-header">
						<h5 class="modal-title">Give Reminder to Employee <?php echo $emp_name; ?></h5>
					</div>
					<div class="modal-body" style="margin-left: -50px !important;">
						<form method="post" action="revert_date_time.php">
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-8" style="margin-left: 70px;">
												<div class="form-group">
													<label>Select Date (Year-Day-Month)</label>
													<input type="text" class="form-control" name="revert_booking_date" value="<?php echo $booking_date; ?>" required><br>
													<label>Select Time</label>

													<input type="text" class="form-control" name="revert_booking_time" value="<?php echo $booking_time; ?>" required>

													<input type="hidden" name="id" value="<?php echo $id; ?>">
												</div> 
												<input type="submit" class="form-control" name="submit" value="submit">
									</div>
								</div>
							</div>	
						</form>
					</div>
		</div>






						</tr><?php } ?>


											</tbody>
										</table>



									</div>

								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->	
					
						<!-- Upcoming Appointment Tab -->
						<div class="tab-pane show" id="upcoming-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->	

						<!-- Pending Appointment Tab -->
						<div class="tab-pane show" id="pending-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_pending_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Pending Appointment Tab -->
				   
						<!-- Today Appointment Tab -->
						<div class="tab-pane" id="today-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_al">
										
								  </div>

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->

						<!-- Rejected Appointment Tab -->
						<div class="tab-pane" id="rejected-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_rl">
										
								  </div>	

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->



						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- AUTHORITY DASHBOARD END -->


<!-- VICE PRESIDENT DASHBOARD START-->						
<div class="col-md-7 col-lg-8 col-xl-9" style="display:<?php echo $vice_president; ?>">

	<div class="row">
		<div class="col-md-12">

							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Director is on  <strong><?php echo $modes; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>


							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Managing Director is on  <strong><?php echo $modes1; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
			<div class="card dash-card">
				<div class="card-body">
					<div class="row">
						 <?php
						require_once("inc/conn.php");

						$date = date('Y-d-m');
						$date1 =strtotime("-1 day");
						$PNdate = date('Y-d-m',$date1);

						$resultTA = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$date'");
						$row = mysqli_fetch_array($resultTA);
						$TA = $row[0];

						
						$resultPN = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$PNdate'");
						$row = mysqli_fetch_array($resultPN);
						$PN = $row[0];

						$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting'");
						$row = mysqli_fetch_array($result);
						$waiting = $row[0];

						$result1 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Accepted'");
						$row1 = mysqli_fetch_array($result1);
						$accepted = $row1[0];

						$result3 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Rejected'");
						$row2 = mysqli_fetch_array($result3);
						$rejected = $row2[0];

						?>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Today's <br>Appointments</h6>
									<h3><?php echo $TA; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Pending <br> Appointments</h6>
									<h3><?php echo $PN; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="<?php echo $waiting; ?>">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Waiting <br>Appointments</h6>
									<h3><?php echo $waiting; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>


						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="<?php echo $accepted; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Accepted Appointments</h6>
						<h3><?php echo $accepted; ?></h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar3">
						<div class="circle-graph3" data-percent="<?php echo $rejected; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Rejected Appointments</h6>
						<h3><?php echo $rejected; ?></h3>
						<!-- <p class="text-muted">06, Apr 2019</p> -->
						</div>
						</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row">
			<div class="col-md-12">
				<!-- <h4 class="mb-4">Emloyee Appoinments</h4> -->
				<div class="appointment-tab">
				
					<!-- Appointment Tab -->
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
						<li class="nav-item">
							<a class="nav-link active" href="#upcoming-appointments1" data-toggle="tab">Waiting List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#pending-appointments1" data-toggle="tab">Pending List</a>
						</li>						
						<li class="nav-item">
							<a class="nav-link" href="#today-appointments1" data-toggle="tab">Accepted List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#rejected-appointments1" data-toggle="tab">Rejected List</a>
						</li> 
					</ul>
					<!-- /Appointment Tab -->
					
					<div class="tab-content">
					
						<!-- Upcoming Appointment Tab -->
						<div class="tab-pane show active" id="upcoming-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->	

						<!-- Pending Appointment Tab -->
						<div class="tab-pane show" id="pending-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_pending_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Pending Appointment Tab -->
				   
						<!-- Today Appointment Tab -->
						<div class="tab-pane" id="today-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_al">
										
								  </div>

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->

						<!-- Rejected Appointment Tab -->
						<div class="tab-pane" id="rejected-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_rl">
										
								  </div>	

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->



						
					</div>
				</div>
			</div>
		</div>
</div>
<!-- VICE PRESIDENT DASHBOARD END -->


<!-- CEO DASHBOARD START-->						
<div class="col-md-7 col-lg-8 col-xl-9" style="display:<?php echo $ceo; ?>">

	<div class="row">
		<div class="col-md-12">

							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Director is on  <strong><?php echo $modes; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>


							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Managing Director is on  <strong><?php echo $modes1; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
			<div class="card dash-card">
				<div class="card-body">
					<div class="row">
						 <?php
						require_once("inc/conn.php");

						$date = date('Y-d-m');
						$date1 =strtotime("-1 day");
						$PNdate = date('Y-d-m',$date1);

						$resultTA = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$date'");
						$row = mysqli_fetch_array($resultTA);
						$TA = $row[0];

						
						$resultPN = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$PNdate'");
						$row = mysqli_fetch_array($resultPN);
						$PN = $row[0];

						$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting'");
						$row = mysqli_fetch_array($result);
						$waiting = $row[0];

						$result1 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Accepted'");
						$row1 = mysqli_fetch_array($result1);
						$accepted = $row1[0];

						$result3 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Rejected'");
						$row2 = mysqli_fetch_array($result3);
						$rejected = $row2[0];

						?>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Totday's <br>Appointments</h6>
									<h3><?php echo $TA; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Pending <br> Appointments</h6>
									<h3><?php echo $PN; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="<?php echo $waiting; ?>">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Waiting <br>Appointments</h6>
									<h3><?php echo $waiting; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>


						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="<?php echo $accepted; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Accepted Appointments</h6>
						<h3><?php echo $accepted; ?></h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar3">
						<div class="circle-graph3" data-percent="<?php echo $rejected; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Rejected Appointments</h6>
						<h3><?php echo $rejected; ?></h3>
						<!-- <p class="text-muted">06, Apr 2019</p> -->
						</div>
						</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row">
			<div class="col-md-12">
				<!-- <h4 class="mb-4">Emloyee Appoinments</h4> -->
				<div class="appointment-tab">
				
					<!-- Appointment Tab -->
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
						<li class="nav-item">
							<a class="nav-link active" href="#upcoming-appointments1" data-toggle="tab">Waiting List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#pending-appointments1" data-toggle="tab">Pending List</a>
						</li>						
						<li class="nav-item">
							<a class="nav-link" href="#today-appointments1" data-toggle="tab">Accepted List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#rejected-appointments1" data-toggle="tab">Rejected List</a>
						</li> 
					</ul>
					<!-- /Appointment Tab -->
					
					<div class="tab-content">
					
						<!-- Upcoming Appointment Tab -->
						<div class="tab-pane show active" id="upcoming-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->	

						<!-- Pending Appointment Tab -->
						<div class="tab-pane show" id="pending-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_pending_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Pending Appointment Tab -->
				   
						<!-- Today Appointment Tab -->
						<div class="tab-pane" id="today-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_al">
										
								  </div>

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->

						<!-- Rejected Appointment Tab -->
						<div class="tab-pane" id="rejected-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_rl">
										
								  </div>	

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->



						
					</div>
				</div>
			</div>
		</div>
</div>
<!-- CEO DASHBOARD END -->


<!-- HOD DASHBOARD START-->						
<div class="col-md-7 col-lg-8 col-xl-9" style="display:<?php echo $hod; ?>">

	<div class="row">
		<div class="col-md-12">

							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Director is on  <strong><?php echo $modes; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>


							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  Managing Director is on  <strong><?php echo $modes1; ?></strong> Mode
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
			<div class="card dash-card">
				<div class="card-body">
					<div class="row">
						 <?php
						require_once("inc/conn.php");

						$date = date('Y-d-m');
						$date1 =strtotime("-1 day");
						$PNdate = date('Y-d-m',$date1);

						$resultOA = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email'");
						$row = mysqli_fetch_array($resultOA);
						$Overall = $row[0];

						
						$resultTA = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$date'");
						$row = mysqli_fetch_array($resultTA);
						$TA = $row[0];

						
						$resultPN = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting' and booking_date = '$PNdate'");
						$row = mysqli_fetch_array($resultPN);
						$PN = $row[0];

						$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and status = 'Waiting'");
						$row = mysqli_fetch_array($result);
						$waiting = $row[0];

						$result1 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Accepted'");
						$row1 = mysqli_fetch_array($result1);
						$accepted = $row1[0];

						$result3 = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and  status = 'Rejected'");
						$row2 = mysqli_fetch_array($result3);
						$rejected = $row2[0];

						?>

					    <div class="col-md-12 col-lg-3" style="padding-bottom:20px;">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 13px;">Total <br>Appointments</h6>
									<h3><?php echo $Overall; ?></h3>
									<p class="text-muted">Till Today</p>
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Today's <br>Appointments</h6>
									<h3><?php echo $TA; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="0">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Pending <br> Appointments</h6>
									<h3><?php echo $PN; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
							<div class="dash-widget dct-border-rht">
								<div class="circle-bar circle-bar1">
									<div class="circle-graph1" data-percent="<?php echo $waiting; ?>">
									<img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
									</div>
								</div>
								<div class="dash-widget-info">
								<h6 style="font-size: 14px;">Waiting <br>Appointments</h6>
									<h3><?php echo $waiting; ?></h3>
									<!-- <p class="text-muted">Till Today</p> -->
								</div>
							</div>
						</div>


						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar2">
						<div class="circle-graph2" data-percent="<?php echo $accepted; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Accepted Appointments</h6>
						<h3><?php echo $accepted; ?></h3>
						<!-- <p class="text-muted">06, Nov 2019</p> -->
						</div>
						</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
						<div class="dash-widget">
						<div class="circle-bar circle-bar3">
						<div class="circle-graph3" data-percent="<?php echo $rejected; ?>">
						<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
						</div>
						</div>
						<div class="dash-widget-info">
						<h6 style="font-size: 14px;">Rejected Appointments</h6>
						<h3><?php echo $rejected; ?></h3>
						<!-- <p class="text-muted">06, Apr 2019</p> -->
						</div>
						</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row">
			<div class="col-md-12">
				<!-- <h4 class="mb-4">Emloyee Appoinments</h4> -->
				<div class="appointment-tab">
				
					<!-- Appointment Tab -->
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
						<li class="nav-item">
							<a class="nav-link active" href="#upcoming-appointments1" data-toggle="tab">Waiting List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#pending-appointments1" data-toggle="tab">Pending List</a>
						</li>						
						<li class="nav-item">
							<a class="nav-link" href="#today-appointments1" data-toggle="tab">Accepted List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#rejected-appointments1" data-toggle="tab">Rejected List</a>
						</li> 
					</ul>
					<!-- /Appointment Tab -->
					
					<div class="tab-content">
					
						<!-- Upcoming Appointment Tab -->
						<div class="tab-pane show active" id="upcoming-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->	

						<!-- Pending Appointment Tab -->
						<div class="tab-pane show" id="pending-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

									<div class="table-responsive" id="madam_pending_user_data">
										
									</div>

								</div>
							</div>
						</div>
						<!-- /Pending Appointment Tab -->
				   
						<!-- Today Appointment Tab -->
						<div class="tab-pane" id="today-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_al">
										
								  </div>

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->

						<!-- Rejected Appointment Tab -->
						<div class="tab-pane" id="rejected-appointments1">
							<div class="card card-table mb-0">
								<div class="card-body">

								  <div class="table-responsive" id="madam_user_data_rl">
										
								  </div>	

								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->



						
					</div>
				</div>
			</div>
		</div>
</div>
<!-- HOD DASHBOARD END -->


</div>
</div>
</div>
</div>
</div>
<!-- DND MODE START -->
		<div class="modal fade custom-modal" id="dnd">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" style="margin-left: 200px;">You are going to activate DND Mode</h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times; </span></button>
					</div>
					<form method="post" action="mode_status_update.php">

					
						<div class="modal-body">
							<center>
							<p style="color: red;">By activating DND mode you will not receive any updates...</p>
							<h5> Below peoples are waiting for your appointment </h5> <br></center>
							
							<table id="example" class="datatable table table-hover table-center  table-bordered  mb-0" data-searching="true">
											<thead>
												<tr>
													<th>Meeting ID</th>
													<th>Employee Name</th>
													<th>Appointment With</th>
													<th>Apointment Time</th>
													<!-- <th>Status</th> -->
												</tr>
											</thead>
											<tbody>
				 				 <?php
							        include("inc/conn.php");
							        $date = date("Y-d-m");
							        $view_arts_query="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and booking_date = '$date' and approve_status = 'Approved' order by id desc";
							        $run=mysqli_query($conn,$view_arts_query);

							        // echo $view_arts_query;

									$t = 0;
									$EmailList = array();
									while($row=mysqli_fetch_array($run))
									{						
										$EmailList[] =  $row['email'];


								        $t++;
								        $id = $row['id'];
								        // $email = $row['email'];
								        $emp_name = $row['emp_name'];
								        $booking_date = $row['booking_date'];
								        $revert_booking_date = $row['revert_booking_date'];
								        $booking_time = $row['booking_time'];
								        $revert_booking_time = $row['revert_booking_time'];
								        $booking_with = $row['booking_with'];
								        $subject=$row['subject'];
								        $status=$row['status'];
								        $approve_status=$row['approve_status'];
								        $waiting_status=$row['waiting_area'];
								        $waiting_time=$row['waiting_time'];
						// Fetching Customer Profile detail:
								        	$view_arts_query1="select * from authorities where email = '$email'";
									        $run1=mysqli_query($conn,$view_arts_query1);
									        while($row=mysqli_fetch_array($run1))
									        {	

									        	$name1=$row['name'];
									        	$modes=$row['modes'];
								        		$image1=$row['image'];
								        		$imageURL1 = 'assets/img/'.$row["image"];
									        }

								        	// Fetching Authority Profile detail:
								        	$view_arts_query2="select * from authorities where email = '$booking_with'";

									        $run2=mysqli_query($conn,$view_arts_query2);
									        while($row=mysqli_fetch_array($run2))
									        {
									        	$name2=$row['name'];
								        		$image2=$row['image'];
								        		$imageURL2 = 'assets/img/'.$row["image"];
									        }


									        if($approve_status == "Pending Approval"){
									        	$hide = "none";  
									        }else{
									        	$hide = ""; 
									        }
									        
									        if(!empty($revert_booking_time))
											{
											$retime = "<br><b>Revert Time</b> <br> $revert_booking_date <br> $revert_booking_time";
											}else{
												$retime = "";
												}
							      	
							      ?>
						<tr>
							<td><?php echo $id; ?></td>
							<td>
								<h2 class="table-avatar">
									<!-- <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL1; ?>" alt="User Image"></a> -->
									<a href="javascript:void()"><?php echo $emp_name; ?></a>
								</h2>
							</td>
							<!-- <td>#101</td> -->
							<td>
								<h2 class="table-avatar">
									<!-- <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL2; ?>" alt="User Image"></a> -->
									<a href="javascript:void()"><?php echo $name2; ?> </a>
								</h2>
							</td>
							<td>

								<?php echo $booking_date; ?> <span class="text-primary d-block"><?php echo $booking_time; ?></span>

      								<br>
							<?php if(!empty($revert_booking_time)){ echo "<b>Revert Time</b><br>"; echo $revert_booking_date; ?> <span class="text-primary d-block"><?php echo $revert_booking_time;} ?>


							</td>
						
<!-- 							<td>

							<?php echo $status; ?>
								
							</td> -->
							</tr><?php } ?>


											</tbody>

										</table>
							
										<br><br>
										<center><p><b>Email Notification  will be sent to


									<?php $data = implode(",\n",$EmailList); ?>

										above people by clicking on Activate button</p></b></center>

<!-- 							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div> -->	

							<input type="hidden" name="booking_with" value="<?php echo $name2; ?>">
							<input type="hidden" name="mode" value="DND">
							<input type="hidden" name="email" value="<?php echo $email; ?>">
							<input type="hidden" name="EmailList" value="<?php echo $data; ?>">
							<div class="submit-section text-center">
								<button type="submit" name="update" class="btn btn-primary submit-btn" style="<?php if($modes == "DND"){ echo "display:none";} else{ echo ""; }; ?>"> Activate</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>

<!-- DND MODE END -->





<!-- AVAILABLE MODE START -->
		<div class="modal fade custom-modal" id="available">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" style="margin-left: 200px;">  

						<?php if($modes == "available"){ echo "Available mode is already Activate";} else{ echo "You are going to activate Available Mode"; }; ?>
						</h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times; </span></button>
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
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<!-- AVAILABLE MODE END -->


<!-- MEETING MODE START -->
		<div class="modal fade custom-modal" id="meeting">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" style="margin-left: 200px;">You are going to activate MEETING Mode</h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times; </span></button>
					</div>
					<form method="post" action="mode_status_update.php">

					
						<div class="modal-body">
							<center>
												<p style="color: red;">By activating Meeting mode you will not receive any updates...</p>
					<h5> Below peoples are waiting for your appointment </h5> <br></center>
							
										<table id="example" class="datatable table table-hover table-center table-bordered mb-0" data-searching="true">
											<thead>
												<tr>
													<th>Meeting ID </th>
													<th>Employee Name</th>
													<th>Appointment With</th>
													<th>Apointment Time</th>
													<!-- <th>Status</th> -->
												</tr>
											</thead>
											<tbody>
 				 <?php
			        include("inc/conn.php");
			        $date = date("Y-d-m");
			        $view_arts_query="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and booking_date = '$date' and approve_status = 'Approved' order by id desc";
			        $run=mysqli_query($conn,$view_arts_query);

			        // echo $view_arts_query;

$t = 0;
while($row=mysqli_fetch_array($run))
{
				        $t++;
				        $id = $row['id'];
				        // $email = $row['email'];
				        $emp_name = $row['emp_name'];
				        $booking_date = $row['booking_date'];
				        $revert_booking_date = $row['revert_booking_date'];
				        $booking_time = $row['booking_time'];
				        $revert_booking_time = $row['revert_booking_time'];
				        $booking_with = $row['booking_with'];
				        $subject=$row['subject'];
				        $status=$row['status'];
				        $approve_status=$row['approve_status'];
				        $waiting_status=$row['waiting_area'];
				        $waiting_time=$row['waiting_time'];
		// Fetching Customer Profile detail:
				        	$view_arts_query1="select * from authorities where email = '$email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$name1=$row['name'];
				        		$image1=$row['image'];
				        		$imageURL1 = 'assets/img/'.$row["image"];
					        }

				        	// Fetching Authority Profile detail:
				        	$view_arts_query2="select * from authorities where email = '$booking_with'";

					        $run2=mysqli_query($conn,$view_arts_query2);
					        while($row=mysqli_fetch_array($run2))
					        {
					        	$name2=$row['name'];
				        		$image2=$row['image'];
				        		$imageURL2 = 'assets/img/'.$row["image"];
					        }


					        if($approve_status == "Pending Approval"){
					        	$hide = "none";  
					        }else{
					        	$hide = ""; 
					        }
					        
					        if(!empty($revert_booking_time))
							{
							$retime = "<br><b>Revert Time</b> <br> $revert_booking_date <br> $revert_booking_time";
							}else{
								$retime = "";
								}


			      	
			      ?>
						<tr>
							<td><?php echo $id; ?></td>
							<td>
								<h2 class="table-avatar">
									<!-- <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL1; ?>" alt="User Image"></a> -->
									<a href="javascript:void()"><?php echo $emp_name; ?></a>
								</h2>
							</td>
							<!-- <td>#101</td> -->
							<td>
								<h2 class="table-avatar">
									<!-- <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL2; ?>" alt="User Image"></a> -->
									<a href="javascript:void()"><?php echo $name2; ?> </a>
								</h2>
							</td>
							<td>

								<?php echo $booking_date; ?> <span class="text-primary d-block"><?php echo $booking_time; ?></span>

      								<br>
							<?php if(!empty($revert_booking_time)){ echo "<b>Revert Time</b><br>"; echo $revert_booking_date; ?> <span class="text-primary d-block"><?php echo $revert_booking_time;} ?>


							</td>
						
<!-- 							<td>

							<?php echo $status; ?>
								
							</td> -->
						</tr><?php } ?>


											</tbody>
										</table>
										<br><br>
										<center><p><b>Email Notification  will be sent to


									<?php $data = implode(",\n",$EmailList); ?>

										above people by clicking on Activate button</p></b></center>




				
							

							<!-- <div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div> -->	

							<input type="hidden" name="mode" value="meeting">
							<input type="hidden" name="email" value="<?php echo $email; ?>">
							<div class="submit-section text-center">
								<button type="submit" name="update" class="btn btn-primary submit-btn">Activate</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<!-- MEETING MODE END -->


<br><br><br><br>
   
<?php 
require_once('inc/footer.php'); 
// require_once('time_slot.php'); 
?>


			<!-- /Page Content -->


<!-- Link to open the modal -->


<!-- Remember to include jQuery :) -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

//Authority Start
	dashboard_wait_list();
	function dashboard_wait_list()
	{
		$.ajax({
			url:"fetch_waiting_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data').html(data);
			}
		});
	}

	dashboard_wait_list(); 
	setInterval(function(){
	dashboard_wait_list() 
	}, 4000);
// Authority End
	
//Authority Pending List Start
	dashboard_pending_list();
	function dashboard_pending_list()
	{
		$.ajax({
			url:"fetch_pending_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_pending_user_data').html(data);
			}
		});
	}

		dashboard_pending_list(); 
	setInterval(function(){
	dashboard_pending_list() 
	}, 4000);
// Authority Pending List End


	
//Employee Pending List Start
	dashboard_employee_pending_list();
	function dashboard_employee_pending_list()
	{
		$.ajax({
			url:"fetch_employee_pending_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#employee_pending_list').html(data);
			}
		});
	}

		dashboard_employee_pending_list(); 
	setInterval(function(){
	dashboard_employee_pending_list() 
	}, 4000);
// Employee Pending List End




// Employee Start
	dashboard_wait_list1();
	function dashboard_wait_list1()
	{
		$.ajax({
			url:"fetch_employee_waiting_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data1').html(data);
			}
		});
	}

	dashboard_wait_list1(); 
	setInterval(function(){
	dashboard_wait_list1() 
	}, 4000);
// Employee End

// Authority Start
	dashboard_accepted_list();
	function dashboard_accepted_list()
	{
		$.ajax({
			url:"fetch_accepted_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data_al').html(data);
			}
		});
	}

//Authority End

// Employee Start
	dashboard_accepted_list1();
	function dashboard_accepted_list1()
	{
		$.ajax({
			url:"fetch_employee_accepted_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data_al1').html(data);
			}
		});
	}
// Employee End
	

//Authority Start
	dashboard_rejected_list();
	function dashboard_rejected_list()
	{
		$.ajax({
			url:"fetch_rejected_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data_rl').html(data);
			}
		});
	}

//Authority End

//Employee Start
	dashboard_rejected_list1();
	function dashboard_rejected_list1()
	{
		$.ajax({
			url:"fetch_employee_rejected_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data_rl1').html(data);
			}
		});
	}
//Employee End	

        </script>

<script>
function UpdateStatus(Status)
{
	$(function () {
	    $('input').on('click', function () {
	        var Status = $(this).val();
	        $.ajax({
	            url: 'time_slot.php',
	            data: {
	                text: $("textarea[name=Status]").val(),
	                Status: Status
	            },
	            dataType : 'json'
	        });
	    });
	});
}
</script>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3000);
 
});
</script>


<script> 
$(document).ready(function(){
setInterval(function(){
      $("#example").load(window.location.href + " #example" );
}, 3000);
});
</script>


<script> 
$(document).ready(function(){
setInterval(function(){
      $("#refresh").load(window.location.href + " #refresh" );
}, 3000);
});
</script>




  		<!-- Datatables JS -->
		<script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="admin/assets/plugins/datatables/datatables.min.js"></script>








