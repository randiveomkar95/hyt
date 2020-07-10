<?php
include "inc/conn.php";
if (isset($_POST['name'])) {
    // $name = $_POST['name'];
    $emp_name = $_POST['name'];
    $emp_code = $_POST['emp_code'];
    $booking_with = $_POST['booking_with'];
    $subject = $_POST['subject'];
    $guest = "yes";	
    $waiting_area = "Yes";

   	date_default_timezone_set('Asia/Kolkata'); 
	// echo date("Y-m-d H:i:s"); // time in India
    $booking_date = date("Y-d-m");
    $taketime = date("H:i");


       $arr = explode(":", $taketime, 2);
        $first = $arr[0];
        $second = $arr[1];

//My Logic to get time in proper format

        if($first >= 12){

                $one = $first - 12; 
                $two = ":";
                $three = $second;
                $four = " PM";
                $booking_time = $one.$two.$three.$four;
                
        }else{

                $one = $first;
                $two = ":";
                $three = $second;
                $four = " AM";
                $booking_time = $one.$two.$three.$four;
                 
        }





    mysqli_query($conn, "insert into appointments(emp_name,emp_code,booking_with,booking_date,booking_time,subject,guest,waiting_area) values ('$emp_name','$emp_code','$booking_with','$booking_date','$booking_time','$subject','$guest','$waiting_area')");

    // $sql = mysqli_query($conn, "SELECT * FROM employee order by id desc");
    // $result = mysqli_fetch_array($sql);
    // echo '<div class="message-wrap">' . $result['emp_name'] . '</div>';

				$sql="SELECT * FROM employee order by id desc";
			    $run=mysqli_query($conn,$sql);
				$t=0;
				while($row=mysqli_fetch_array($run))
				{
					$t++;
				?>
				<tr>
					<td><?php echo $t; ?></td>
					<td>
						<h2 class="table-avatar">
<!-- 							<a href="#" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="assets/img/patients/patient.jpg" alt="User Image">
								</a> -->
								<a href="javascript:void()"><?php echo $row['emp_name']; ?> 

									<!-- <span>#PT0016</span> -->
								</a>
							</h2>
						</td>
						<td><?php echo $row['emp_code']; ?></td>
						<td><?php echo $row['emp_subject']; ?></td>
						
					</tr>
				<?php }

} 

else {
    echo "Message is empty";
}
?>