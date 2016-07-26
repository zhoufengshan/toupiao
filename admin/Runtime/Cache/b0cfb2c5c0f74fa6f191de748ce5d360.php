<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>后台管理</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="__PUBLIC__/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="__PUBLIC__/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="__PUBLIC__/resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
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
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="__PUBLIC__/resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="__PUBLIC__/resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">后台管理</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="__PUBLIC__/resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				欢迎回来, <?php echo ($name); ?><br />
				<br />
				<a href="#" title="View the Site">查看网站</a> | <a href="<?php echo U('Index/logout');?>" title="登出">登出</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo U('Index/showimgcarous');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						查看轮播图
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/config');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						配置信息
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/wxconfig');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						微信账号配置
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/showsignup');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						查看报名
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/vote');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						投票详情
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/price');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						修改奖品
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/shareinfo');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						自定义分享设置
					</a>       
				</li>
				<li>
					<a href="<?php echo U('Index/user');?>" class="nav-top-item"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						添加管理员
					</a>       
				</li>
				      
				
			</ul> <!-- End #main-nav -->
			
			
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			
			<!-- Page Head -->
			<h2>欢迎您<?php echo ($name); ?></h2>
			<p id="page-intro">自定义分享设置</p>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>自定义分享设置</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab2">
					
						<form action="<?php echo U('Index/editshare');?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							
								
								<p>
									<label>分享标题</label>
										<input class="text-input small-input" type="text" id="small-input" name="title" value="<?php echo ($res["title"]); ?>"/>
								</p>
								<p>
									<label>分享描述</label>
										<input class="text-input small-input" type="text" id="small-input" name="des" value="<?php echo ($res["des"]); ?>"/>
								</p>
								<p>
									<label>分享图标链接</label>
										<input class="text-input small-input" type="text" id="small-input" name="shareimg" value="<?php echo ($res["shareimg"]); ?>"/>
								</p>
								
								<p>
									<input class="button" type="submit" value="保存" />
								</p>
								
								
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 第一网销 | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  

<!-- Download From www.exet.tk-->
</html>