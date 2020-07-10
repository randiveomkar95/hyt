<?php

//fetch.php

$date = date("Y-d-m");

$date1 =strtotime("-1 day");

$yesterday = date('Y-d-m',$date1);

require_once('inc/conn.php');

$email = $_GET['email'];

				$sql="SELECT * FROM appointments where booking_with='$email' and status='Waiting' and booking_date='$yesterday' order by id desc";
			    $run=mysqli_query($conn,$sql);
				$t=0;

// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" id="madam_pending_user_data">
<table class="table table-hover table-center mb-0">
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
				        $booking_time = $row['booking_time'];
				        $booking_with = $row['booking_with'];
				        $subject=$row['subject'];
				        $status=$row['status'];
				        $approve_status=$row['approve_status'];
				        $waiting_time=$row['waiting_time'];
				        $emp_name = $row['emp_name'];
				        $meeting_type = $row['meeting_type'];
				        $guest = $row['guest'];


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

					        	if ($guest == 'yes') {
					        		$meeting_type="Guest";
					        	}


		$output .= '
		<tr">
			<td>'.$id.'</td>
			<td><img src="'.$imageURL1.'" style="height:40px; width:40px; border-radius:30px;">  '.$emp_name.'</td>
			<td><textarea style="width:150px; height:50px; border:none; text-align:center;" readonly>'.$subject.'</textarea></td>
			<td>'.$meeting_type.'</td>
			<td>'.$booking_date.'<br>'.$booking_time.'</td>


			<td class="text-right">
					<div class="table-action">


						<a href="approved.php?id='.$id.'" style="display:'.$hide.'"><button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_'.$id.'"> '.$approve_status.'</button></a>


						<div class="btn-group">


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


						</div>


						<a href="accept.php?id='.$id.'" style="display:'.$hide1.'"><button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_'.$id.'"><i class="fas fa-check"></i> Accept</button></a>
					


						<a href="reject.php?id='.$id.'"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'.$id.'"><i class="fas fa-times"></i> Reject</button></a>

					</div>
				</td>

		</tr>
		';	}

	


$output .= '</table></div>';
echo $output;
?>

<?php require_once('time_slot.php'); ?>
