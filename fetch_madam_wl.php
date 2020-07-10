<?php

//fetch.php

$date = date("Y-d-m");

include "inc/conn.php";

			$sql="SELECT * FROM appointments where booking_with='madam@admin.com' and status !='Accepted' and booking_date <='$date' order by modified_at asc";
		    $run=mysqli_query($conn,$sql);
			$t=0;

		
// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();


$output = '
<div class="table-responsive" style="overflow-y:scroll; height:400px !important; "id="madam_user_data">
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