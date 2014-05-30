<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
	<link rel="stylesheet" href="/assets/css/admin/admin_base.css" type="text/css">
	<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
	<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
    <script src="/assets/js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="/assets/js/tools.js" type="text/javascript"></script>
	<script src="/assets/js/admin_handler.js" type="text/javascript"></script>
</head>
<body class="adminBody">
	<div class="admin_main">
		<div class="header">
			<div class="logo"><img src="/assets/images/admin/admin_logo.png"/></div>
			<div class="info"><?=$_SESSION['username']?> <a href="/cadmin/logout">退出</a></div>
		</div>
		<div class="sideNavi">
			<ul>
				<li class="l1">信息管理</li>
				<li class="<?=(isset($adminNaviPro     ) && $adminNaviPro     ) ? 'cur' : '' ?>" onclick="window.location='/admin/problems'">题库管理</li>
				<li class="<?=(isset($adminNaviCode ) && $adminNaviCode ) ? 'cur' : '' ?>" onclick="window.location='/admin/codes'">源代码管理</li>
				<li class="<?=(isset($adminNaviUsers ) && $adminNaviUsers ) ? 'cur' : '' ?>" onclick="window.location='/admin/users'">用户管理</li>
				<li class="<?=(isset($adminNaviManagers ) && $adminNaviManagers ) ? 'cur' : '' ?>" onclick="window.location='/admin/managers'">管理员管理</li>
				<li class="l1">比赛管理</li>
				<li class="<?=(isset($adminNaviContests ) && $adminNaviContests ) ? 'cur' : '' ?>" onclick="window.location='/admin/contests'">已有比赛</li>
				<li class="<?=(isset($adminNaviAddNewCont ) && $adminNaviAddNewCont ) ? 'cur' : '' ?>" onclick="window.location='/admin/addContest'">添加比赛</li>
			</ul>
		</div>
		<div class="main_con">