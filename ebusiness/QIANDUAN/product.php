<?php 
require_once '../include.php';
$cates=getAllcate();
if(!($cates && is_array($cates))){
	alertMes("不好意思，网站维护中!!!", "http://nafanlong.com");
}
$id=$_REQUEST['id'];
$proInfo=getProById($id);
$proImgs=getProImgsById($id);
if(!($proImgs &&is_array($proImgs))){
	alertMes("商品图片错误", "index.php");
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
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/innerpage.css">
	<!-- // PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body class="product-single">
			
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
						<li><a href="products.html">产品</a></li>
						<li class="active">产品详情</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
					
			<section class="section">
				<div class="container">
					<div class="row">
						<!-- PRODUCT PREVIEW -->
						<div class="col-xs-12 col-sm-4">
							
							<div class="product-preview">
								<div class="big-image">
									<a href="../image_800/<?php echo  $proImgs[0]['albumPath'];?>" data-toggle="lightbox">
										<img src="../image_400/<?php  echo $proImgs[0]['albumPath'];?>" alt="" />
									</a>
								</div>
								<ul class="thumbs unstyled clearfix">
								<?php foreach($proImgs as $key=>$proImg):?>
									<li><a href="../image_800/<?php echo $proImg['albumPath'];?>"><img src="../image_400/<?php echo $proImg['albumPath'];?>" alt="" /></a></li>
									<?php endforeach;?>
								</ul>
							</div>
							
						</div>
						<!-- // PRODUCT PREVIEW -->
						<div class="space40 visible-xs"></div>
						<!-- PRODUCT DETAILS -->
						<div class="col-xs-12 col-sm-8">
							<section class="product-details add-cart">
								<header class="entry-header">
									<h2 class="entry-title uppercase"><?php echo $proInfo['cName'];?></h2>
								</header>
								<article class="entry-content">
									<figure>
										<span class="entry-price inline-middle"><?php echo $proInfo['iPrice'];?></span>
										<div class="rate-bar inline-middle">
											<input type="range" value="4.5" step="0.5" id="backing0" />
											<div class="rateit" data-rateit-backingfld="#backing0" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
										</div>
										<span class="entry-review-count inline-middle">( 2 Reviews )</span>
										
										<ul class="entry-meta unstyled">
											<li>
												<span class="key">牌子:</span>
												<span class="value"><?php  switch ($proInfo['cId'])
																			{
																			case 1:
																			 echo "五粮液";
																			 break; 
																			case 2:
																			 echo "茅台";
																			 break;
																			case 3:
																			 echo "海之蓝";
																			 break;
																			default:
																			 break;
																			}
												                    ?>
												</span>
											</li>
											<li>
												<span class="key">库存:</span>
												<span class="value"><?php echo $proInfo['pNum'];?></span>
											</li>
											<li>
												<span class="key">货号:</span>
												<span class="value"><?php echo $proInfo['pSn'];?></span>
											</li>
										</ul>
										
										<div class="clearfix"></div>
										
										<figcaption class="m-b-sm">
											<h5 class="subheader uppercase">商品简介:</h5>
											<p><?php echo $proInfo['pDesc'];?></p>
										</figcaption>
										
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<h5 class="subheader uppercase">种类:</h5>
												<div class="inline-middle styled-dd">
													<select>
														<option>-- 请选择 --</option>
														<option value="Black">浓香型</option>
														<option value="Aubergine">酱香型</option>
													</select>
												</div>
											</div>
											<div class="space30 visible-xs"></div>
											<div class="col-xs-12 col-sm-6">
												<h5 class="subheader uppercase">Size:</h5>
												<div class="inline-middle styled-dd">
													<select>
														<option>-- 请选择 --</option>
														<option value="xs">500ml</option>
														<option value="s">350ml</option>
													</select>
												</div>
											</div>
										</div>
										
										<ul class="inline-li li-m-r-l m-t-lg">
											<li>
												<a href="#" class="btn btn-default btn-lg btn-round add-to-cart">加入购物车</a>
											</li>
										</ul>
										
									</figure>
								</article>
							</section>
						</div>
						<!-- // PRODUCT DETAILS -->
					</div>
					<div class="m-t-lg">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#product-description" data-toggle="tab">简介</a></li>
							<li><a href="#product-reviews" data-toggle="tab">查看</a></li>
							<li><a href="#product-shipping" data-toggle="tab">邮费</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="product-description">
								<p><?php echo $proInfo['pDesc'];?></p>
							</div>
							<div class="tab-pane fade in" id="product-reviews">
								<div class="comments-list">
									<div id="disqus_thread"></div>
									<a href="#" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
								</div>
							</div>
							<div class="tab-pane fade in" id="product-shipping">
								<p>活动促销中~.</p>
								<h5 class="m-b-xs"><i class="iconfont-gift inline-middle m-r-sm"></i><span class="inline-middle">作为礼物送给朋友</span></h5>
								<p>☺ </p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- FEATURED PRODUCTS -->
			<section class="section featured visible-items-4">
				<div class="container">
					<div class="row">
						<header class="section-header clearfix col-sm-offset-3 col-sm-6">
							<h3 class="section-title">特色产品</h3>
							<p class="section-teaser">酱香突出、幽雅细腻、酒体醇厚、回味悠长、空杯留香持久</p>
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
								<?php 
									$pros=getProsByCid(2);
									if($pros &&is_array($pros)):
									foreach($pros as $pro):
									$proImg=getProImgById($pro['id']);
							    ?>
								<div class="product" data-product-id="1">
									<div class="entry-media">
										<img data-src="../image_400/<?php echo $proImg['albumPath'];?>" alt="" class="lazyOwl thumb" />
										<div class="hover">
											<a href="product.php?id=<?php echo $pro['id'];?>" class="entry-url"></a>
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
											<a href="product.php?id=<?php echo $pro['id'];?>"><?php echo $pro['pName'];?></a>
										</h5>
										<div class="entry-price">
											    <?php if($pro['mPrice']==$pro['iPrice']): ?>
											    <strong class="price">¥ <?php echo $pro['iPrice'];?></strong>
											    <?php endif;?>
											    <?php if($pro['mPrice']!=$pro['iPrice']): ?>
												<s class="entry-discount">¥ <?php echo $pro['mPrice'];?></s>
												<strong class="accent-color price">¥ <?php echo $pro['iPrice'];?></strong>
											    <?php endif;?>
											    <a href="#" class="btn btn-round btn-default add-to-cart visible-list">加入购物车</a>
										</div>
									</div>
								</div>
								<?php 
									endforeach;
									endif;
								?>
							
							</div>
								
						</div>
						<!-- // END CAROUSEL -->
						
					</div>
				</div>
			</section>
			<!-- // FEATURED PRODUCTS -->
			
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
	<script src="js/jquery.nouislider.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/products.js"></script>
	<!-- // Particular Page Javascripts -->
	
</body>
</html>