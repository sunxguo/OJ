<link rel="stylesheet" href="/assets/css/proList.css" type="text/css">
<div  class="problem_list">
	<h3>比赛列表</h3>
	<ul class="lists">
		<li class="list_head">
			<span style="width:10%;">比赛编号</span>
			<span style="width:45%;">标题</span>
			<span style="width:10%;">状态</span>
			<span style="width:15%;">提交人数</span>
			<span style="width:15%;">解决人数</span>
		</li>
	    <?php foreach($contests as $contest):?>
		<li class="list_item">
			<span style="width:10%;"><?=$contest->cont_ID?></span>
			<span style="width:45%;">
				<a href="/contest?title=<?=$contest->cont_url?>" target="_blank"><?=$contest->cont_title?></a>
			</span>
			<span style="width:10%;" class="<?='status status-'.$contest->status['name']?>"><?=$contest->status['name_cn']?></span>
			<span style="width:15%;"><?=$contest->cont_SubNum?></span>
			<span style="width:15%;"><?=$contest->cont_DealNum?></span>
		</li>
		<?php endforeach;?>
	</ul>
	<div class="page">
		<?=$page?>
		<a class="<?=($pre_link=="#")?"no":"page_bt"?>" href="<?=($pre_link=="#")?"javascript:void()":$pre_link?>">上一页</a>
		<a class="<?=($next_link=="#")?"no":"page_bt"?>"href="<?=($next_link=="#")?"javascript:void()":$next_link?>">下一页</a>
	</div>
</div>
