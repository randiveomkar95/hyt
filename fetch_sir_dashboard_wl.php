<?php

//fetch.php

include "inc/conn.php";

				$sql="SELECT * FROM employee where emp_appt='sir' and status='waiting' order by id desc";
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

			<td class="text-right">
					<div class="table-action">
						<div class="btn-group">


						<button type="button" class="btn btn-sm bg-info-light edit-link"><i class="far fa-clock"> '.$row["waiting_time"].' </i> Wait</button>
						<button type="button" class="btn btn-sm bg-info-light edit-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

						</button>

						<div class="dropdown-menu">
							<a class="dropdown-item" href="wait_by_sir.php?id='.$row["id"].'&time=Wait for 5 Minutes">5 Minutes</a>
							<a class="dropdown-item" href="wait_by_sir.php?id='.$row["id"].'&time=Wait for 10 Minutes">10 Minutes</a>
							<a class="dropdown-item" href="wait_by_sir.php?id='.$row["id"].'&time=Wait for 15 Minutes">15 Minutes</a>
							<a class="dropdown-item" href="wait_by_sir.php?id='.$row["id"].'&time=Wait for 20 Minutes">20 Minutes</a>
							<a class="dropdown-item" href="wait_by_sir.php?id='.$row["id"].'&time=Wait for 25 Minutes">25 Minutes</a>
							<a class="dropdown-item" href="wait_by_sir.php?id='.$row["id"].'&time=Wait for 30 Minutes">30 Minutes</a>
						</div>


						</div>
					

						<a href="accept_by_sir.php?id='.$row["id"].'"><button type="button" name="accept" class="btn btn-sm bg-success-light delete" id="del_'.$row["id"].'"><i class="fas fa-check"></i> Accept</button></a>

						<a href="reject_by_sir.php?id='.$row["id"].'"><button type="button" name="reject" class="btn btn-sm bg-danger-light" id="'.$row["id"].'"><i class="fas fa-times"></i> Reject</button></a>

					</div>
				</td>

		</tr>
		';
	}

	


$output .= '</table></div>';
echo $output;
?>