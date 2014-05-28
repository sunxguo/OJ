<link rel="stylesheet" href="/assets/css/users.css" type="text/css">
<div id="loginPanel" class="login">
	<div class="head colorOrange">执行结果——测试程序</div>
	<div class="form_login mg_t20">
		<ul>
			<?php 
				//echo '输入的参数:';
				//echo $_POST['args'];
				echo '<br/><br/>C++程序执行结果:<br/>';
				/*call c++ aplications,the sapce right after ./test is necessary.
				  It separate the command from its arguments*/
				 // $result = iconv("GBK", "UTF-8", $result[0]); 
				print_r($result);
				print_r($err);
				/*
				$result= array_reverse($result);
				foreach($result as $item){?>
					<div class="dos">
					<?=iconv("GBK", "UTF-8", $item);?>
					</div>
			<?php
				}*/
			?>
		</ul>
	</div>
</div>
