<?php
session_start();
include('../../include/config.php');
include('../../include/checklogin.php');
check_login();
$id = intval($_GET['id']);
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['submit'])) {
	$sql = mysqli_query($db, "update  doctorSpecilization set specilization='" . $_POST['doctorspecilization'] . "', updationDate='$currentTime'where id='$id'");
	$_SESSION['msg'] = "ویرایش اطلاعات با موفقیت ثبت شد";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>ویرایش تخصص پزشکان</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="../../lib/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../lib/vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../lib/vendor/themify-icons/themify-icons.min.css">
	<link href="../../lib/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../../lib/assets/css/styles.css">
	<link rel="stylesheet" href="../../lib/assets/css/plugins.css">
	<link rel="stylesheet" href="../../lib/assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
	<div id="app">
		<?php include('../../include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('../../include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8" style="float: revert;">
								<h1 class="mainTitle">ویرایش تخصص پزشکان</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>مدیریت</span>
								</li>
								<li class="active">
									<span>ویرایش تخصص پزشکان</span>
								</li>
							</ol>
						</div>
					</section>

					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-6 col-md-12" style="float: right;">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">ویرایش تخصص پزشک</h5>
											</div>
											<div class="panel-body">
												<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
													<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
												<form role="form" name="dcotorspcl" method="post">
													<div class="form-group">
														<label for="exampleInputEmail1">
															ویرایش تخصص پزشک
														</label>

														<?php

														$id = intval($_GET['id']);
														$sql = mysqli_query($db, "select * from doctorSpecilization where id='$id'");
														while ($row = mysqli_fetch_array($sql)) {
														?> <input type="text" name="doctorspecilization" class="form-control" value="<?php echo $row['specilization']; ?>">
														<?php } ?>
													</div>




													<button type="submit" name="submit" class="btn btn-o btn-primary">
														ویرایش تغییرات
													</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">


								</div>
							</div>
						</div>


					</div>
				</div>
			</div>


		</div>
	</div>
	</div>

	</div>
	<script src="../../lib/vendor/jquery/jquery.min.js"></script>
	<script src="../../lib/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../lib/vendor/modernizr/modernizr.js"></script>
	<script src="../../lib/vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="../../lib/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="../../lib/vendor/switchery/switchery.min.js"></script>
	<script src="../../lib/vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="../../lib/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="../../lib/vendor/autosize/autosize.min.js"></script>
	<script src="../../lib/vendor/selectFx/classie.js"></script>
	<script src="../../lib/vendor/selectFx/selectFx.js"></script>
	<script src="../../lib/vendor/select2/select2.min.js"></script>
	<script src="../../lib/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="../../lib/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<script src="../../lib/assets/js/main.js"></script>
	<script src="../../lib/assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>

</body>

</html>