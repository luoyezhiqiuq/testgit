<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap-responsive.css">
<script src="/bootstrap/js/jquery-1.11.3.min.js"></script>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<link href="/bootstrap/css/mega-menu.css" rel="stylesheet">
<title>学习ci和html</title>
	<style>
      body {
        padding-top: 50px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
</head>
<body>
	<!--头部信息-->
	<header class="container">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>
					<a class="brand" href=" "><img src="" alt="学习ci和bootstrap" /></a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li><a href="/">首页</a></li>

								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home icon-white"></i> ci <b class="caret"></b></a>
									<section class="dropdown-menu mega-menu-2 transition">
										<ul class="add-bottom-space">
											<li class="nav-title">有关mysql</li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
										</ul>
										<ul>
											<li class="nav-title">写入model中</li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
											<li><a href="#">Menu Item</a></li>
										</ul>
									</section>
								</li><!-- Regular Menu Ends -->
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i> bootstrap <b class="caret"></b></a>
									<section class="dropdown-menu mega-menu-2 transition">
										<ul>
											<li class="nav-title">表格 <span>样式</span></li>
											<li><a href="/bootstrap/table1">表格一</a></li>
											<li><a href="/bootstrap/table2">表格二</a></li>
											<li><a href="/bootstrap/table3">表格三</a></li>
											<li><a href="/bootstrap/table4">表格四</a></li>
										
										</ul>
										<ul>
											<li class="nav-title">表单 <span>样式</span></li>
											<li><a href="/bootstrap/input1">表单1</a></li>
											<li><a href="/bootstrap/input2">表单2</a></li>
											<li><a href="/bootstrap/input3">输入框</a></li>
											<li><a href="/bootstrap/input2">表单2</a></li>
										</ul>
										<ul>
											<li class="nav-title">排版 <span>字体样式</span></li>
											<li><a href="/bootstrap/publish">字体排版</a></li>
											<li><a href="#">Service 2</a></li>
										</ul>
										<ul>
											<li class="nav-title">Print <span>crisp and clear</span></li>
											<li><a href="#">Service 3</a></li>
											<li><a href="#">Service 4</a></li>
										</ul>
									</section>
								</li><!-- Services Menu Ends -->
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> Portfolio <b class="caret"></b></a>
									<section class="dropdown-menu mega-menu-2 transition">
										<ul>
											<li class="nav-title">Client Name</li>
											<li class="with-image"><img src="" alt="Client" class="img-rounded" /></li>
										</ul>
										<ul>
											<li class="nav-title">Client Info</li>
											<li><p>A little blurb about your piece, write it as you wish!</p>
												<a href="menu.htm" class="btn">Read more...</a>
											</li>
										</ul>
									</section>
								</li><!-- Portfolio Menu Ends -->
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-download icon-white"></i> E-commerce <b class="caret"></b></a>
									<section class="dropdown-menu mega-menu-2 transition">
										<ul>
											<li class="nav-title">Cool Product</li>
											<li class="with-image"><img src="" alt="Cool Product" class="thumbnail img-rounded" /></li>
											<li><a href="#" class="no-background"><img src="" alt="Buy Now" /></a></li>
										</ul>
										<ul>
											<li class="nav-title">About Product</li>
											<li><p>A little blurb about your product, write it as you wish!</p></li>
											<li><p>A little blurb about your product, write it as you wish!</p></li>
										</ul>
									</section>
								</li><!-- E-commerce Menu Ends -->
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe icon-white"></i> php功能 <b class="caret"></b></a>
								<section class="dropdown-menu mega-menu-2 transition">
										<ul>
											<li class="nav-title">图片处理<span>样式</span></li>
											<li><a href="/picture/index">上传图片</a></li>
											<li><a href="/picture/waterfall">瀑布流</a></li>
											<li><a href="/picture/morepic">多图片上传</a></li>
											<li><a href="/bootstrap/table4">表格四</a></li>
										
										</ul>
										<ul>
											<li class="nav-title">购物车<span>样式</span></li>
											<li><a href="/shop/shoplist">物品</a></li>
											<li><a href="/shop/detail">商品详情</a></li>
											<li><a href="/shop/addcart">加入购物车</a></li>
											<li><a href="/shop/orders">订单</a></li>
										</ul>
										
									</section>


								<li class="dropdown">
						            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						               LILY 
						               <b class="caret"></b>
						            </a>
						            <ul class="dropdown-menu">
						               <li><a href="/kpi">kpi</a></li>
						               <li><a href="/kpi/staffkpi">员工kpi导入</a></li>
						               <li><a href="/kpi/staffoff">员工离职</a></li>
						               <li class="divider"></li>
						               <li><a href="#">分离的链接</a></li>
						               <li class="divider"></li>
						               <li><a href="#">另一个分离的链接</a></li>
						            </ul>
						         </li>
								
								</li><!-- Contact Menu Ends -->
							</ul><!-- 2 Menu Examples Ends -->
						</div><!--/.nav-collapse -->
				</div><!-- Container -->
			</div><!-- Nav Bar - Inner -->
		</div><!-- Nav Bar -->
	</header><!-- /container -->