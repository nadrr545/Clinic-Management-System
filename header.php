<?php error_reporting(0); ?>
<header class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
			<i class="ti-align-justify"></i>
		</a>

	 
		<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<span class="sr-only">تغییر ناوبری</span>
			<i class="ti-view-grid"></i>
		</a>
	</div>

	<div class="navbar-collapse collapse">
		<ul class="nav navbar-right">
			<li style="padding-top:2% ">
				<h2>سیستم مدیریت کلینیک</h2>
			</li>


			<li class="dropdown current-user">
				<a href class="dropdown-toggle" data-toggle="dropdown">
					<img src="../../images/avatar-1.jpg"> <span class="username">



						خوش آمدید
						<i class="ti-angle-down"></i></i></span>
				</a>
				<ul class="dropdown-menu dropdown-dark">


					<li>
						<a href="change-password.php">
							تغییر کلمه عبور
						</a>
					</li>
					<li>
						<a href="logout.php">
							خروج از حساب کاربری
						</a>
					</li>
				</ul>
			</li>
		</ul>
		<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<div class="arrow-left"></div>
			<div class="arrow-right"></div>
		</div>
	</div>


</header>