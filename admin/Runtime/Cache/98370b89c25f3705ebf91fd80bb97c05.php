<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title>后台管理 | 登录</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="__PUBLIC__/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="__PUBLIC__/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="__PUBLIC__/resources/css/invalid.css" type="text/css" media="screen" />
		<!--<link rel="stylesheet" href="__PUBLIC__/theme/css/lanrenzhijia.css" type="text/css" media="screen" />-->
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="__PUBLIC__/resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="__PUBLIC__/resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="__PUBLIC__/resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="__PUBLIC__/resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
	<script>
		jQuery(document).ready(function($) {
			$('.button').click(function(){
				$('.theme-popover-mask').fadeIn(100);
				$('.theme-popover').slideDown(200);
			})
			$('.theme-poptit .close').click(function(){
				$('.theme-popover-mask').fadeOut(100);
				$('.theme-popover').slideUp(200);
			})
			$('.radio').click(function () {
				$('.theme-popover-mask').fadeOut(100);
				$('.theme-popover').slideUp(200);
			})
		})
	</script>
	<style type="text/css" rel="stylesheet">
		.theme-popover{
			z-index:9999;
			position:absolute;
			top:30%;
			left:50%;
			width:660px;
			height:660px;
			margin:-180px 0 0 -330px;
			border-radius:5px;
			/*border:solid 2px #666;*/
			background-color:#fff;
			display:none;
			box-shadow: 0 0 10px #666;
		}
		.theme-popbod{
			width:660px;
			height:660px;
			overflow: auto;
		}
	</style>
		
	</head>
	<div class="theme-popover">
	<div class="theme-popbod dform">
			<ol>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li>
				<li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li><li><h2>弹出提示层</h2></li>
				<input class="radio" name="xieyi" value="" type="checkbox"><span>同意《用户服务协议》</span>
			</ol>
	</div>
	</div>
	<div class="theme-popover-mask"></div>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>博客后台管理系统</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="__PUBLIC__/resources/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="<?php echo U('Index/dologin');?>" method="post">
				
					<div class="notification information png_bg">
						<div>
							请输入用户名和密码登录
						</div>
					</div>
					
					<p>
						<label>用户名</label>
						<input class="text-input" name="username" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>密码</label>
						<input class="text-input" name="password" type="password" />
					</p>
					<div class="clear"></div>
					
					<div class="clear"></div>
					<p>
						<input class="button" name="sub" type="button" value="登录" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>