<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理系统-登录</title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/admin/login.css" type="text/css">
    <script src="/assets/js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="/assets/js/tools.js" type="text/javascript"></script>
</head>
<body class="adminBody">
	<div id="loginPanel" class="login">
		<div class="head colorOrange">OJ后台管理系统</div>
		<div class="form_login mg_t20">
			<form action="/admin/login" method="post">
				<ul>
					<li>用户名</li>
					<li><input class="input_text" name="userName" type="text"/></li>
					<li>密码</li>
					<li><input class="input_text" name="pwd" type="password"/></li>
					<li><input class="confirm_bt width200 mg_t10" value="登录" type="submit"/></li>
				</ul>
			</form>
		</div>
	</div>
	<script>setDivCenter('#loginPanel');</script>
</body>
</html>