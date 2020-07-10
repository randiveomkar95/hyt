<?php
include "inc/conn.php";
if (isset($_POST['emp_name'])) {
    $emp_name = $_POST['emp_name'];
    $emp_code = $_POST['emp_code'];
    $emp_appt = $_POST['emp_appt'];
    $emp_subject = $_POST['emp_subject'];
    mysqli_query($conn, "insert into employee(emp_name,emp_code,emp_appt,emp_subject) values ('$emp_name','$emp_code','$emp_appt','$emp_subject')");

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