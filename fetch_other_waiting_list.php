<?php
$date = date("Y-d-m");
//fetch.php

require_once('inc/conn.php');

$email = $_GET['email'];

				$sql="SELECT * FROM appointments where email='$email' order by id desc";
			    $run=mysqli_query($conn,$sql);
				$t=0;

// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" id="madam_user_data1">
<table class="datatable table table-hover table-center mb-0">
	<tr>
		<th>Sr.No</th>
		<th>Appointment With</th>
		<th>Subject</th>
		<th>Time</th>
		<th>Staus</th>
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
				        $waiting_status=$row['waiting_area'];
				        $waiting_time=$row['waiting_time'];
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


					        if($approve_status == "Pending Approval"){
					        	$hide = "none";  
					        }else{
					        	$hide = ""; 
					        }
					        
					        if(!empty($revert_booking_time))
							{
							$retime = "<br><b>Revert Time</b> <br> $revert_booking_date <br> $revert_booking_time";
							}else{
								$retime = "";
								}

		$output .= '
		<tr">
			
			<td>'.$t.'</td>
			
			<td><img src="'.$imageURL2.'" style="height:40px; width:40px; border-radius:30px;">  '.$name2.'</td>


			<td><textarea style="width:150px; height:50px; border:none; text-align:center;" readonly>'.$subject.'</textarea></td>

			<td>'.$booking_date.'<br>'.$booking_time.'<br>'.$retime.'</td>
			<td>'.$status.'<br>'.$waiting_time.'</td>
			<td style="display:'.$hide.'"><div class="btn-group">


						<button type="button"  class="btn btn-sm bg-info-light edit-link">In Waiting<br> Area ['.$waiting_status.']</button>
						<button type="button" class="btn btn-sm bg-info-light edit-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

						</button>

						<div class="dropdown-menu">

							<a class="dropdown-item" href="waiting_area_status.php?id='.$id.'&status=Yes" >Yes</a>
							<a class="dropdown-item" href="waiting_area_status.php?id='.$id.'&status=No" >No</a>


						</div>


						</div>

						</td>

					








		</tr>
		';	}

	


$output .= '</table></div>';
echo $output;
?>

