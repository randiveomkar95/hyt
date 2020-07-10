<!-- <link rel="stylesheet" href="admin/assets/plugins/datatables/datatables.min.css"> -->

<?php


require_once('inc/conn.php');


$email = $_GET['email'];

		//DND data fetching logic

        	$view_arts_query3="select * from authorities where email = '$email'";
	        $run3=mysqli_query($conn,$view_arts_query3);
	        while($row=mysqli_fetch_array($run3))
	        {
	        	$modified_at=$row['modified_at'];
	        	$modes=$row['modes'];
	        }

	        // echo $view_arts_query3; die;

			//fetch Information

				$date = date("Y-d-m");

				// if($modes == 'DND'){
				// 	$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and approve_status='Approved' and booking_date <='$date' and waiting_area = 'Yes' and modified_at <= '$modified_at' order by modified_at asc";
				// }elseif ($modes == 'meeting') {
				// 	$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and approve_status='Approved' and booking_date <='$date' and waiting_area = 'Yes' and modified_at <= '$modified_at' order by modified_at asc";
				// }else{
				// 	$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and approve_status='Approved' and booking_date <='$date' and waiting_area = 'Yes' order by modified_at asc";
				// }

				if($modes == 'DND'){
					$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and booking_date <='$date' and modified_at <= '$modified_at' order by modified_at asc";
				}elseif ($modes == 'meeting') {
					$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and booking_date <='$date' and modified_at <= '$modified_at' order by modified_at asc";
				}else{
					$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and booking_date <='$date' and waiting_area = 'Yes' order by modified_at desc";
				}




// echo $sql; die;
			    $run=mysqli_query($conn,$sql);
				$t=0;

// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" id="madam_user_data">
<table class="table datatable table-hover table-center mb-0">
	<tr>
		
		<th>ID</th>
		<th>Employee Name</th>
		<th>Subject</th>
		<th>Meeting Type</th>
		<th>Apointment At</th>
		<th>Action</th>
	</tr>
';
$t = 0;
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
				        $approve_status=$row['approve_status'];
				        $waiting_area=$row['waiting_area'];
				        $waiting_time=$row['waiting_time'];
				        $emp_name = $row['emp_name'];
				        $guest = $row['guest'];
				        $guest11 = $row['guest'];
				        $meeting_type = $row['meeting_type'];
				        $meeting_partner = $row['meeting_partner'];


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
					        	$modes=$row['modes'];
					        	$modified_at=$row['modified_at'];

					        }

									if(empty($imageURL1)){
					        		$imageURL1 = "assets/img/guest.png";
					        	}


					        	if($guest == "yes"){
					        		$hide = "none";
					        	}else{
					        		$hide = "";
					        	}


					        	if($approve_status == "Pending Approval" and $guest == "no"){
					        		$hide1 = "none";
					        	}else{
					        		$hide1 = "";
					        	}

					        	if($waiting_area == "No" and $guest == "no"){
					        		$hide1 = "none";
					        	}else{
					        		$hide1 = "";
					        	}

					        	if($waiting_area == "No"){
					        		$disable = "none";
					        	}else{
					        		$disable = "";
					        	}

					  

							if(!empty($revert_booking_time))
							{
							$retime = "<br><b>Revert Time</b> <br> $revert_booking_date <br> $revert_booking_time";
							}else{
								$retime = "";
								}


										if ($guest == 'yes') {
									$m = "<b>Guest Name</b><bR>";
									$guest = $m.$emp_name;
								}else{
									$guest = "";
								}

								if($guest11 == 'yes'){
									$meeting_type = 'Guest';
								}




		$output .= '
		<tr">
			<td>'.$id.'</td>
			<td><img src="'.$imageURL1.'" style="height:40px; width:40px; border-radius:30px;">  '.$name1.'<br>'.$guest.'	</td>
			<td><textarea style="width:100px; height:100px; border:none;" readonly>'.$subject.'</textarea></td>
			<td>'.$meeting_type.'</td>
			<td>
			'.$booking_date.'<br>'.$booking_time.'<br><br>
			'.$retime.'


			</td>


			<td class="text-right">
					<div class="table-action">




						<div class="btn-group" style="display:'.$disable.'">


						<button type="button" class="btn btn-sm bg-info-light edit-link"><i class="far fa-clock"> '.$waiting_time.' </i> Wait</button>

						<button type="button" class="btn btn-sm bg-info-light edit-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

						</button>

						<div class="dropdown-menu">

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 5 Minutes" >5 Minutes</a>

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 10 Minutes">10 Minutes</a>

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 15 Minutes">15 Minutes</a>

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 20 Minutes">20 Minutes</a>

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 25 Minutes">25 Minutes</a>

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 30 Minutes">30 Minutes</a>

							<a class="dropdown-item" href="give_wait_time.php?id='.$id.'&time=Wait For 30 Minutes">



							</a>

							

						</div>


						</div><br><br>

	


						<a href="accept.php?id='.$id.'" style="display:'.$hide1.'"><button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_'.$id.'"><i class="fas fa-check"></i> Accept</button></a><br><br>
					


						<a href="reject.php?id='.$id.'" style="display:'.$disable.'"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'.$id.'"><i class="fas fa-times"></i> Reject</button></a>






					</div>
				</td>

		</tr>


							<div id="ex1'.$id.'" class="modal" style="height:350px;">

  					<div class="modal-header">
						<h5 class="modal-title">Give Reminder to Employee '.$emp_name.'</h5>
					</div>
					<div class="modal-body" style="margin-left: -50px !important;">
						<form method="post" action="revert_date_time.php">
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-8" style="margin-left: 70px;">
												<div class="form-group">
													<label>Select Date (Year-Day-Month)</label>
													<input type="text" class="form-control" name="revert_booking_date" value="'.$booking_date.'" required><br>
													<label>Select Time</label>

													<input type="text" class="form-control" name="revert_booking_time" value="'.$booking_time.'" required>

													<input type="hidden" name="id" value="'.$id.'">
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



$output .= '</table></div>';
echo $output;
?>

<?php require_once('time_slot.php'); ?>

<!-- line 147 data


 -->

 		<!-- Datatables JS -->
<!-- 		<script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="admin/assets/plugins/datatables/datatables.min.js"></script> -->
