<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>重置密码-码农博客-PHP技术交流博客</title>
		<link rel="stylesheet" href="public/styles/reset.css">
		<link rel="stylesheet" href="public/styles/fonts.css">
		<link rel="stylesheet" href="public/styles/coding.css">
		<link type="image/x-icon" href="public/images/global/favicon.ico" rel="icon">
	</head>
	<body>
		<!-- 头部区域开始 -->
		<div id="header">
			<div class="header-wrapper">
				<div class="header-logo">
					<a href="index.php" title="码农博客">首页</a>
				</div>
				<ul class="header-tools">
					<li class="header-profile"><img src="public/images/head/1516787980_8765.png" alt="">常规设置</li>
					<li><a href="change-password.php">密码修改</a></li>
					<li class="header-logout"><a href="jump.php">退出</a></li>
				</ul>
			</div>
		</div>
		<!-- 头部区域结束 -->
		<!-- 修改密码区域开始 -->
		<div id="change-password-wrapper">
			<div id="change-password-wrapper-inner">
				<h2 class="title">常规设置</h2>
				<div id="change-password-wrapper-content-form">
					<form action="jump.php" method="post" enctype="multipart/form-data">
						<ul>
							<li class="input-field">
								<input type="text" name="nick_name" id="nick_name" class="tiny-input-text" placeholder="淘气的松鼠">
								<div class="input-tip">用户昵称为必填项</div>
							</li>
							<li class="input-field">
								<input type="file" name="user_photo" id="user_photo" class="tiny-input-text" placeholder="用户头像">
							</li>
							<li class="input-field"><input type="submit" value="确定" id="btn-submit"></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- 修改密码区域结束 -->
			<!-- 页脚区域开始 -->
			<div id="footer">
				<div class="tidy-content">
					<p>隐私策略 |服务条款 | 安全策略</p>
					<p>&copy; 2018 扣钉网络 版权所有 | 京ICP备14029750号-1</p>
				</div>
			</div>
			<!-- 页脚区域结束 -->
		</body>
	</html>