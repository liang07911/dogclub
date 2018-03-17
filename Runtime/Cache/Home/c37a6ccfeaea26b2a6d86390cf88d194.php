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
<section class="us_banner"></section>
<section class="us">
	<div class="container">
		<div class="map clearfix">
			<div class="left pull_left">
				<iframe width="604" height="358" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://j.map.baidu.com/c2oTO"></iframe>
			</div>
			<div class="right pull_left">
				<div class="title">
					<h4>俱乐部介绍</h4>
				</div>
				<div class="text">
					楷玖犬业俱乐部有限公司坐落于美丽的西施故里—诸暨，是一家别有前景的互联网—新型企业。该公司紧跟现在电商时代的步伐，展现属于自己独特的魅力。公司本着求贤若渴，重视人才的用人理念，以诚信经营为宗旨，不断壮大。楷玖犬业俱乐部有限公司主要包含犬只赛事、芯片植入、销售犬只相关产品、互联网商城、杂志，这五方面。
				</div>
			</div>
		</div>
	</div>
	<div class="l_h_100"></div>
	<div class="box">
		<div class="js">
			<div class="container">
			楷玖犬业俱乐部简称(CKN),经中国工商总局批准,<br>从事犬类的展览展示及交流活动,繁育,训练,医疗为一体的单位;<br>由爱犬从业人员组成的全国性民间联合组织,<br>是民间完全自律的,为提高中国民间养犬训犬文化,为犬行业健康科学发展而创立的。
			</div>
		</div>
		<div class="bg"></div>
	</div>
	<div class="container">
		<div class="zz clearfix">
			<div class="left pull_left">
				<img src="Public/Home/images/img_zongzhi.jpg" alt="">
			</div>
			<div class="right pull_left">
				<div class="text">
					 努力规范犬只行业,提高行业的素养,<br>使犬行业能够良性健康的发展.完善中国自己的赛事制度,<br>提高赛事正规性,可玩性,可加入性和生活实用性,<br>使犬行业的繁育,培育,销售和周边业务的连接和保障更加的完善。<br>br为俱乐部的成员和俱乐部的会员的利益提供保障,同时争取最大的利益和优惠,<br>提高相关业务的专业服务水平,使中国犬业能够真正进入到良性发展当中。
				</div>
				<div class="title">
					<h4>我们的宗旨</h4>
				</div>
			</div>
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