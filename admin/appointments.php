<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>


			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Appointments</li>
								</ul>
							</div>
						</div>
					</div>
							
					<!-- /Page Header -->
					<div class="row">

						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">

								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Sr.No </th>
													<th>Employee Name</th>
													<th>Appointment With</th>
													<th>Apointment Time</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
 				 <?php
			        include("inc/conn.php");
			        $view_arts_query="select * from appointments";
			        $run=mysqli_query($conn,$view_arts_query);
			        $t=0;
			        while($row=mysqli_fetch_array($run))
			        {
				        $t++;
				        $id = $row['id'];
				        $email = $row['email'];
				        $booking_date = $row['booking_date'];
				        $revert_booking_date = $row['revert_booking_date'];
				        $booking_time = $row['booking_time'];
				        $revert_booking_time = $row['revert_booking_time'];
				        $booking_with = $row['booking_with'];
				        $subject=$row['subject'];
				        $status=$row['status'];
				        $emp_name=$row['emp_name'];

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
				        		$image2=$row['image'];
				        		$imageURL2 = '../assets/img/'.$row["image"];
					        }


			      	
			      ?>
						<tr>
							<td><?php echo $t; ?></td>
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
									
									
								</span></td>
						
							<td>
								<?php echo $status; ?>
							</td>
						</tr><?php } ?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
				<!-- Datatables JS -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		

