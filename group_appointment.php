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
									<li class="breadcrumb-item">Group Appointments</li>
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
													<th>Apointment Time</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
 				 <?php

			        include("inc/conn.php");

			        $view_arts_query="select * from appointments where meeting_partner LIKE '%$email%' or email = '$email' and meeting_partner != 'Single' and meeting_partner != '' order by id desc";
			        // echo $view_arts_query; die;	
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
				        $approve_status=$row['approve_status'];
				        $waiting_status=$row['waiting_area'];
				        $waiting_time=$row['waiting_time'];
				        $meeting_partner=$row['meeting_partner'];



				        	// Fetching Customer Profile detail:

				            $user_email = $_SESSION["email"];
				        	$view_arts_query1="select * from authorities where email = '$user_email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$name1=$row['name'];
					        	$email1=$row['email'];
				        		$image1=$row['image'];
				        		$imageURL1 = '../assets/img/'.$row["image"];
					        }


				        

				        	// Fetching Customer detail Group appt:

				        	$view_arts_query1="select * from group_appointments where email = '$user_email' and meeting_id = '$id' order by id desc limit 1";

				        	// echo $view_arts_query1; die;
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$group_waiting_status=$row['waiting_area'];


					        }

	                       if(empty($group_waiting_status)){
					        		$group_waiting_status = "No";
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

					       	if($approve_status != "Approved"){
					       		$hidebutton = "none";
					       	}else{
					       		$hidebutton = "";
					       	}

					       	if(empty($waiting_time)){
					       		$waiting_time = "";
					       	}else{

					       	}


			      	
			      ?>
						<tr>


							<td><?php echo $id; ?></td>
							<td><?php echo $emp_name; ?></td>
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
							<td><?php echo $meeting_partner; ?></td>
							<td><?php echo $booking_date; ?> <span class="text-primary d-block"><?php echo $booking_time; ?></span><br><?php echo $revert_booking_date; ?> <span class="text-primary d-block"><?php echo $revert_booking_time; ?></span></td>
					
							<td>
								<?php echo $approve_status; ?><br>
								<?php echo $waiting_time; ?>
							</td>

							<td>
								<div class="btn-group" style="width: 150px; display: <?php echo $hidebutton; ?>">

									<button type="button"  class="btn btn-sm bg-info-light edit-link">In Waiting<br> Area [ <?php echo $group_waiting_status; ?> ]
									</button>

									<button type="button" class="btn btn-sm bg-info-light edit-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									</button>

									<div class="dropdown-menu">
										<a class="dropdown-item" href="group_waiting_area_status.php?email=<?php echo $email1; echo "&id=";echo $id; echo '&status=Yes'; echo "&emp_name="; echo $name1; ?>" >Yes</a>
										<a class="dropdown-item" href="group_waiting_area_status.php?email=<?php echo $email1; echo "&id=";echo $id; echo '&status=No'; echo "&emp_name="; echo $name1; ?>" >No</a>
									</div>

								</div>
								<br>


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
		</div>
</div>
</div>
</div>

<br><br><br><br>
<!-- Appointments END -->
<?php require_once('inc/footer.php'); ?>

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

<script> 
$(document).ready(function(){
setInterval(function(){
      $("#range_records").load(window.location.href + " #range_records" );
}, 10000);
});
</script>
