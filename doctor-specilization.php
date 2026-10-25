<?php
session_start();
include('../../include/config.php');
include('../../include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$sql = mysqli_query($db, "insert into doctorSpecilization(specilization) values('" . $_POST['doctorspecilization'] . "')");
	$_SESSION['msg'] = "اطلاعات مورد نظر با موفقیت ثبت شد";
}

if (isset($_GET['del'])) {
	mysqli_query($db, "delete from doctorSpecilization where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "اطلاعات حذف شد";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>افزودن تخصص پزشکان</title>
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
								<h1 class="mainTitle">افزودن تخصص پزشکان</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>مدیریت</span>
								</li>
								<li class="active">
									<span>افزودن تخصص پزشکان</span>
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
												<h5 class="panel-title">اضافه کردن تخصص </h5>
											</div>
											<div class="panel-body">
												<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
													<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
												<form role="form" name="dcotorspcl" method="post">
													<div class="form-group">
														<label for="exampleInputEmail1">
															تخصص جدید
														</label>
														<input type="text" name="doctorspecilization" class="form-control" placeholder="تخصص جدید را وارد کنید">
													</div>




													<button type="submit" name="submit" class="btn btn-o btn-primary">
														اضافه کردن
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

						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">مدیریت <span class="text-bold">تخصص پزشکان</span></h5>

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">شماره</th>
											<th>تخصص</th>
											<th class="hidden-xs">تاریخ ایجاد</th>
											<th>تاریخ به روز رسانی</th>
											<th>عملیات</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($db, "select * from doctorSpecilization");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['specilization']; ?></td>
												<td><?php echo $row['creationDate']; ?></td>
												<td><?php echo $row['updationDate']; ?>
												</td>

												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>

														<a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('آیا مطمئن به حذف اطلاعات هستید؟')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group" dropdown is-open="status.isopen">
															<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
																<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
															</button>
															<ul class="dropdown-menu pull-right dropdown-light" role="menu">
																<li>
																	<a href="#">
																		ویرایش
																	</a>
																</li>
																<li>
																	<a href="#">
																		اشتراک
																	</a>
																</li>
																<li>
																	<a href="#">
																		حذف
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</td>
											</tr>

										<?php
											$cnt = $cnt + 1;
										} ?>


									</tbody>
								</table>
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