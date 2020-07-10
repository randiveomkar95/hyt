<?php 
	  require_once('inc/header.php'); 
	  require_once('inc/sidebar.php');
?>

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">User Access Control</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">authority</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Create</a>
							</div>
						</div>
					</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
			
								<thead>
									<tr>
										<th>Sr.No</th>
										<th>Email ID</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
										 <?php
			        include("inc/conn.php");
			        $view_arts_query="select * from user_control";
			        $run=mysqli_query($conn,$view_arts_query);
			        $t=0;
			        while($row=mysqli_fetch_array($run))
			        {
			          $t++;
			          $id = $row['id'];
			          $email = $row['email'];
			          $dashboard = $row['dashboard'];
			          $profile_setting = $row['profile_setting'];
			          $change_password = $row['change_password'];
			          $logout = $row['logout'];
			          $book_appointments = $row['book_appointments'];
			      	
			      ?>
									<tr>
										<td><?php echo $t; ?></td>
										
										<td>
												<h2 class="table-avatar">
												<a href="javascript:void()"><?php echo $email; ?></a>
											</h2>
										</td>
									
					<td>
						<div class="actions">
							<a class="btn btn-sm bg-default-light" data-toggle="modal" href="#edit_specialities_details<?php echo $id;?>">
								<i class="fe fe-shield"> </i>  Set Permissions
							</a>
						
						</div>
					</td>

									</tr>

			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details<?php echo $id;?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">This Account Can Access</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="update_user_controls.php">
				
								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<!-- <label>Permissions for this Account</label> -->
											<input type="text" name="email" readonly value="<?php echo $email; ?>" class="form-control">
											<input type="hidden" name="id" value="<?php echo $id;?>">
										</div>
									</div>
				<!-- 					<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Authority Code</label>
											<input type="text" value="#101" class="form-control" readonly>
										</div>
									</div> -->
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<input type="hidden" name="dashboard" value="0">
											<input type="checkbox" name="dashboard"  class="form-group" <?php if($dashboard == 1) echo "checked"; ?>  value="1">
											<label >Dashboard</label><br>

											<input type="hidden" name="profile_setting" value="0">
											<input type="checkbox" name="profile_setting"  class="form-group" <?php if($profile_setting == 1) echo "checked"; ?>  value="1">
											<label >Profile Setting</label><br>

											<input type="hidden" name="change_password" value="0">
											<input type="checkbox" name="change_password"  class="form-group" <?php if($change_password == 1) echo "checked"; ?>  value="1">
											<label >Change Password</label><br>

											<input type="hidden" name="logout" value="0">
											<input type="checkbox" name="logout"  class="form-group" <?php if($logout == 1) echo "checked"; ?>  value="1">
											
											<label >Logout</label><br>


											<input type="hidden" name="book_appointments" value="0">
											<input type="checkbox" name="book_appointments"  class="form-group" <?php if($book_appointments == 1) echo "checked"; ?>  value="1">
											
											<label >Book Appointments</label>
										</div>
									</div>
								</div>
								<button type="submit" name="update" class="btn btn-primary btn-block">Grant Permission</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->

						<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal<?php echo $id;?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>

								<a href="delete_authority.php?del=<?php echo $id; ?>">
								<button type="button" class="btn btn-danger">Delete </button></a>

								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->

								<?php } ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>			
</div>
<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Create Account</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="add_authority.php">

								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Authority Email</label>
											<input type="email" name="email" placeholder="Enter Email ID" class="form-control" required>
											<input type="hidden" name="type" value="authority">
										</div>
									</div>
<!-- 									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Authority Code</label>
											<input type="text" value="#101" class="form-control">
										</div>
									</div> -->
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password"  class="form-control" required>
										</div>
									</div>
<!-- 									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password"   class="form-control">
										</div>
									</div> -->
									
								</div>
								<button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			

			

        </div>
		<!-- /Main Wrapper -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
