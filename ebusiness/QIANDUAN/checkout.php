<?php 
require_once '../include.php';
$cates=getAllcate();
if(!($cates && is_array($cates))){
	alertMes("不好意思，网站维护中!!!", "http://nafanlong.com");
}
$user=fetchOne("select * from user where username = '$_SESSION[username]'");
$address=fetchOne("select * from address where userid = $user[id]");
// print_r($_COOKIE['cart']);

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
	<!-- // PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/responsive.css">
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
										<span>你的购物车是空的</span>
										<small><a href="cart.php">查看所有</a></small>
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
						<a href="index.php" class="logo" title="酒类电商平台">
							<img src="img/logo.jpg" alt="酒类电商平台" />
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
											<a href="products.php">五粮液</a>
											<ul class="dl-submenu">
												<li><a href="products.php">五粮液·1618</a></li>
												<li><a href="products.php">巴拿马金奖纪念酒</a></li>
												<li><a href="products.php">五粮液老酒</a></li>
												<li><a href="products.php">五粮醇系列</a></li>
												<li><a href="products.php">现代人酒系列</a></li>
												<li><a href="products.php">忆百年系列</a></li>
											</ul>
										</li>
										<li>
											<a href="products.php">茅台</a>
											<ul class="dl-submenu">
												<li><a href="products.php">新飞天</a></li>
												<li><a href="products.php">迎宾酒</a></li>
												<li><a href="products.php">茅台王子酒</a></li>
											</ul>
										</li>
										<li>
											<a href="products.php">海之蓝</a>
											<ul class="dl-submenu">
												<li><a href="products.php">洋河蓝色经典</a></li>
												<li><a href="products.php">新天蓝</a></li>
												<li><a href="products.php">美人泉</a></li>
												<li><a href="products.php">42°白钻级贵宾洋河酒</a></li>
												<li><a href="products.php">42°嘉宾洋河酒</a></li>
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
						<li><a href="#">首页</a></li>
						<li class="active">结账</li>
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
							<section class="side-section">
								<h3 class="uppercase text-bold"><span class="text-xs">便捷通道</span></h3>
								
								<ul class="nav nav-tabs nav-stacked">
									<li><a href="index.php">首页</a></li>															
									<li><a href="about-us.html">关于我们</a></li>															
									<li><a href="products.php">购物</a></li>														
									<li><a href="contact-us.html">联系我们</a></li>															
								</ul>
							</section>
								
							<!-- PROMO -->
							<div class="promo inverse-background" style="background: url('../image_800/dfef26c9bb9e13cb82d390cc69943d90.jpg') no-repeat; background-size: auto 100%;">
								<div class="inner text-center np">
									<div class="ribbon">
										<h6 class="nmb">五粮液</h6>
										<h5 class="text-semibold uppercase nmb">夏季促销</h5>
										<div class="space10"></div>
										<a href="products.html" class="with-icon prepend-icon"><i class="iconfont-caret-right"></i><span> 现在买</span></a>
									</div>
								</div>
							</div>
							<!-- // PROMO -->
						</aside>
						<!-- // SIDEBAR -->
						
						<!--  order begin -->
						<form class="form-horizontal" role="form" action="order.php" method="post" enctype="multipart/form-data ">
							<div class="col-xs-12 col-sm-8 col-md-9">
								<div class="panel-group checkout" id="checkout-collapse">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse2">
													<span class="step">01</span>
													账单信息
												</a>
											</h4>
										</div>
										<div id="checkout-collapse2" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="form-horizontal" role="form">
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-6">
															<div class="form-group stylish-input">
																<label for="inputFirstname" class="col-sm-4 col-lg-4 control-label required">真实姓名</label>
																<div class="col-sm-8 col-lg-8">
																	<input type="text" class="form-control" id="inputFirstname" name="realname" value="<?php echo $address['realname'];?>"/>
																</div>
															</div>
															<div class="form-group stylish-input">
																<label for="inputEmail2" class="col-sm-4 col-lg-4 control-label required">邮箱</label>
																<div class="col-sm-8 col-lg-8">
																	<input type="email" class="form-control" id="inputEmail2" name="email" value="<?php echo $address['email'];?>"/>
																</div>
															</div>
															<div class="form-group stylish-input">
																<label for="inputPhone" class="col-sm-4 col-lg-4 control-label required">手机</label>
																<div class="col-sm-8 col-lg-8">
																	<input type="text" class="form-control" id="inputPhone" name="phone" value="<?php echo $address['telephone'];?>"/>
																</div>
															</div>
															<div class="form-group stylish-input">
																<label for="inputCompany" class="col-sm-4 col-lg-4 control-label">公司</label>
																<div class="col-sm-8 col-lg-8">
																	<input type="text" class="form-control" id="inputCompany" name="company" value="<?php echo $address['company'];?>"/>
																</div>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6">
															<div class="form-group stylish-input">
																<label for="inputAddress1" class="col-sm-4 col-lg-4 control-label required">地址</label>
																<div class="col-sm-8 col-lg-8">
																	<input type="text" class="form-control" id="inputAddress1" name="address" value="<?php echo $address['address'];?>"/>
																</div>
															</div>
															<div class="form-group stylish-input">
																<label for="inputPostcode" class="col-sm-4 col-lg-4 control-label required">邮政编码</label>
																<div class="col-sm-8 col-lg-8">
																	<input type="text" class="form-control" id="inputPostcode" name="postcode" value="<?php echo $address['postcode'];?>"/>
																</div>
															</div>
														</div>
													</div>
													<div class="space20 clearfix"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse4">
													<span class="step">02</span>
													付款方式
												</a>
											</h4>
										</div>
										<div id="checkout-collapse4" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="paymethod" role="form">
													<div class="form-group stylish-input">
														<input type="radio" id="deliverymethod1" class="prettyCheckable" name="deliverymethod" data-label="支付宝" />
													</div>
													<div class="space20 clearfix"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse6">
													<span class="step">04</span>
													订单详情
												</a>
											</h4>
										</div>
										<div id="checkout-collapse6" class="panel-collapse collapse">
											<section class="section">
												<div class="container" style="width:845px;">
													<table class="tbl-cart">
														<thead>
															<tr>
																<th style="width: 30%;">商品名</th>
																<th style="width: 10%;">单价</th>
																<th style="width: 10%;">数量</th>
																<th class="hidden-xs" style="width: 10%;">总额</th>
																<th class="hidden-xs" style="width: 10%;"></th>
															</tr>
														</thead>
														<tbody>
															<tr class="hide empty-cart">
																<td colspan="5">
																	您的购物车是空的，去 <a href="products.php">产品页</a>.
																</td>
															</tr>
														</tbody>
													</table>
													<script type="text/javascript">
													var postData = $('.test').html();
													$.post(
													    "后端PHP地址",
													    {"data":postData}, //POST的数据

													    function(data){
													        console.log(data);//返回的数据

													    },
													    'json' //返回数据格式，json,html等
													);
													</script>
													<div class="pull-left coupon m-b">
														<div class="input-group">
															<label for="apply-coupon" class="placeholder">输入优惠券代码</label>
															<input type="text" id="apply-coupon" name="coupon" class="form-control" required />
															<span class="input-group-btn">
																<button class="btn btn-primary">申请优惠券</button>
															</span>
														</div>
													</div>
													
													<div class="shopcart-total pull-right clearfix">
														<div class="cart-subtotal text-xs m-b-sm clearfix">
															<span class="pull-left">总额:</span>
															<span class="pull-right">¥ 0.00</span>
														</div>
														<div class="cart-total text-bold m-b-lg clearfix">
															<span class="pull-left">折后价:</span>
															<span class="pull-right">¥ 0.00</span>
														</div>
														<table class="shop-summary">
														<tr>
															<th><input type="submit" class="btn btn-primary btn-round uppercase" value="立即下单" /></th>
															<td><a href="products.php" class="btn btn-primary btn-round uppercase">继续购物</a></td>
														</tr>
													    </table>
													</div>
												</div>
											</section>
											
										</div>
									</div>

								</div>
							</div>
						</form>
					    <!-- END order -->	

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
	<script src="js/products.js"></script>
	<!-- // Particular Page Javascripts -->
	
</body>
</html>