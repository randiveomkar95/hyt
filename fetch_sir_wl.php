<?php

//fetch.php

$date = date("Y-d-m");


include "inc/conn.php";


				$sql="SELECT * FROM appointments where booking_with='sir@admin.com' and status !='Accepted' and booking_date <='$date' order by modified_at asc";
			
			    $sql2 = "select * from appointments,group_appointments where appointments.id=group_appointments.meeting_id and appointments.booking_with='sir@admin.com' and appointments.status !='Accepted' and appointments.booking_date <='$date' order by appointments.modified_at asc";

			    $sql3 = "SELECT appointments.id, group_appointments.meeting_id
							FROM appointments
							FULL OUTER JOIN group_appointments ON appointments.id=group_appointments.meeting_id
							ORDER BY appointments.id";

							// echo $sql3; die;

			        $run=mysqli_query($conn,$sql);


			        // $sql3="select DISTINCT emp_name ,meeting_id from group_appointments where waiting_area = 'Yes' and meeting_id = '$id' order by id desc";

			    // echo $sql2; die;
				$t=0;
				
// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" style="overflow-y:scroll; height:400px !important; "id="sir_user_data">
<table class="table table-hover table-center mb-0">
	<tr>
		<th>ID</th>
		<th>Employee Name</th>
		<th>Status</th>
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
				        $guest11=$row['guest'];
				        $waiting_time=$row['waiting_time'];
				        $waiting_area=$row['waiting_area'];
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
							        	
							        	
							        	// Fetching Customer detail Group appt:

									        	$view_arts_query22="select DISTINCT emp_name ,meeting_id from group_appointments where waiting_area = 'Yes' and meeting_id = '$id' order by id desc";

									        	// echo $view_arts_query22; die();		
										        $run22=mysqli_query($conn,$view_arts_query22);
										        $number = mysqli_num_rows($run22);
										        $i = 1;
										        while($row=mysqli_fetch_array($run22))
										        {

										        	 //  echo '<p>' . $i .'. '. $row['emp_name'] . '</p>';

														   if ($i < $number)
														   {
														      // echo '<div class="border"></div>';
														   }

														   $i ++;

										        	$data[] = $row['emp_name'];
										        	$meeting_partner_in_wa = implode(', ', $data);
										        	// echo $meeting_partner_in_wa;
										        	// echo "<br>";
										        
										        }			        
					        
					        
					        
					        
					        
					        
					        
					        
					        
					        

					        	if(empty($name1)){
					        		$name1 = $guest;
					        	}
								if(empty($imageURL1)){
					        		$imageURL1 = "assets/img/guest.png";
					        	}


					        	if($waiting_area == "No"){
					        		$hide = "none";
					        	}else{
					        		$hide = "";
					        	}

					        	if ($guest11 == 'yes') {
									$m = "<b>Guest Name</b><bR>";
									$guestName = $m.$emp_name;
								}else{
									$guestName = "";
								}

		$output .= '
		<tr style="display:'.$hide.'">
			<td>'.$id.'</td>
			<td><img src="'.$imageURL1.'" style="height:40px; width:40px; border-radius:30px;">  '.$name1.'<br>'.$guestName.'</td>
			
			
			
			<td>'.$status.'<br>'.$waiting_time.'</td>

		</tr>
		';
	}


$output .= '</table></div>';
echo $output;
?>
