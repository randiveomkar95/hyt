<!DOCTYPE html> 
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Superadmin Login</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="../assets/img/logo/fav.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="../assets/css/style.css">


				<!-- Select2 CSS -->
		<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="../assets/plugins/dropzone/dropzone.min.css">

		        <!-- Datatables CSS -->
		<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
		
		
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header" style="display: none;">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index.php" class="navbar-brand logo">
							<img src="../assets/img/logo/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>

					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="../assets/img/logo/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>

						<ul class="main-nav">


							<li class="active">
								<a href="book_appointment.php">Book Appointment</a>
							</li>

							
							<li class="active">
								<a href="waiting_list.php">Waiting List</a>
							</li>

						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">

						<li class="nav-item">
							<a class="nav-link header-login" href="login.php">Login</a>
						</li>
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->

						
		
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<br><br><br><br><br><br>
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="../assets/img/loginhyt.jpg" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span></span></h3>
										</div>
										<form method="post" action="login_check.php">
											<div class="form-group form-focus">
												<input type="text" name="email" class="form-control floating" required>
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating" required>
												<label class="focus-label">Password</label>
											</div>
											<!--<div class="text-right">-->
											<!--	<a class="forgot-link" href="javascript:void()">Forgot Password ?</a>-->
											<!--</div>-->
											<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit">Login</button>


										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content --><br><br><br><br><br><br><br><br><br><br><br>


<?php include ('../inc/footer.php') ?>