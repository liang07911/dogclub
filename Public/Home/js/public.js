$(document).ready(function() {
  /*会员头像列表*/
	$('header .vip').on('mouseover',function () {
  		$('header .vip .list').addClass('active')
  	})
  	$('header .vip').on('mouseout',function () {
  		$('header .vip .list').removeClass('active')
  	})
    //layer.msg('玩命提示中');

	$('header ul.nav li').eq(0).addClass('active');
});
	
function validate(cls,id,msg){
	if($(cls).val()===''){
		ALERT('请填写' + msg);
	}else{
		 $(id).submit();
	}
}
function ALERT(msg){
	layer.msg(msg)
	return false;
}

/*上传文件按钮插件*/
if (typeof FileReader == 'undefined') {
    document.getElementById("xmTanDiv").InnerHTML = "<h1>当前浏览器不支持FileReader接口</h1>";
    //使选择控件不可操作
    document.getElementById("card_url").setAttribute("disabled", "disabled");
  }
  //选择图片，马上预览
  function xmTanUploadImg(obj,xmTanImg) {
    var file = obj.files[0];
    
   // console.log(obj);console.log(file);
   // console.log("file.size = " + file.size);  //file.size 单位为byte

    var reader = new FileReader();

    //读取文件过程方法
    reader.onloadstart = function (e) {
      //console.log("开始读取....");
    }
    reader.onprogress = function (e) {
      //console.log("正在读取中....");
    }
    reader.onabort = function (e) {
      //console.log("中断读取....");
    }
    reader.onerror = function (e) {
      //console.log("读取异常....");
    }
    reader.onload = function (e) {
     // console.log("成功读取....");

      var img = document.getElementById(xmTanImg);
      img.src = e.target.result;
      //或者 img.src = this.result;  //e.target == this
    }

    reader.readAsDataURL(file)
    
    
  }
  
  function setIframeHeight(iframe) {
		if (iframe) {
			var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
			if (iframeWin.document.body) {
				iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
			}
		}
	};
  
	//犬只详情页跳出ifream
	function jump(dogid){
		top.location.href = "index.php?s=/home/dog/dog_content/id/"+dogid;
	}
