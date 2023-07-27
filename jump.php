<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>码农博客-PHP技术交流博客</title>
		<link rel="stylesheet" href="public/styles/reset.css">
		<link rel="stylesheet" href="public/styles/fonts.css">
		<link rel="stylesheet" href="public/styles/coding.css">
		<link type="image/x-icon" href="public/images/global/favicon.ico" rel="icon">
	</head>
	<body>
		<div id="jump-container">
			<!-- 注册成功时显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/checked.png" alt="">
					</div>
					<div class="system-message-tip-text">恭喜您，注册成功</div>
					<div class="system-message-tip-text">
						<a href="index.php">返回首页</a>
					</div>
				</div>
			</div>
			<!--注册成功时显示的HTML代码结束-->
			<!-- 注册失败时显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/unchecked.png" alt="">
					</div>
					<div class="system-message-tip-text">对不起，用户注册失败</div>
					<div class="system-message-tip-text">
						<a href="register.php">重新注册</a>
					</div>
				</div>
			</div>
			<!--注册失败时显示的HTML代码结束-->
			<!-- 用户名已经存在导致注册失败时显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/unchecked.png" alt="">
					</div>
					<div class="system-message-tip-text">对不起，用户已经存在</div>
					<div class="system-message-tip-text">
						<a href="register.php">重新注册</a>
					</div>
				</div>
			</div>
			<!--用户名已经存在导致注册失败时显示的HTML代码结束-->
			<!--评论发表成功时显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/checked.png" alt="">
					</div>
					<div class="system-message-tip-text">恭喜您，评论发表成功</div>
					<div class="system-message-tip-text">
						<a href="index.php">返回首页</a>
					</div>
				</div>
			</div>
			<!--评论发表成功时显示的HTML代码结束-->
			<!-- 评论发表失败时显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/unchecked.png" alt="">
					</div>
					<div class="system-message-tip-text">对不起，评论发表失败</div>
					<div class="system-message-tip-text">
						<a href="index.php">返回首页</a>
					</div>
				</div>
			</div>
			<!--评论发表失败时显示的HTML代码结束-->
			<!-- 旧密码输入错误而导致密码修改错误显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/unchecked.png" alt="">
					</div>
					<div class="system-message-tip-text">对不起，旧密码输入错误</div>
					<div class="system-message-tip-text">
						<a href="change-password.php">修改密码</a>
					</div>
				</div>
			</div>
			<!--旧密码输入错误而导致密码修改错误显示的HTML代码-->
			<!--密码修改成功显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/checked.png" alt="">
					</div>
					<div class="system-message-tip-text">密码修改成功</div>
					<div class="system-message-tip-text">
						<a href="index.php">返回首页</a>
					</div>
				</div>
			</div>
			<!---密码修改成功显示的HTML代码结束-->
			<!--常规资料编辑成功显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/checked.png" alt="">
					</div>
					<div class="system-message-tip-text">常规资料修改成功</div>
					<div class="system-message-tip-text">
						<a href="index.php">返回首页</a>
					</div>
				</div>
			</div>
			<!----常规资料编辑成功显示的HTML代码结束-->
			<!--常规资料编辑失败显示的HTML代码开始 -->
			<div class="system-message-wrapper">
				<div class="system-message-background"></div>
				<div class="system-message-tip">
					<div class="system-message-tip-image">
						<img src="public/images/global/unchecked.png" alt="">
					</div>
					<div class="system-message-tip-text">常规资料修改失败</div>
					<div class="system-message-tip-text">
						<a href="index.php">返回首页</a>
					</div>
				</div>
			</div>
			<!----常规资料编辑失败显示的HTML代码结束-->
		</div>
	</body>
</html>