<?php

require_once('inc/conn.php');
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
$semail = $_GET['email'];
$result = '';
$query = "SELECT * FROM appointments WHERE booking_with='$semail' and booking_date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
$sql = mysqli_query($conn, $query);
$result .='
<table id="example" class="table table-hover table-center mb-0">
<thead>
<tr>
	<th>Sr.No </th>
	<th>Employee Name</th>
	<th>Subject</th>
	<th>Meeting Partner</th>
	<th>Apointment Time</th>
	<th>Status</th>
</tr>
</thead>
<tbody>
';
if(mysqli_num_rows($sql) > 0)
{
	$t = 0;
while($row = mysqli_fetch_array($sql))
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
				        $meeting_partner=$row['meeting_partner'];

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
					        	
					        	
					        	
					        	
					        if($status == "Rejected"){
					            $status1 = "Rejected";
					        }else{
					            $status1 = "Reject";
					        }

					       if(!empty($revert_booking_time))
					       	{ 
					       		//Revert Booking Date Time RBDT
					       		$msg = "<b>Revert Time </b><br> ";
					       		$rbdt = $msg.$revert_booking_date;
					       	}else{
					       		$rbdt = "";
					       	}
					       // if(empty($revert_booking_time))
					       // 	{ 
					       // 		//Revert Booking Date Time RBDT
					       // 		$hide = "none";
					       		
					       // 	}else{
					       // 		$hide = "";
					       // 	}





$result .=

'
<tr>
<td>'.$t.'</td>

							<td>
								<h2 class="table-avatar">
									
									<a href="javascript:void()">'.$emp_name.'</a>
								</h2>
							</td>

							<td>
								<h2 class="table-avatar">
									 
									<a href="javascript:void()">'.$subject.' </a>
								</h2>
							</td>

							<td>
								<h2 class="table-avatar">
									 
									<a href="javascript:void()">'.$meeting_partner.' </a>
								</h2>
							</td>



						<td><b>'.$booking_date.'</b> <span class="text-primary d-block">'.$booking_time.'</span> '.$rbdt.'</td>


<td>
								
						<a href="approved.php?id='.$id.'"<button type="button" name="accept"  class="btn btn-sm bg-primary-light delete" id="del_'.$id.'"> '.$approve_status.'</button></a><br><br>

						<a href="#ex1" rel="modal:open"><button type="button" name="revert" class="btn btn-sm bg-success-light delete" id="del_'.$id.'" ><i class="fas fa-stopwatch"></i> Revert</button></a><br><br>
					

						<a href="reject.php?id='.$id.'"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'.$id.'"><i class="fas fa-times"></i> '.$status1.'</button></a>
						
							</td>






















</tr>
		<div id="ex1" class="modal" style="height:350px;">

  					<div class="modal-header">
						<h5 class="modal-title">Give Reminder to Employee</h5>
					</div>
					<div class="modal-body" style="margin-left: -50px !important;">
						<form method="post" action="revert_date_time.php">
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-8" style="margin-left: 70px;">
												<div class="form-group">
													<label>Select Date</label>
													<input type="date" class="form-control" name="revert_booking_date"  value="<?php echo $booking_date; ?>"required><br>
													<label>Select Time</label>
													<input type="time" class="form-control" name="revert_booking_time" value="<?php echo $booking_time; ?>" required>

													<input type="hidden" name="id" value="<?php echo $id; ?>">
												</div> 
												<input type="submit" class="form-control" name="submit" value="submit">
									</div>
								</div>
							</div>	
						</form>
					</div>
		</div>

';
}
}
else
{
$result .='
<tr>
<td colspan="5">No Record Found</td>
</tr>
</tbody>';
}
$result .='</table>';
echo $result;
}
?>


<!-- 


<a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="'.$imageURL1.'" alt="User Image"></a>

<a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="'.$imageURL2.'" alt="User Image"></a>


 -->