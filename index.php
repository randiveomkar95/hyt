<?php
session_start();
$semail = $_SESSION["email"];
include("inc/conn.php");
$view_arts_query="select * from user_screen where type='user'";
$run=mysqli_query($conn,$view_arts_query);
$t=0;
while($row=mysqli_fetch_array($run))
{
    $t++;
    $email = $row['email'];
}

// if($email != $semail){
// 	echo "<script>window.open('user_login.php','_self')</script>";
// }else{
	
// }

if(!isset($_SESSION["email"])){

	echo "<script>window.open('user_login.php','_self')</script>";
}

?>	

<!DOCTYPE html> 
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>HYT engineering company Pvt Ltd</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="assets/img/logo/fav.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.min.css">

		        <!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header" style="display: none;">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index.php" class="navbar-brand logo">
							<img src="assets/img/logo/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>

					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>

						<ul class="main-nav">

							<li class="active">
								<a href="book_appointment.php">Book Appointment</a>
							</li>

							
							<li class="active">
								<a href="waiting_list.php">Waiting List</a>
							</li>

						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">

						<li class="nav-item">
							<a class="nav-link header-login" href="login.php">Login</a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->

						
				<!-- Page Content -->
				<div class="content">
					<div class="container-fluid">

<div class="breadcrumb-bar" style="display: none;">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<center>
					<h2 class="breadcrumb-title">Waiting List</h2>
				</center>
			</div>
		</div>
	</div>
</div>

<!-- Page Content -->


					<?php 
				        	$view_arts_query1="select * from authorities where email = 'madam@admin.com'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$modes=$row['modes'];
					        }
					 ?>
<div class="content">
	<div class="container-fluid">
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

			<!-- MAIN SCREEN -->
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xs-12">
				<div class="row">

					<div class="col-md-6" style="<?php if($modes == "DND"){echo ""; }else {  } ?> ">

						<center>
							<div id="reload"><h4 class="mb-4" style="text-transform: capitalize;">Employee Accepted by Director (<?php echo $modes; ?>)</h4></div>
						</center>

						<div class="appointment-tab">
							<div class="tab-content">
								<div class="tab-pane show active" id="upcoming-appointments">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive" id="madam_accepted_user_data">												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-6" style="<?php if($modes1 == "DND"){echo ""; }else {  } ?> ">
						<center>
						<div id="reload1"><h4 class="mb-4" style="text-transform: capitalize;">Employee Accepted by Managing Director (<?php echo $modes1; ?>) </h4></div>
						</center>
						<div class="appointment-tab">
							<div class="tab-content">
								<div class="tab-pane show active" id="upcoming-appointments">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive" id="sir_accepted_user_data">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">

					<div class="col-md-6" style="<?php if($modes == "DND"){echo ""; }else {  } ?> ">
						<center>
						<h4 class="mb-4">Waiting List for Director</h4>
						</center>
						<div class="appointment-tab">
							<div class="tab-content">
								<div class="tab-pane show active" id="upcoming-appointments">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive" id="madam_user_data">
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="<?php if($modes1 == "DND"){echo ""; }else {  } ?> ">
						<center>
						<h4 class="mb-4">Waiting List for Managing Director</h4>
						</center>
						<div class="appointment-tab">
							<div class="tab-content">
								<div class="tab-pane show active" id="upcoming-appointments">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive" id="sir_user_data">
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


<!-- 				<div class="col-md-12">
					<center>
					<h4 class="mb-4">Book Your Appointment Here</h4>
					</center>
					<div class="appointment-tab">
						<div class="tab-content">
							<div class="tab-pane show active" id="upcoming-appointments">
								<div class="card card-table mb-0">
									<div class="card-body">
										<form method="post" id="save">
											<div class="row form-row" style="padding:20px;">
												<div class="col-md-3">
													<div class="form-group">
														<label>Employee Name 
														<span class="text-danger">*</span>
														</label>
														<input type="text" id="emp_name" name="emp_name" class="form-control" required>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Employee Code 
														<span class="text-danger"></span>
														</label>
														<input type="text" id="emp_code" name="emp_code" class="form-control" required>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Appointment Of</label>
														<br>
														<select class="form-control" name="emp_appt" id="emp_appt" required>
															<option value="sir">Sir</option>
															<option value="madam">Madam</option>
														</select>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Subject 
														<span class="text-danger">*</span>
														</label>
														<input type="text" id="emp_subject" name="emp_subject" class="form-control" required>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label style="visibility: hidden;"> 
														<span class="text-danger">*</span>
														</label>
														<button type="submit" id="save" class="btn btn-primary submit-btn form-control">Submit</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
<?php 
 $date_format = 'l F jS Y';
   
   $today = mktime();
   $d = date('d', $today);
   $m = date('m', $today);
   $y = date('Y', $today);
   
   $yesterday = mktime(0, 0, 0, $m, ($d - 1), $y);
   $tomorrow = mktime(0, 0, 0, $m, ($d + 1), $y);

 ?>

<!-- GUEST BOOKING FORM -->

<div class="col-md-12">
<center>
<h4 class="mb-4">Check Your Appointment Status </h4>
</center>
<div class="appointment-tab">
<div class="tab-content">
<div class="tab-pane show active" id="upcoming-appointments">
<div class="card card-table mb-0">
	<div class="card-body">
		<!--  id="save1" -->
		<form method="post" action="change_guest_status.php">
			<div class="row form-row" style="padding:20px;">
				<div class="col-md-1">
					<div class="form-group">

						<label>Meet. ID
						<span class="text-danger">*</span>
						</label>
						<input type="text" id="meeting_id" onblur="getInputValue()" name="meeting_id" class="form-control" required onkeypress="return isNumber(event)" >

					</div>
				</div>
				<div class="col-md-2" style="display: none;">
					<div class="form-group">
						<label>Appointment With
						<span class="text-danger"></span>
						</label>
						<input type="text" id="booking_with" name="booking_with" class="form-control" readonly>
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
						<label>Appointment Status
						<span class="text-danger"></span>
						</label>
						<input type="text" id="approve_status" name="approve_status" class="form-control" readonly>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Meeting Type
						<span class="text-danger"></span>
						</label>

						<input type="text" id="meeting_type" name="meeting_type" class="form-control" readonly>

						<input type="hidden" id="waiting_area" name="waiting_area" class="form-control" readonly>
						
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Subject 
						<span class="text-danger"></span>
						</label>
						<textarea id="subject" name="subject" class="form-control"  readonly rows="1">
						</textarea> 
					</div>
				</div>


				<div class="col-md-2" id="showhide" style="display: none;">
					<div class="form-group">
						<label style="visibility: hidden;"> 
						<span class="text-danger">*</span>
						</label>

						<button type="submit" name="submit" class="btn btn-primary submit-btn form-control">I'm In Waiting Area</button>	
					</div>
				</div>

				<div class="col-md-2" id="showhideexist" style="display: none;">
					<div class="form-group">
						<label style="visibility: hidden;"> 
						<span class="text-danger">*</span>
						</label>

						<button type="submit" name="submit" class="btn btn-primary submit-btn form-control">I'm In Waiting Area</button>	
					</div>
				</div>



				</div>

		</form>

		<form action="change_guest_status.php" method="post">
			
			<div class="row form-row" id="group" style="display: none;padding:20px;">
				<div class="row">	

				<div class="col-md-1">
					<div class="form-group">
						<label>Your ID
						<span class="text-danger">*</span>
						</label>
						<input type="text" name="emp_id" class="form-control" required onkeypress="return isNumber(event)" >

						<input type="hidden" id="grp_id" name="grp_id" class="form-control" required>
					</div>
				</div>

		
															
				<div class="col-md-3">
					<div class="form-group">
						<label style="visibility: hidden;"> 
						<span class="text-danger">*</span>
						</label>
						<button type="submit" name="group_submit" class="btn btn-primary submit-btn form-control">I'm in Waiting Area</button>
					</div>
				</div>
				</div>
			</div>
		</form>


	</div>
</div>
</div>
</div>
</div>
</div>

<!-- GUEST BOOKING FORM END -->

			</div>
			<!-- MAIN SCREEN END -->
		</div>
	</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	$('#save').on('submit', function(e) {
		  e.preventDefault();
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
	            $("#booking_with").val("");
	            $("#emp_subject").val("");

	        }
	    });
	});

	madam_waiting_list();
	function madam_waiting_list()
	{
		$.ajax({
			url:"fetch_madam_wl.php",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data').html(data);
			}

		});
	}

	madam_waiting_list(); 
	setInterval(function(){
	    madam_waiting_list() 
	}, 5000);

	madam_accepted_list();
	function madam_accepted_list()
	{
		$.ajax({
			url:"fetch_madam_al.php",
			method:"POST",
			success:function(data)
			{
				$('#madam_accepted_user_data').html(data);
			}

		});
	}

	madam_accepted_list(); 
	setInterval(function(){
	    madam_accepted_list	() 
	}, 5000);


	sir_waiting_list();
	function sir_waiting_list()
	{
		$.ajax({
			url:"fetch_sir_wl.php",
			method:"POST",
			success:function(data)
			{
				$('#sir_user_data').html(data);
			}
		});
	}

	sir_waiting_list(); 
	setInterval(function(){
	    sir_waiting_list() 
	}, 5000);

	sir_accepted_list();
	function sir_accepted_list()
	{
		$.ajax({
			url:"fetch_sir_al.php",
			method:"POST",
			success:function(data)
			{
				$('#sir_accepted_user_data').html(data);
			}
		});
	}

	sir_accepted_list();

	setInterval(function(){
	    sir_accepted_list() 
	}, 5000);

</script>


<script>
	$('#save1').on('submit', function(e) {
		  e.preventDefault();
		 // e.stopPropagation();
	    //get value of message 
	    var name = $("#name").val();
	    //check if value is not empty
	    if (name == "") {
	        $("#error_message").html("Please enter name");
	        return false;
	    } else {
	        $("#error_message").html("");
	    }
	    //Ajax call to send data to the insert.php
	    $.ajax({
	        type: "post",
	        url: "insert1.php",
	        data: $('form').serialize(),
	        cache: false,
	        success: function (data) {
	            //Insert data before the message wrap div
	            $(data).insertBefore(".message-wrap:first");
	            //Clear the textarea message
	            $("#name").val("");
	            $("#email").val("");
	            $("#emp_code").val("");
	            $("#booking_date").val("");
	            $("#booking_time").val("");
	            $("#booking_with").val("");
	            $("#subject").val("");
	            $("#status").val("");
	            $("#waiting_time").val("");

	        }
	    });
	});
</script>


<!-- Appointment Status start -->
	<script>

		function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
	</script>

	<Script>
		var searchTimeout; //Timer to wait a little before fetching the data
		$("#meeting_id").keyup(function() {
		    searchKey = this.value;

		    clearTimeout(searchTimeout);

		    searchTimeout = setTimeout(function() {
		        getData(searchKey);    
		    }, 500); //If the key isn't pressed 400 ms, we fetch the data
		});
	</Script>

	<script>
		function getData(searchKey) {
    $.ajax({
        url: 'getData.php',
        type: 'POST',
        dataType: 'json',
        data: {value: searchKey},
        success: function(data) {
            if(data.status) {

                $("#booking_with").val(data.userData.booking_with);
                $("#approve_status").val(data.userData.approve_status);
                $("#subject").val(data.userData.subject);
                $("#meeting_type").val(data.userData.meeting_type);
                $("#grp_name").val(data.userData.meeting_partner);
                $("#waiting_area").val(data.userData.waiting_area);

            } else {
            	// alert("No Record Found");
            	document.getElementById('approve_status').value = '';
            	document.getElementById('subject').value = '';
            	document.getElementById('meeting_type').value = '';

                // Some code to run when nothing is found
            }  
				//check approved status
		var grp = document.getElementById("meeting_type").value;
        var as = document.getElementById("approve_status").value;
        var wa = document.getElementById("waiting_area").value;

		if(as == 'Approved' && grp != 'Group'){

			showhide.style.display = 'block';

		}else{

			showhide.style.display = 'none';
		} 

		if(wa == 'Yes'){

			// alert("You are already In");
			showhide.style.display = 'none';
		}


//check Group status
		if(grp == 'Group'){
	
			group.style.display = 'block';	
		}else{

			group.style.display = 'none';

		} 

        }	

    });         
}

	</script>




<!-- GROUP EMP FETCH BY ID -->
	<Script>
		var searchTimeout; //Timer to wait a little before fetching the data
		$("#unique_id").keyup(function() {
		    searchKey = this.value;

		    clearTimeout(searchTimeout);

		    searchTimeout = setTimeout(function() {
		        getData(searchKey);    
		    }, 500); //If the key isn't pressed 400 ms, we fetch the data
		});
	</Script>

	<script>
	function getGroupEmpData(searchKey) {
    $.ajax({
        url: 'getGroupEmpData.php',
        type: 'POST',
        dataType: 'json',
        data: {value: searchKey},
        success: function(data) {
            if(data.status) {

                $("#grp_name").val(data.userData.emp_name);

            } else {
            	// alert("No Record Found");
            	
                // Some code to run when nothing is found
            }  
				//check approved status
		var grp = document.getElementById("meeting_type").value;
        var as = document.getElementById("approve_status").value;
		if(as == 'Approved' && grp != 'Group'){
	
			showhide.style.display = 'block';	
		}else{

			showhide.style.display = 'none';

		} 


//check Group status
		if(grp == 'Group'){
	
			group.style.display = 'block';	
		}else{

			group.style.display = 'none';

		} 

        }	

    });         
}

	</script>

<!-- GROUP EMP FETCH BY ID END -->

<script> 
$(document).ready(function(){
setInterval(function(){
      $("#reload").load(window.location.href + " #reload" );
}, 3000);
});
</script>

<script> 
$(document).ready(function(){
setInterval(function(){
      $("#reload1").load(window.location.href + " #reload1" );
}, 3000);
});
</script>


<script>
	        function getInputValue(){
            // Selecting the input element and get its value 
            var inputVal = document.getElementById("meeting_id").value;
            document.getElementById('grp_id').value = inputVal;
            
            // Displaying the value
            // alert(inputVal);
        }
</script>



<!-- Appointment Status start End -->
<?php include('inc/footer.php'); ?>