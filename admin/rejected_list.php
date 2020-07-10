<?php

//fetch.php

require_once('inc/conn.php');	

$sql="SELECT * FROM employee where emp_appt='madam' and status='Rejected' order by id desc";
$run=mysqli_query($conn,$sql);
$t=0;
				


// $query = "SELECT * FROM employee";
// $statement = $conn->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $total_row = $statement->rowCount();
// style="overflow-y:scroll; height:275px !important;"

$output = '
<div class="table-responsive" id="madam_user_data">
<table class="table table-hover table-center mb-0">
	<tr>
	<th>S/N</th>
	<th>Employee Name</th>
	<th>Employee Code</th>
	<th>Subject</th>
	<th style="padding-left: 150px;">Action</th>
	</tr>
';
$t = 0;
while($row=mysqli_fetch_array($run))
{
		$t++;
		$output .= '
		<tr>
			<td>'.$t.'</td>
			<td>'.$row["emp_name"].'</td>
			<td>'.$row["emp_code"].'</td>
			<td>'.$row["emp_subject"].'</td>

			<td class="text-center">
					

						<button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'.$row["id"].'"><i class="fas fa-times"></i> Rejected</button>

					</div>
				</td>

		</tr>
		';
	}

	


$output .= '</table></div>';
echo $output;
?>