<?php

include('include/config.php');
include('include/checklogin.php');

$successMsg = '';
$errorMsg   = '';

if (isset($_POST['submit'])) {
	$FullName = $_POST['FullName'];
	$Email    = $_POST['Email'];
	$mobile   = $_POST['mob'];
	$subject  = $_POST['subject'];

	$sql = mysqli_query($db, "insert into contact(guest_name,Email,PhoneNo,subject) values('$FullName','$Email','$mobile','$subject')");

	if ($sql) {
		$successMsg = 'پیام شما با موفقیت ارسال گردید.';
	} else {
		$errorMsg = 'متاسفانه ارسال پیام با خطا مواجه شد. لطفا دوباره تلاش کنید.';
	}
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="UTF-8">
	<title>تماس با ما | کلینیک دندان‌پزشکی آتیه</title>
	<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
		:root {
			--purple-deep: #5B21B6;
			--purple: #7C3AED;
			--purple-light: #F3EBFF;
			--ink: #1F2333;
			--muted: #6B7280;
			--line: #E7E4F0;
			--bg-soft: #FAF9FC;
		}

		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			font-family: 'Vazirmatn', Tahoma, sans-serif;
			background: var(--bg-soft);
			color: var(--ink);
		}

		a {
			text-decoration: none;
			color: inherit;
		}

		.clear {
			clear: both;
		}

		ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		.header {
			background: #fff;
			border-bottom: 1px solid var(--line);
			position: sticky;
			top: 0;
			z-index: 10;
		}

		.header .wrap {
			max-width: 1180px;
			margin: 0 auto;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 16px 24px;
		}

		.top-nav ul {
			list-style: none;
			display: flex;
			gap: 30px;
			margin: 0;
			padding: 0;
		}

		.top-nav a {
			color: var(--muted);
			font-weight: 500;
			font-size: 15px;
			padding: 6px 2px;
			border-bottom: 2px solid transparent;
			transition: color .15s, border-color .15s;
		}

		.top-nav li.active a,
		.top-nav a:hover {
			color: #1e88e5;
			border-bottom-color: #26c6da;
		}

		.page-title {
			max-width: 1180px;
			margin: 36px auto 8px;
			padding: 0 24px;
			font-size: 22px;
			font-weight: 700;
		}

		.contact-shell {
			max-width: 1180px;
			margin: 0 auto 60px;
			padding: 0 24px;
			display: grid;
			grid-template-columns: 1.45fr 1fr;
			gap: 0;
			background: #fff;
			border-radius: 18px;
			overflow: hidden;
			border: 1px solid var(--line);
			box-shadow: 0 10px 30px rgba(91, 33, 182, 0.06);
		}

		.panel {
			padding: 36px 40px;
		}

		.panel-form {
			border-left: 1px solid var(--line);
		}

		.panel h2 {
			display: flex;
			align-items: center;
			gap: 10px;
			font-size: 19px;
			font-weight: 700;
			margin: 0 0 8px;
		}

		.panel h2::before {
			content: '';
			width: 4px;
			height: 20px;
			background: var(--purple);
			border-radius: 2px;
		}

		.panel-intro {
			color: var(--muted);
			font-size: 14px;
			margin: 0 0 28px;
			line-height: 1.9;
		}

		.alert {
			padding: 12px 16px;
			border-radius: 10px;
			font-size: 14px;
			margin-bottom: 22px;
		}

		.alert-success {
			background: #ECFDF5;
			color: #047857;
			border: 1px solid #A7F3D0;
		}

		.alert-error {
			background: #FEF2F2;
			color: #B91C1C;
			border: 1px solid #FECACA;
		}

		form .row {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 18px;
		}

		.field {
			margin-bottom: 18px;
		}

		.field label {
			display: block;
			font-size: 13.5px;
			font-weight: 600;
			margin-bottom: 8px;
			color: var(--ink);
		}

		.field label .req {
			color: #EF4444;
			margin-right: 3px;
		}

		.field input,
		.field textarea {
			width: 100%;
			border: 1px solid var(--line);
			background: var(--bg-soft);
			border-radius: 10px;
			padding: 12px 14px;
			font-family: inherit;
			font-size: 14px;
			color: var(--ink);
			transition: border-color .15s, box-shadow .15s;
		}

		.field textarea {
			resize: vertical;
			min-height: 130px;
		}

		.field input:focus,
		.field textarea:focus {
			outline: none;
			border-color: var(--purple);
			box-shadow: 0 0 0 3px rgba(124, 58, 237, .12);
		}

		.submit-btn {
			border: none;
			background: linear-gradient(90deg, var(--purple-deep), var(--purple));
			color: #fff;
			font-family: inherit;
			font-weight: 600;
			font-size: 15px;
			padding: 13px 34px;
			border-radius: 10px;
			cursor: pointer;
		}

		.submit-btn:hover {
			opacity: .92;
		}

		.info-item {
			display: flex;
			align-items: flex-start;
			gap: 14px;
			margin-bottom: 26px;
		}

		.info-item .icon {
			flex: none;
			width: 42px;
			height: 42px;
			border-radius: 50%;
			background: linear-gradient(135deg, var(--purple-deep), var(--purple));
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.info-item .icon svg {
			width: 19px;
			height: 19px;
			fill: #fff;
		}

		.info-item .label {
			font-weight: 700;
			font-size: 14.5px;
			margin-bottom: 4px;
		}

		.info-item .value {
			color: var(--muted);
			font-size: 13.5px;
			line-height: 1.8;
		}

		@media (max-width: 820px) {
			.contact-shell {
				grid-template-columns: 1fr;
				border-radius: 14px;
			}

			.panel-form {
				border-left: none;
				border-bottom: 1px solid var(--line);
				order: 2;
			}

			.panel-info {
				order: 1;
			}

			form .row {
				grid-template-columns: 1fr;
			}

			.top-nav ul {
				gap: 16px;
			}
		}
	</style>
</head>

<body>

	<div class="header">
		<div class="wrap">
			<div class="logo">
				<h4 style="font-size: 30px;background: linear-gradient(90deg, #1e88e5, #26c6da); -webkit-background-clip: text;-webkit-text-fill-color: transparent;-webkit-text-fill-color: transparent;">کلینیک دندان پزشکی آتیه</h4>
			</div>
			<div class="top-nav">
				<ul>
					<li><a href="index.php">صفحه اصلی</a></li>

					<li class="active"><a href="contact.php">تماس با ما</a></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
	</div>
	<div class="clear"> </div>

	<div class="page-title">تماس با ما</div>

	<div class="contact-shell">

		<div class="panel panel-form">
			<h2>ارسال پیام</h2>
			<p class="panel-intro">برای ارتباط با ما، پرسش سوالات یا رزرو نوبت، فرم زیر را تکمیل نمایید.</p>

			<?php if ($successMsg) : ?>
				<div class="alert alert-success"><?php echo $successMsg; ?></div>
			<?php endif; ?>
			<?php if ($errorMsg) : ?>
				<div class="alert alert-error"><?php echo $errorMsg; ?></div>
			<?php endif; ?>

			<form role="form" name="addcom" method="post">
				<div class="row">
					<div class="field">
						<label>شماره تماس <span class="req">*</span></label>
						<input name="mob" type="text" required>
					</div>
					<div class="field">
						<label>نام و نام خانوادگی <span class="req">*</span></label>
						<input name="FullName" type="text" required>
					</div>
				</div>

				<div class="field">
					<label>ایمیل</label>
					<input name="Email" type="email">
				</div>

				<div class="field">
					<label>پیام <span class="req">*</span></label>
					<textarea name="subject" required></textarea>
				</div>

				<button class="submit-btn" type="submit" name="submit">ارسال پیام</button>
			</form>
		</div>

		<div class="panel panel-info">
			<h2>اطلاعات تماس</h2>

			<div class="info-item">
				<div class="icon">
					<svg viewBox="0 0 24 24">
						<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z" />
					</svg>
				</div>
				<div>
					<div class="label">آدرس</div>
					<div class="value">خیابان ۱۰، بلوار طالقانی، تقاطع ۱۱، پلاک ۱۲، ساختمان ۱۳، طبقه ۴، واحد ۱</div>
				</div>
			</div>

			<div class="info-item">
				<div class="icon">
					<svg viewBox="0 0 24 24">
						<path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.2.5 2.5.8 3.8.8.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.3 21 3 13.7 3 5c0-.6.4-1 1-1h3.2c.6 0 1 .4 1 1 0 1.3.3 2.6.8 3.8.1.4 0 .8-.3 1l-2.1 2z" />
					</svg>
				</div>
				<div>
					<div class="label">تلفن تماس</div>
					<div class="value">09370176305</div>
				</div>
			</div>

			<div class="info-item">
				<div class="icon">
					<svg viewBox="0 0 24 24">
						<path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4-8 5-8-5V6l8 5 8-5z" />
					</svg>
				</div>
				<div>
					<div class="label">ایمیل</div>
					<div class="value">AtiyehClinick@gmail.com</div>
				</div>
			</div>

		</div>

	</div>
	<footer style="background:#ffffff; border-top:1px solid #e7ecf3; margin-top:60px;">
		<div class="wrap" style="max-width:1180px;margin:0 auto;padding:40px 24px;display:flex;flex-wrap:wrap;gap:30px;justify-content:space-between;">

			<div style="flex:1;min-width:250px;">
				<h3 style="margin-bottom:12px;color:#1e88e5;">درباره ما</h3>
				<p style="line-height:2;font-size:13.5px;color:#6b7689;">
					کلینیک دندانپزشکی دریای نور از 30 تیر 1394 در منطقه عباس آباد تهران فعالیت می‌کند و دسترسی مناسبی به نقاط مختلف شهر دارد. این کلینیک با تأکید بر رعایت اصول علمی مدیریت و ارتباط با مراجعین، توانسته است به انتظارات بالای مراجعین پاسخ دهد.
				</p>
			</div>

			<div style="flex:1;min-width:200px;">
				<h3 style="margin-bottom:12px;color:#1e88e5;margin-right:95px; ">لینک‌های مفید</h3>
				<ul style="list-style:none;padding:0;line-height:2;font-size:13.5px;">
					<li><a href="hms/doctor" style="color:#6b7689;margin-right:116px; ">پزشکان</a></li>
					<li><a href="contact.php" style="color:#6b7689;margin-right:115px; ">ارتباط با ما</a></li>
				</ul>
			</div>

			<div style="flex:1;min-width:250px;">
				<h3 style="margin-bottom:12px;color:#1e88e5;">نشانی</h3>
				<p style="line-height:2;font-size:13.5px;color:#6b7689;">
					ساری - خیابان قارن - جنب بانک آینده - بین هشتم و دهم پلاک 38 طبقه دوم
				</p>
			</div>

		</div>

		<div style="text-align:center;padding:16px 0;font-size:12.5px;color:#9aa3b2;border-top:1px solid #eef2f7;">
			مدیریت کلینیک آتیه — تمامی حقوق محفوظ می‌باشد © <?php echo date("Y"); ?>
		</div>
	</footer>

</body>

</html>