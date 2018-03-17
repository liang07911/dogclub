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
					<h3>犬母录入</h3>
				</div>
				<div class="form">
					<form action="<?php echo U('Dog/mother_add');?>" method="post" enctype="multipart/form-data">
						<div class="titleh4">
							<h4>| 必填项</h4>
						</div>
						<div class="line_double">
							<div class="left"><span>犬名</span></div>
							<div class="rights clearfix">
								<input type="text" name="dog_name" class="error_message">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line_double clearfix">
							<div class="left"><span>性别</span></div>
							<div class="rights clearfix">
								<input type="radio" name="dog_sex" checked="checked" value="0"/><span>公</span>
								<input type="radio" name="dog_sex" value="1"/><span>母</span>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span>耳号</span></div>
							<div class="rights clearfix"><input type="text" name="ear_num" class="error_message"><span class="error_message"></span></div>
						</div>
						<div class="line_double">
							<div class="left"><span>芯片号</span></div>
							<div class="rights clearfix"><input type="text" name="mic_num" class="error_message"><span class="error_message"></span></div>
						</div>
						<div class="line_double">
							<div class="left"><span>血统证书号</span></div>
							<div class="rights clearfix"><input type="text" name="studbook" class="error_message"><span class="error_message"></span></div>
						</div>
						<div class="line_double">
							<div class="left"><span>出生日期</span></div>
							<div class="rights p_relative  clearfix">
								<input type="text" name="birthday" class="error_message"><span class="error_message"></span>
								<div id="Date_box"></div>
								<script type="text/javascript">
								$('input[name=birthday]').on('click',function  () {
										$('#Date_box').show()
								});
								var mySchedule = new Schedule({
									el: '#Date_box',
									//date: '2018-9-20',
									clickCb: function (y,m,d) {
										$('input[name=birthday]').val(y+'-'+m+'-'+d);
										$('#Date_box').hide()
									}
								});
							</script>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span>犬主</span></div>
							<div class="rights clearfix"><input type="text" name="dog_owner" class="error_message"><span class="error_message"></span></div>
						</div>
						<div class="line_double">
							<div class="left"><span>犬主联系方式</span></div>
							<div class="rights clearfix"><input type="text" name="dog_owner" class="error_message"><span class="error_message"></span></div>
						</div>
						<div class="line_double">
							<div class="left"><span>繁殖人</span></div>
							<div class="rights clearfix"><input type="text" name="reproduce" class="error_message"><span class="error_message"></span></div>
						</div>
						<div class="titleh4">
							<h4>| 选填项</h4>
						</div>
						<div class="line_double">
							<div class="left"><span>DNA</span></div>
							<div class="rights"><input type="text" name="dog_dna"></div>
						</div>
						<div class="line_double">
							<div class="left"><span>类别</span></div>
							<div class="rights"><input type="text" name="type"></div>
						</div>
						<div class="line_double">
							<div class="left"><span>训练资格</span></div>
							<div class="rights"><input type="text" name="practice"></div>
						</div>
						<div class="line_double">
							<div class="left"><span>髋/肘鉴定</span></div>
							<div class="rights"><input type="text" name="appraisal"></div>
						</div>
						<div class="line_double">
							<div class="left"><span>国外证书号</span></div>
							<div class="rights"><input type="text" name="foreign_num"></div>
						</div>
						<div class="line_double">
							<div class="left"><span>照片</span></div>
							<div class="rights files">
								 <a href="javascript:;">上传</a>
								<img src="Public/Home/images/100.jpg" id="xmTanImg">
								<input type="file"  onchange="xmTanUploadImg(this,'xmTanImg')" name="pic_url">
							</div>
						</div>
						<div class="line_button">
							<input type="submit" value="录入" id='submits'>
							<input type="hidden" name="dog_id" value="<?php echo ($dog_id); ?>">
							<input type="hidden" name="act" value="<?php echo ($act); ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
				<style>
					span.error_message{color:red;}
					.rights input.error_message{float:left;}
				</style>
				<script type="text/javascript">
					
					$(document).ready(function() {
						jQuery.validator.setDefaults({
							errorPlacement: function(error, element) {
								error.appendTo(element.next());
							}
						  });
						  
						$("#submits").click(function(){
						  var flag = $("form").validate().form();//表单校验
						  if(!flag) {
							return false;
						  }
						});
						
					  $("form").validate({
						  onkeyup:false,
							  onfocusout: function() { $("form").valid(); },
						  rules: {
							dog_name:{
							  required: true
							},
							ear_num:{
							  required: true
							},
							mic_num:{
							  required: true
							},
							birthday:{
							  required: true
							},
							studbook:{
							  required: true
							},
							dog_owner:{
							  required: true
							},
							reproduce:{
							  required: true
							}
						  },
						  messages: {
							dog_name:{
							  required: '必填'
							},
							ear_num:{
							  required: '必填'
							},
							mic_num:{
							  required: '必填'
							},
							birthday:{
							  required: '必填'
							},
							studbook:{
							  required: '必填'
							},
							dog_owner:{
							  required: '必填'
							},
							reproduce:{
							  required: '必填'
							}
						  }
						});
					});
					
			</script>
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