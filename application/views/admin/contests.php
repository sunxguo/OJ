<link rel="stylesheet" href="/assets/css/admin/contests.css" type="text/css">
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#editor_new_con', {
			allowFileManager : true,
			width : '700px',
			height:'300px'
		});
	});
	function clearAllTab(){
		$('#tab-info').hide();
		$('#tab-lists').hide();
		$('#tab-info').hide();
		$('#tabview li').removeClass('tab-active');
	}
	$(document).ready(function(){
		$("#tab-info-bt").click(function(){
			clearAllTab();
			$('#tab-info').show();
			$(this).addClass("tab-active");
		});
		$("#tab-lists-bt").click(function(){
			clearAllTab();
			$('#tab-lists').show();
			$(this).addClass("tab-active");
		});
		$("#tab-codes-bt").click(function(){
			clearAllTab();
			$('#tab-codes').show();
			$(this).addClass("tab-active");
		});
		$("#input-pro-id").bind("focus blur change",function(){
			$.post("/cadmin/get_detail",{'id':$(this).val(),'type':'problem'},
				function(data){
					var Obj=$.parseJSON(data);
					if(data!='"failed"') $("#show-pro-title").html("<font color='green'>"+Obj.p_Title+"</font>");
					else $("#show-pro-title").html("<font color='red'>没有找到该题目</font>");
			});
		});
	});
</script>
<div class="contest_man">
	<div class="oper mg_l10">
		<h3 class="title2">比赛列表</h3>
		<input onclick="window.location='/admin/addContest'" class="confirm_bt mg_t10" type="button" value="添加比赛"/>
		<div class="contest_editor" id="contest_editor">
			<div class="new_head">编辑比赛<div class="close" onclick="removeDiv('#contest_editor')">X</div></div>
			<ul class="tabview clearfix" id="tabview">
				<li id="tab-info-bt" class="tab-active">基本信息</li>
				<li id="tab-lists-bt" >题目列表</li>
				<li id="tab-codes-bt" >提交管理</li>
			</ul>
			<ul id="tab-info">
				<li>比赛标题：<input id="editor_new_title" type="text" class="title width430" /> </li>
				<li>起止时间：<input id="start_time" type="text" class="title width200"  /> ~ <input id="end_time" type="text" class="title width200"  /></li>
				<li>比赛别名网址：<?=WEBSITEURL."/contest?title="?><input id="url" type="text" class="title width165" /> </li>
				<li>语言：
					<dl class="lang-box" id="lang-box">
					</dl>
				</li>
				<li>比赛描述：</li>
				<li>
					<textarea  id="editor_new_con" name="content" rows="15" cols="50" placeholder="请输入比赛描述"></textarea>
				</li>
				<input id="editor_new_id"  type="hidden"/>
				<li><input onclick="modify('contest')" type="button" class="confirm_bt mg_t20 mg_r10" value="保存修改"/> </li>
			</ul>
			<ul id="tab-lists" style="display:none;">
				<li class="list-head">
					<span style="width:10%;">题号</span>
					<span style="width:20%;">题目ID</span>
					<span style="width:35%;">标题</span>
					<span style="width:25%;">操作</span>
				</li>
				<li id="new-group-pro">
					<input id="input-pro-num" type="text" class="title" style="width:10%;" /> 
					<input id="input-pro-id" type="text" class="title" style="width:14.5%;" /> 
					<span id="show-pro-title" style="width:40%;"></span> 
					<input id="savepro" name="" type="button" class="bt" style="width:20%;" value="添加" onclick="add('grouppro')"/> 
				</li>
				<div id="prolist">
				</div>
			</ul>
			<ul id="tab-codes" style="display:none;">
			</ul>
		</div>
	</div>
	<ul class="lists">
		<li class="list_head">
			<span style="width:10%;">比赛ID</span>
			<span style="width:35%;">题目</span>
			<span style="width:12%;">解决/提交</span>
			<span style="width:20%;">起止时间</span>
			<span style="width:20%;">操作</span>
		</li>
	    <?php foreach($contests as $contest):?>
		<li class="list_item">
			<span style="width:10%;"><?=$contest->cont_ID?></span>
			<span style="width:35%;">
				<a href="/contest?title=<?=$contest->cont_url?>" target="_blank"><?=$contest->cont_title?></a>
			</span>
			<span style="width:12%;"><?=$contest->cont_DealNum."/".$contest->cont_SubNum?></span>
			<span style="width:20%;">
				<font color="green"><?=$contest->cont_startTime?></font><br>
				<font color="red"><?=$contest->cont_endTime?></font>
			</span>
			<span style="width:20%;">
				<a class="a_bt_rig mg_r10 width50" onclick="setDivCenter('#contest_editor');setContent('contest','<?=$contest->cont_ID?>');" >编辑</a>
				<a class="a_bt_err width50" onclick="delete_data('contest','<?=$contest->cont_ID?>')">删除</a>
			</span>
		</li>
		<?php endforeach;?>
	</ul>
	<div class="page">
		<?=$page?>
		<a class="<?=($pre_link=="#")?"no":"page_bt"?>" href="<?=($pre_link=="#")?"javascript:void()":$pre_link?>">上一页</a>
		<a class="<?=($next_link=="#")?"no":"page_bt"?>"href="<?=($next_link=="#")?"javascript:void()":$next_link?>">下一页</a>
	</div>
</div>