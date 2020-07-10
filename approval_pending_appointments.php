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
<div class="col-md-7 col-lg-8 col-xl-9">

		<div class="row">
			<div class="col-md-12" >
							<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header" style="margin-top:-25px;">
						<div class="row">
															 <?php
								require_once("inc/conn.php");
								$date = date('Y-d-m');
								$result = mysqli_query($conn,"select count(1) FROM appointments where booking_with = '$email' and approve_status = 'Pending Approval' and meeting_type != 'Group'");

								// echo $email; die;
								$row = mysqli_fetch_array($result);
								$Pending_Appointments = $row[0];

							 ?>


							<div class="col-sm-12">

								<ul class="breadcrumb">
									<li class="breadcrumb-item">Approve Pending Appointments Section</li>
								</ul>
							 	<div class="alert alert-success col-sm-12" role="alert" style="font-size: 14px;">
								  You have <strong><?php echo $Pending_Appointments; ?></strong> appointments are pending for approval...!!!
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>

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

<!-- <div class="row" style="padding-left: 200px;">
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
										<table id="example" class="table table-hover table-center mb-0" data-searching="true">
											<thead>
												<tr>
													<th>ID </th>
													<th>Employee Name</th>
													<th>Subject</th>
													<th>Meeting Type</th>
													<th>Apointment at</th>
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
						$view_arts_query="select * from appointments where booking_with='$email' and modified_at <= '$modified_at' and meeting_type != 'Group'order by id desc";
					}elseif ($modes == 'meeting') {
						$view_arts_query="select * from appointments where booking_with='$email' and modified_at <= '$modified_at' and meeting_type != 'Group' order by id desc";
					}else{
			       	 	$view_arts_query="select * from appointments where booking_with='$email' and meeting_type != 'Group' order by id desc";
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


			      	
			      ?>
			      
						<tr style="background-color:<?php if($approve_status == 'Pending Approval'){ echo '#d5d0d085'; }else { echo '#fff'; } ?>">
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
								
									<a href="javascript:void()"><?php echo $subject; ?> </a>
								</h2>
							</td>
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
url:"range1.php?email=<?php echo $_SESSION['email']; ?>",
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


		<!-- Bootstrap Core JS -->
        <script src="admin/assets/js/popper.min.js"></script>
        <script src="admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="admin/assets/js/script.js"></script>

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- 
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

  $(document).ready(function (){
    var table = $('#example').dataTable({
   "order": [[ 0, 'asc' ]]
   });    
  });
</script> -->






