<link rel="stylesheet" href="/assets/css/problem.css" type="text/css">
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="exposition"]', {
			allowFileManager : true,
			width : '670px',
			height:'200px'
		});
	});
</script>
<div  class="info">
	<div class="title">
		<p class="<?='status-'.$contest->status['name']?>"><?=$contest->status['name_cn']?></p>
		<?=$contest->cont_title?>
		<div class="subtitle">提交人数：<?=$contest->cont_SubNum?> &nbsp;&nbsp;&nbsp;解决人数：<?=$contest->cont_DealNum?></div>
		<div class="time">
			<span><?=$contest->cont_startTime?>~<?=$contest->cont_endTime?></span>
		</div>
	</div>

	<div class="content">
		<p><?=$contest->cont_content?></p>
		<ul class="lists">
			<li class="list_head">
				<span style="width:10%;">题号</span>
				<span style="width:55%;">题目</span>
				<span style="width:15%;">提交人数</span>
				<span style="width:15%;">解决人数</span>
			</li>
			<?php foreach($problems as $problem):?>
			<li class="list_item">
				<span style="width:10%;"><?=$problem->gp_pNum?></span>
				<span style="width:55%;">
					<a href="/problem?id=<?=$problem->gp_pID?>" target="_blank"><?=$problem->problem->p_Title?></a>
				</span>
				<span style="width:15%;"><?=$problem->problem->p_SubNum?></span>
				<span style="width:15%;"><?=$problem->problem->p_DealNum?></span>
			</li>
			<?php endforeach;?>
		</ul>
	</div> 
	<?php if($contest->status['name']!="completed"):?>
	<div class="submit_code">
		<form method="post" action="/ccontest/join_contest" enctype="multipart/form-data">
			<h3 class="title3">申请参加</h3>
			<textarea name="exposition" rows="15" cols="80" placeholder="请输入申请理由"></textarea><br/>
			<input name="id" type="hidden" value="<?=$contest->cont_ID?>"/>
			<input class="confirm_bt mg_t10" type="submit" value="申请参加"/>
		</form>
	</div>
	<?php endif;?>
</div>
