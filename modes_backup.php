
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
