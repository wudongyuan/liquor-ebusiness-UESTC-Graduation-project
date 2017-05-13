<?php
require_once'../include.php';
$user=fetchOne("select * from user where username = '$_SESSION[username]'");
$address=fetchOne("select * from address where userid = $user[id]");
$userid = $user['id'];
$addressid = $address['id'];
// $deliverymethod = $_POST['deliverymethod'];

$de_json = json_decode($_COOKIE['cart'],TRUE);
$count_json = count($de_json);
// echo $de_json[0]['title'];
for ($i = 0; $i < $count_json; $i++)
   {
   	  $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
	  $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
      $array = array(
						'userid' => $userid,
						'orderSn' => $orderSn,
						'addressid' => $addressid,
						'thumbnail' => $de_json[$i]['thumbnail'],
						'proid' => $de_json[$i]['id'],
				        'proname' => $de_json[$i]['title'],
				        'totalprice' => $de_json[$i]['price'],
				        'amount' => $de_json[$i]['qty'],
						// 'deliverymethod' => $deliverymethod,
                        'createtime' => time());
      $keys="`".join("`,`",array_keys($array))."`";
      $vals="'".join("','",array_values($array))."'";
      $sql="INSERT INTO `order`($keys) VALUES({$vals})";
      mysql_query($sql);
      if($i == $count_json-1){
	      alertMes("下单成功","checkout.php");
      }  
    }
?>