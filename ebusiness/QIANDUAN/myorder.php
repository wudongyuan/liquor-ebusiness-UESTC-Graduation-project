<?php 
require_once '../include.php';
$cates=getAllcate();
if(!($cates && is_array($cates))){
	alertMes("不好意思，网站维护中!!!", "http://nafanlong.com");
}
$user=fetchOne("select * from user where username = '$_SESSION[username]'");
$orders=fetchAll("select * from `order` where userid = $user[id]");
// echo $order[0];
print_r($order[0]);
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
	<link rel="stylesheet" href="css/innerpage.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<!-- // PARTICULAR PAGES CSS FILES -->
<style type="text/css">
.tbl-order {
width: 100%;
border-collapse: separate;
border-spacing: 0 15px;
}
.tbl-order th {
	font-size: 14px;
	font-weight: normal;
	color: #919191;
	text-align: center;
}
.tbl-order td {
	position: relative;
	vertical-align: middle;
	height: 80px;
	padding: 0 10px;
	background: #f2f2f2;
	color: #1f1f1f;
}
.tbl-order td > * {
	display: inline-block;
	vertical-align: middle;
}
.tbl-order td:not(:last-child):after {
	position: absolute;
	top: 20%;
	right: 0;
	content: ' ';
	width: 1px;
	height: 60%;
	background: #c8c8c8;
}
.tbl-order td:not(:first-child) {
	text-align: center;
}
.tbl-order td:first-child {
	padding-left: 0;
}
.tbl-order .entry-thumbnail {
	width: 60px;
}
.tbl-order .entry-title {
	margin-left: 1.25em;
}
.tbl-order .close {
	float: none;
	background: #1f1f1f;
	opacity: 1;
	color: #FFF;
	text-shadow: none;
	width: 16px;
	height: 16px;
	font-size: 14px;
	text-align: center;
}

</style>
</head>
<body>
			
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
										<span>你的订单是空的</span>
										<small><a href="cart.html">查看所有</a></small>
									</div>
									<ul class="cart-items product-medialist unstyled clearfix"></ul>
									<div class="cart-footer">
										<div class="cart-total clearfix">
											<span class="pull-left uppercase">总共</span>
											<span class="pull-right total">¥ 0</span>
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
							        <a>欢迎您~<?php echo $_SESSION['username'];?></a></li>
							    <li><a href="../doAction.php?act=userOut">[退出]</a></li>
							    <?php else:?>
							    <li><a href="../login.php">[登录]</a></li>
							    <li><a href="../reg.php">[免费注册]</a></li>
				                <?php endif;?>
								<li><a href="#">我的账户</a></li>
								<li><a href="cart.php">我的购物车</a></li>
								<li><a href="checkout.php">Checkout</a></li>
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
					<ul class="bc unstyled clearfix">
						<li><a href="index.php">首页</a></li>
						<li class="active">订单</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
				
			<section class="section">
				<div class="container">
					
					<table class="tbl-order">
						<thead>
							<tr>
							    <th>商品名</th>
								<th>订单号</th>
								<th style="width: 15%;">数量</th>
								<th class="hidden-xs" style="width: 15%;">总额</th>
								<th class="hidden-xs" style="width: 10%;">物流</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($orders as $order):?>
							<tr>
								<td>
									<a href="" data-toggle="lightbox" class="entry-thumbnail">
										<img src="<?php echo $order['thumbnail'];?>" alt="<?php echo $order['proname'];?>">
									</a>
									<a href="" class="entry-title" href="product.php"><?php echo $order['proname'];?></a>
								</td>
							    <td>
									<span class="unit-price"><?php echo $order['orderSn'];?></span>
								</td>
								<td>
									<span><?php echo $order['amount'];?></span>
								</td>
								<td>
									<span><?php echo $order['totalprice'];?></span>
								</td>
								<td>
									<!-- <button type="button" class="btn btn-default btn-sm btn-round"><a href="wuliu.php" style="color:white;">立即支付</a></button> -->
									<button type="button" class="btn btn-default btn-sm btn-round"><a href="wuliuxinxi.php" style="color:white;">查看物流</a></button>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
						<tbody>
							<tr class="hide empty-cart">
								<td colspan="5">
									您的订单是空的，去 <a href="products.php">产品页</a>.
								</td>
							</tr>
						</tbody>
					</table>
					
				</div>
			</section>
			

			<!-- RELATED PRODUCTS -->
			<section class="section visible-items-4">
				<div class="container">
					<div class="row">
						<header class="section-header clearfix col-sm-offset-3 col-sm-6">
							<h3 class="section-title">你或许感兴趣</h3>
							<p class="section-teaser">XXXXX</p>
						</header>
						
						<div class="clearfix"></div>
						
						<!-- BEGIN CAROUSEL -->
						<div id="featured-products" class="add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-title=".entry-title > a" data-url=".entry-title > a" data-price=".entry-price > .price">
						
							<div class="owl-controls clickable top">
								<div class="owl-buttons">
									<div class="owl-prev"><i class="iconfont-angle-left"></i></div>
									<div class="owl-next"><i class="iconfont-angle-right"></i></div>
								</div>
							</div>
							
							<div class="owl-carousel owl-theme" data-visible-items="4" data-navigation="true" data-lazyload="true">
								<?php foreach($cates as $cate):?>
								<?php 
									$pros=getProsByCid($cate['id']);
									if($pros &&is_array($pros)):
									foreach($pros as $pro):
									$proImg=getProImgById($pro['id']);
								?>
								<div class="product" data-product-id="1">
									<div class="entry-media">
										<img data-src="../image_400/<?php echo $proImg['albumPath'];?>" alt="" class="lazyOwl thumb" />
										<div class="hover">
											<a href="product.html" class="entry-url"></a>
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
											<a href="#"><?php echo $pro['pName'];?></a>
										</h5>
										<div class="entry-price">
										    <?php if($pro['mPrice']==$pro['iPrice']): ?>
										    <strong class="price"><?php echo $pro['iPrice'];?></strong>
										    <?php endif;?>	
											<?php if($pro['mPrice']!=$pro['iPrice']): ?>
											<s class="entry-discount"><?php echo $pro['mPrice'];?></s>
											<strong class="accent-color price"><?php echo $pro['iPrice'];?></strong>
											<?php endif;?>	
										</div>
									</div>
								</div>
								<?php 
									endforeach;
									endif;
								?>
								<?php endforeach;?>
							
							</div>
								
						</div>
						<!-- // END CAROUSEL -->
						
					</div>
				</div>
			</section>
			<!-- // RELATED PRODUCTS -->
			
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
													<span class="inline-middle">Show More</span>
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
	<script src="js/products.js"></script>
	<script src="js/owl.carousel.js"></script>
	<!-- // Particular Page Javascripts -->
	
</body>
</html>