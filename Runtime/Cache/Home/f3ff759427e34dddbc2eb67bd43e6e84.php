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

<style>
.itme_border img{width:204px;height:200px;}
</style>

<section class="banner"></section>
<section class="box">
	<div class="container clearfix">
		<div class="author">
			<div class="author1">
				<?php if($headurl): ?><img src="<?php echo ($headurl); ?>">
					 <?php else: ?>
					 <img src="Public/Home/images/itme_author.jpg" alt=""><?php endif; ?>
				<span><?php echo get_username();?></span>
				<?php if(!empty($show)): ?><div class="button">
					<a href="<?php echo U('Dog/dog_edit',array('id'=>$id));?>" class="button_a">修改信息</a>
				</div><?php endif; ?>
			</div>
			<div class="author2">
			<?php if($dogInfo["pic_url"] != '' ): ?><img src="<?php echo ($dogInfo["pic_url"]); ?>">
					 <?php else: ?>
					 <img src="Public/Home/images/itme_author.jpg" alt=""><?php endif; ?>
						
			</div>
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
						<li><?php echo ($dogInfo["dog_name"]); ?></li>
						<li>
						<?php if($dogInfo["dog_sex"] == 0): ?>公
						<?php else: ?>母<?php endif; ?>
						</li>
						<li><?php echo ($dogInfo["mic_num"]); ?></li>
						<li><?php echo ($dogInfo["ear_num"]); ?></li>
						<li><?php echo (date('Y-m-d',$dogInfo["birthday"])); ?></li>
						<li><?php echo ($dogInfo["studbook"]); ?></li>
						<li><?php echo ($dogInfo["dog_owner"]); ?></li>
						<li><?php echo ($dogInfo["reproduce"]); ?></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="table table_2">
			<ul>
				<li class="fa">
					<ul class="clearfix">
						<li>DNA</li>
						<li>髋/肘鉴定</li>
						<li>训练资格</li>
						<li>类别</li>
						<li>国外证书号</li>
					</ul>
				</li>
				<li class="fa">
					<ul class="clearfix">
						<li><?php if($dogInfo["dog_dna"] != ''): echo ($dogInfo["dog_dna"]); else: ?>无<?php endif; ?></li>
						<li><?php if($dogInfo["appraisal"] != ''): echo ($dogInfo["appraisal"]); else: ?>无<?php endif; ?></li>
						<li><?php if($dogInfo["practice"] != ''): echo ($dogInfo["practice"]); else: ?>无<?php endif; ?></li>
						<li><?php if($dogInfo["type"] != ''): echo ($dogInfo["type"]); else: ?>无<?php endif; ?></li>
						<li><?php if($dogInfo["foreign_num"] != ''): echo ($dogInfo["foreign_num"]); else: ?>无<?php endif; ?></li>
					</ul>
				</li>
			</ul>
		</div>
		
		<div class="father_button clearfix">
			<div class="w_25 pull_left"><a href="javascript:void(0)" class="button_a" onclick="find_family('same','<?php echo ($dogInfo["id"]); ?>','<?php echo ($dogInfo["father"]); ?>','<?php echo ($dogInfo["mother"]); ?>','<?php echo ($dogInfo["birthday"]); ?>')">同父同母</a></div>
			<div class="w_25 pull_left"><a href="javascript:void(0)" class="button_a" onclick="find_family('different','<?php echo ($dogInfo["id"]); ?>','<?php echo ($dogInfo["father"]); ?>','<?php echo ($dogInfo["mother"]); ?>','<?php echo ($dogInfo["birthday"]); ?>')">同父异母</a></div>
			<div class="w_25 pull_left"><a href="javascript:void(0)" class="button_a" onclick="find_family('allsame','<?php echo ($dogInfo["id"]); ?>','<?php echo ($dogInfo["father"]); ?>','<?php echo ($dogInfo["mother"]); ?>','<?php echo ($dogInfo["birthday"]); ?>')">同胎犬</a></div>
			<div class="w_25 pull_left"><a href="javascript:void(0)" class="button_a" onclick="find_family('somesame','<?php echo ($dogInfo["id"]); ?>','<?php echo ($dogInfo["father"]); ?>','<?php echo ($dogInfo["mother"]); ?>','<?php echo ($dogInfo["birthday"]); ?>')">后代犬</a></div>
		</div>
		
		<script type="text/javascript">
			function find_family(where,did,f,m,birt){
				$.post("<?php echo U('Dog/find_family');?>",{where:where,dogid:did,father:f,mother:m,birthday:birt},function(data){
					if(data){
						$('.Result').css('display','block');
						$("#res").html('');
						var sex = "";
						$.each(data,function(i,result){
							
							if(result['dog_sex'] == 0){
								sex = "公";
							}else{
								sex = "母";
							}
							
							item = "<ul class='clearfix'><li><a href='javascript:void(0)' style='color:#fec601' onclick='jump("+result['id']+")'>"+result['dog_name']+"</a></li>"
								  +"<li>"+sex+"</li><li>"+result['mic_num']+"</li><li>"+result['ear_num']+"</li>"
								  +"<li>"+result['birthday']+"</li><li>"+result['studbook']+"</li><li>"+result['dog_owner']+"</li><li>"+result['reproduce']+"</li></ul>";
							$("#res").append(item);
						});
					}else{
						$('.Result').css('display','none');
						layer.msg('暂无数据',{ icon: 5,skin: 'layer-ext-moon'})
						//$('.Result').html("<span style='display:inline-block;width:100px;text-align:center';>暂无数据！</span>");
					}
				},'json');
			}
		</script>
		<!--查询到结果输出 in-->
		
		<div class="Result" style="display:none;">
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
					<li id="res" class="fa">
							<!-- <ul class="clearfix">
								<li><a href="javascript:void(0)" style="color:#fec601" onclick="jump(<?php echo ($list["id"]); ?>)"><?php echo ($list["dog_name"]); ?></a></li>
								<li>
								<?php if($list["dog_sex"] == 0): ?>公
								<?php else: ?>母<?php endif; ?>
								</li>
								<li><?php echo ($list["mic_num"]); ?></li>
								<li><?php echo ($list["ear_num"]); ?></li>
								<li><?php echo ($list["birthday"]); ?></li>
								<li><?php echo ($list["studbook"]); ?></li>
								<li><?php echo ($list["reproduce"]); ?></li>
							 </ul>-->
						
					</li>
				</ul>
			</div>
		</div>
		
		<!--查询到结果输出 ent-->

		<div class="father clearfix">
			<div class="itme pull_left">
				<div class="itme_border center">
					<?php if(!empty($fatherArr)): ?><a href="<?php echo U('Dog/dog_content',array('id'=>$fatherArr['id']));?>">
					<?php if($fatherArr["pic_url"] != '' ): ?><img src="<?php echo ($fatherArr["pic_url"]); ?>" class="center" alt="">
					</a>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php if(empty($fatherArr['dog_name'])): ?><p class="text_center"><a href="<?php echo U('Dog/father_search2',array('did'=>$id));?>">点此录入犬父</a></p>
					<?php else: ?>
					<p class="text_center">犬父：<?php echo ($fatherArr["dog_name"]); ?></p><?php endif; ?>
				</div>
			</div>
			<div class="itme pull_left">
				<div class="itme_border center">
				<?php if(!empty($motherArr)): ?><a href="<?php echo U('Dog/dog_content',array('id'=>$motherArr['id']));?>">
					<?php if($motherArr["pic_url"] != '' ): ?><img src="<?php echo ($motherArr["pic_url"]); ?>" class="center" alt="">
					</a>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php if(empty($motherArr['dog_name'])): ?><p class="text_center"><a href="<?php echo U('Dog/mother_search2',array('did'=>$id));?>">点此录入犬母</a></p>
					<?php else: ?>
					<p class="text_center">犬母：<?php echo ($motherArr["dog_name"]); ?></p><?php endif; ?>
				</div>
			</div>
			<div class="itme pull_left">
				<div class="itme_border center">
				<?php if(!empty($grfatherArr)): ?><a href="<?php echo U('Dog/dog_content',array('id'=>$grfatherArr['id']));?>">
					<?php if($grfatherArr["pic_url"] != '' ): ?><img src="<?php echo ($grfatherArr["pic_url"]); ?>" class="center" alt=""></a>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<p class="text_center">爷爷：<?php echo ($grfatherArr["dog_name"]); ?></p>
				</div>
			</div>
			<div class="itme pull_left">
				<div class="itme_border center">
				<?php if(!empty($grmotherArr)): ?><a href="<?php echo U('Dog/dog_content',array('id'=>$grmotherArr['id']));?>">
					<?php if($grmotherArr["pic_url"] != '' ): ?><img src="<?php echo ($grmotherArr["pic_url"]); ?>" class="center" alt=""></a>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<p class="text_center">奶奶：<?php echo ($grmotherArr["dog_name"]); ?></p>
				</div>
			</div>
			<div class="itme pull_left">
				<div class="itme_border center">
				<?php if(!empty($grpaArr)): ?><a href="<?php echo U('Dog/dog_content',array('id'=>$grpaArr['id']));?>">
					<?php if($grpaArr["pic_url"] != '' ): ?><img src="<?php echo ($grpaArr["pic_url"]); ?>" class="center" alt=""></a>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<p class="text_center">姥爷：<?php echo ($grpaArr["dog_name"]); ?></p>
				</div>
			</div>
			<div class="itme pull_left">
				<div class="itme_border center">
				<?php if(!empty($grmaArr)): ?><a href="<?php echo U('Dog/dog_content',array('id'=>$grmaArr['id']));?>">
					<?php if($grmaArr["pic_url"] != '' ): ?><img src="<?php echo ($grmaArr["pic_url"]); ?>" class="center" alt=""></a>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<?php else: ?>
					<img src="Public/Home/images/itme_author.jpg" class="center" alt=""></a><?php endif; ?>
					<p class="text_center">姥姥：<?php echo ($grmaArr["dog_name"]); ?></p>
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