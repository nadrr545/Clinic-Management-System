<?php
include_once('../../include/config.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['full_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($db, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
	if ($query) {
		echo "<script>alert('عملیات ثبت نام با موفقیت انجام شد اکنون می توانید وارد سیستم شوید');</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>ثبت نام</title>
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
	<link rel="stylesheet" href="../../lib/assets/css/styles.css">
	<link rel="stylesheet" href="../../lib/assets/css/plugins.css">
	<link rel="stylesheet" href="../../lib/assets/css/themes/theme-1.css" id="skin_color" />




</head>

<body class="login">
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<h2>ثبت نام بیمار</h2>
			</div>
			<div class="box-register">
				<form name="registration" id="registration" method="post">
					<fieldset>
						<legend>
							ثبت نام
						</legend>
						<p>
							اطلاعات شخصی خود را وارد کنید
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="full_name" placeholder="نام و نام خانوادگی" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="address" placeholder="آدرس" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="city" placeholder="شهر محل سکونت" required>
						</div>
						<div class="form-group">
							<label class="block">
								جنسیت
							</label>
							<div class="clip-radio radio-primary">
								<input type="radio" id="rg-female" name="gender" value="زن">
								<label for="rg-female">
									زن
								</label>
								<input type="radio" id="rg-male" name="gender" value="مرد">
								<label for="rg-male">
									مرد
								</label>
							</div>
						</div>
						<p>
							جزئیات حساب کاربری خود را وارد کنید
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" placeholder="ایمیل" required>
								<i class="fa fa-envelope"></i> </span>
							<span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password" name="password" placeholder="کلمه عبور" required>
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" name="password_again" placeholder="تکرار کلمه عبور" required>
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-actions">
							<p>
								آیا حساب کاربری دارید؟
								<a href="index.php">
									ورود به حساب کاربری
								</a>
							</p>
							<button type="submit" class="btn btn-primary pull-left" id="submit" name="submit">
								ثبت نام <i class="fa fa-arrow-circle-left"></i>
							</button>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					<span class="text-bold text-uppercase"> سیستم مدیریت بیمارستان</span> — <span>تمامی حقوق معنوی محفوظ می باشد</span> &copy; <span class="current-year"></span>
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
	<script src="../../lib/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="../../lib/assets/js/main.js"></script>
	<script src="../../lib/assets/js/login.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>

</body>

</html>