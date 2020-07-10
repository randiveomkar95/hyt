 <?php 
session_start();
if(!isset($_SESSION["email"])){
    header('location:login.php');
}
 ?>



<?php include('inc/header.php'); ?>
			
			<!-- Breadcrumb -->
<!-- 			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="assets/img/patients/patient.jpg" alt="User Image">
										
										</a>
										<div class="profile-det-info">
											<h3>Your Name</h3>
											
											<div class="patient-details">
												<h5 class="mb-0">Specialization</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="sir_dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											
											<li>
												<a href="profile_setting.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
<!-- 											<li>
												<a href="social-media.html">
													<i class="fas fa-share-alt"></i>
													<span>Social Media</span>
												</a>
											</li -->
											<li>
												<a href="change_password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

				
							
		<div class="row">
			<div class="col-md-12">
				<!-- <h4 class="mb-4">Emloyee Appoinments</h4> -->
				<div class="appointment-tab">
				
					<!-- Appointment Tab -->
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
						<li class="nav-item">
							<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Waiting List</a>
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
									<div class="table-responsive" id="sir_user_data">
										
									</div>
								</div>
							</div>
						</div>
						<!-- /Upcoming Appointment Tab -->
				   
						<!-- Today Appointment Tab -->
						<div class="tab-pane" id="today-appointments">
							<div class="card card-table mb-0">
								<div class="card-body">
								  <div class="table-responsive" id="sir_user_data_al">
										
								  </div>
								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->

						<!-- Rejected Appointment Tab -->
						<div class="tab-pane" id="rejected-appointments">
							<div class="card card-table mb-0">
								<div class="card-body">
								  <div class="table-responsive" id="sir_user_data_rl">
										
								  </div>	
								</div>	
							</div>	
						</div>
						<!-- /Today Appointment Tab -->



						
					</div>
				</div>
			</div>
		</div>




<!-- 			<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Appointments</h6>
															<h3>1500</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Accepted Appoinments</h6>
															<h3>160</h3>
														
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Rejected Appoinments</h6>
															<h3>85</h3>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

            $('#save').on('submit', function(e) {
				    // e.preventDefault();
				    // e.stopPropagation();
                //get value of message 
                var emp_name = $("#emp_name").val();
                //check if value is not empty
                if (emp_name == "") {
                    $("#error_message").html("Please enter emp_name");
                    return false;
                } else {
                    $("#error_message").html("");
                }
                //Ajax call to send data to the insert.php
                $.ajax({
                    type: "post",
                    url: "insert.php",
                    data: $('form').serialize(),
                    cache: false,
                    success: function (data) {
                        //Insert data before the message wrap div
                        $(data).insertBefore(".message-wrap:first");
                        //Clear the textarea message
                        $("#emp_name").val("");
                        $("#emp_code").val("");
                        $("#emp_appt").val("");
                        $("#emp_subject").val("");

                    }
                });
            });


	dashboard_wait_list();
    
	function dashboard_wait_list()
	{
		$.ajax({
			url:"fetch_sir_dashboard_wl.php",
			method:"POST",
			success:function(data)
			{
				$('#sir_user_data').html(data);
			}
		});
	}

	dashboard_wait_list(); 
	setInterval(function(){
	dashboard_wait_list() 
	}, 5000);
	

	dashboard_accepted_list();
    
	function dashboard_accepted_list()
	{
		$.ajax({
			url:"fetch_sir_dashboard_al.php",
			method:"POST",
			success:function(data)
			{
				$('#sir_user_data_al').html(data);
			}
		});
	}

	dashboard_accepted_list(); 
	setInterval(function(){
	dashboard_accepted_list() 
	}, 5000);
	
	dashboard_rejected_list();
    
	function dashboard_rejected_list()
	{
		$.ajax({
			url:"fetch_sir_dashboard_rl.php",
			method:"POST",
			success:function(data)
			{
				$('#sir_user_data_rl').html(data);
			}
		});
	}


	dashboard_rejected_list(); 
	setInterval(function(){
	dashboard_rejected_list() 
	}, 5000);
	
        </script>
 <br><br> <br><br>

<?php include('inc/footer.php'); ?>
