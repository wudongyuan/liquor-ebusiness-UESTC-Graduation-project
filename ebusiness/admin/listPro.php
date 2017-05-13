<?php 
require_once '../include.php';
checkLogined();
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where p.pName like '%{$keywords}%'":null;
//得到数据库中所有商品
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id {$where}  ";
$totalRows=getResultNum($sql);
$pageSize=3;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from pro as p join cate c on p.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>酒类电商平台 - 后台管理</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="styles/backstage.css">
    <link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/backstage.css">
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/gallery.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <!-- <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' /> -->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.html" style="font-weight:700;font-family:Microsoft Yahei">酒类电商平台 - 后台管理</a>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">6</span>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="notifications">
                                <h3>你有 6 个新通知</h3>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新用户注册
                                    <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">查看所有通知</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-envelope-alt"></i>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="messages">
                                <a href="#" class="item">
                                    <img src="img/contact-img.png" class="display" />
                                    <div class="name">Alejandra Galván</div>
                                    <div class="msg">
                                        There are many variations of available, but the majority have suffered alterations.
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 13 min.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">View all messages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        账户管理
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="personal-info.html">个人信息管理</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="#">订单管理</a></li>
                    </ul>
                </li>
                <li class="settings hidden-phone">
                    <a href="personal-info.html" role="button">
                        <i class="icon-cog"></i>
                    </a>
                </li>
                <li class="settings hidden-phone">
                    <a href="login.php" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="index.html">
                    <i class="icon-home"></i>
                    <span>后台首页</span>
                </a>
            </li>            
            <li>
                <a href="chart-showcase.html">
                    <i class="icon-signal"></i>
                    <span>统计</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>用户管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="listuser.php">用户列表</a></li>
                    <li><a href="addUser.html">加入新用户</a></li>
                    <li><a href="user-profile.html">用户信息</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-user"></i>
                    <span>管理员管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="listAdmin.php">管理员列表</a></li>
                    <li><a href="addAdmin.html">加入管理员</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-shopping-cart"></i>
                    <span>商品管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="addPro.php">添加商品</a></li>
                    <li><a href="listPro.php">商品列表</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-tags"></i>
                    <span>分类管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="addCate.html">添加分类</a></li>
                    <li><a href="listCate.php">分类列表</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>表单</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="form-showcase.html">基本表单</a></li>
                    <li><a href="form-wizard.html">步骤表单</a></li>
                </ul>
            </li>
            <li>
                <a href="listProimages.php">
                    <i class="icon-picture"></i>
                    <span>商品相册</span>
                </a>
            </li>
            <li>
                <a href="calendar.html">
                    <i class="icon-calendar-empty"></i>
                    <span>日历事件管理</span>
                </a>
            </li>
            <li>
                <a href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>表格</span>
                </a>
            </li>
            
            <li>
                <a href="personal-info.html">
                    <i class="icon-cog"></i>
                    <span>我的信息</span>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="gallery">
            <div class="row-fluid header">
                <h3>商品列表</h3>                    
            </div>
        	<div class="details">
        	    <div class="details_operation clearfix">
        	        <div class="bui_select">
        	            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
        	        </div>
        	        <div class="fr">
        	            <div class="text">
        	                <span>商品价格：</span>
        	                <div class="bui_select">
        	                    <select id="" class="select" onchange="change(this.value)">
        	                    	<option>-请选择-</option>
        	                        <option value="iPrice asc" >由低到高</option>
        	                        <option value="iPrice desc">由高到底</option>
        	                    </select>
        	                </div>
        	            </div>
        	            <div class="text">
        	                <span>上架时间：</span>
        	                <div class="bui_select">
        	                 <select id="" class="select" onchange="change(this.value)">
        	                 	<option>-请选择-</option>
        	                        <option value="pubTime desc" >最新发布</option>
        	                        <option value="pubTime asc">历史发布</option>
        	                    </select>
        	                </div>
        	            </div>
        	            <div class="text">
        	                <span>搜索</span>
        	                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
        	            </div>
        	        </div>
        	    </div>
        	    <!--表格-->
        	    <table class="table" cellspacing="0" cellpadding="0">
        	        <thead>
        	            <tr>
        	                <th width="10%">编号</th>
        	                <th width="20%">商品名称</th>
        	                <th width="10%">商品分类</th>
        	                <th width="10%">是否上架</th>
                            <th width="10%">是否热销</th>
        	                <th width="15%">上架时间</th>
        	                <th width="10%">价格</th>
        	                <th>操作</th>
        	            </tr>
        	        </thead>
        	        <tbody>
        	        <?php foreach($rows as $row):?>
        	            <tr>
        	                <!--这里的id和for里面的c1 需要循环出来-->
        	                <td><label for="c1" class="label"><?php echo $row['id'];?></label></td>
        	                <td><?php echo $row['pName']; ?></td>
        	                <td><?php echo $row['cName'];?></td>
        	                <td>
        	                	<?php echo $row['isShow']==1?"热销":"新";?>
        	                </td>
        	                <td><?php echo date("Y-m-d H:i:s",$row['pubTime']);?></td>
        	                <td><?php echo $row['iPrice'];?>元</td>
        	                <td align="center">
                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['pName'];?>')"><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['id'];?>)">
	                            <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
	                        	<table class="table" cellspacing="0" cellpadding="0">
	                        		<tr>
	                        			<td width="20%" align="right">商品名称</td>
	                        			<td><?php echo $row['pName'];?></td>
	                        		</tr>
	                        		<tr>
	                        			<td width="20%"  align="right">商品类别</td>
	                        			<td><?php echo $row['cName'];?></td>
	                        		</tr>
	                        		<tr>
	                        			<td width="20%"  align="right">商品货号</td>
	                        			<td><?php echo $row['pSn'];?></td>
	                        		</tr>
	                        		<tr>
	                        			<td width="20%"  align="right">商品数量</td>
	                        			<td><?php echo $row['pNum'];?></td>
	                        		</tr>
	                        		<tr>
	                        			<td  width="20%"  align="right">商品价格</td>
	                        			<td><?php echo $row['mPrice'];?></td>
	                        		</tr>
	                        		<tr>
	                        			<td  width="20%"  align="right">平台价格</td>
	                        			<td><?php echo $row['iPrice'];?></td>
	                        		</tr>
	                        		<tr>
	                        			<td width="20%"  align="right">商品图片</td>
	                        			<td>
	                        			<?php 
	                        			$proImgs=getAllImgByProId($row['id']);
	                        			foreach($proImgs as $img):
	                        			?>
	                        			<img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
	                        			<?php endforeach;?>
	                        			</td>
	                        		</tr>
	                        		<tr>
	                        			<td width="20%"  align="right">是否上架</td>
	                        			<td>
	                        				<?php echo $row['isShow']==1?"上架":"下架";?>
	                        			</td>
	                        		</tr>
	                        		<tr>
	                        			<td width="20%"  align="right">是否热卖</td>
	                        			<td>
	                        				<?php echo $row['isHot']==1?"热卖":"正常";?>
	                        			</td>
	                        		</tr>
	                        	</table>
	                        	<span style="display:block;width:80%; ">
	                        	商品描述<br/>
	                        	<?php echo $row['pDesc'];?>
	                        	</span>
	                        </div>
        	                </td>
        	            </tr>
        	           <?php  endforeach;?>
        	           <?php if($totalRows>$pageSize):?>
        	            <tr>
        	            	<td colspan="7"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
        	            </tr>
        	            <?php endif;?>
        	        </tbody>
        	    </table>
        	</div>
        </div>
    </div>
</div>
    <!-- end main container -->


	<!-- this page scripts -->
    <script src="js/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
    <script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
	}
</script>
</body>
</html>
