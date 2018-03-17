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
					<h3>Ȯֻ¼��</h3>
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
							<div class="left"><span>ĸ��Ѫͳ���</span></div>
							<div class="rights"><input type="text" name="studbook" class="studbook"></div>
						</div>
			
						<div class="line_button center w_476 clearfix">
							<a href="<?php echo U('Dog/mother_insert',array('id'=>$dog_id));?>" class="button_a pull_left" style="margin-right: 30px;padding: 0;text-align: center;">ֱ��¼��</a>
							<input type="button" value="��ѯ" id="submits">
							<a href="<?php echo U('Dog/over_insert');?>" class="button_a pull_right b_c_red">����</a>
							
						</div>
					</form>
				</div>
				<script type="text/javascript">
					$('#submits').on('click',function(){
						if($('.studbook').val()=== ''){
							layer.msg('����дĸ��Ѫͳ���');
							return false;
						}
						$('form').submit();
					})
				</script>
			</div>
			<?php if($res == 1): if(!empty($mother)): ?><!--��ѯ�������� in-->
			<div class="Result">
				<div class="title">
					<h3>��ѯ���</h3>
				</div>
				<div class="table">
					<ul>
						<li class="fa">
							<ul class="clearfix">
								<li>Ȯ��</li>
								<li>�Ա�</li>
								<li>оƬ��</li>
								<li>����</li>
								<li>��������</li>
								<li>Ѫͳ֤���</li>
								<li>Ȯ��</li>
								<li>��ֳ��</li>
							</ul>
						</li>
						<li class="fa">
							<ul class="clearfix">
								<li><?php echo ($mother["dog_name"]); ?></li>
								<li>
								<?php if($mother["dog_sex"] == 0): ?>��
								<?php else: ?>ĸ<?php endif; ?>
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
					<a href="<?php echo U('Dog/mother_link',array('id'=>$mother['id']));?>" class="button_a center">����</a>
				</div>
			</div>
			<!--��ѯ�������� end-->
			<?php else: ?>
			<!--�޽����� in-->
			<div class="Result">
				<div class="title">
					<h3>��ѯ���</h3>
				</div>
				<p class="text_center m_tb_50">���޽��,<a href="<?php echo U('Dog/mother_insert',array('id'=>$dog_id));?>" class="text_decoration">���¼��</a></p>
			</div>
			<!--�޽����� ent--><?php endif; endif; ?>
</body>
</html>