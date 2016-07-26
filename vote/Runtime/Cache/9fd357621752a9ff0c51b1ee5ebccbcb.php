<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>微投票-微信活动内页</title>
<meta name="keywords" content="微投票-微信活动内页" />
<meta name="description" content="微投票-微信活动内页" />
<meta name="format-detection" content="telephone=no" />
<link href="__PUBLIC__/theme/css/baoming.css"  type="text/css" rel="stylesheet" />
<script src='__PUBLIC__/theme/js/jquery.js'></script>
<script type="text/javascript" src="__PUBLIC__/theme/js/jquery.flexslider-min.js"></script>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/theme/css/body.css"/>
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
				$(function(){
					$.ajax({
						url:"<?php echo U('Index/weiguan');?>",
						data:{'id':'<?php echo $id;?>'},
						success:function(data){
							$("#weiguan").html(data);
						}
					})
				})
			</script>
</head>

<body>
<div class="container">
	<div class="tanchuang" id="lqtc">
		<div class="close"></div>
		<div class="lingquCeng">
			<div class="text1"><?php echo ($price["company"]); ?>提醒您：</div>
			<div class="text2"><?php echo ($price["thankinfo"]); ?></div>
			<div class="text3">我们为您准备了一份惊喜大礼　点击下方按钮领取</div>
			<button class="lingqu">领取大礼包</button>

		</div>
	</div>
	<div class="tanchuang" id="tjtc">
		<div class="close"></div>
		<div class="baomingCeng">
			<div class="text1">恭喜您获得：</div>
			<div class="text2"><b><?php echo ($price["price"]); ?></b></div>
			<div class="text3">输入您的联系方式　客服将在稍后与您联系沟通兑奖事宜</div>
			<div class="form">
				<input type="text" name="username" class="name" placeholder="请输入姓名" value="" />
				<input type="text" name="phone" class="phone" placeholder="请输入手机号" value="" />
				<input type="submit" name="submit" class="submit" value="提交信息" />
			</div>
			<script>
				$(function(){
					$(".submit").click(function(){
						var name = $(".name").val();
						var phone = $((".phone")).val();
						if(name == ""||phone == ""){
							return false;
						}
						$.ajax({
							url:"<?php echo U('Index/ziliao');?>",
							data:{'name':name,'phone':phone},
							type:'post',
							success:function(data){
								if(data == 'ok'){
									$(".baomingCeng").html('恭喜您，提交成功！').css({'font-size':'30px','text-align':'center','height':'375px','line-height':'375px'});
									$(".closeCeng").css({'display':'none'});
								}
							}
						})
					})
				})
			</script>
		</div>
	</div>

	<div class="tanchuang" id="gbtc">
		<div class="closeCeng">
            <div class="title">只差最后一步了，真的要关闭吗？</div>
            <div class="listTitle">这样您将无法获得：</div>
            <ul class="clearfix">
                <li><?php echo ($price["info1"]); ?><i></i></li>
                <li><?php echo ($price["info2"]); ?><i></i></li>
                <li><?php echo ($price["info3"]); ?><i></i></li>
                <li><?php echo ($price["info4"]); ?><i></i></li>
            </ul>
            <div class="btn1">继续领取</div>
            <div class="btn2">关&nbsp;&nbsp;闭</div>
        </div>
	</div>
	<script>
	$(function(){
		$(".tijiao").on("click",function(){
			$("#lqtc").css({"display":"block"});
		})
		$(".lingquCeng .lingqu").on("click",function(){
			$("#lqtc").css({"display":"none"});
			$("#tjtc").css({"display":"block"});
		})
		$("#lqtc .close").on("click",function(){
			$("#lqtc").css({"display":"none"});
			$("#gbtc").css({"display":"block"});
		})

		$("#gbtc .btn1").on("click",function(){
			$("#gbtc").css({"display":"none"});
			$("#tjtc").css({"display":"block"});
		})
		$("#gbtc .btn2").on("click",function(){
			$("#gbtc").css({"display":"none"});
		})

		$("#tjtc .close").on("click",function(){
			$("#tjtc").css({"display":"none"});
			$("#gbtc").css({"display":"block"});
		})

	})
	</script>
    <div class="index_lunbo">
        <div class="block_home_slider">
            <div id="home_slider" class="flexslider">            
                <ul class="slides">
				<?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo ($img["url"]); ?>"><div class="slide"><img src="__PUBLIC__/image/imgcarous/<?php echo ($img["photo"]); ?>" alt="<?php echo ($img["title"]); ?>"></div></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                </ul>
            </div>
        </div>
    </div>
    
    <div class="ny_con">
        <div class="con_tit"><h3><?php echo ($res["id"]); ?>号 <?php echo ($res["title"]); ?></h3></div>
        <div class="con_list">
            <ul>
                <li><h4>当前排名</h4><i><?php echo ($number); ?></i></li><span></span>
                <li><h4>当前票数</h4><i><?php echo ($res["vote"]); ?></i></li><span></span>
                <li><h4>围观量</h4><i id="weiguan"></i></li>
            </ul>
			
        </div>
        <div style="clear: both;"></div>

        <div class="cont">
            <p><img src="__PUBLIC__/image/signup/<?php echo ($res["photo"]); ?>" alt="图片" style="width:640px;"></p>
        </div>
        <div class="con_anniu">
            <div>
                <button class="tp_but">投票</button>
                <button class="bm_but">我要报名</button>
            </div>
			<script>
				$(function(){
					$(".tp_but").click(function(){
						$.ajax({
							url:"<?php echo U('Index/toupiao');?>",
							data:{'id':'<?php echo $id;?>','title':'<?php echo $res['title'];?>'},
							type:'post',
							success:function(data){
								if(data == '投票成功'){
											$("#lqtc").css({"display":"block"});
											$(".lingquCeng .lingqu").on("click",function(){
												$("#lqtc").css({"display":"none"});
												$("#tjtc").css({"display":"block"});
											})
											$("#lqtc .close").on("click",function(){
												$("#lqtc").css({"display":"none"});
												$("#gbtc").css({"display":"block"});
											})

											$("#gbtc .btn1").on("click",function(){
												$("#gbtc").css({"display":"none"});
												$("#tjtc").css({"display":"block"});
											})
											$("#gbtc .btn2").on("click",function(){
												$("#gbtc").css({"display":"none"});
											})

											$("#tjtc .close").on("click",function(){
												$("#tjtc").css({"display":"none"});
												$("#gbtc").css({"display":"block"});
											})
										}else{
											alert(data);
										}
							}
						})
					})
					$(".bm_but").click(function(){
						$.ajax({
							url:"<?php echo U('Index/bming');?>",
							success:function(data){
								if(data == 1){
									alert("报名时间还没到！");
								}else if(data == 2){
									alert("报名时间已截止！");
								}else if(data == 3){
									window.location.href = "<?php echo U('Index/baoming');?>";
								}
							}
						})
					})
				})
			</script>
        </div>

        <div class="con_adv">
            <img src="__PUBLIC__/images/img_jp.jpg" alt="投票赢惊喜 奖品送不停">
        </div>

    </div>
</div>

<footer>
    <ul>
        <a href="<?php echo U('Index/jieshao');?>"><li>首页</li></a>
        <a href="tel:<?php echo ($result["tel"]); ?>"><li>电话</li></a>
        <a href="#"><li>搜索</li></a>
        <a href="#" id="paihang"><li>排行</li></a>
        <a href="<?php echo U('Index/baoming');?>"><li>报名</li></a>
    </ul>
</footer>

<div class="paihang" style="display: none;">
    <div class="hide_cen"></div>
    <div class="phb_list">
        <div class="close"></div>
        <div class="phb_con">
            <h3>萌娃评选（测试内容）排行榜</h3>
            <ol>
                <li>排行</li>
                <li>姓名</li>
                <li>投票数</li>
            </ol>
            <ul>
			<?php if(is_array($paihang)): $i = 0; $__LIST__ = $paihang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$paihang): $mod = ($i % 2 );++$i;?><li><b><?php echo ($i); ?></b><span><?php echo ($paihang["title"]); ?></span><i><?php echo ($paihang["vote"]); ?></i></li><?php endforeach; endif; else: echo "" ;endif; ?>   
            </ul>
        </div>
    </div>
</div>

</body>
<script>
    $(function () {
        $("#home_slider").flexslider({
            animation : "slide",
            controlNav : true,
            directionNav : true,
            animationLoop : true,
            slideshow : false,
            useCSS : false
        });

        $(".toupiaojulu").toggle( 
            function(){$(".julu_con").hide();}, 
            function(){$(".julu_con").show();} 
        );

        $("#paihang").on("click",function(){
            $(".paihang").css({"display":"block"});
        })
        $(".phb_list .close").on("click",function(){
            $(".paihang").css({"display":"none"});
        })
         
    });

</script>
</html>