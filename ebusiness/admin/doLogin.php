<?php 
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);//addslashes()函数在指定的预定义字符前添加反斜杠.这些预定义字符是:单引号 ('),双引号 ("),反斜杠 (\),null
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if($verify==$verify1){
	$sql="select * from admin where username='{$username}' and password='{$password}'";
	$row=checkAdmin($sql);
	if($row){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		alertMes("登陆成功","index.php");
	}else{
		alertMes("账户或密码错误，请重新登陆","login.php");
	}
}else{
	alertMes("验证码错误","login.php");
}
?>