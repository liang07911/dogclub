<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('WEB_SITE_TITLE');?></title>
	<link href="Public/Home/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/font-face.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/swiper-3.4.2.min.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/public.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="Public/Home/js/swiper-3.4.2.min.js"></script>
	<script type="text/javascript" src="Public/Home/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Public/Home/layer/layer.js"></script>
	<script type="text/javascript" src="Public/Home/js/chineserp.js"></script>
	<script type="text/javascript" src="Public/Home/js/jquery.validate.js"></script>
	<script type="text/javascript" src="Public/Home/js/schedule.js"></script>
	<script type="text/javascript" src="Public/Home/js/public.js"></script>
	<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
	
	
</head>
<body>
<!-- 轮播图 START -->
<header>
	<div class="container clearfix">
		<a href="" class="logo"></a>
		<ul class="nav">
			<?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): ?><li>
                    <a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="header_user clearfix">
            <?php if(is_login()): ?><div class="vip">
				<div class="pre">
					<a href="<?php echo U('User/dog_list');?>">
					<?php if($headurl != '' ): ?><img src="<?php echo ($headurl); ?>" alt="">
					<?php else: ?>
					<img src="Public/Home/images/img_head.png" alt=""><?php endif; ?>
					</a>
				</div>
				<div class="list">
					<ul>
						<li><a href="<?php echo U('User/dog_list');?>"><img src="Public/Home/images/icon_dog.png" alt=""><span>我曾录入的犬只</span></a></li>
						<li><a href="<?php echo U('User/index');?>"><img src="Public/Home/images/icon_infor.png" alt=""><span>会员信息</span></a></li>
						<li><a href="<?php echo U('User/profile');?>"><img src="Public/Home/images/icon_set.png" alt=""><span>修改密码</span></a></li>
						<li><a href="<?php echo U('User/logout');?>"><img src="Public/Home/images/icon_exit.png" alt=""><span>退出</span></a></li>
					</ul>
				</div>
			</div>
               	
	 		<?php else: ?>
				<div class="login">
					<a href="<?php echo U('User/login');?>" class="login-btn">登录</a>
					<!--<a href="<?php echo U('User/register');?>" class="reg-btn hover">注册</a>-->
					<a href="<?php echo U('User/login');?>" class="reg-btn hover">注册</a>
				</div><?php endif; ?>
			
		</div>
	</div>
</header>
<section class="banner"></section>
<section class="box">
	<div class="container clearfix">
		<div class="right" style="width:100%">
<div class="sear">
				<div class="title">
					<h3>犬父录入</h3>
				</div>
				<div class="form">
					<form action="/index.php?s=/home/dog/father_search2/did/85.html" method="post">
						<div class="line_double center w_486 p_l_0" >
							<div class="left"><span>父亲血统编号</span></div>
							<div class="rights"><input type="text" name="studbook" class="studbook"></div>
						</div>
						<div class="line_button center w_476 clearfix">
							<input type="button" value="查询" id="submits">
							<a href="<?php echo U('Dog/father_insert',array('id'=>$dog_id,'act'=>'do'));?>" class="button_a pull_right b_c_red" style="padding: 0;text-align: center;">直接录入</a>
						</div>
					</form>
				</div>
				<script type="text/javascript">
					$('#submits').on('click',function(){
						if($('.studbook').val()=== ''){
							layer.msg('请填写父亲血统编号');
							return false;
						}
						$('form').submit();
					})
				</script>
			</div>

			<!--查询到结果输出 in-->
			<?php if($res == 1): if(!empty($father)): ?><div class="Result">
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
								<li><?php echo ($father["dog_name"]); ?></li>
								<li>
								<?php if($father["dog_sex"] == 0): ?>公
								<?php else: ?>母<?php endif; ?>
								</li>
								<li><?php echo ($father["mic_num"]); ?></li>
								<li><?php echo ($father["ear_num"]); ?></li>
								<li><?php echo (date('Y-m-d',$father["birthday"])); ?></li>
								<li><?php echo ($father["studbook"]); ?></li>
								<li><?php echo ($father["dog_owner"]); ?></li>
								<li><?php echo ($father["reproduce"]); ?></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="line_button p_l_0">
					<a href="<?php echo U('Dog/father_link2',array('id'=>$father['id'],did=>$dog_id));?>" class="button_a center">关联</a>
				</div>
			</div>
			<!--查询到结果输出 ent-->
			<?php else: ?>
			<!--无结果输出 in-->
			<div class="Result">
				<div class="title">
					<h3>查询结果</h3>
				</div>
				<p class="text_center m_tb_50">查无结果,<a href="<?php echo U('Dog/father_insert',array('id'=>$dog_id));?>" class="text_decoration">点此录入</a></p>
			</div>
			<!--无结果输出 ent--><?php endif; endif; ?>
		</div>
	</div>
</section>
<footer>
	<div class="container">
		<div class="f_link">
			<a href="http://www.k9dog.com.cn" alt="K9犬网" target="_blank">K9犬网</a>
		</div>
		<div class="address">
			<h3>联系我们</h3>
			<p>浙江省诸暨市东一路80号中瑞大厦</p>
			<p>官方微博：楷玖犬业俱乐部</p>
			<p>具体件 http：//cknclub.org/</p>
		</div>
		<div class="tel clearfix">
			<ul>
				<li>
					<div class="box clearfix">
						<div class="left"><img src="Public/Home/images/icon_qq.png" alt=""></div>
						<div class="right">
							<p>客服QQ</p>
							<p>2328939143</p>
						</div>
					</div>
				</li>
				<li>
					<div class="box clearfix">
						<div class="left"><img src="Public/Home/images/icon_email.png" alt=""></div>
						<div class="right">
							<p>电子邮件</p>
							<p>office@cknclub.org</p>
						</div>
					</div>
				</li>
				<li>
					<div class="box clearfix">
						<div class="left"><img src="Public/Home/images/icon_tell.png" alt=""></div>
						<div class="right">
							<p>联系方式</p>
							<p>0575-87979791</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="copy">
			<p>楷玖犬业俱乐部|版权所有</p>
	</div>
</footer>
</body>
</html>