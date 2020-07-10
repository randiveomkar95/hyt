<?php
session_start();
if(!isset($_SESSION["email"])){

	echo "<script>window.open('login.php','_self')</script>";
}
?>

<?php require_once('inc/header.php'); ?>
<?php require_once('inc/sidebar.php'); ?>

</div>



<!-- Appointments START-->
<div class="col-md-7 col-lg-8 col-xl-9" >



		<div class="row">
			<div class="col-md-12">
							<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header" style="margin-top:-25px;">
						<div class="row">
							<div class="col-sm-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item">All Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
<!-- 								<center><br><br>
								<div class="col-md-6">
								<h4>Select Date and Search</h4>
								</div>
								<div class="col-md-4">
								<input type="date" class="form-control" name="">
								</div>
							    </center> -->

								<div class="card-body">
									<div class="table-responsive" id="madam_user_data1">
										
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			</div>
		</div>
</div>
</div>
</div>

<br><br><br><br>
<!-- Appointments END -->
<?php require_once('inc/footer.php'); ?>



<!-- Range Filter -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
$.datepicker.setDefaults({
dateFormat: 'yy-dd-mm'
});
$(function(){
$("#From").datepicker();
$("#to").datepicker();
});
$('#range').click(function(){
var From = $('#From').val();
var to = $('#to').val();
if(From != '' && to != '')
{
$.ajax({
url:"range2.php?email=<?php echo $_SESSION['email']; ?>",
method:"POST",
data:{From:From, to:to},
success:function(data)
{
$('#range_records').html(data);
}
});
}
else
{
alert("Please Select the Date");
}
});
});
</script>

<Script>
	// Employee Start
	dashboard_wait_list1();
	function dashboard_wait_list1()
	{
		$.ajax({
			url:"fetch_other_waiting_list.php?email=<?php echo $_SESSION['email']; ?>",
			method:"POST",
			success:function(data)
			{
				$('#madam_user_data1').html(data);
			}
		});
	}

	dashboard_wait_list1(); 
	setInterval(function(){
	dashboard_wait_list1() 
	}, 4000);
// Employee End
	</Script>
