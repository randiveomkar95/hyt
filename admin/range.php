<?php

require_once('inc/conn.php');
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{

$result = '';
$query = "SELECT * FROM appointments WHERE booking_date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
$sql = mysqli_query($conn, $query);
$result .='
<table id="example" class="table table-hover table-center mb-0">
<thead>
<tr>
	<th>Sr.No </th>
	<th>Employee Name</th>
	<th>Appointment With</th>
	<th>Apointment Time</th>
	<th>Status</th>
</tr>
</thead>
<tbody>
';
if(mysqli_num_rows($sql) > 0)
{
	$t = 0;
while($row = mysqli_fetch_array($sql))
{ 
	$t++;
				        $id = $row['id'];
				        $email = $row['email'];
				        $emp_name = $row['emp_name'];
				        $booking_date = $row['booking_date'];
				        $booking_time = $row['booking_time'];
				        $booking_with = $row['booking_with'];
				        $subject=$row['subject'];
				        $status=$row['status'];

				        	// Fetching Customer Profile detail:
				        	$view_arts_query1="select * from authorities where email = '$email'";
					        $run1=mysqli_query($conn,$view_arts_query1);
					        while($row=mysqli_fetch_array($run1))
					        {	

					        	$name1=$row['name'];
				        		$image1=$row['image'];
				        		$imageURL1 = '../assets/img/'.$row["image"];
					        }

				        	// Fetching Authority Profile detail:
				        	$view_arts_query2="select * from authorities where email = '$booking_with'";

					        $run2=mysqli_query($conn,$view_arts_query2);
					        while($row=mysqli_fetch_array($run2))
					        {
					        	$name2=$row['name'];
				        		$image2=$row['image'];
				        		$imageURL2 = '../assets/img/'.$row["image"];
					        }

					        	if(empty($imageURL1)){
					        		$imageURL1 = "../assets/img/guest.png";
					        	}




$result .=

'
<tr>
<td>'.$t.'</td>

							<td>
								<h2 class="table-avatar">
									
									<a href="javascript:void()">'.$emp_name.'</a>
								</h2>
							</td>

<td>
								<h2 class="table-avatar">
									 
									<a href="javascript:void()">'.$name2.' </a>
								</h2>
							</td>

						<td>'.$booking_date.' <span class="text-primary d-block">'.$booking_time.'</span></td>


<td>'.$status.'</td>
</tr>';
}
}
else
{
$result .='
<tr>
<td colspan="5">No Record Found</td>
</tr>
</tbody>';
}
$result .='</table>';
echo $result;
}
?>

<!-- report -->
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>




		<script>
			$(document).ready(function() {
    $('#example').DataTable( {



        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );	


	</script>
<!-- 


<a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="'.$imageURL1.'" alt="User Image"></a>

<a href="javascript:void()" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="'.$imageURL2.'" alt="User Image"></a>


 -->