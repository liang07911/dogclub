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
					<h3>犬只录入</h3>
				</div>
				<div class="enter">
					<ul class="clearfix">
						<li><img src="Public/Home/images/btn_menu1.png" alt=""></li>
						<li><img src="Public/Home/images/btn_menu2_h.png" alt=""></li>
						<li><img src="Public/Home/images/btn_menu3_h.png" alt=""></li>
						<li><img src="Public/Home/images/btn_menu4_n.png" alt=""></li>
					</ul>
				</div>
				<div class="form">
					<form action="/index.php?s=/home/dog/mother_search.html" method="post">
						<div class="line_double center w_486 p_l_0" >
							<div class="left"><span>母亲血统编号</span></div>
							<div class="rights"><input type="text" name="studbook" class="studbook"></div>
						</div>
			
						<div class="line_button center w_476 clearfix">
							<a href="<?php echo U('Dog/mother_insert',array('id'=>$dog_id));?>" class="button_a pull_left" style="margin-right: 30px;padding: 0;text-align: center;">直接录入</a>
							<input type="button" value="查询" id="submits">
							<a href="<?php echo U('Dog/over_insert');?>" class="button_a pull_right b_c_red">跳过</a>
							
						</div>
					</form>
				</div>
				<script type="text/javascript">
					$('#submits').on('click',function(){
						if($('.studbook').val()=== ''){
							layer.msg('请填写母亲血统编号');
							return false;
						}
						$('form').submit();
					})
				</script>
			</div>
			<?php if($res == 1): if(!empty($mother)): ?><!--查询到结果输出 in-->
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
								<li><?php echo ($mother["dog_name"]); ?></li>
								<li>
								<?php if($mother["dog_sex"] == 0): ?>公
								<?php else: ?>母<?php endif; ?>
								</li>
								<li><?php echo ($mother["mic_num"]); ?></li>
								<li><?php echo ($mother["ear_num"]); ?></li>
								<li><?php echo (date('Y-m-d',$mother["birthday"])); ?></li>
								<li><?php echo ($mother["studbook"]); ?></li>
								<li><?php echo ($mother["dog_owner"]); ?></li>
								<li><?php echo ($mother["reproduce"]); ?></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="line_button p_l_0">
					<a href="<?php echo U('Dog/mother_link',array('id'=>$mother['id']));?>" class="button_a center">关联</a>
				</div>
			</div>
			<!--查询到结果输出 end-->
			<?php else: ?>
			<!--无结果输出 in-->
			<div class="Result">
				<div class="title">
					<h3>查询结果</h3>
				</div>
				<p class="text_center m_tb_50">查无结果,<a href="<?php echo U('Dog/mother_insert',array('id'=>$dog_id));?>" class="text_decoration">点此录入</a></p>
			</div>
			<!--无结果输出 ent--><?php endif; endif; ?>
</body>
</html>