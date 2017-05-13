<?php 
require_once '../include.php';
$cates=getAllcate();
if(!($cates && is_array($cates))){
	alertMes("不好意思，网站维护中!!!", "http://nafanlong.com");
}
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="noIE" lang="en-US"><!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<title>酒类电商平台</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Favorite Icons -->
	<link rel="icon" href="img/favicon/favicon.html" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72-precomposed.html">
	<link rel="apple-touch-icon-precomposed" href="img/favicon/apple-touch-icon-precomposed.html">
	<!-- // Favorite Icons -->
	
	<!-- GENERAL CSS FILES -->
	<link rel="stylesheet" href="css/minified.css">
	<!-- // GENERAL CSS FILES -->
	
	<!--[if IE 8]>
		<script src="js/respond.min.js"></script>
		<script src="js/selectivizr-min.js"></script>
	<![endif]-->
	<!--
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	-->
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>');</script>
	<script src="js/modernizr.min.js"></script>	
	<!-- PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/jquery.nouislider.css">
	<link rel="stylesheet" href="css/isotope.css">
	<link rel="stylesheet" href="css/innerpage.css">
	<!-- // PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body class="products-view">
			
	<!-- PAGE WRAPPER -->
<div id="page-wrapper">

	<!-- SITE HEADER -->
		<header id="site-header" role="banner">
		<!-- HEADER TOP -->
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-7">
						<!-- CONTACT INFO -->
						<div class="contact-info">
							<i class="iconfont-headphones round-icon"></i>
							<strong>+18200501051</strong>
							<span>(周一到周五: 09.00 - 21.00)</span>
							</div>
						<!-- // CONTACT INFO -->
					</div>
					<div class="col-xs-12 col-sm-6 col-md-5">
						<ul class="actions unstyled clearfix">
							<li>
								<!-- SEARCH BOX -->
								<div class="search-box">
									<form action="#" method="post">
										<div class="input-iconed prepend">
											<button class="input-icon"><i class="iconfont-search"></i></button>
											<label for="input-search" class="placeholder">查找</label>
											<input type="text" name="q" id="input-search" class="round-input full-width" required />
										</div>
									</form>
								</div>
								<!-- // SEARCH BOX -->
							</li>

							<li data-toggle="sub-header" data-target="#sub-cart">
								<!-- SHOPPING CART -->
								<a href="javascript:void(0);" id="total-cart">
									<i class="iconfont-shopping-cart round-icon"></i>
								</a>
								
								<div id="sub-cart" class="sub-header">
									<div class="cart-header">
										<span>你的购物车是空的</span>
										<small><a href="cart.html">查看所有</a></small>
									</div>
									<ul class="cart-items product-medialist unstyled clearfix"></ul>
									<div class="cart-footer">
										<div class="cart-total clearfix">
											<span class="pull-left uppercase">总共</span>
											<span class="pull-right total">$ 0</span>
										</div>
										<div class="text-right">
											<a href="cart.php" class="btn btn-default btn-round view-cart">查看购物车</a>
										</div>
									</div>
								</div>
								<!-- // SHOPPING CART -->
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- ADD TO CART MESSAGE -->
			<div class="cart-notification">
				<ul class="unstyled"></ul>
			</div>
			<!-- // ADD TO CART MESSAGE -->
		</div>
		<!-- // HEADER TOP -->
		<!-- MAIN HEADER -->
		<div class="main-header-wrapper">
			<div class="container">
				<div class="main-header">
					<!-- CURRENCY / LANGUAGE / USER MENU -->
					<div class="actions">

						<!-- USER RELATED MENU -->
						<nav id="tiny-menu" class="clearfix">
							<ul class="user-menu">
							    <li><?php if($_SESSION['loginFlag']):?>
							        <a>欢迎您<?php echo $_SESSION['username'];?></a></li>
							    <li><a href="../doAction.php?act=userOut">[退出]</a></li>
							    <?php else:?>
							    <li><a href="../login.php">[登录]</a></li>
							    <li><a href="../reg.php">[免费注册]</a></li>
				                <?php endif;?>
								<li><a href="#">我的账户</a></li>
								<li><a href="cart.html">我的购物车</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</nav>
						<!-- // USER RELATED MENU -->
					</div>
					<!-- // CURRENCY / LANGUAGE / USER MENU -->
					<!-- SITE LOGO -->
					<div class="logo-wrapper">
						<a href="index.html" class="logo" title="GFashion - Responsive e-commerce HTML Template">
							<img src="img/logo.jpg" alt="GFashion - Responsive e-commerce HTML Template" />
						</a>

					</div>
					<!-- // SITE LOGO -->
					<!-- SITE NAVIGATION MENU -->
					<nav id="site-menu" role="navigation">
						<ul class="main-menu hidden-sm hidden-xs">
							<li class="active">
								<a href="index.php">首页</a>
							</li>
							<li>
								<a href="products.php">产品</a>
							</li>
							<li>
								<a href="products.php">分类</a>
								
								<!-- MEGA MENU -->
								<div class="mega-menu" data-col-lg="9" data-col-md="12">
									<div class="row">
									
										<div class="col-md-3">
											<h4 class="menu-title">五粮液</h4>
											<ul class="mega-sub">
												<li><a href="products.html">五粮液·1618</a></li>
												<li><a href="products.html">巴拿马金奖纪念酒</a></li>
												<li><a href="products.html">五粮液老酒</a></li>
												<li><a href="products.html">五粮醇系列</a></li>
												<li><a href="products.html">现代人酒系列</a></li>
												<li><a href="products.html">忆百年系列</a></li>
											</ul>
										</div>
										
										<div class="col-md-3">
											<h4 class="menu-title">茅台</h4>
											<ul class="mega-sub">
												<li><a href="products.html">新飞天</a></li>
												<li><a href="products.html">迎宾酒</a></li>
												<li><a href="products.html">飞天茅台</a></li>
												<li><a href="products.html">茅台王子酒</a></li>
											</ul>
										</div>
										
										<div class="col-md-3">
											<h4 class="menu-title">海之蓝</h4>
											<ul class="mega-sub">
												<li><a href="products.html">洋河蓝色经典</a></li>
												<li><a href="products.html">新天蓝</a></li>
												<li><a href="products.html">美人泉</a></li>
												<li><a href="products.html">42°白钻级贵宾洋河酒</a></li>
												<li><a href="products.html">42°嘉宾洋河酒</a></li>
											</ul>
										</div>
										
										<div class="col-md-3">
											<div class="carousel slide m-b" data-ride="carousel">
												<div class="carousel-inner">
													<div class="item active">
														<img src="img/60_1574f216cb2849c3938ebd56acdc384f.jpg" alt="" />
													</div>
													<div class="item">
														<img src="img/60_eabc63586d3d43059e94ad8a2a63b5df.jpg" alt="" />
													</div>
												</div>
											</div>
											<h5 class="text-semibold uppercase m-b-sm">贵州茅台酒（2017丁酉鸡年）</h5>
											<p>53度500ml【按农历生肖属相推出】</p>
											<a href="products.html" class="btn btn-default btn-round">去买 →</a>
										</div>
										
									</div>
								</div>
								<!-- // MEGA MENU -->
								
							</li>
							<li>
								<a href="store-locator.html">商店位置</a>
							</li>
							<li>
								<a href="contact-us.html">联系我们</a>
							</li>
							<li>
								<a href="#">购买</a>
							</li>
						</ul>
						
						<!-- MOBILE MENU -->
						<div id="mobile-menu" class="dl-menuwrapper visible-xs visible-sm">
							<button class="dl-trigger"><i class="iconfont-reorder round-icon"></i></button>
							<ul class="dl-menu">
								<li class="active">
									<a href="javsacript:void(0);">主页</a>
								</li>
								<li>
									<a href="javsacript:void(0);">产品</a>
								</li>
								<li>
									<a href="javsacript:void(0);">分类</a>
									
									<ul class="dl-submenu">
										<li>
											<a href="products.html">五粮液</a>
											<ul class="dl-submenu">
												<li><a href="products.html">五粮液·1618</a></li>
												<li><a href="products.html">巴拿马金奖纪念酒</a></li>
												<li><a href="products.html">五粮液老酒</a></li>
												<li><a href="products.html">五粮醇系列</a></li>
												<li><a href="products.html">现代人酒系列</a></li>
												<li><a href="products.html">忆百年系列</a></li>
											</ul>
										</li>
										<li>
											<a href="products.html">茅台</a>
											<ul class="dl-submenu">
												<li><a href="products.html">新飞天</a></li>
												<li><a href="products.html">迎宾酒</a></li>
												<li><a href="products.html">飞天茅台</a></li>
												<li><a href="products.html">茅台王子酒</a></li>
											</ul>
										</li>
										<li>
											<a href="products.html">海之蓝</a>
											<ul class="dl-submenu">
												<li><a href="products.html">洋河蓝色经典</a></li>
												<li><a href="products.html">新天蓝</a></li>
												<li><a href="products.html">美人泉</a></li>
												<li><a href="products.html">42°白钻级贵宾洋河酒</a></li>
												<li><a href="products.html">42°嘉宾洋河酒</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- // MOBILE MENU -->

					</nav>
					<!-- // SITE NAVIGATION MENU -->
				</div>
			</div>
		</div>
		<!-- // MAIN HEADER -->
	</header>
	<!-- // SITE HEADER -->
	
		<!-- BREADCRUMB -->
		<div class="breadcrumb-container">
			<div class="container">
				<div class="relative">
					<ul class="bc push-up unstyled clearfix">
						<li><a href="index-2.html">首页</a></li>
						<li class="active">产品</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
			<div class="container">
				<div class="row">
					
					<div class="m-t-b clearfix">
						<!-- SIDEBAR -->
						<aside class="col-xs-12 col-sm-4 col-md-3">
							<section class="sidebar push-up">
							
								<!-- CATEGORIES -->
								<section class="side-section bg-white">
									<header class="side-section-header">
										<h3 class="side-section-title">种类</h3>
									</header>
									<div class="side-section-content">
										<ul id="category-list" class="vmenu unstyled">
											<li>
												<input type="checkbox" id="check-maotai" class="prettyCheckable" data-label="茅台" data-labelPosition="right" value="maotai" />
												<ul>
													<li><input type="checkbox" id="check-maotai-accessories" class="prettyCheckable" data-label="浮雕木珍" data-labelPosition="right" value="浮雕木珍" /></li>
													<li><input type="checkbox" id="check-maotai-swimwear" class="prettyCheckable" data-label="王茅酒(百年印象)" data-labelPosition="right" value="王茅酒(百年印象)" /></li>
													<li><input type="checkbox" id="check-maotai-basics" class="prettyCheckable" data-label="汉酱酒" data-labelPosition="right" value="汉酱酒" /></li>
													<li><input type="checkbox" id="check-maotai-dresses" class="prettyCheckable" data-label="习水大曲(红运经典)" data-labelPosition="right" value="习水大曲(红运经典)" /></li>
												</ul>
											</li>
											<li>
												<input type="checkbox" id="check-hzl" class="prettyCheckable" data-label="海之蓝" data-labelPosition="right" value="hzl" />
												<ul>
													<li><input type="checkbox" id="check-hzl-accessories" class="prettyCheckable" data-label="Accessories" data-labelPosition="right" value="men-accessories" /></li>
													<li><input type="checkbox" id="check-hzl-jacket" class="prettyCheckable" data-label="Jackets" data-labelPosition="right" value="men-jacket" /></li>
													<li><input type="checkbox" id="check-hzl-jumper" class="prettyCheckable" data-label="Jumpers" data-labelPosition="right" value="men-jumper" /></li>
													<li><input type="checkbox" id="check-hzl-jean" class="prettyCheckable" data-label="Jeans" data-labelPosition="right" value="men-jean" /></li>
													<li><input type="checkbox" id="check-hzl-shoe" class="prettyCheckable" data-label="Shoes" data-labelPosition="right" value="men-shoe" /></li>
												</ul>
											</li>
											<li>
												<input type="checkbox" id="check-beauty" class="prettyCheckable" data-label="Beauty & Make-up" data-labelPosition="right" value="makeup" />
											</li>
											<li>
												<input type="checkbox" id="check-best" class="prettyCheckable" data-label="Best Sellers" data-labelPosition="right" value="best" />
											</li>
											<li>
												<input type="checkbox" id="check-new" class="prettyCheckable" data-label="New Arrivals" data-labelPosition="right" value="new" />
											</li>
										</ul>
									</div>
									<footer class="side-section-footer text-center hide">
										<button type="button" id="btn-filter-cat" class="btn btn-primary btn-round uppercase">Clear Filters</button>
									</footer>
								</section>
								<!-- // CATEGORIES -->
								
								<!-- BRANDS -->
								<section class="side-section bg-white">
									<header class="side-section-header">
										<h3 class="side-section-title">牌子</h3>
									</header>
									<div class="side-section-content">
										<ul id="brands-list" class="vmenu unstyled">
											<li>
												<input type="checkbox" id="check-brand1" class="prettyCheckable" data-label="五粮液" data-labelPosition="right" value="brand1" />
											</li>
											<li>
												<input type="checkbox" id="check-brand2" class="prettyCheckable" data-label="茅台" data-labelPosition="right" value="brand2" />
											</li>
											<li>
												<input type="checkbox" id="check-brand3" class="prettyCheckable" data-label="海之蓝" data-labelPosition="right" value="brand3" />
											</li>
											<li>
												<input type="checkbox" id="check-brand4" class="prettyCheckable" data-label="剑南春" data-labelPosition="right" value="brand4" />
											</li>
										</ul>
									</div>
									<footer class="side-section-footer text-center hide">
										<button type="button" id="btn-filter-brand" class="btn btn-primary btn-round uppercase">Clear Filters</button>
									</footer>
								</section>
								<!-- // BRANDS -->
								
								<!-- PRODUCT FILTER -->
								<section class="side-section bg-white">
									<header class="side-section-header">
										<h3 class="side-section-title">筛选</h3>
									</header>
									
									<!-- PRICE RANGE SLIDER -->
									<div id="filter-by-price" class="side-section-content">
										<h4 class="side-section-subheader">筛选价格</h4>
										<div class="range-slider-container">
											<div class="range-slider" data-min="0" data-max="2000" data-step="10" data-currency="¥"></div>
											<div class="range-slider-value clearfix">
												<span>价格: &ensp;</span>
												<span class="min"></span>
												<span class="max"></span>
											</div>
										</div>
									</div>
									<!-- // PRICE RANGE SLIDER -->
									
									<!-- FILTER BY SIZE -->
									<div id="filter-by-size" class="side-section-content">
										<h4 class="side-section-subheader">筛选种类</h4>
										<ul class="inline-li li-m-lg text-center unstyled">
											<li>
												<a href="#" class="round-icon" data-toggle="tooltip" data-title="五粮液"><small>五粮液</small></a>
												<input type="checkbox" class="filter-checkbox filter-size" value="五粮液" />
											</li>
											<li>
												<a href="#" class="round-icon" data-toggle="tooltip" data-title="茅台"><small>茅台</small></a>
												<input type="checkbox" class="filter-checkbox filter-size" value="茅台" />
											</li>
											<li>
												<a href="#" class="round-icon" data-toggle="tooltip" data-title="海之蓝"><small>海之蓝</small></a>
												<input type="checkbox" class="filter-checkbox filter-size" value="海之蓝" />
											</li>
											<li>
												<a href="#" class="round-icon" data-toggle="tooltip" data-title="剑南春"><small>剑南春</small></a>
												<input type="checkbox" class="filter-checkbox filter-size" value="剑南春" />
											</li>
										</ul>
									</div>
									<!-- // FILTER BY SIZE -->
									
									<!-- FILTER BY COLOR -->
									<div id="filter-by-color" class="side-section-content">
										<h4 class="side-section-subheader">筛选颜色</h4>
										<ul class="inline-li li-m-sm text-center unstyled">
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Black" style="background: #000;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="black" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="White" style="background: #fff; border-color: #acacac;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="white" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Green" style="background: #60bd0d;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="green" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Red" style="background: #ff5757;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="red" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Blue" style="background: #0d9abd;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="blue" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Brown" style="background: #c57313;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="brown" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Purple" style="background: #a613c5;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="purple" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Silver" style="background: #e5e5e8;"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="silver" />
											</li>
											<li>
												<a href="#" class="round-icon color-box" data-toggle="tooltip" data-title="Patternie" style="background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAHklEQVQIW2NkYGD4D8QgwAgjMASgCiAqwcqgACwAAIrDBAOqGrGNAAAAAElFTkSuQmCC');"></a>
												<input type="checkbox" class="filter-checkbox filter-color" value="patternie" />
											</li>
										</ul>
									</div>
									<!-- // FILTER BY COLOR -->
								</section>
								<!-- // PRODUCT FILTER -->
								
								<!-- BEST SELLERS -->
								<section class="side-section bg-white">
									<header class="side-section-header">
										<h3 class="side-section-title">热销产品</h3>
									</header>
									<div class="side-section-content">
										<ul class="product-medialist li-m-t unstyled clearfix">
										<?php foreach($cates as $cate):?>
										<?php 
											$pros=getProsByCid($cate['id']);
											if($pros &&is_array($pros)):
											foreach($pros as $pro):
											if($pro['isHot']==1):
											$proImg=getProImgById($pro['id']);
										?>
											<li>
												<div class="item clearfix">
													<a href="../image_800/<?php echo $proImg['albumPath'];?>" data-toggle="lightbox" class="entry-thumbnail">
														<img src="../image_400/<?php echo $proImg['albumPath'];?>" alt="Inceptos orci hac libero" />
													</a>
													<h5 class="entry-title"><a href="product.php?id=<?php echo $pro['id'];?>"><?php echo $pro['pName'];?></a></h5>
													<?php if($pro['mPrice']==$pro['iPrice']): ?>
													<span class="entry-price">¥ <?php echo $pro['iPrice'];?></span>
													<?php endif;?>	
													<?php if($pro['mPrice']!=$pro['iPrice']): ?>
													<s class="entry-discount m-r-sm"><span class="text-sm">¥ <?php echo $pro['mPrice'];?></span></s>
													<span class="entry-price accent-color">¥ <?php echo $pro['iPrice'];?></span>
                                                    <?php endif;?>	
												</div>
											</li>
										<?php 
										    endif;
											endforeach;
											endif;
								        ?>
								        <?php endforeach;?>
										</ul>
									</div>
								</section>
								<!-- // BEST SELLERS -->
								
								<!-- PROMO -->
								<div class="promo inverse-background" style="background: url('../image_800/dfef26c9bb9e13cb82d390cc69943d90.jpg') no-repeat; background-size: auto 100%;">
									<div class="inner text-center np">
										<div class="ribbon">
											<h6 class="nmb">五粮液</h6>
											<h5 class="text-semibold uppercase nmb">新款</h5>
											<div class="space10"></div>
											<a href="products.html" class="with-icon prepend-icon"><i class="iconfont-caret-right"></i><span> 现在买</span></a>
										</div>
									</div>
								</div>
								<!-- // PROMO -->
								
							</section>
						</aside>
						<!-- // SIDEBAR -->
						<section class="col-xs-12 col-sm-8 col-md-9">
							
							<section class="products-wrapper">
								<!-- DISPLAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION -->
								<header class="products-header">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 center-xs">
											<!-- DISPLAY MODE -->
											<ul class="unstyled inline-li li-m-r-l-sm pull-left">
												<li><a class="round-icon active" href="#" data-toggle="tooltip" data-layout="grid" data-title="方格视图"><i class="iconfont-th"></i></a></li>
												<li><a class="round-icon" href="#" data-toggle="tooltip" data-layout="list" data-title="列表视图"><i class="iconfont-list"></i></a></li>
											</ul>
											<!-- // DISPLAY MODE -->
											
											<!-- NUMBER OF ITEMS TO BE DISPLAY -->
											<div class="pull-right m-l-lg">
												<span class="inline-middle m-r-sm text-xs">显示</span>
												<div class="inline-middle styled-dd">
													<select>
														<option value="9">9</option>
														<option value="12" selected>12</option>
														<option value="24">24</option>
														<option value="36">36</option>
													</select>
												</div>
											</div>
											<!-- // NUMBER OF ITEMS TO BE DISPLAY -->
										</div>
										<div class="space30 visible-xs"></div>
										<!-- PAGINATION -->
										<div class="col-xs-12 col-sm-12 col-md-6 center-xs">
											<ul class="paginator li-m-r-l pull-right">
												<li><a class="round-icon" href="#" data-toggle="tooltip" data-title="Previous Page"><i class="iconfont-angle-left"></i></a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a class="round-icon" href="#" data-toggle="tooltip" data-title="Next Page"><i class="iconfont-angle-right"></i></a></li>
											</ul>
										</div>
										<!-- // PAGINATION -->
									</div>
								</header>
								<!-- // DISPLAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION -->
								
								<!-- PRODUCT LAYOUT -->
								<div class="products-layout grid m-t-b add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-title=".entry-title > a" data-url=".entry-title > a" data-price=".entry-price > .price">
								<?php foreach($cates as $cate):?>
								<?php 
									$pros=getProsByCid($cate['id']);
									if($pros &&is_array($pros)):
									foreach($pros as $pro):
									$proImg=getProImgById($pro['id']);
								?>	
									<div class="product" data-product-id="<?php echo $pro['id'];?>" data-category="<?php echo $cate['cName'];?>" data-brand="<?php echo $pro['pName'];?>" data-price="<?php echo $pro['iPrice'];?>" data-colors="red|blue|black|white" data-size="<?php echo $pro['cId'];?>">
										<div class="entry-media">
											<img data-src="../image_400/<?php echo $proImg['albumPath'];?>" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.php?id=<?php echo $pro['id'];?>" class="entry-url" display="_blank"></a>
												<ul class="icons unstyled">
													<li>
														<div class="<?php echo $pro['isHot']==1?"circle ribbon ribbon-sale":"circle ribbon ribbon-new";?>"><?php echo $pro['isHot']==1?"热销":"新";?></div>
													</li>
													<li>
														<a href="../image_800/<?php echo $proImg['albumPath'];?>" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="4.5" step="0.5" id="backing1" />
													<div class="rateit" data-rateit-backingfld="#backing1" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.php"><?php echo $pro['pName'];?></a>
											</h5>
											<div class="entry-description visible-list">
												<p><?php echo $pro['pDesc'];?></p>
											</div>
											<div class="entry-price">
											    <?php if($pro['mPrice']==$pro['iPrice']): ?>
											    <strong class="price"> ¥ <?php echo $pro['iPrice'];?></strong>
											    <a href="#" class="btn btn-round btn-default add-to-cart visible-list">加入购物车</a>
											    <?php endif;?>
											    <?php if($pro['mPrice']!=$pro['iPrice']): ?>
												<s class="entry-discount"> ¥ <?php echo $pro['mPrice'];?></s>
												<strong class="accent-color price"> ¥ <?php echo $pro['iPrice'];?></strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">加入购物车</a>
											    <?php endif;?>
											</div>
										</div>
									</div>
									<?php 
										endforeach;
										endif;
								    ?>
								    <?php endforeach;?>
									<!-- <div class="product" data-product-id="2" data-category="women|women-accessories|women-basics|women-legging|new" data-brand="brand2" data-price="450" data-colors="red|green|black|white|silver" data-size="XS|S|M">
										<div class="entry-media">
											<img data-src="images/women/accessories/582120-0029_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/women/accessories/582120-0029_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="4" step="0.5" id="backing2" />
													<div class="rateit" data-rateit-backingfld="#backing2" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 350.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="3" data-category="men|men-jacket|men-accessories|men-jumper|new" data-brand="brand2" data-price="450" data-colors="purple|brown|black|white|patternie" data-size="S|M|L|XL">
										<div class="entry-media">
											<img data-src="images/men/accessories/255615-0014_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<div class="circle ribbon ribbon-new">New</div>
													</li>
													<li>
														<a href="images/men/accessories/255615-0014_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="3.5" step="0.5" id="backing3" />
													<div class="rateit" data-rateit-backingfld="#backing3" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 450.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="4" data-category="men|men-jacket|men-accessories|men-jeans|men-jumper" data-brand="brand3" data-price="350" data-colors="purple|brown|black|white|red" data-size="S|M|L|XL|XXL">
										<div class="entry-media">
											<img data-src="images/men/blazer/677326-0014_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/men/blazer/677326-0014_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="5" step="0.5" id="backing4" />
													<div class="rateit" data-rateit-backingfld="#backing4" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 350.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="5" data-category="men|men-shoe|men-accessories|men-jean|new" data-brand="brand4" data-price="250" data-colors="brown|silver|black|green|red" data-size="L|XL|XXL">
										<div class="entry-media">
											<img data-src="images/men/shoes/000312-2259_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<div class="circle ribbon ribbon-sale">Sale</div>
													</li>
													<li>
														<a href="images/men/shoes/000312-2259_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="4.5" step="0.5" id="backing5" />
													<div class="rateit" data-rateit-backingfld="#backing5" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<s class="entry-discount">$ 350.00</s>
												<strong class="accent-color price">$ 250.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="6" data-category="women|women-legging|women-dresses|women-jeans|women-skirt" data-brand="brand5" data-price="350" data-colors="white|silver|green|red|blue" data-size="XS|S">
										<div class="entry-media">
											<img data-src="images/women/jeans/220008-0054_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/women/jeans/220008-0054_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="4" step="0.5" id="backing6" />
													<div class="rateit" data-rateit-backingfld="#backing6" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 350.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="7" data-category="women|women-swimwear|best|new" data-brand="brand5" data-price="150" data-colors="white|black|patternie" data-size="XS|S">
										<div class="entry-media">
											<img data-src="images/women/swimwear/116796-0001_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<div class="circle ribbon ribbon-new">New</div>
													</li>
													<li>
														<a href="images/women/swimwear/116796-0001_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="3.5" step="0.5" id="backing7" />
													<div class="rateit" data-rateit-backingfld="#backing7" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 150.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="8" data-category="women|women-dresses|best" data-brand="brand4" data-price="350" data-colors="white|black" data-size="XS|S|L">
										<div class="entry-media">
											<img data-src="images/women/dress/278638-0083_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/women/dress/278638-0083_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="5" step="0.5" id="backing8" />
													<div class="rateit" data-rateit-backingfld="#backing8" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 350.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
							
									<div class="product" data-product-id="9" data-category="men|men-accessories|men-jean|best|new" data-brand="brand5" data-price="850" data-colors="white|black" data-size="L|XL|XXL">
										<div class="entry-media">
											<img data-src="images/men/accessories/000095-0014_2_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/men/accessories/000095-0014_2.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="5" step="0.5" id="backing9" />
													<div class="rateit" data-rateit-backingfld="#backing9" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 850.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
							
									<div class="product" data-product-id="10" data-category="women|women-basics|new" data-brand="brand1" data-price="550" data-colors="white|black|patternie" data-size="XS|S">
										<div class="entry-media">
											<img data-src="images/women/basic/848051-0014_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/women/basic/848051-0014_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="3.5" step="0.5" id="backing10" />
													<div class="rateit" data-rateit-backingfld="#backing10" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 550.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div>
									
									<div class="product" data-product-id="11" data-category="women|women-basics|makeup" data-brand="brand3" data-price="700" data-colors="white|black|red|green|brown" data-size="XS|S">
										<div class="entry-media">
											<img data-src="images/women/basic/848099-0067_1_t.jpg" alt="" class="lazyLoad thumb" />
											<div class="hover">
												<a href="product.html" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<a href="images/women/basic/848099-0067_1.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle add-to-cart"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="2.5" step="0.5" id="backing11" />
													<div class="rateit" data-rateit-backingfld="#backing11" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="product.html">Inceptos orci hac libero</a>
											</h5>
											<div class="entry-description visible-list">
												<p>Sed ornare cras donec litora integer curabitur orci, at nullam aliquam libero nam himenaeos, amet massa amet ut ipsum viverra mauris rhoncus neque aenean rhoncus gravida orci facilisis quis dui consectetur.</p>
											</div>
											<div class="entry-price">
												<strong class="price">$ 700.00</strong>
												<a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r">+ Add to Wishlist</a>
												<a href="#" class="pull-right">+ Add to Compare</a>
											</div>
										</div>
									</div> -->
									
								</div>
								<!-- // PRODUCT LAYOUT -->
							</section>
							
						</section>
					</div>
					
				</div>
			</div>
		</main>
		<!-- // SITE MAIN CONTENT -->
		
		<!-- SITE FOOTER -->
		<footer class="page-footer">
		
		<!-- WIDGET AREA -->
		<div class="widgets">
		
			<!-- FIRST ROW -->
			<div class="section">
				<div class="container">
					<div class="row">
						
						<div class="col-xs-12 col-sm-6 col-md-3">
							<section class="widget widget-text">
								<h5 class="widget-title">我们的平台</h5>
								<div class="widget-content">
									<p>贵州茅台酒股份有限公司位于贵州省仁怀市茅台镇——酱酒核心产区，位置毗邻风光秀丽的赤水河。公司以“酿造高品位的生活”为使命。公司拥有茅台酒、汉酱、仁酒、王子酒、迎宾酒等酱酒产品。茅台酒是著名蒸馏酒，誉称国酒。</p>
									<p>“打造世界蒸馏酒第一品牌”</p>
								</div>
							</section>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-3">
							<section class="widget widget-text">
								<h5 class="widget-title">平台开放时间段</h5>
								<div class="widget-content">
									<p>周一至周五:-------------------------9.00 to 18.00</p>
									<p>周六:--------------------------------10.00 to 16.00</p>
									<p>周日:----------------------------------10.00 to 16.00</p>
									<br/>
									<p>每月30天全心全意为客户服务</p>
								</div>
							</section>
						</div>
						
						<div class="space40 visible-sm clearfix"></div>
						
						<div class="col-xs-12 col-sm-6 col-md-3">
							<section class="widget widget-menu">
								<h5 class="widget-title">信息</h5>
								<div class="widget-content">
									<ul class="menu iconed-menu unstyled">
										<li><a href="#"><i class="iconfont-circle-blank menu-icon"></i>加盟</a></li>
										<li><a href="#"><i class="iconfont-circle-blank menu-icon"></i>物流</a></li>
										<li><a href="#"><i class="iconfont-circle-blank menu-icon"></i>购物支持</a></li>
										<li><a href="#"><i class="iconfont-circle-blank menu-icon"></i>顾客服务</a></li>
										<li><a href="#"><i class="iconfont-circle-blank menu-icon"></i>售后服务</a></li>
										<li><a href="#"><i class="iconfont-circle-blank menu-icon"></i>条款</a></li>
									</ul>
								</div>
							</section>
						</div>
						

						
					</div>
				</div>
			</div>
			<!-- // FIRST ROW -->
			
			<!-- SECOND ROW -->
			<div class="section">
				<div class="container">
					<div class="row">
						
						<div class="col-xs-12 col-sm-12 col-md-3">
							<section class="widget widget-menu">
								<h5 class="widget-title">联系我们</h5>
								<div class="widget-content">
									<ul class="menu iconed-list unstyled">
										<li>
											<span class="list-icon"><i class="round-icon iconfont-map-marker"></i></span>
											<div class="list-content">电子科技大学沙河校区新苑四栋501</div>
										</li>
										<li>
											<span class="list-icon"><i class="round-icon iconfont-phone"></i></span>
											<div class="list-content">18200501051</div>
										</li>
										<li>
											<span class="list-icon"><i class="round-icon iconfont-envelope-alt"></i></span>
											<div class="list-content">704692139@qq.com</div>
										</li>
									</ul>
								</div>
							</section>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-6">
							<section class="widget widget-ads">
								<div class="widget-content">
									<div class="center-xs">
										<div class="ads">
											<a href="#">
												<img src="images/demo/images-footer.jpg" alt="" />
											</a>
											<div class="ads-caption bottom-right">
												<a href="#" class="btn btn-default btn-round">
													<i class="round-icon iconfont-angle-right"></i>
													<span class="inline-middle">显示更多</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-3">
							<section class="widget widget-subscription">
								<h5 class="widget-title">通讯订阅</h5>
								<div class="widget-content">
									<p>订阅我们，第一时间知道折扣信息！</p>
									<form action="#" method="post">
										<div class="input-group">
											<label for="subscription-email" class="placeholder">输入邮箱</label>
											<input type="email" id="subscription-email" name="email" class="form-control" required />
											<span class="input-group-btn">
												<button class="btn btn-primary">订阅</button>
											</span>
										</div>
									</form>
								</div>
							</section>
						</div>
						
					</div>
				</div>
			</div>
			<!-- // SECOND ROW -->
			
		</div>
		<!-- // WIDGET AREA -->
		
		<div class="footer-sub">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="footer-links center-xs clearfix">
							<ul class="unstyled">
								<li><a href="#">站点地图</a></li>
								<li><a href="#">常见问题</a></li>
								<li><a href="#">加入我们</a></li>
								<li><a href="#">联系我们</a></li>
							</ul>
						</div>
						<div class="space10"></div>
						<div class="copyright center-xs">
							<p>© 2017 那樊笼版权所有.</p>
						</div>
					</div>
					
					<div class="space40 visible-xs"></div>
					
					<div class="col-xs-12 col-sm-6 center-xs">
						<div class="pull-right">
							<div class="vmid">
								<span class="uppercase">支付支持&emsp;</span>
								<a href="#"><img src="img/alipay.png" alt="" width="80" /></a>&nbsp&nbsp&nbsp
								<a href="#"><img src="img/jdqianbao.png" alt="" width="80" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- // SITE FOOTER -->
		
</div>
<!-- // PAGE WRAPPER -->

<!-- Essential Javascripts -->
<script src="js/minified.js"></script>
<!-- // Essential Javascripts -->

	<!-- Particular Page Javascripts -->
	<script src="js/jquery.nouislider.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/products.js"></script>
	<!-- // Particular Page Javascripts -->
</body>
</html>