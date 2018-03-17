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

<div class="swiper-container">
  <div class="swiper-wrapper">
      <div class="swiper-slide"  style="background:url('Public/Home/images/banner.jpg') no-repeat 100% center"></div>
      <div class="swiper-slide" style="background:url('Public/Home/images/banner.jpg') no-repeat 100% center"></div>
  </div>
   <!-- 如果需要导航按钮 -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
<script type="text/javascript">
window.onload = function() {
  var mySwiper = new Swiper('.swiper-container',{
    loop: true,//循环
    autoplay : 5000,//可选选项，自动滑动
    keyboardControl:true,
   	nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev'
  }); 

}
</script>
<!-- 轮播图 END -->

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