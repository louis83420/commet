<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
		<title>用户注册-码农博客-PHP技术交流博客</title>
		<link rel="stylesheet" href="public/styles/reset.css">
		<link rel="stylesheet" href="public/styles/fonts.css">
		<link rel="stylesheet" href="public/styles/coding.css">
		<link type="image/x-icon" href="public/images/global/favicon.ico" rel="icon">
		<script>
			function checkRegisterForm(){
				var usernameEle = document.getElementById('username');
				var passwordEle = document.getElementById('password');
				var repasswordEle = document.getElementById('repassword');
				var verifyEle = document.getElementById('verify');
				if (usernameEle.value == '') {
					document.getElementById('form-username-error').innerText = '请输入注册账号';
					addClass(usernameEle,'input-error');
					usernameEle.focus();
					return false;
				} else {
					document.getElementById('form-username-error').innerText = '';
					removeClass(usernameEle,'input-error');
				}
				if(passwordEle.value == ''){
					document.getElementById('form-password-error').innerText = '请输入注册密码';
					addClass(passwordEle,'input-error');
					passwordEle.focus();
					return false;
				} else {
					document.getElementById('form-password-error').innerText = '';
					removeClass(passwordEle,'input-error');
				}
				if(passwordEle.value.length < 6 || passwordEle.value.length > 12){
					document.getElementById('form-password-error').innerText = '密码长度必须介于6至12位之间';
					addClass(passwordEle,'input-error');
					passwordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-password-error').innerText = '';
					removeClass(passwordEle,'input-error');
				}
				if(repasswordEle.value == ''){
					document.getElementById('form-repassword-error').innerText = '确认密码为必填项';
					addClass(repasswordEle,'input-error');
					repasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-repassword-error').innerText = '';
					removeClass(repasswordEle,'input-error');
				}
				if(passwordEle.value != repasswordEle.value){
					document.getElementById('form-repassword-error').innerText = '两次密码不一致';
					addClass(repasswordEle,'input-error');
					repasswordEle.focus();
					return false;
					
				} else {
					document.getElementById('form-repassword-error').innerText = '';
					removeClass(repasswordEle,'input-error');
				}
				if(verifyEle.value == ''){
					document.getElementById('form-verify-error').innerText = '请输入验证码';
					addClass(verifyEle,'input-error');
					verifyEle.focus();
					return false;
				} else {
					document.getElementById('form-verify-error').innerText = '';
					removeClass(verifyEle,'input-error');
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
					<li class="header-login"><a href="login.php">登录</a></li>
					<li class="header-register">注册</li>
				</ul>
			</div>
		</div>
		<!-- 头部区域结束 -->
		<!-- 注册主要区域开始 -->
		<div id="register-main" style="background-image: url(public/images/background/a8f69aba-9700-4c81-88e2-6aee3d36f8f9.jpg);">
			<div id="register-main-inner">
				<form action="jump.php" method="post" id="register-form" onsubmit="return checkRegisterForm()">
					<div id="register-form-title">用户注册</div>
					<ul>
						<li class="input-field">
							<input type="text" name="username" id="username" class="tiny-input-text" placeholder="账号名">
							<div class="input-tip error" id="form-username-error"></div>
						</li>
						<li class="input-field">
							<input type="password" name="password" id="password" class="tiny-input-text" placeholder="密码">
							<div class="input-tip error" id="form-password-error"></div>
						</li>
						<li class="input-field">
							<input type="password" name="repassword" id="repassword" class="tiny-input-text" placeholder="确认密码">
							<div class="input-tip error" id="form-repassword-error"></div>
						</li>
						<li class="input-field">
							<input type="text" name="verify" id="verify" class="tiny-input-text verify-input-text" placeholder="验证码">
							<img src="public/images/captcha.jpg" alt="" id="captcha-image">
							<div class="input-tip error" id="form-verify-error"></div>
						</li>
						<li class="input-field">
							<input type="submit" value="登录" id="btn-submit">
						</li>
					</ul>
				</form>
			</div>
		</div>
		<!-- 注册主要区域结束 -->
		<!-- 页脚区域开始 -->
		<div id="footer">
			<div class="tidy-content">
				<p>隐私策略 |服务条款 | 安全策略</p>
				<p>&copy; 2018 扣钉网络 版权所有 | 京ICP备14029750号-1</p>
			</div>
		</div>
		<!-- 页脚区域结束 -->
		<script src="public/scripts/chunk.js"></script>
	</body>
</html>