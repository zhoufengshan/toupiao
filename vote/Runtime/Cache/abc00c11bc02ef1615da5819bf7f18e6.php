<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>微投票-我要报名</title>
<meta name="keywords" content="微投票-我要报名" />
<meta name="description" content="微投票-我要报名" />

<link href="__PUBLIC__/theme/css/baoming.css"  type="text/css" rel="stylesheet" />
<script src='__PUBLIC__/theme/js/jquery.js'></script> 
<script>
	var phoneWidth = parseInt(window.screen.width)
	var phoneScale = phoneWidth/640
	var ua = navigator.userAgent
	if (/Android (\d+\.\d+)/.test(ua)){
	var version = parseFloat(RegExp.$1)
	if(version>2.3){
	document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">')
	}else{
	document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">')
	}
	} else {
	document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">')
	}
</script>
    <script>
        $(function () {
            var name = false;
            var tel = false;
            var qq = false;
            $("#name").blur(function () {
                var name_value = $("#name").val();
                if(name_value == ''){
                    $(".xm").css({'display':'block'});
                    var name = false;
                }else{
                    var name = true;
                }
            })
        })
    </script>
</head>

<body>
    <div class="baoming">
        <div class="bm_top">
        	<h3>在线报名</h3>
            <a href="javascript:history.go(-1)"><返回</a>
        </div>
        <h4 class="bm_yindao">你还没有报名参加活动，快报名吧！</h4>
        <div class="baoming_show">
		<form method="post" action="<?php echo U('Index/signup');?>" enctype="multipart/form-data">
        	<input type="text" class="bm_xinxi" placeholder="请输入您的姓名" name="name"  id="name"><div class="xm" style="width:60px; height:20px; text-align: center;line-height: 20px; display: none;margin: 0;padding: 0;"><span>请输入姓名</span></div>
            <input type="text" class="bm_xinxi" placeholder="请输入您的手机号" name="tel"  id="tel">
            <input type="text" class="bm_xinxi" placeholder="请输入您的QQ号" name="qq"  id="qq">
            <select class="bm_select" name="sex">
            	<option value="" selected disabled>请选择性别</option>
                <option value="1">男</option>
                <option value="0">女</option>
            </select>
            <div class="bm_update">
            	<textarea class="bm_text" placeholder="请输入自我介绍，个人详情！" name="introduce"></textarea>
				<p class="file_more">
                    <img src="__PUBLIC__/theme/bg/pic-preview.jpg" class="file_img" alt="">
                </p>
                <a href="javascript:;" class="file_bg">
                    <input type="file" name="photo" class="bm_up_img file0" value="" accept="image/*">
                </a>
                <p>建议使用wifi上传图片，照片大小无限制，但考虑上传速度建议300k以内！</p>
            </div>
            <input type="submit" class="up_img_btn" value="提交报名信息">
		</form>
        </div>
    </div>
    <div class="bm_banquan">
		<p>©2016 第一网销版权所有</p>
	</div>
</body>
<script>
$(".file0").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $(".file_img").attr("src", objUrl) ;
    }

}) ;

//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ; 
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}

</script>

</html>