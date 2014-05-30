<link rel="stylesheet" href="/assets/css/proList.css" type="text/css">
<div  class="problem_list">
	<h3>题目列表</h3>
	<ul class="lists">
		<li class="list_head">
			<span style="width:10%;">题号</span>
			<span style="width:55%;">题目</span>
			<span style="width:15%;">提交人数</span>
			<span style="width:15%;">解决人数</span>
		</li>
	    <?php foreach($problems as $problem):?>
		<li class="list_item">
			<span style="width:10%;"><?=$problem->p_ID?></span>
			<span style="width:55%;">
				<a href="/problem?id=<?=$problem->p_ID?>" target="_blank"><?=$problem->p_Title?></a>
			</span>
			<span style="width:15%;"><?=$problem->p_SubNum?></span>
			<span style="width:15%;"><?=$problem->p_DealNum?></span>
		</li>
		<?php endforeach;?>
	</ul>
	<div class="page">
		<?=$page?>
		<a class="<?=($pre_link=="#")?"no":"page_bt"?>" href="<?=($pre_link=="#")?"javascript:void()":$pre_link?>">上一页</a>
		<a class="<?=($next_link=="#")?"no":"page_bt"?>"href="<?=($next_link=="#")?"javascript:void()":$next_link?>">下一页</a>
	</div>
</div>
