<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('WEB_SITE_TITLE');?></title>
	<link href="Public/Home/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/swiper-3.4.2.min.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/public.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/home.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="Public/Home/js/swiper-3.4.2.min.js"></script>
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
						<li><img src="Public/Home/images/btn_menu4_h.png" alt=""></li>
					</ul>
				</div>
				<div class="text_center m_tb_50">录入成功...现在跳至<a href="<?php echo U('Dog/dog_content',array('id'=>$id));?>" class="text_decoration" onclick="jump('<?php echo ($id); ?>')">犬只详情页</a></div>
			</div>
			
			<script type="text/javascript">
				function jump(dogid){
					//top.location.href="<?php echo U('Dog/dog_content',array('id'=>$id));?>";
					top.location.href = "index.php?s=/home/dog/dog_content/id/"+dogid;
				}
			</script>
</body>
</html>