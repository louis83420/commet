<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
		<title>用户登录--码农博客-PHP技术交流博客</title>
		<link rel="stylesheet" href="public/styles/reset.css">
		<link rel="stylesheet" href="public/styles/fonts.css">
		<link rel="stylesheet" href="public/styles/coding.css">
		<link type="image/x-icon" href="public/images/global/favicon.ico" rel="icon">
		<script>
			
			function checkLoginForm(){
				var usernameEle = document.getElementById('username');
				var passwordEle = document.getElementById('password');
				var verifyEle = document.getElementById('verify');
				
				if(usernameEle.value == ''){
					document.getElementById('form-username-error').innerText = '请输入登录账号';
					addClass(usernameEle,'input-error');
					usernameEle.focus();
					return false;
				} else {
					document.getElementById('form-username-error').innerText = '';
					removeClass(usernameEle,'input-error');
				}
				
				if(passwordEle.value == ''){
					document.getElementById('form-password-error').innerText = '请输入登录密码';
					addClass(passwordEle,'input-error');
					passwordEle.focus();
					return false;
				} else {
					document.getElementById('form-password-error').innerText = '';
					removeClass(passwordEle,'input-error');
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
					<li class="header-login">登录</li>
					<li class="header-register"><a href="register.php">注册</a></li>
				</ul>
			</div>
		</div>
		<!-- 头部区域结束 -->
		<!-- 登录主要区域开始 -->
		<div id="login-main" style="background-image: url(public/images/background/547597176a433.jpg); background-size: cover;">
			<div id="login-main-inner">
				<form action="jump.php" method="post" id="login-form" onsubmit="return checkLoginForm();">
					<div id="login-title">账号登录</div>
					<ul>
						<li class="input-field">
							<input type="text" name="username" id="username" class="tiny-input-text" placeholder="账号名">
							<div id="form-username-error" class="input-tip error"></div>
						</li>
						<li class="input-field">
							<input type="password" name="password" id="password" class="tiny-input-text" placeholder="密码">
							<div id="form-password-error" class="input-tip error"></div>
						</li>
						<li class="input-field">
							<input type="text" name="verify" id="verify" class="tiny-input-text verify-input-text" placeholder="验证码">
							<img src="public/images/captcha.jpg" alt="" id="captcha-image">
							<div id="form-verify-error" class="input-tip error"></div>
						</li>
						<li class="input-field">
							<input type="submit" value="登录" id="btn-submit">
						</li>
					</ul>
				</form>
			</div>
		</div>
		<!-- 登录主要区域结束 -->
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