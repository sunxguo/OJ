<link rel="stylesheet" href="/assets/css/proList.css" type="text/css">
<div  class="problem_list">
	<h3>我的题目&代码列表</h3>
	<ul class="lists">
		<li class="list_head">
			<span style="width:10%;">题号</span>
			<span style="width:30%;">题目</span>
			<span style="width:10%;">状态</span>
			<span style="width:10%;">占用内存</span>
			<span style="width:10%;">执行时间</span>
			<span style="width:15%;">提交时间</span>
			<span style="width:10%;">操作</span>
		</li>
	    <?php foreach($code as $item):?>
		<li class="list_item">
			<span style="width:10%;"><?=$item->problem->p_ID?></span>
			<span style="width:30%;">
				<a href="/problem?id=<?=$item->problem->p_ID?>" target="_blank"><?=$item->problem->p_Title?></a>
			</span>
			<span style="width:10%;"><?=$item->status?></span>
			<span style="width:10%;"><?=$item->c_memory?></span>
			<span style="width:10%;"><?=$item->c_time?></span>
			<span style="width:15%;"><?=$item->c_creationDate?></span>
			<span style="width:10%;"><a class="checkCode" href="javascript:codeDetail('<?=$item->c_ID?>')">查看代码</a></span>
		</li>
		<div class="code" id="code<?=$item->c_ID?>">
			<div class="head">
				代码——<?=$item->problem->p_Title?>
				<div class="close" onclick="removeDiv('#code<?=$item->c_ID?>')">X</div>
			</div>
			<div class="code_content">
				<?=$item->c_code?>
			</div>
		</div>
		<?php endforeach;?>
	</ul>
	<div class="page">
		<?=$page?>
		<a class="<?=($pre_link=="#")?"no":"page_bt"?>" href="<?=($pre_link=="#")?"javascript:void()":$pre_link?>">上一页</a>
		<a class="<?=($next_link=="#")?"no":"page_bt"?>"href="<?=($next_link=="#")?"javascript:void()":$next_link?>">下一页</a>
	</div>
</div>
<script>
	function codeDetail(c_id){
		setDivCenter('#code'+c_id);
	}
</script>
