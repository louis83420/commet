<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>码农博客后台管理系统</title>
		<meta name="description" content="overview &amp; stats" >
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css">
		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style">
		<link rel="stylesheet" href="assets/css/ace-skins.min.css">
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css">
		<script src="assets/js/ace-extra.min.js"></script>
		<script>
			function checkPassword(){
				var oldPasswordEle = document.getElementById('old_password');
				var newPasswordEle = document.getElementById('new_password');
				var reNewPasswordEle = document.getElementById('re_new_password');
				if(oldPasswordEle.value == ''){
					window.alert('旧密码为必填项');
					return false;
				}
				if(newPasswordEle.value == ''){
					window.alert('新密码为必填项');
					return false;
				}
				if(newPasswordEle.value.length < 6 || newPasswordEle.value.length > 12){
					window.alert('密码长度必须介于6至12位之间');
					return false;
				}
				if(newPasswordEle.value != reNewPasswordEle.value){
					window.alert('两次密码不一致');
					return false;
				}
			}
		</script>
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default  ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
						<i class="fa fa-leaf"></i>
						码农博客后台管理系统
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									Jason
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="edit-user-profile.php">
										<i class="ace-icon fa fa-user"></i>
										修改个人资料
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar  responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li>
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> 控制台 </span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								文章分类
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="create-category.php">
									<i class="menu-icon fa fa-caret-right"></i>
									添加分类
								</a>
							</li>
							<li>
								<a href="list-category.php">
									<i class="menu-icon fa fa-caret-right"></i>
									分类列表
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">
								文章管理
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="create-article.php">
									<i class="menu-icon fa fa-caret-right"></i>
									发表文章
								</a>
							</li>
							<li>
								<a href="list-article.php">
									<i class="menu-icon fa fa-caret-right"></i>
									文章列表
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-user"></i>
							<span class="menu-text"> 用户管理 </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="create-user.php">
									<i class="menu-icon fa fa-caret-right"></i>
									添加用户
								</a>
							</li>
							<li>
								<a href="list-user.php">
									<i class="menu-icon fa fa-caret-right"></i>
									用户列表
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cutlery"></i>
							<span class="menu-text"> 角色管理 </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="list-role.php">
									<i class="menu-icon fa fa-caret-right"></i>
									角色列表
								</a>
							</li>
						</ul>
					</li>
					<li class="open active">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-info-sign"></i>
							<span class="menu-text"> 个人资料 </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="active">
								<a href="edit-user-password.php">
									<i class="menu-icon fa fa-caret-right"></i>
									修改密码
								</a>
							</li>
							<li>
								<a href="edit-user-profile.php">
									<i class="menu-icon fa fa-caret-right"></i>
									修改个人资料
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">首页</a>
							</li>
							<li class="active">个人资料</li>
						</ul>
					</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="page-header">
									<h1>修改密码</h1>
								</div>
								<!-- 修改密码表单区域开始 -->
								<form action="update-user-password.php" method="post" onsubmit="return checkPassword()">
									<table class="table table-bordered">
										<tr>
											<td class="col-xs-2">原密码</td>
											<td>
												<input type="password" name="old_password" id="old_password" class="col-xs-4">
											</td>
										</tr>
										<tr>
											<td>新密码</td>
											<td><input type="password" name="new_password" id="new_password" class="col-xs-4"></td>
										</tr>
										<tr>
											<td>确认新密码</td>
											<td><input type="password" name="re_new_password" id="re_new_password" class="col-xs-4"></td>
										</tr>
										<tr>
											<td colspan="2">
												<button class="btn btn-primary" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												确认修改
												</button>
											</td>
										</tr>
									</table>
								</form>
								<!-- 修改密码表单区域结束 -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- basic scripts -->
		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<!-- <![endif]-->
		<!--[if IE]>
		<script src="assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
	</body>
</html>