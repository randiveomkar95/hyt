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
								<h3 class="page-title">User Screen Credentials</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">User Screen</li>
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
										<th>Email</th>
										<th>Password</th>
										<th>Actions</th>
									</tr>
								</thead>	
								<tbody>
										 <?php
			        include("inc/conn.php");
			        $view_arts_query="select * from user_screen";
			        $run=mysqli_query($conn,$view_arts_query);
			        $t=0;
			        while($row=mysqli_fetch_array($run))
			        {
			          $t++;
			          $id = $row['id'];
			          $email = $row['email'];
			      	
			      ?>
									<tr>
										<td><?php echo $t; ?></td>
										
										<td>
												<h2 class="table-avatar">
												<a href="javascript:void()"><?php echo $email; ?></a>
											</h2>
										</td>
										<td>***********</td>
									
					<td>
						<div class="actions">
							<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details<?php echo $id;?>">
								<i class="fe fe-pencil"></i> Edit
							</a>
<!-- 							<a  data-toggle="modal" href="#delete_modal<?php echo $id;?>" class="btn btn-sm bg-danger-light">
								<i class="fe fe-trash"></i> Delete
							</a> -->
						</div>
					</td>


									</tr>



			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details<?php echo $id;?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="update_user_screen.php">
				
								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" readonly value="<?php echo $email; ?>" class="form-control">
											<input type="hidden" name="id" value="<?php echo $id;?>">
										</div>
									</div>
				<!-- 					<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Admin Code</label>
											<input type="text" value="#101" class="form-control" readonly>
										</div>
									</div> -->
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Create New Password</label>
											<input type="password" name="password"  class="form-control" required>
										</div>
									</div>
									
								</div>
								<button type="submit" name="update" class="btn btn-primary btn-block">Save Changes</button>
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

								<a href="delete_admin.php?del=<?php echo $id; ?>">
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
							<form method="post" action="add_user_screen.php">

								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" placeholder="Enter Email ID" class="form-control" required>
										
										</div>
									</div>
<!-- 									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Admin Code</label>
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
		
