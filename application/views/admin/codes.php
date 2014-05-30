<link rel="stylesheet" href="/assets/css/admin/problems.css" type="text/css">
<script>
	var editor;
	var editor1;
	KindEditor.ready(function(K) {
		editor = K.create('#new_con', {
			allowFileManager : true,
			width : '700px',
			height:'300px'
		});
		editor1 = K.create('#editor_new_con', {
			allowFileManager : true,
			width : '700px',
			height:'300px'
		});
	});
</script>
<div class="problem_man">
	<div class="oper mg_l10">
		<h3 class="title2">题目列表</h3>
		<input onclick="setDivCenter('#new_problem')" class="confirm_bt mg_t10" type="button" value="添加题目"/>
		<div class="new_problem" id="new_problem">
			<div class="new_head">添加题目<div class="close" onclick="removeDiv('#new_problem')">X</div></div>
			<ul>
				<li>题目标题</li>
				<li><input id="new_title" class="input_text" type="text"/> </li>
				<li>题目内容</li>
				<li>
					<textarea  id="new_con" rows="15" cols="50" placeholder="请输入题目内容"></textarea>
				</li>
				<li><input onclick="add('problem')" type="button" class="confirm_bt mg_t20 mg_r10" value="添加"/> </li>
			</ul>
		</div>
		<div class="problem_editor" id="problem_editor">
			<div class="new_head">修改题目<div class="close" onclick="removeDiv('#problem_editor')">X</div></div>
			<ul>
				<li>题目标题</li>
				<li><input id="editor_new_title" class="input_text" type="text"/> </li>
				<li>题目内容</li>
				<li>
					<textarea id="editor_new_con" rows="15" cols="50" placeholder="请输入题目内容"></textarea>
				</li>
				<input id="editor_new_id"  type="hidden"/>
				<li><input onclick="modify('problem')" type="button" class="confirm_bt mg_t20 mg_r10" value="保存修改"/> </li>
			</ul>
		</div>
	</div>
	<ul class="lists">
		<li class="list_head">
			<span style="width:10%;">题号</span>
			<span style="width:45%;">题目</span>
			<span style="width:12%;">提交人数</span>
			<span style="width:10%;">解决人数</span>
			<span style="width:20%;">操作</span>
		</li>
	    <?php foreach($problems as $problem):?>
		<li class="list_item">
			<span style="width:10%;"><?=$problem->p_ID?></span>
			<span style="width:45%;">
				<a href="/problem?pid=<?=$problem->p_ID?>" target="_blank"><?=$problem->p_Title?></a>
			</span>
			<span style="width:12%;"><?=$problem->p_SubNum?></span>
			<span style="width:10%;"><?=$problem->p_DealNum?></span>
			<span style="width:20%;">
				<a class="a_bt_rig mg_r10 width50" onclick="setDivCenter('#problem_editor');setContent('problem','<?=$problem->p_ID?>');" >编辑</a>
				<a class="a_bt_err width50" onclick="delete_data('problem','<?=$problem->p_ID?>')">删除</a>
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