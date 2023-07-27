<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>重置密码-码农博客-PHP技术交流博客</title>
		<link rel="stylesheet" href="public/styles/reset.css">
		<link rel="stylesheet" href="public/styles/fonts.css">
		<link rel="stylesheet" href="public/styles/coding.css">
		<link type="image/x-icon" href="public/images/global/favicon.ico" rel="icon">
		<script>
			function checkChangePasswordForm(){
				var oldPasswordEle = document.getElementById('old-password');
				var newPasswordEle = document.getElementById('new-password');
				var reNewPasswordEle = document.getElementById('new-password2');
				if(oldPasswordEle.value == ''){
					document.getElementById('form-old-password-error').innerText = '请输入旧密码';
					addClass(oldPasswordEle,'input-error');
					oldPasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-old-password-error').innerText = '';
					removeClass(oldPasswordEle,'input-error');
				}
				if(newPasswordEle.value == ''){
					document.getElementById('form-new-password-error').innerText = '请输入新密码';
					addClass(newPasswordEle,'input-error');
					newPasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-new-password-error').innerText = '';
					removeClass(newPasswordEle,'input-error');
				}
				if(newPasswordEle.value.length < 6 || newPasswordEle.value.length > 12){
					document.getElementById('form-new-password-error').innerText = '密码长度必须介于6至12位之间';
					addClass(newPasswordEle,'input-error');
					newPasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-new-password-error').innerText = '';
					removeClass(newPasswordEle,'input-error');
				}
				///
				if(reNewPasswordEle.value == ''){
					document.getElementById('form-new-password2-error').innerText = '请再次输入新密码';
					addClass(reNewPasswordEle,'input-error');
					reNewPasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-new-password2-error').innerText = '';
					removeClass(reNewPasswordEle,'input-error');
				}
				if(reNewPasswordEle.value != newPasswordEle.value){
					document.getElementById('form-new-password2-error').innerText = '两次密码不一致';
					addClass(reNewPasswordEle,'input-error');
					reNewPasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-new-password2-error').innerText = '';
					removeClass(reNewPasswordEle,'input-error');
				}
				
				return true;
			}
		</script>
	</head>
	<body>
		<!-- 头部区域开始 -->
		<div id="header">
			<div class="header-wrapper">
				<div class="header-logo">
					<a href="index.php" title="码农博客">首页</a>
				</div>
				<ul class="header-tools">
					<li class="header-profile"><img src="public/images/head/1516787980_8765.png" alt=""><a href="common-setting.php">常规设置</a></li>
					<li>密码修改</li>
					<li class="header-logout"><a href="jump.php">退出</a></li>
				</ul>
			</div>
		</div>
		<!-- 头部区域结束 -->
		<!-- 修改密码区域开始 -->
		<div id="change-password-wrapper">
			<div id="change-password-wrapper-inner">
				<h2 class="title">重置密码</h2>
				<div id="change-password-wrapper-content-form">
					<form action="jump.php" method="post" onsubmit="return checkChangePasswordForm()">
						<ul>
							<li class="input-field">
								<input type="password" name="old-password" id="old-password" class="tiny-input-text" placeholder="旧密码">
								<div class="input-tip error" id="form-old-password-error"></div>
							</li>
							<li class="input-field">
								<input type="password" name="new-password" id="new-password" class="tiny-input-text" placeholder="新密码">
								<div class="input-tip error" id="form-new-password-error"></div>
							</li>
							<li class="input-field">
								<input type="password" name="new-password2" id="new-password2" class="tiny-input-text" placeholder="确认新密码">
								<div class="input-tip error" id="form-new-password2-error"></div>
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
			<script src="public/scripts/jquery-3.1.0.js"></script>
			<script src="public/scripts/chunk.js"></script>
		</body>
	</html>