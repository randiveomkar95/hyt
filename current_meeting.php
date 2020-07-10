<?php
session_start();
if(!isset($_SESSION["email"])){

	echo "<script>window.open('login.php','_self')</script>";
}
?>

<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>

</div>
	
<!-- Appointments START-->
<div class="col-md-7 col-lg-8 col-xl-9" >

		<div class="row">
			<div class="col-md-12">
							<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header" style="margin-top:-25px;">
						<div class="row">
							<div class="col-sm-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Current Meeting</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
<!-- 								<center><br><br>
								<div class="col-md-6">
								<h4>Select Date and Search</h4>
								</div>
								<div class="col-md-4">
								<input type="date" class="form-control" name="">
								</div>
							    </center> -->

								<div class="card-body">
<!-- 									<div class="row" style="padding-left: 200px;">
									<div class="col-md-3">
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-3">
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-3">
<input type="button" name="range" id="range" value="Search" class="btn btn-primary float-right form-control"/>
</div>
</div><br><br> -->
									<div id = "range_records" class="table-responsive">
										<table id="example" class="datatable table table-hover table-center mb-0" data-searching="true">
											<thead>
												<tr>
													<th>Meeting<br>ID </th>
													<!-- <th>Employee Name</th> -->
													<th>Meeting<br>Host</th>
													<th>Appointment With</th>
													<th>Subject</th>
													<th>Meeting Partners</th>
													<th>Now Available</th>
													<th>Apointment Time</th>
												<!-- 	<th>Status</th>
													<th>Action</th> -->
												</tr>
											</thead>
											<tbody>
 				 <?php

			        include("inc/conn.php");
			        $view_arts_query="select * from appointments where booking_with='$email' and meeting_partner != 'single' and meeting_partner != '' and meeting_status = 'Started' order by modified_at desc limit 1";
			        // echo $view_arts_query; die;
			        $run=mysqli_query($conn,$view_arts_query);
			        $t=0;
			        while($row=mysqli_fetch_array($run))
			        {
				        $t++;
				        $id = $row['id'];
				        $email = $row['email'];
				        $emp_name = $row['emp_name'];
				        $host = $row['emp_name'];
				        $booking_date = $row['booking_date'];
				        $revert_booking_date = $row['revert_booking_date'];
				        $booking_time = $row['booking_time'];
				        $revert_booking_time = $row['revert_booking_time'];
				        $booking_with = $row['booking_with'];
				        $subject=$row['subject'];
				        $status=$row['status'];
				        $approve_status1=$row['approve_status'];
				        $waiting_status=$row['waiting_area'];
				        $waiting_time=$row['waiting_time'];
				        $meeting_partner=$row['meeting_partner'];
				        $meeting_status=$row['meeting_status'];
				        $modified_at=$row['modified_at'];




				        	// Fetching Customer Profile detail:
				        	$view_arts_query1="select * from authorities where email = '$email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	
					        	$name1=$row['name'];
				        		$image1=$row['image'];
				        		$imageURL1 = '../assets/img/'.$row["image"];
					        }

				        	// Fetching Customer detail Group appt:

				        	$view_arts_query111="select * from group_appointments where meeting_id = '$id' and waiting_area = 'Yes'";

				        	// echo $view_arts_query1; die;
					        $run111=mysqli_query($conn,$view_arts_query111);
					        while($row=mysqli_fetch_array($run111))
					        {	
					        	$emp_name=$row['emp_name'];
					        }

				        	// Fetching Authority Profile detail:
				        	$view_arts_query2="select * from authorities where email = '$booking_with'";

					        $run2=mysqli_query($conn,$view_arts_query2);
					        while($row=mysqli_fetch_array($run2))
					        {
					        	$name2=$row['name'];
				        		$image2=$row['image'];
				        		$imageURL2 = '../assets/img/'.$row["image"];
					        }

					        if(empty($imageURL1)){
					        		$imageURL1 = "../assets/img/guest.png";
					        	}

					        	$semail = $_SESSION["email"];

					        if(empty($group_emp_name)){
					        		
					        	$group_emp_name = "";
					        		
					        		}
					        		
					        		
					 


					        if(empty($meeting_partner_in_wa)){
					        		
					        	$meeting_partner_in_wa = "";
					        		
					        		}

					        	if($waiting_status != "Yes"){
					        		$hide1 = "none";
					        	}else{
					        		$hide1 = "";
					        	}
					        	




			      ?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $host; ?></td>

							<!-- <td>
								<h2 class="table-avatar">
									 <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL1; ?>" alt="User Image"></a> 
									 <a href="javascript:void()"><?php echo $emp_name; ?></a>
								</h2>
							</td> -->
							<!-- <td>#101</td> -->

							<td>
								<h2 class="table-avatar">
									<!-- <a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $imageURL2; ?>" alt="User Image"></a> -->
									<a href="javascript:void()"><?php echo $name2; ?> </a>
								</h2>
							</td>

							<td><?php echo $subject; ?></td>
							<td style="width: 200px;"><?php echo $meeting_partner; ?></td>

							<td>
							<a href="#id<?php echo $id; ?>" rel="modal:open" >
								<button type="button" class="btn btn-sm bg-success-light delete"> 
								View</button>
							</a>
							</td>

							<td><?php echo $booking_date; ?> <span class="text-primary d-block"><?php echo $booking_time; ?></span><br><?php echo $revert_booking_date; ?> <span class="text-primary d-block"><?php echo $revert_booking_time; ?></span></td>
					
							<!-- <td>
								<?php echo $approve_status1; ?>
							</td> -->

				<!-- 			<td class="text-right">
					<div class="table-action">




						<div class="btn-group">


						<button type="button" class="btn btn-sm bg-info-light edit-link"><i class="far fa-clock"> <?php echo $waiting_time; ?> </i> Wait</button>

						<button type="button" class="btn btn-sm bg-info-light edit-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

						</button>

						<div class="dropdown-menu">

							<a class="dropdown-item" href="give_wait_time.php?id=<?php echo $id; echo "&time=Wait For 5 Minutes"?>" >5 Minutes</a>

							<a class="dropdown-item"href="give_wait_time.php?id=<?php echo $id; echo "&time=Wait For 10 Minutes"?>">10 Minutes</a>

							<a class="dropdown-item"href="give_wait_time.php?id=<?php echo $id; echo "&time=Wait For 15 Minutes"?>">15 Minutes</a>

							<a class="dropdown-item"href="give_wait_time.php?id=<?php echo $id; echo "&time=Wait For 20 Minutes"?>">20 Minutes</a>

							<a class="dropdown-item"href="give_wait_time.php?id=<?php echo $id; echo "&time=Wait For 25 Minutes"?>">25 Minutes</a>

							<a class="dropdown-item"href="give_wait_time.php?id=<?php echo $id; echo "&time=Wait For 30 Minutes"?>">30 Minutes</a>

						

						</div>

						</div><br><br>


						<a href="#acceptid<?php echo $id; ?>" rel="modal:open">
						


							<button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_<?php echo $id; ?>"><i class="fas fa-check"></i> Accept</button></a><br><br>
					
						<a href="reject.php?id=<?php echo $id; ?>"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'<?php echo $id; ?>"><i class="fas fa-times"></i> Reject</button></a>

					</div>
				</td> -->

						</tr>

					<div id="id<?php echo $id; ?>" class="modal" style="height:350px;">
						<div class="modal-header">
						<h5 class="modal-title">Group members in Meeting </h5>
						</div>
						<div class="modal-body" style="margin-left: -50px !important;">
							<form method="post">
								<div class="hours-info">
									<div class="row form-row hours-cont">
										<div class="col-12 col-md-8" style="margin-left: 70px;">
											<p>
												<?php
												
									        	// Fetching Customer detail Group appt:

									        	$view_arts_query22="select DISTINCT emp_name ,meeting_id from group_appointments where waiting_area = 'Yes' and meeting_id = '$id' order by id desc";

									        	// echo $view_arts_query1; die();	
									        	
										        $run22=mysqli_query($conn,$view_arts_query22);
										        $number = mysqli_num_rows($run22);
										        $i = 1;
										        while($row=mysqli_fetch_array($run22))
										        {

										        	   echo '<p>' . $i .'. '. $row['emp_name'] . '</p>';

														   if ($i < $number)
														   {
														      // echo '<div class="border"></div>';
														   }

														   $i ++;

										        	$data[] = $row['emp_name'];
										        	$meeting_partner_in_wa = implode(', ', $data);
										        	// echo $meeting_partner_in_wa;
										        	// echo "<br>";
										        
										        }  ?></p>

					<!-- 						<div class="form-group">
												<label>Select Date (Year-Day-Month)</label>
												<input type="text" class="form-control" name="revert_booking_date" value="<?php echo $booking_date; ?>" required><br>
												<label>Select Time</label>

												<input type="text" class="form-control" name="revert_booking_time" value="<?php echo $booking_time; ?>" required>

												<input type="hidden" name="id" value="<?php echo $id; ?>">
											</div>  -->
										<!-- <input type="submit" class="form-control" name="submit" value="submit"> -->


										</div>
									</div>
								</div>	
							</form>
						</div>
					</div>

<!-- ACCEPT GROUP APPT -->
					<div id="acceptid<?php echo $id; ?>" class="modal" style="height:350px;">
						<div class="modal-header">
						<h5 class="modal-title">Start meeting with following people </h5>
						</div>
						<div class="modal-body" style="margin-left: -50px !important;">
							<form method="post" action="accept.php?id=<?php echo $id; ?>">
								<div class="hours-info">
									<div class="row form-row hours-cont">
										<div class="col-12 col-md-8" style="margin-left: 70px;">
											<p>
												<?php
												
									        	// Fetching Customer detail Group appt:

									        	$view_arts_query22="select DISTINCT emp_name ,meeting_id from group_appointments where waiting_area = 'Yes' and meeting_id = '$id' order by id desc";

									        	// echo $view_arts_query1; die();	
										        $run22=mysqli_query($conn,$view_arts_query22);
										        $number = mysqli_num_rows($run22);
										        $i = 1;
										        while($row=mysqli_fetch_array($run22))
										        {

										        	   echo '<p>' . $i .'. '. $row['emp_name'] . '</p>';

														   if ($i < $number)
														   {
														      // echo '<div class="border"></div>';
														   }

														   $i ++;

										        	$data[] = $row['emp_name'];
										        	$meeting_partner_in_wa = implode(', ', $data);
										        	// echo $meeting_partner_in_wa;
										        	// echo "<br>";
										        
										        }  ?></p>

					<!-- 						<div class="form-group">
												<label>Select Date (Year-Day-Month)</label>
												<input type="text" class="form-control" name="revert_booking_date" value="<?php echo $booking_date; ?>" required><br>
												<label>Select Time</label>

												<input type="text" class="form-control" name="revert_booking_time" value="<?php echo $booking_time; ?>" required>

												<input type="hidden" name="id" value="<?php echo $id; ?>">
											</div>  --><br>

											<!-- <h6>Late comers will notify once they are in waiting area</h6> -->
											<br>
											<a href="accept.php?id=<?php echo $id; ?>" style="display:<?php echo $hide1; ?>">
										<input type="submit" class="form-control" name="submit" value="Start"></a>


										</div>
									</div>
								</div>	
							</form>
						</div>
					</div>
<!-- ACCEPT GROUP APPT END-->




					<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>

					<br>

					<div class="page-header" style="margin-top:-25px;">
						<div class="row">
							<div class="col-sm-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Late Comers</li>
								</ul>
							</div>
						</div>
					</div>


<div id="reload" style="padding-left: 10px;">
	<!-- <h5>Late comers</h5> -->
<p>
												<?php
												
									        	// Fetching Customer detail Group appt:

									        	$view_arts_query22="select DISTINCT emp_name ,meeting_id,email,permission from group_appointments where waiting_area = 'Yes' and meeting_id = '$id' and modified_at >= '$modified_at' group by emp_name";

									        	// echo $view_arts_query1; die();	
										        $run22=mysqli_query($conn,$view_arts_query22);
										        $number = mysqli_num_rows($run22);
										        $i = 1;
										        while($row=mysqli_fetch_array($run22))
										        {

										        	 $email = $row['email'];
										        	 $permission = $row['permission'];

										        	 if($permission == 'Yes')
										        	 {
										        	 	$hide = "Accepted";
										        	 }
										        	 else
										        	 {
										        	 	$hide = "Accept";
										        	 }


										        	   echo '<p>' . $i .'. '. $row['emp_name'] . '
										        	   <a href="permission.php?id='. $id .'&email='. $email .'">
										        	    <button type="button" name="accept" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> '.$hide.'</button>
										        	    </a></p>';


										        	


										        	

										        

														   if ($i < $number)
														   {
														      // echo '<div class="border"></div>';
														   }

														   $i ++;

										        	// $data[] = $row['emp_name'];
										        	// $meeting_partner_in_wa = implode(', ', $data);
										        	// echo $meeting_partner_in_wa;
										        	// echo "<br>";
										        
										        }  ?></p>

										    </div>

<script> 
$(document).ready(function(){
setInterval(function(){
      $("#reload").load(window.location.href + " #reload" );
}, 3000);
});
</script>




				</div>			
			</div>
			<!-- /Page Wrapper -->
			</div>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>	

<!-- Group Waiting list -->

		<div class="modal fade custom-modal" id="ceo">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" style="margin-left: 300px;">Group Meeting</h3>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times; </span></button>
					</div>
					<form method="post" action="mode_status_update.php">

					
						<div class="modal-body">
							<center>
										
					<h5> Below peoples are waiting in waiting area </h5> <br></center>
							
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
			        $view_arts_query="SELECT * FROM group_appointments where booking_with='$email' and status='Waiting' and booking_date = '$date' and approve_status = 'Approved' order by id desc";
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
					<!-- 					<center><p><b>Email Notification  will be sent to


									<?php $data = implode(",\n",$EmailList); ?>

										above people by clicking on Activate button</p></b></center> -->

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

<!-- Group Waiting list END -->



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















<br><br><br><br>
<!-- Appointments END -->
<?php require_once('inc/footer.php'); ?>

<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<!-- Range Filter -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
$.datepicker.setDefaults({
dateFormat: 'yy-dd-mm'
});
$(function(){
$("#From").datepicker();
$("#to").datepicker();
});
$('#range').click(function(){
var From = $('#From').val();
var to = $('#to').val();
if(From != '' && to != '')
{
$.ajax({
url:"range2.php?email=<?php echo $_SESSION['email']; ?>",
method:"POST",
data:{From:From, to:to},
success:function(data)
{
$('#range_records').html(data);
}
});
}
else
{
alert("Please Select the Date");
}
});
});
</script>