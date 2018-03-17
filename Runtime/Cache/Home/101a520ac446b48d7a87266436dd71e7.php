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
		<div class="left">
			<h3>会员信息</h3>
			<ul>
				<li><a href="<?php echo U('User/index');?>" class="active">会员基本信息</a></li>
				<li><a href="<?php echo U('User/dog_list');?>">我的犬只</a></li>
				<li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
			</ul>
		</div>
		<div class="right">
			<div class="sear">
				<div class="title">
					<h3>会员基本信息</h3>
				</div>
				<div class="form">
					<form action="<?php echo U('User/update_do');?>" method="post" enctype="multipart/form-data">
						<div class="line_double">
							<div class="left"><span>头像</span></div>
							<div class="rights files">
								 <a href="javascript:;">上传</a>
								 <?php if($userinfo.headurl): ?><img src="<?php echo ($userinfo["headurl"]); ?>" id="xmTanImg">
								 <?php else: ?>
								<img src="Public/Home/images/100.jpg" id="xmTanImg"><?php endif; ?>
								<input type="file" onchange="xmTanUploadImg(this,'xmTanImg')" id="upload_picture_cover_id" name="headurl">
								<!-- <input type="hidden" name="cover_id" id="cover_id_cover_id"/>
								<div class="upload-img-box"></div> -->
							</div>
						</div>
                    
						<div class="line_double">
							<div class="left"><span>姓名</span></div>
							<div class="rights clearfix">
								<input type="text" name="real_name" value="<?php echo ($userinfo["real_name"]); ?>" class="error_message">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line_double clearfix">
							<div class="left"><span>性别</span></div>
							<div class="rights clearfix">
							<?php if($userinfo["sex"] == 0): ?><input type="radio" name="sex" checked="checked" value="0"/><span>男</span>
								<input type="radio" name="sex" value="1"/><span>女</span>
							<?php else: ?>
								<input type="radio" name="sex" value="0"/><span>男</span>
								<input type="radio" name="sex" checked="checked" value="1"/><span>女</span><?php endif; ?>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span>身份证号</span></div>
							<div class="rights clearfix">
								<input type="text" name="idcard" value="<?php echo ($userinfo["idcard"]); ?>" class="error_message">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span>联系电话</span></div>
							<div class="rights clearfix">
								<input type="text" name="mobile" value="<?php echo ($userinfo["mobile"]); ?>" class="error_message">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span>邮寄方式</span></div>
							<div class="rights">
								<select name="shipping">
								<?php if($userinfo["shipping"] == 0): ?><option value ="0" selected=true>到付</option>
								  <option value ="1">先付</option>
						  		<?php else: ?>
								  <option value ="0" >到付</option>
								  <option value ="1" selected=true>先付</option><?php endif; ?>
								</select>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span>邮寄地址</span></div>
							<div class="rights">
							<input type="hidden" id="pc" name="pc">
								<select id="province" name="province" onchange="get_province()">
								  	<option value="0">请选择省份</option>
							        <option value="1">北京</option>
									<option value="2">澳门</option>
									<option value="3">天津</option>
									<option value="4">西藏</option>
									<option value="5">河北</option>
									<option value="6">海南</option>
									<option value="7">陕西</option>
									<option value="8">台湾</option>
									<option value="9">安徽</option>
									<option value="10">重庆</option>
									<option value="11">香港</option>
									<option value="12">吉林</option>
									<option value="13">四川</option>
									<option value="14">江西</option>
									<option value="15">黑龙江</option>
									<option value="16">云南</option>
									<option value="17">广西</option>
									<option value="18">福建</option>
									<option value="19">山西</option>
									<option value="20">宁夏</option>
									<option value="21">湖北</option>
									<option value="22">新疆</option>
									<option value="23">山东</option>
									<option value="24">江苏</option>
									<option value="25">上海</option>
									<option value="26">贵州</option>
									<option value="27">内蒙古</option>
									<option value="28">湖南</option>
									<option value="29">青海</option>
									<option value="30">浙江</option>
									<option value="31">河南</option>
									<option value="32">辽宁</option>
									<option value="33">甘肃</option>
									<option value="34">广东</option>
								</select>
								</select>
								<select id="city" name="city" onchange="get_city()">
									<option value="0">请选择城市</option>
								</select>
							</div>
						</div>
						<div class="line_double">
							<div class="left"><span></span></div>
							<div class="rights"><input type="text" name="address" style="width:730px" value="<?php echo ($userinfo["address"]); ?>"></div>
						</div>
						<div class="line_button">
							<input type="submit" id="subten" value="提交">
						</div>
					</form>
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
						  
						$("#subten").click(function(){
						  var flag = $("form").validate().form();//表单校验
						  if(!flag) {
							return false;
						  }
						});
						
					  $("form").validate({
						  onkeyup:false,
							  onfocusout: function() { $("form").valid(); },
						  rules: {
							real_name:{
							  required: true,
							},
							idcard:{
							  required: true,
							  minlength:18,
							  maxlength:18,
							},
							mobile:{
							  required: true,
							  minlength:11,
							  maxlength:11,
							  digits:true,
							}
						  },
						  messages: {
							real_name:{
							  required: '必填',
							},
							idcard:{
							  required: '必填',
							  minlength:'身份证号码位数不对',
							  maxlength:'身份证号码位数不对',
							},
							mobile:{
							  required: '必填',
							  minlength:'手机号码位数不对',
							  maxlength:'手机号码位数不对',
							  digits:'手机号码格式不对',
							}
						  }
						});
					});
					
			</script>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
//将省市连接传入后台录入
$("#subten").on('click',function(){
	var s_province_v = $('#province>option:selected').text();
	var s_city_v = $('#city>option:selected').text();
	$('#pc').val(s_province_v + ' ' +s_city_v);
});
</script>
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