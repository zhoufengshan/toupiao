<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>搜索-微信活动</title>
<meta name="keywords" content="微投票-微信活动" />
<meta name="description" content="微投票-微信活动" />
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
    <div style="clear: both;"></div>
    <div style="height:15px;"></div>
    <div style="clear: both;"></div>
    
    <div class="px_content">

        
        <div style="clear: both;"></div>
        <div class="xuanshou">
            <ul>
                <li class="xs_01"><i></i>全部选手<span></span></li>
                <li class="xs_02"><i></i>最新选手<span></span></li>
                <li class="xs_03"><i></i>人气排行</li>
            </ul>
        </div>
        <div style="clear: both;"></div>
        <div class="xs_show">
            <div class="qbxs_list">
                <ul>
				<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><li>
                        <img src="__PUBLIC__/image/signup/<?php echo ($result["thumb"]); ?>" alt="">
                        <span>
                            <i><?php echo ($result["id"]); ?>号</i><b><?php echo ($result["title"]); ?></b><span><?php echo ($result["vote"]); ?>票</span>
                        </span>
                        <button class="<?php echo ($result["id"]); ?>">投票</button>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>  
				<script>
						$(function(){
							$(".<?php echo ($result["id"]); ?>").click(function(){
								$.ajax({
									url:"<?php echo U('Index/toupiao');?>",
									data:{'id':'<?php echo $result['id'];?>','title':'<?php echo $result['title'];?>'},
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
						})
					</script>
						
                </ul>
            </div>
            <div class="zxxs_list" style="display: none;">
                <ul>
				<?php if(is_array($zxxs)): $i = 0; $__LIST__ = $zxxs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zxxs): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Index/show','id='.$zxxs['id']);?>">
                        <img src="__PUBLIC__/image/signup/<?php echo ($zxxs["photo"]); ?>" alt="">
                        <span>
                            <i><?php echo ($zxxs["id"]); ?>号</i><b><?php echo ($zxxs["title"]); ?></b><span><?php echo ($zxxs["vote"]); ?>票</span>
                        </span>
						</a>
                        <button class="<?php echo $zxxs['id'].'55';?>">投票</button>
                    </li>
					<script>
						$(function(){
							$(".<?php echo $zxxs['id'].'55';?>").click(function(){
								$.ajax({
									url:"<?php echo U('Index/toupiao');?>",
									data:{'id':'<?php echo $zxxs['id'];?>','title':'<?php echo $zxxs['title'];?>'},
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
						})
					</script><?php endforeach; endif; else: echo "" ;endif; ?> 
                </ul>
            </div>
            <div class="rqph_list" style="display: none;">
                <ul>
				<?php if(is_array($rqxs)): $i = 0; $__LIST__ = $rqxs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rqxs): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Index/show','id='.$rqxs['id']);?>">
                        <img src="__PUBLIC__/image/signup/<?php echo ($rqxs["photo"]); ?>" alt="">
                        <span>
                            <i><?php echo ($rqxs["id"]); ?>号</i><b><?php echo ($rqxs["title"]); ?></b><span><?php echo ($rqxs["vote"]); ?>票</span>
                        </span>
						</a>
                        <button class="<?php echo $rqxs['id'].'66';?>">投票</button>
                    </li>
					<script>
						$(function(){
							$(".<?php echo $rqxs['id'].'66';?>").click(function(){
								$.ajax({
									url:"<?php echo U('Index/toupiao');?>",
									data:{'id':'<?php echo $rqxs['id'];?>','title':'<?php echo $rqxs['title'];?>'},
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
						})
					</script><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
       
        
    </div>
</div>

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

<footer>
    <ul>
        <a href="<?php echo U('Index/jieshao');?>"><li>首页</li></a>
        <a href="tel:<?php echo ($result["tel"]); ?>"><li>电话</li></a>
        <a href="#"><li>搜索</li></a>
        <a href="#" id="paihang"><li>排行</li></a>
        <a href="<?php echo U('Index/baoming');?>"><li>报名</li></a>
    </ul>
</footer>

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

    $(function(){
        var qbxslen=$(".xs_show .qbxs_list ul li").length;
        var zxxslen=$(".xs_show .zxxs_list ul li").length;
        var rqphlen=$(".xs_show .rqph_list ul li").length;
        qbxsgao=qbxslen*160+20;
        zxxsgao=zxxslen*160+20;
        rqphgao=rqphlen*160+20;
        $(".xs_show .qbxs_list").css({"height":qbxsgao});
        $(".xs_show .zxxs_list").css({"height":zxxsgao});
        $(".xs_show .rqph_list").css({"height":rqphgao});

        $(".xuanshou ul li").on("click",function(){
            $(this).addClass('on').siblings().removeClass('on');
            var index = $(this).index();
            $('.xs_show div').hide();
            $('.xs_show div:eq('+index+')').show();

        })

    })


</script>

</html>