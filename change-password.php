<?php
session_start();
include('../../include/config.php');
include('../../include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Tehran'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['submit'])) {
	$sql = mysqli_query($db, "SELECT password FROM  users where password='" . $_POST['cpass'] . "' && email='" . $_SESSION['login'] . "'");
	$num = mysqli_fetch_array($sql);
	if ($num > 0) {
		$con = mysqli_query($db, "update users set password='" . $_POST['npass'] . "', updationDate='$currentTime' where email='" . $_SESSION['login'] . "'");
		$_SESSION['msg1'] = "کلمه عبور جدید با موفقیت ثبت شد";
	} else {
		$_SESSION['msg1'] = "کلمه عبور فعلی درست وارد نشده است";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>تغییر کلمه عبور</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link href="../../lib/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../../lib/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../lib/vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../lib/vendor/themify-icons/themify-icons.min.css">
	<link href="../../lib/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="../../lib/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../../lib/assets/css/styles.css">
	<link rel="stylesheet" href="../../lib/assets/css/plugins.css">
	<link rel="stylesheet" href="../../lib/assets/css/themes/theme-1.css" id="skin_color" />
	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.cpass.value == "") {
				alert("فیلد مربوط به کلمه عبور فعلی خالی می باشد");
				document.chngpwd.cpass.focus();
				return false;
			} else if (document.chngpwd.npass.value == "") {
				alert("فیلد مربوط به کلمه عبور جدید خالی می باشد");
				document.chngpwd.npass.focus();
				return false;
			} else if (document.chngpwd.cfpass.value == "") {
				alert("فیلد مربوط به تکرا کلمه عبور جدید خالی می باشد");
				document.chngpwd.cfpass.focus();
				return false;
			} else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
				alert("کلمه عبور جدید و تکرار آن یکسان نیست");
				document.chngpwd.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<body>
	<div id="app">
		<?php include('../../include/sidebar-user.php'); ?>
		<div class="app-content">

			<?php include('../../include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8" style="float: revert;">
								<h1 class="mainTitle">تغییر کلمه عبور</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>بیمار</span>
								</li>
								<li class="active">
									<span>تغییر کلمه عبور</span>
								</li>
							</ol>
						</div>
					</section>

					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12" style="float: right;">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">تغییر کلمه عبور</h5>
											</div>
											<div class="panel-body">
												<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
													<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
												<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
													<div class="form-group">
														<label for="exampleInputEmail1">
															کلمه عبور فعلی
														</label>
														<input style="text-align: left;" type="password" name="cpass" class="form-control">
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">
															کلمه عبور جدید
														</label>
														<input style="text-align: left;" type="password" name="npass" class="form-control">
													</div>

													<div class="form-group">
														<label for="exampleInputPassword1">
															تکرار کلمه عبور جدید
														</label>
														<input style="text-align: left;" type="password" name="cfpass" class="form-control">
													</div>



													<button type="submit" name="submit" class="btn btn-o btn-primary">
														ثبت تغییرات
													</button>
												</form>
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