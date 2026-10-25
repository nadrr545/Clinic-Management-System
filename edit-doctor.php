<?php
session_start();
include('../../include/config.php');
include('../../include/checklogin.php');
check_login();
$did = intval($_GET['id']);
if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docname = $_POST['docname'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$sql = mysqli_query($db, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
	if ($sql) {
		echo "<script>alert('اطلاعات پزشک با موفقیت ویرایش شد');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>ویرایش اطلاعات پزشک</title>
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
								<h1 class="mainTitle">ویرایش اطلاعات پزشک</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>مدیریت</span>
								</li>
								<li class="active">
									<span>ویرایش اطلاعات پزشک</span>
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
												<h5 class="panel-title">افزودن پزشک</h5>
											</div>
											<div class="panel-body">
												<?php $sql = mysqli_query($db, "select * from doctors where id='$did'");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																تخصص پزشک
															</label>
															<select name="Doctorspecialization" class="form-control" required="required">
																<option value="<?php echo htmlentities($data['specilization']); ?>">
																	<?php echo htmlentities($data['specilization']); ?></option>
																<?php $ret = mysqli_query($db, "select * from doctorspecilization");
																while ($row = mysqli_fetch_array($ret)) {
																?>
																	<option value="<?php echo htmlentities($row['specilization']); ?>">
																		<?php echo htmlentities($row['specilization']); ?>
																	</option>
																<?php } ?>

															</select>
														</div>

														<div class="form-group">
															<label for="doctorname">
																نام پزشک
															</label>
															<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']); ?>">
														</div>


														<div class="form-group">
															<label for="address">
																آدرس کلینیک پزشک
															</label>
															<textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
														</div>
														<div class="form-group">
															<label for="fess">
																هزینه درمانی
															</label>
															<input type="text" name="docfees" class="form-control" required="required" value="<?php echo htmlentities($data['docFees']); ?>">
														</div>

														<div class="form-group">
															<label for="fess">
																شماره تماس پزشک
															</label>
															<input type="text" name="doccontact" class="form-control" required="required" value="<?php echo htmlentities($data['contactno']); ?>">
														</div>

														<div class="form-group">
															<label for="fess">
																ایمیل پزشک
															</label>
															<input type="email" name="docemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['docEmail']); ?>">
														</div>




													<?php } ?>


													<button type="submit" name="submit" class="btn btn-o btn-primary">
														ویرایش اطلاعات
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