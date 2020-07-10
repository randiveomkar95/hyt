	      		<!-- Add Time Slot Modal -->
		<div class="modal fade custom-modal" id="add_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Give Reminder to Employee

						 <?php 

						 $id = $_GET['id'];

						  echo $id;

						  ?>
						 	
						 </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="hours-info">
								<div class="row form-row hours-cont">

									<div class="col-12 col-md-8" style="margin-left: 70px;">
												<div class="form-group">
													<label>Select Date</label>
													<input type="date" class="form-control" name="given_time" required><br>
													<label>Select Time</label>
													<input type="time" class="form-control" name="given_time" required>
												</div> 
									</div>
								</div>
							</div>
							
					<!-- 		<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div> -->
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Confirm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal -->
