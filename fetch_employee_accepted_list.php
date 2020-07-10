<?php
$date = date("Y-d-m");
//fetch.php

require_once('inc/conn.php');

$email = $_GET['email'];

				$sql="SELECT * FROM appointments where email='$email' and status='Accepted' and booking_date >= '$date' order by id desc";
			    $run=mysqli_query($conn,$sql);
				$t=0;



// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" id="madam_user_data_al1">
<table class="table table-hover table-center mb-0">
	<tr>
		<th>My Name</th>
		<th>Appointment With</th>
		<th>Subject</th>
		<th>Time</th>
		<th>Staus</th>
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
				        $waiting_time=$row['waiting_time'];
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


		$output .= '
		<tr">
			
			<td><img src="'.$imageURL1.'" style="height:40px; width:40px; border-radius:30px;">  '.$name1.'</td>
			
			<td><img src="'.$imageURL2.'" style="height:40px; width:40px; border-radius:30px;">  '.$name2.'</td>


			<td><textarea style="width:150px; height:50px; border:none; text-align:center;" readonly>'.$subject.'</textarea></td>

			<td>'.$booking_date.'<br>'.$booking_time.'</td>
			<td>'.$status.'<br>'.$waiting_time.'</td>



		</tr>
		';	}

	


$output .= '</table></div>';
echo $output;
?>