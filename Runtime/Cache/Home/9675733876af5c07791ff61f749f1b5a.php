<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('WEB_SITE_TITLE');?></title>
	<link href="Public/Home/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/font-face.css" rel="stylesheet" type="text/css">
	<link href="Public/Home/css/public.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="Public/Home/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Public/Home/js/schedule.js"></script>
	<script type="text/javascript" src="Public/Home/layer/layer.js"></script>
	<script type="text/javascript" src="Public/Home/js/jquery.validate.js"></script>
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
						<li><img src="Public/Home/images/btn_menu2_n.png" alt=""></li>
						<li><img src="Public/Home/images/btn_menu3_n.png" alt=""></li>
						<li><img src="Public/Home/images/btn_menu4_n.png" alt=""></li>
					</ul>
				</div>
				<div class="form">
					<form action="<?php echo U('Dog/add_do');?>" method="post" enctype="multipart/form-data">
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
							<div class="rights clearfix"><input type="text" name="mobile" class="error_message"><span class="error_message"></span></div>
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
							mobile:{
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
							mobile:{
								  required: '必填'
								},
							reproduce:{
							  required: '必填'
							}
						  }
						});
					});
					
				</script>
			</div>
</body>
</html>