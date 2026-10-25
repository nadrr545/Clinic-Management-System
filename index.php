<!DOCTYPE HTML>
<html lang="fa" dir="rtl">

<head>
	<meta charset="UTF-8">
	<title>سیستم مدیریت کلینیک</title>
	<link rel="stylesheet" href="css/responsiveslides.css">
	<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function() {
			$("#slider1").responsiveSlides({
				speed: 600
			});
		});
	</script>
	<style>
		:root {
			--blue: #1e88e5;
			--cyan: #26c6da;
			--ink: #1f2937;
			--muted: #6b7689;
			--line: #e7ecf3;
			--bg-soft: #f7fafc;
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

		.wrap {
			max-width: 1180px;
			margin: 0 auto;
			padding: 0 24px;
		}

		/* header */
		.header {
			background: #fff;
			border-bottom: 1px solid var(--line);
			position: sticky;
			top: 0;
			z-index: 10;
		}

		.header .wrap {
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
			color: var(--blue);
			border-bottom-color: var(--cyan);
		}

		/* slider */
		.slider-shell {
			max-width: 1180px;
			margin: 28px auto 0;
			padding: 0 24px;
		}

		.rslides {
			position: relative;
			list-style: none;
			overflow: hidden;
			width: 100%;
			padding: 0;
			margin: 0;
			border-radius: 18px;
			box-shadow: 0 14px 34px rgba(30, 136, 229, .14);
		}

		.rslides li {
			position: absolute;
			width: 100%;
			left: 0;
			top: 0;
		}

		.rslides li:first-child {
			position: relative;
		}

		.rslides img {
			display: block;
			width: 100%;
			height: 380px;
			object-fit: cover;
		}

		/* feature cards */
		.content-grids {
			margin-top: 50px;
		}

		.section.group {
			display: flex;
			flex-wrap: wrap;
			gap: 24px;
		}

		.listview_1_of_3 {
			flex: 1 1 calc(33.333% - 16px);
			min-width: 240px;
			background: #fff;
			border: 1px solid var(--line);
			border-radius: 16px;
			padding: 26px 22px;
			text-align: center;
			display: flex;
			flex-direction: column;
			align-items: center;
			gap: 14px;
			transition: transform .18s, box-shadow .18s;
		}

		.listview_1_of_3:hover {
			transform: translateY(-6px);
			box-shadow: 0 16px 30px rgba(30, 136, 229, .14);
		}

		.listimg img {
			width: 92px;
			height: 92px;
			object-fit: contain;
			border-radius: 50%;
			background: linear-gradient(135deg, #e9f4fd, #e3fafd);
			padding: 14px;
		}

		.listview_1_of_3 h3 {
			margin: 4px 0 0;
			font-size: 17px;
			font-weight: 700;
		}

		.button a {
			display: inline-block;
			margin-top: 4px;
			padding: 10px 28px;
			border-radius: 999px;
			background: linear-gradient(90deg, var(--blue), var(--cyan));
			color: #fff;
			font-size: 14px;
			font-weight: 600;
		}

		.button a:hover {
			opacity: .92;
		}

		/* description boxes */
		.content-box {
			margin-top: 54px;
		}

		.content-box .section.group {
			gap: 24px;
		}

		.col_1_of_3 {
			flex: 1 1 calc(33.333% - 16px);
			min-width: 240px;
			background: #fff;
			border: 1px solid var(--line);
			border-radius: 16px;
			padding: 22px 20px;
			position: relative;
		}

		.col_1_of_3::before {
			content: '';
			display: block;
			width: 36px;
			height: 4px;
			border-radius: 4px;
			background: linear-gradient(90deg, var(--blue), var(--cyan));
			margin-bottom: 14px;
		}

		.col_1_of_3 p {
			margin: 0;
			line-height: 2;
			font-size: 14.5px;
			color: var(--muted);
		}

		/* footer */
		footer {
			margin-top: 60px;
			background: linear-gradient(90deg, var(--blue), var(--cyan));
		}

		.footer-inner {
			max-width: 1180px;
			margin: 0 auto;
			padding: 22px 24px;
			text-align: center;
			color: #fff;
			font-size: 13.5px;
		}

		.footer-inner .pull-right {
			display: inline-block;
		}

		.footer-inner .text-bold {
			font-weight: 700;
		}

		@media (max-width: 760px) {

			.listview_1_of_3,
			.col_1_of_3 {
				flex: 1 1 100%;
			}

			.rslides img {
				height: 220px;
			}

			.top-nav ul {
				gap: 16px;
			}
		}
	</style>
</head>

<body>
	<div>
		<div class="header">
			<div class="wrap">
				<div class="logo">
					<h4 style="font-size: 30px;background: linear-gradient(90deg, #1e88e5, #26c6da); -webkit-background-clip: text;-webkit-text-fill-color: transparent;-webkit-text-fill-color: transparent;">کلینیک دندان پزشکی آتیه</h4>
				</div>

				<div class="top-nav">
					<ul>
						<li class="active"><a href="index.php">صفحه اصلی</a></li>

						<li><a href="contact.php">تماس با ما</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>

		<div class="slider-shell">
			<ul class="rslides" id="slider1">
				<li><img src="images/slider-image4.png" alt=""></li>
			</ul>
		</div>

		<div class="clear"></div>

		<div class="content-grids">
			<div class="wrap">
				<div class="section group">

					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
							<img src="images/grid-img3.png">
						</div>
						<div class="text list_1_of_2">
							<h3>بخش بیمار</h3>
							<div class="button"><span><a href="hms/user">کلیک کنید</a></span></div>
						</div>
					</div>

					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
							<img src="images/grid-img1.png">
						</div>
						<div class="text list_1_of_2">
							<h3>بخش پزشکان</h3>
							<div class="button"><span><a href="hms/doctor">کلیک کنید</a></span></div>
						</div>
					</div>

					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
							<img src="images/grid-img2.png">
						</div>
						<div class="text list_1_of_2">
							<h3>بخش مدیریت</h3>
							<div class="button"><span><a href="hms/admin">کلیک کنید</a></span></div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="content-box">
				<div class="section group">
					<div class="col_1_of_3 span_1_of_3 frist">
						<p style="direction:rtl; text-align: justify; text-justify: inter-word;">
							در این بخش بیماران می توانند ثبت نام کنند و پزشک معالج خود را نسبت به زمان خوددر تاریخ مشخص ثبت کنند.
						</p>
					</div>
					<div class="col_1_of_3 span_1_of_3 second">
						<p style="direction:rtl; text-align: justify; text-justify: inter-word;">
							در این بخش پزشکان محترم می توانند زمان ویزیت بیماران خود را مشاهده کرده و نسبت به ویزیت آنها اقدام کنند.
						</p>
					</div>
					<div class="col_1_of_3 span_1_of_3 frist">
						<p style="direction:rtl; text-align: justify; text-justify: inter-word;">
							این بخش مخصوص مدیریت پزشکان و بیماران می باشد و مخصوص بخش مدیریت می باشد.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="clear"> </div>

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
	</div>
</body>

</html>