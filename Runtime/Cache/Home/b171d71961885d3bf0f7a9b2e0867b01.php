<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
<title>登录</title>
	<script type="text/javascript" src="Public/Home/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Public/Home/js/jquery.validate.js"></script>
</head>
<body>
	<div class="container" style="margin: 10% auto;">
		<div class="inner">
				<div class="logo"><img src="Public/Home/images/logo_zhuce.png" alt=""></div>
			<div class="button">
				<a href="javascript:;" class="active">登录</a>
				<a href="javascript:;" class="">注册</a>
			</div>
			<div class="clear"></div>
			<div class="from">
				<div class="form_logoin active">
					<form id="from1" class="login-form" action="<?php echo U('User/login');?>" method="post" novalidate="novalidate">
      <input type="hidden" name="fmdo" value="login">
      <input type="hidden" name="dopost" value="login">
      <input type="hidden" name="gourl" value="">

						<div class="line">
							<div class="lineLeft">账号</div>
							<div class="lineRight">
								<input type="text" name="username">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<div class="lineLeft">密码</div>
							<div class="lineRight">
								<input type="password" name="password">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<input type="submit" class="button" value="登录" id="input_login">
						</div>
					</form>
				</div>
				<div class="form_register">
					<form class="login-form" id="from2" action="<?php echo U('User/register');?>" method="post" novalidate="novalidate">
					      <input type="hidden" value="regbase" name="dopost">
					      <input type="hidden" value="1" name="step">
					      <input type="hidden" value="个人" name="mtype">

						<div class="line">
							<div class="lineLeft">账号</div>
							<div class="lineRight">
								<input type="text" name="username">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<div class="lineLeft">密码</div>
							<div class="lineRight">
								<input type="password" name="password" id="parssword">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<div class="lineLeft">确认密码</div>
							<div class="lineRight">
								<input type="password" name="repassword">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<div class="lineLeft">电子邮件</div>
							<div class="lineRight">
								<input type="text" name="email">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<div class="lineLeft">联系电话</div>
							<div class="lineRight">
								<input type="text" name="mobile">
								<span class="error_message"></span>
							</div>
						</div>
						<div class="line">
							<input type="submit" class="button" value="注册" id="input_reg">
						</div>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<style type="text/css">
		html{background: url(Public/Home/images/bg_zhuce.jpg) no-repeat center center fixed;}
		body{margin:0;padding: 0;overflow: hidden;width: 100%;}
		*{transition:margin 0.8s ease-in-out 0.1s; -moz-transition:margin 0.8s ease-in-out 0.1s;-webkit-transition:margin 0.8s ease-in-out 0.1s;-o-transition:margin 0.8s ease-in-out 0.1s;-ms-transition:margin 0.8s ease-in-out 0.1s;}
		.clear{clear: both;}
		.container{ opacity: .9;width: 568px;background-color: #fff;height: auto;margin: 12% auto;border-radius: 5px}
		/*.container.active{transform: rotateY(180deg);-moz-transform: rotateY(180deg);-ms-transform: rotateY(180deg);-o-transform: rotateY(180deg);-webkit-transform: rotateY(180deg);}*/
		.container .inner{margin:0 auto; width: 80%;padding: 20px 0;}
		.container  .logo{width: 454px;display: block;margin: 0 auto 20px auto;padding:20px 0;}
		.container  .logo img{width: 454px;}
		.container .inner .button a{text-decoration:none;color: #000000;font-size: 20px;width: 50%;border-bottom: 2px solid #e0e0e0;display: block;float: left;text-align: center;padding-bottom: 16px;}
		.container .inner .button a.active{border-bottom: 2px solid #debd18;}
		.container .inner .form_logoin,.container .inner .form_register{display: none ;opacity: 0;}
		.container .inner .from{padding:30px 0;}
		.container .inner .from .active{ display: block;opacity: .8;}
		.container .inner .line{width: 90%;text-align: center;margin:0 auto;}
		.container .inner .line div{float: left;font-size: 18px;padding: 10px 0;}
		.container .inner .line div .error_message label{display: block;display: block;text-align: left;color: red;margin-bottom: -16px;font-size: 14px;}
		.container .inner .line div input[type=text],.container .inner .line div input[type=password]{width: 99%;border-radius: 5px;line-height: 28px; height: 28px;border: 1px solid #ccc;text-indent: 3%;font-size: 14px;}
		.container .inner .line .lineLeft{width: 30%;line-height: 28px; height: 28px;}
		.container .inner .line .lineRight{width: 70%;}
		.container .inner .line .button{background-color: #febd18;color:#fff;line-height: 38px; height: 38px;font-size: 16px; border: none;border-radius: 5px;width: 100%;margin-top: 20px;}
	</style>
	<script>
	$('.container .button a').on('click',function () {
		$('.container .button a').removeClass('active');
		$(this).addClass('active');
		$('.container .from .form_register').removeClass('active');
		$('.container .from .form_logoin').removeClass('active');

	//	$('.container').addClass('active');
		if ($(this).index() == 0) {
			$('.container').css('margin','10% auto')
			$('.container .from .form_logoin').addClass('active');
		}else if ($(this).index() == 1) {
			$('.container').css('margin','7% auto')
			$('.container .from .form_register').addClass('active');
		}
	})
	
$(document).ready(function(){

  jQuery.validator.setDefaults({
    errorPlacement: function(error, element) {
        error.appendTo(element.next());
    }
  });


$("#input_login").click(function(){
  var flag = $("#from1").validate().form();//表单校验
  if(!flag) {
    return false;
  }
});
$("#input_reg").click(function(){
  var flag = $("#from2").validate().form();//表单校验
  if(!flag) {
    return false;
  }
});
  $("#from1").validate({
      onkeyup:false,
          onfocusout: function() { $("#from1").valid(); },
      rules: {
        username:{
          required: true
        },
        password:{
          required: true,
		  minlength:6
        }
      },
      messages: {
        username:{
          required: '请输入账号'
        },
        password:{
          required: '请输入密码',
		  minlength:'密码不得少于6个字符'
        }
      }
    });
    $("#from2").validate({
      onkeyup:false,
          onfocusout: function() { $("#from2").valid(); },
      rules: {
        username:{
          required: true
        },
        password:{
          required: true
        },
        repassword:{
          required: true,
          equalTo:'#parssword'
        },
        email:{
        	required: true,
        	email:true
        },
        mobile:{
        	required: true,
        	digits:true
        }
      },
      messages: {
        username:{
          required: '请输入账号'
        },
        password:{
          required: '请输入密码'
        },
        repassword:{
          required: '请再输入一次密码',
          equalTo:'两次输入密码不一致'
        },
        email:{
          required: '请输入电子邮件',
          email:'电子邮件格式不正确'
        },
        mobile:{
          required: '请输入联系方式',
          digits: '联系方式格式不正确',
        }
      }
    });
});
</script>
</body></html>