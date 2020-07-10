<?php
$date = date("Y-d-m");
//fetch.php

require_once('inc/conn.php');

$email = $_GET['email'];

				$sql="SELECT * FROM appointments where booking_with='$email' and status='Accepted' and booking_date = '$date' order by id desc";
			    $run=mysqli_query($conn,$sql);
				$t=0;



// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" id="madam_user_data">
<table class="table table-hover table-center mb-0">
	<tr>
		
		<th>ID</th>
		<th>Employee Name</th>
		<th>Subject</th>
		<th>Meeting Type</th>
		<th>Apointment</th>
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
				        $guest=$row['guest'];
				        $guest11=$row['guest'];
				        $meeting_type=$row['meeting_type'];
				        $waiting_time=$row['waiting_time'];
				         $emp_name = $row['emp_name'];
		// Fetching Customer Profile detail:
				        	$view_arts_query1="select * from authorities where email = '$email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$name1=$row['name'];
				        		$image1=$row['image'];
				        		$imageURL1 = 'assets/img/'.$row["image"];
					        }

		// Fetching Guest detail:
				        	$view_arts_query1="select * from appointments where email = '$email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$guest=$row['email'];

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

					        	if(empty($name1)){
					        		$name1 = $guest;
					        	}
								if(empty($imageURL1)){
					        		$imageURL1 = "assets/img/guest.png";
					        	}

					        	if ($guest == 'yes') {
									$m = "<b>Guest Name</b><bR>";
									$guest = $m.$emp_name;
								}else{
									$guest = "";
								}

					        	if ($guest11 == 'yes') {
					        		$meeting_type="Guest";
					        	}

					        


		$output .= '
		<tr">
			<td>'.$id.'</td>
			<td><img src="'.$imageURL1.'" style="height:40px; width:40px; border-radius:30px;">  '.$emp_name.'</td>
			<td><textarea style="width:100px; height:100px; border:none; text-align:center;" readonly>'.$subject.'</textarea></td>
			<td>'.$meeting_type.'</td>
			<td>'.$booking_date.'<br>'.$booking_time.'</td>

			<td style="text-align:center;">
					<div class="table-action">
						<div class="btn-group">


			



						</div>
					
						<a href="javascript:void()"><button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_'.$id.'"><i class="fas fa-check"></i> Accepted</button></a>

						 <a href="reject.php?id='.$id.'" style="display:none;"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'.$id.'"><i class="fas fa-times"></i> Reject</button></a>

					</div>
				</td>

		</tr>
		';	}

	


$output .= '</table></div>';
echo $output;
?>