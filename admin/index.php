<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>


            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-success" role="alert" style="font-size: 20px;">
								  <strong>Welcome!</strong> Super Admin.
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>

								<!-- <h3 class="page-title">Welcome Super Admin! </h3> -->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
<!-- 							<div class="col-sm-12">
								<div class="alert alert-success" role="alert">
								  <strong>Welcome!</strong> Super Admin.
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
							</div> -->
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						 <?php
						require_once("inc/conn.php");

						$result = mysqli_query($conn,"select count(1) FROM authorities where type = 'employee'");
						$row = mysqli_fetch_array($result);
						$employee = $row[0];

						$result1 = mysqli_query($conn,"select count(1) FROM authorities where type = 'authority'");
						$row = mysqli_fetch_array($result1);
						$authority = $row[0];

						$result2 = mysqli_query($conn,"select count(1) FROM appointments");
						$row = mysqli_fetch_array($result2);
						$appointments = $row[0];

						$result3 = mysqli_query($conn,"select count(1) FROM appointments where status='Rejected'");
						$row = mysqli_fetch_array($result3);
						$rejected = $row[0];

						
						?>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<a href="employee.php">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users" style="color:#00D0F1 !important;"></i>
										</span>
										<div class="dash-count" style="margin-left: 20px;">
											<h3 style="color: #000;"><?php echo $employee; ?></h3>
										</div>
									</div>

									<div class="dash-widget-info">
										
										<h6 class="text-muted">All Employees</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
								</a>
							</div>
						</div>
						
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<a href="authority.php">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-document"></i>
										</span>
										<div class="dash-count" style="margin-left: 20px;">
											<h3 style="color: #000;"><?php echo $authority; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">All Authorities</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</a>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<a href="appointments.php">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-check"></i>
										</span>
										<div class="dash-count" style="margin-left: 20px;">
											<h3 style="color: #000;"><?php echo $appointments; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">All Appointments</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div></a>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-warning"></i>
										</span>
										<div class="dash-count" style="margin-left: 20px;">
											<h3><?php echo $rejected; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Rejected Appointments</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
<!-- 					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
						</div>	
					</div> -->

					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Appointment List</h4>
								</div>
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
				        $emp_name=$row['emp_name'];
				        $status=$row['status'];

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
							<td><?php echo $booking_date; ?> <span class="text-primary d-block"><?php echo $booking_time; ?></span>
															<br>

								<?php if(!empty($revert_booking_time)){ echo "<b>Revert Time</b><br>"; echo $revert_booking_date; ?> <span class="text-primary d-block"><?php echo $revert_booking_time;} ?></td>
						
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


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3000);
 
});
</script>
		

