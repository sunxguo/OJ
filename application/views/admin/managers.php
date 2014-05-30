<link rel="stylesheet" href="/assets/css/admin/users.css" type="text/css">
<div class="user_man">
	<div class="oper mg_l10">
		<h3 class="title2">管理员列表</h3>
		<div class="user_editor" id="user_editor">
			<div class="new_head">修改管理员信息<div class="close" onclick="removeDiv('#user_editor')">X</div></div>
			<ul>
				<li>用户名</li>
				<li><input id="editor_new_title" class="input_text" type="text"/> </li>
				<input id="editor_new_id"  type="hidden"/>
				<li><input onclick="modify('user')" type="button" class="confirm_bt mg_t20 mg_r10" value="保存修改"/> </li>
			</ul>
		</div>
	</div>
	<ul class="lists">
		<li class="list_head">
			<span style="width:10%;">管理员ID</span>
			<span style="width:45%;">用户名</span>
			<span style="width:20%;">操作</span>
		</li>
	    <?php foreach($managers as $manager):?>
		<li class="list_item">
			<span style="width:10%;"><?=$manager->m_ID?></span>
			<span style="width:45%;">
				<a href="#?>" target="_blank"><?=$manager->m_name?></a>
			</span>
			<span style="width:20%;">
				<a class="a_bt_rig mg_r10 width50" onclick="setDivCenter('#user_editor');setContent('manager','<?=$manager->m_ID?>');" >编辑</a>
				<a class="a_bt_err width50" onclick="delete_data('manager','<?=$manager->m_ID?>')">删除</a>
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