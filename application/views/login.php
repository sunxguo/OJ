<link rel="stylesheet" href="/assets/css/users.css" type="text/css">
<div id="loginPanel" class="login">
<?php if(!isset($_SESSION['username'])){?>
	<div class="head colorOrange">OJ用户登录</div>
	<div class="form_login mg_t20">
		<form action="/users/user_login" method="post">
			<ul>
				<li><input class="input_text" name="userName" type="text" placeholder="用户名"/></li>
				<li><input class="input_text" name="pwd" type="password" placeholder="密码"/></li>
				<li><input class="confirm_bt width200 mg_t10" value="登录" type="submit"/></li>
			</ul>
		</form>
	</div>
<?php } else {echo "你已经登录！";}?>
</div>