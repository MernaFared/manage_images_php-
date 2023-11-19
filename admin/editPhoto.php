<?php
include "./dbconnection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Images Admin | Edit Photo</title>

	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="build/css/custom.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    
    <!-- Include jQuery and any other required scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	 


</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="/index.php" class="site_title"><i class="fa fa-file-image-o"></i> <span>Images
								Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php
							session_start();

							if (isset($_SESSION["user_name"])) {
								$username = $_SESSION["user_name"];
								echo "<h2>$username</h2>";
							} else {
								echo "User is not logged in.";
							}
							?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="users.php">Users List</a></li>
										<li><a href="addUser.php">Add User</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Tags <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="addCategory.php">Add Tag</a></li>
										<li><a href="categories.php">Tags List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Photos <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="addPhoto.php">Add Photo</a></li>
										<li><a href="photos.php">Photos List</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="images/img.jpg" alt=""><?php
							if (isset($_SESSION["user_name"])) {
								$username = $_SESSION["user_name"];
								echo "<h2>$username</h2>";
							} else {
								echo "User is not logged in.";
							}
							?>
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="javascript:;"> Profile</a>
									<a class="dropdown-item" href="javascript:;">
										<span class="badge bg-red pull-right">50%</span>
										<span>Settings</span>
									</a>
									<a class="dropdown-item" href="javascript:;">Help</a>
									<a class="dropdown-item" href="login.php"><i class="fa fa-sign-out pull-right"></i>
										Log Out</a>
								</div>
							</li>

							<li role="presentation" class="nav-item dropdown open">
								<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">6</span>
								</a>
								<ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were
												where...
											</span>
										</a>
									</li>
									<li class="nav-item">
										<div class="text-center">
											<a class="dropdown-item">
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Photos</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Photo</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<?php
									$previousImage = ''; // Initialize a variable to store the previous image filename

									$photo_id = $_GET['id'];
									if (isset($_GET['id'])) {
										$sql_query = "SELECT * from photos Where id ='$photo_id'";
										$query_run = mysqli_query($mysqli, $sql_query);
										foreach ($query_run as $row) {
											$previousImage = $row['image_path']; // Get the previous image filename
										}
									}
									?>
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="updatePhoto_action.php" method="POST" enctype="multipart/form-data">
										<?php
										$photo_id = $_GET['id'];
										if (isset($_GET['id'])) {
											$sql_query = "SELECT * from photos Where id ='$photo_id'";
											$query_run = mysqli_query($mysqli, $sql_query);
											foreach ($query_run as $row) :
										?>
												<input type="hidden" name="photo_id" value="<?= $row['id']; ?>">



												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="photo-date">Photo Date <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 ">
														<input type="date" id="photo-date" name="photo-date" required="required" class="form-control " value="<?= $row['photo_date']; ?>">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="title" name="title" required="required" class="form-control " value="<?= $row['title']; ?>">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="license">License <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 ">
														<textarea id="content" name="license" required="required" class="form-control" value="<?= $row['license']; ?>">License</textarea>
													</div>
												</div>
												<div class="item form-group">
													<label for="dimension" class="col-form-label col-md-3 col-sm-3 label-align">Dimension <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input id="dimension" class="form-control" type="text" name="dimension" required="required" value="<?= $row['dimension']; ?>">
													</div>
												</div>
												<div class="item form-group">
													<label for="format" class="col-form-label col-md-3 col-sm-3 label-align">Format <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input id="format" class="form-control" type="text" name="format" required="required" value="<?= $row['format']; ?>">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
													<div class="checkbox">
														<label>
															<?php if ($row['is_active'] == 1) {
																echo '<input type="checkbox" class="flat"  name="is_active" value="' . $row['is_active'] . '" checked>';
															} else {
																echo '<input type="checkbox" class="flat" name="is_active" value="' . $row['is_active'] . '">';
															}
															?>
															<!-- <input type="checkbox" class="flat"> -->
														</label>
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input type="file" id="image" name="image" class="form-control">
														<span id="selectedFileName"><?= $row['image_path']; ?></span>
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Tag
														<span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6">
														<select class="form-control" name="category" id="">
															<?php
															$sql_query = "SELECT * from categories";
															$query_run = mysqli_query($mysqli, $sql_query);
															echo "<option value=''>Select Tag</option>";
															while ($row = mysqli_fetch_assoc($query_run)) {
																$categoryId = $row['id'];
																$categoryName = $row['category_name'];
																$selected = ($categoryId == $row['id']) ? 'selected' : '';
																echo "<option value='$categoryId' $selected>$categoryName</option>";
															}
															?>
														</select>
													</div>
												</div>
												<div class="ln_solid"></div>
												<div class="item form-group">
													<div class="col-md-6 col-sm-6 offset-md-3">
														<button class="btn btn-primary" type="button">Cancel</button>
														<button type="submit" name="photo_Update" class="btn btn-success">Add</button>
													</div>
												</div>
										<?php
											endforeach;
										} else {
											echo "No Id Found";
										}
										?>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="vendors/moment/min/moment.min.js"></script>
	<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="build/js/custom.min.js"></script>
	<script>
		document.getElementById("image").addEventListener("change", function() {
			var selectedFile = this.files[0];
			var selectedFileNameElement = document.getElementById("selectedFileName");

			if (selectedFile) {
				selectedFileNameElement.textContent = "Selected file: " + selectedFile.name;
			} else {
				selectedFileNameElement.textContent = "";
			}
		});
	</script>


</body>

</html>