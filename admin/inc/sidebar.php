<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$page = $components[3];
?>

	<!-- Sidebar -->
			<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="<?php if ($page == 'index.php') echo 'active'?>"> 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>


							<li class="<?php if ($page == 'admin.php') echo 'active'?>"> 
								<a href="admin.php"><i class="fe fe-shield"></i> <span>Admin</span></a>
							</li>
							
							<li class="<?php if ($page == 'authority.php') echo 'active'?>"> 
								<a href="authority.php"><i class="fe fe-users"></i> <span>Authority</span></a>
							</li>
							
							<li class="<?php if ($page == 'employee.php') echo 'active'?>"> 
								<a href="employee.php"><i class="fe fe-users"></i> <span>Employees</span></a>
							</li>






							<li class="<?php if ($page == 'vice_president.php') echo 'active'?>"> 
								<a href="vice_president.php"><i class="fe fe-users"></i> <span>Vice President</span></a>
							</li>



							<li class="<?php if ($page == 'ceo.php') echo 'active'?>"> 
								<a href="ceo.php"><i class="fe fe-users"></i> <span>CEO</span></a>
							</li>

							<li class="<?php if ($page == 'hod.php') echo 'active'?>"> 
								<a href="hod.php"><i class="fe fe-users"></i> <span>HOD</span></a>
							</li>


							<li class="<?php if ($page == 'user_screen.php') echo 'active'?>"> 
								<a href="user_screen.php"><i class="fe fe-users"></i> <span>User Screen</span></a>
							</li>

							<li class="<?php if ($page == 'profile.php') echo 'active'?>"> 
								<a href="profile.php"><i class="fe fe-star"></i> <span>Profile</span></a>
							</li>							
							<li class="<?php if ($page == 'appointments.php') echo 'active'?>"> 
								<a href="appointments.php"><i class="fe fe-user"></i> <span>Appointments</span></a>
							</li>

							<li class="<?php if ($page == 'reports.php') echo 'active'?>"> 
								<a href="reports.php"><i class="fe fe-document"></i> <span>Reports</span></a>
							</li>
 
							<li class="<?php if ($page == 'user_control.php') echo 'active'?>"> 
								<a href="user_control.php"><i class="fe fe-shield"></i> <span>User Access Control</span></a>
							</li> 
							
							<li> 
								<a href="logout.php"><i class="fe fe-logout"></i> <span>Logout</span></a>
							</li>

							<!-- <li> 
								<a href="patient-list.html"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="invoice-report.html">Invoice Reports</a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Pages</span>
							</li>
							<li> 
								<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="login.html"> Login </a></li>
									<li><a href="register.html"> Register </a></li>
									<li><a href="forgot-password.html"> Forgot Password </a></li>
									<li><a href="lock-screen.html"> Lock Screen </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="error-404.html">404 Error </a></li>
									<li><a href="error-500.html">500 Error </a></li>
								</ul>
							</li>
							<li> 
								<a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
							</li>
							<li class="menu-title"> 
								<span>UI Interface</span>
							</li>
							<li> 
								<a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
									<li><a href="form-input-groups.html">Input Groups </a></li>
									<li><a href="form-horizontal.html">Horizontal Form </a></li>
									<li><a href="form-vertical.html"> Vertical Form </a></li>
									<li><a href="form-mask.html"> Form Mask </a></li>
									<li><a href="form-validation.html"> Form Validation </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="tables-basic.html">Basic Tables </a></li>
									<li><a href="data-tables.html">Data Table </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li> -->
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- Sidebar End -->