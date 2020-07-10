<?php

//fetch.php

include "inc/conn.php";

				$sql="SELECT * FROM employee where emp_appt='madam' and status !='Accepted' order by id desc";
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
		<th>S/N</th>
		<th>Employee Name</th>
		<th>Employee Code</th>
		<th>Status</th>
	</tr>
';

$t = 0;

while($row=mysqli_fetch_array($run))
{
		$t++;
		$output .= '
		<tr>
			<td>'.$t.'</td>
			<td>'.$row["emp_name"].' <br> <span style="font-size:14px;">'.$row["waiting_time"].'</span> </td>
			<td>'.$row["emp_code"].'</td>
			<td>'.$row["status"].'</td>

		</tr>
		';
	}


$output .= '</table></div>';
echo $output;
?>