<?php
session_start();
include('../../include/config.php');
include('../../include/checklogin.php');
check_login();
if (isset($_GET['cancel'])) {
	mysqli_query($db, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "ویزیت شما کنسل شده است";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>تاریخچه ملاقات ها</title>
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
							<div class="col-sm-8">
								<h1 class="mainTitle">تاریخچه ملاقات ها</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>بیمار </span>
								</li>
								<li class="active">
									<span>تاریخچه ملاقات</span>
								</li>
							</ol>
						</div>
					</section>

					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">

								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">شماره</th>
											<th class="hidden-xs">نام پزشک</th>
											<th>تخصص</th>
											<th>هزینه درمانی</th>
											<th>تاریخ و زمان ویزیت </th>
											<th>تاریخ ایجاد </th>
											<th>وضعیت فعلی</th>
											<th>عملیات</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($db, "select doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='" . $_SESSION['id'] . "'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['docname']; ?></td>
												<td><?php echo $row['doctorSpecialization']; ?></td>
												<td><?php echo $row['consultancyFees']; ?></td>
												<td><?php echo $row['appointmentDate']; ?> / <?php echo
																							$row['appointmentTime']; ?>
												</td>
												<td><?php echo $row['postingDate']; ?></td>
												<td>
													<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
														echo "فعال";
													}
													if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
														echo "کنسل شده توسط بیمار";
													}

													if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
														echo "کنسل شده توسط پزشک";
													}



													?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


															<a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('آیا مطمئن به کنسل کردن این ملاقات هستید؟')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">انصراف</a>
														<?php } else {

															echo "کنسل شده";
														} ?>
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