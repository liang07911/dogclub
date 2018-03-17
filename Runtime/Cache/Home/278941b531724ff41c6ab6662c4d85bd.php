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


<div class="sear">
				<div class="title">
					<h3>会员查询</h3>
				</div>
				<div class="form">
					<form action="/index.php?s=/home/dog/user_search.html" method="post" id="USER_search">
						<div class="line_double">
							<div class="left"><span>会员名称</span></div>
							<div class="rigth"><input type="text" name="username" class="USER_search"></div>
						</div>
						<div class="line_button">
							<input type="button" value="查询" id="submits">
						</div>
					</form>
				</div>
				<script type="text/javascript">
					$('#submits').on('click',function(){
						validate('.USER_search','#USER_search','会员名称');
					})
				</script>
			</div>
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
								<li>尔号</li>
								<li>出生日期</li>
								<li>血统证书号</li>
								<li>犬主</li>
								<li>繁殖人</li>
							</ul>
						</li>
						<li class="fa">
						<?php if(is_array($dogArr)): $i = 0; $__LIST__ = $dogArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><ul class="clearfix">
								<li><a href="" style="color:#fec601"><?php echo ($list["dog_name"]); ?></a></li>
								<li>
								<?php if($list["dog_sex"] == 0): ?>公
								<?php else: ?>母<?php endif; ?>
								</li>
								<li><?php echo ($list["mic_num"]); ?></li>
								<li><?php echo ($list["ear_num"]); ?></li>
								<li><?php echo (date('Y-m-d',$list["birthday"])); ?></li>
								<li><?php echo ($list["studbook"]); ?></li>
								<li><?php echo ($list["dog_owner"]); ?></li>
								<li><?php echo ($list["reproduce"]); ?></li>
							</ul><?php endforeach; endif; else: echo "" ;endif; ?>
						</li>
					</ul>
				</div>
			</div>
			<!--查询到结果输出 ent-->
			<?php else: ?>
			<!--无结果输出 in-->
			<script type="text/javascript">
				layer.msg('没有该会员信息',{ icon: 5,skin: 'layer-ext-moon'})
			</script>
			<!--无结果输出 ent--><?php endif; endif; ?>
</body>
</html>