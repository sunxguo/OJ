<link rel="stylesheet" href="/assets/css/admin/newcont.css" type="text/css">
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#new_con', {
			allowFileManager : true,
			width : '700px',
			height:'300px'
		});
	});
</script>
<div class="contest_man">
	<div class="oper mg_l10">
		<h3 class="title2">添加比赛</h3>
		<div class="new_contest" id="new_contest">
			<ul>
				<li>比赛标题：<input id="title" type="text" class="title width430" /> </li>
				<li>起止时间：<input id="start_time" type="datetime-local" class="title width200"  /> ~ <input id="end_time" type="datetime-local" class="title width200"  /></li>
				<li>比赛别名网址：<?=WEBSITEURL."/contest?title="?><input id="url" type="text" class="title width165" /> </li>
				<li>语言：
					<dl class="lang-box">
						<dd><input type="checkbox" name="lang" value="0" checked/>gcc</dd>
					</dl>
				</li>
				<li>比赛描述：</li>
				<li>
					<textarea  id="new_con" name="content" rows="15" cols="50" placeholder="请输入比赛描述"></textarea>
				</li>
				<li><input onclick="add('contest')" type="button" class="confirm_bt mg_t20 mg_r10" value="添加"/> </li>
			</ul>
		</div>
	</div>
</div>