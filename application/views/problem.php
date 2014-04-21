<link rel="stylesheet" href="/assets/css/problem.css" type="text/css">
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="code"]', {
			allowFileManager : true,
			width : '670px',
			height:'300px'
		});
	});
</script>
<div  class="info">
	<div class="title">
		<?=$problem->p_Title?>
		<div class="subtitle">提交人数：<?=$problem->p_SubNum?> &nbsp;&nbsp;&nbsp;解决人数：<?=$problem->p_DealNum?></div>
	 </div>
	 
	 <div class="content">
	    <p><?=$problem->p_Content?></p>
	 </div> 
	<div class="submit_code">
		<form method="post" action="/problem/execute_code" enctype="multipart/form-data">
			<h3 class="title3">提交代码</h3>
			<textarea name="code" rows="15" cols="80" placeholder="请输入代码"></textarea><br/>
			<input name="pro_id" type="hidden" value="<?=$problem->p_ID?>"/>
			<input class="confirm_bt mg_t10" type="submit" value="提交代码"/>
		</form>
	</div>
</div>
