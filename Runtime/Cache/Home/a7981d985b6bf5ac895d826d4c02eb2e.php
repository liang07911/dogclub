<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('WEB_SITE_TITLE');?></title>
	<link href="Public/Home/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/public.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="Public/Home/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Public/Home/layer/layer.js"></script>
	<script type="text/javascript" src="Public/Home/js/public.js"></script>
	
	
</head>
<body>

	<form action="/index.php?s=/home/dog/dog_search.html" method="post" id="DOG_search">
		<div class="sear">
				
				<div class="title">
					<h3>犬只查询</h3>
				</div>
				<div class="line_single">
					<input type="text" name="keywords" class="DOG_search">
				</div>
				<div class="line_radio">
					<input type="radio" name="class" value="studbook" checked="checked" /><span>血统证书号</span>
				</div>
				<div class="line_radio">
					<input type="radio" name="class" value="dog_name"/><span>犬只名称</span>
				</div>
				<div class="line_radio">
					<input type="radio" name="class" value="ear_num"/><span>耳号</span>
				</div>
				<div class="line_radio">
					<input type="radio" name="class" value="mic_num"/><span>芯片号</span>
				</div>
				<div class="line_button">
					<input type="button" value="查询" id="submits">
				</div>
			</div>
		</form>
		<script type="text/javascript">
			$('#submits').on('click',function(){
				var msg = $(' input[name="class"]:checked ').next().text();
				validate('.DOG_search','#DOG_search',msg);
			})
			
		</script>
		<?php if($res == 1): if(!empty($dogArr)): ?><!--查询到结果输出 in-->
			<div class="Result">
				<div class="title">
					<h3>查询结果</h3>
				</div>
				<div class="table">
					<ul>
						<li class="fa">
							<ul class="clearfix">
								<li>犬名</li>
								<li>性别</li>
								<li>芯片号</li>
								<li>耳号</li>
								<li>出生日期</li>
								<li>血统证书号</li>
								<li>犬主</li>
								<li>繁殖人</li>
							</ul>
						</li>
						<li class="fa">
							<ul class="clearfix">
								<li><a href="javascript:void(0)" style="color:#fec601" onclick="jump(<?php echo ($dogArr["id"]); ?>)"><?php echo ($dogArr["dog_name"]); ?></a></li>
								<li>
								<?php if($dogArr["dog_sex"] == 0): ?>公
								<?php else: ?>母<?php endif; ?>
								</li>
								<li><?php echo ($dogArr["mic_num"]); ?></li>
								<li><?php echo ($dogArr["ear_num"]); ?></li>
								<li><?php echo (date('Y-m-d',$dogArr["birthday"])); ?></li>
								<li><?php echo ($dogArr["studbook"]); ?></li>
								<li><?php echo ($dogArr["dog_owner"]); ?></li>
								<li><?php echo ($dogArr["reproduce"]); ?></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!--查询到结果输出 ent-->
			<?php else: ?>
			<!--无结果输出 in
			<div class="Result">
				<div class="title">
					<h3>查询结果</h3>
				</div>
				<p class="text_center m_tb_50">查无结果</p>
			</div>
			<!--无结果输出 ent-->
			<script type="text/javascript">
				layer.msg('没有该犬只信息',{ icon: 5,skin: 'layer-ext-moon'})
			</script><?php endif; endif; ?>
</body>
</html>