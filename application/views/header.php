<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/menu.css" type="text/css">
    <script src="/assets/js/jquery-1.4.2.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.backgroundpos.js" type="text/javascript"></script>
    <script src="/assets/js/menu.js" type="text/javascript"></script>
	 <script src="/assets/js/tools.js" type="text/javascript"></script>
</head>
<body>
    <div class="header">
        <ul class="menu">
            <li class="current first"><a href="/" target="_self">首页</a></li>
            <li><a href="/problemList" target="_self">题目</a></li>
            <li><a href="/contestList" target="_self">比赛</a></li>
            <li class="li_3"><a class="noclick" href="/" target="_blank">个人中心</a>
                <dl class="li_3_content">
                    <dt></dt>
                    <dd><a href="/users/user_center_myCode" target="_blank"><span>我的代码</span></a></dd>
                    <dd><a href="/" target="_blank"><span>个人信息</span></a></dd>
                    <dd class="lastItem"><a href="/" target="_blank"><span>朋友圈</span></a></dd>
                </dl>
            </li>
            <li class=""><a class="noborder " href="#" target="_self">论坛</a></li>
        </ul>
        <a href="/">
            <img title="OnlineJudge" class="miui_logo" src="/assets/images/index/OJ-logo.png" alt="网站logo"></a>
        <p class="language">
			<?php if(isset($_SESSION['username'])){?>
			<?=$_SESSION['username']?>欢迎登录！<a class="logout_bt" href="javascript:logout();" target="_blank">退出</a>
			<?php } else {?>
			<a class="login_bt" href="/users/login" target="_blank">登录</a>/<a class="register_bt" href="/users/register" target="_blank">注册</a>
			<?php }?>
		<!--	中文<span>|</span><a href="#" target="_blank">English</a>--></p>
    </div>
	<div class="main">