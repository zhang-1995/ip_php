<?php
require 'Ip2Region.php';

$ip2region = new Ip2Region();

// 所允许的网站获取ip
$url_network = ['loacl.phpip.ion'];
foreach ($url_network as $key => $value) {
	if ($value == $_SERVER['SERVER_NAME']) {
		$ip = '113.68.179.60';
		// echo PHP_EOL;
		// echo "查询IP：{$ip}" . PHP_EOL;
		// $info = $ip2region->btreeSearch($ip);
		// var_export($info);
		// echo "<hr/>";
		// echo PHP_EOL;
		$info = $ip2region->memorySearch($ip);
		$array_dz = explode('|',$info['region']);
		echo 'var ccc = {"city_id":"'.$info['city_id'].'","region":"'.$array_dz['3'].'""}';
		// echo PHP_EOL;
		// echo "<hr/>";
		// echo $_SERVER['SERVER_NAME'];
		break;
	}
}



function getRealIp()
{
  $ip=false;
  if(!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
  }
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
    if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
    for ($i = 0; $i < count($ips); $i++) {
      if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
        $ip = $ips[$i];
        break;
      }
    }
  }
  return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

// $ip = '117.136.41.70';
// echo PHP_EOL;
// echo "查询IP：{$ip}" . PHP_EOL;
// $info = $ip2region->btreeSearch($ip);
// var_export($info);
// echo "<hr/>";
// echo PHP_EOL;
// $info = $ip2region->memorySearch($ip);
// var_export($info);
// echo PHP_EOL;
// echo "<hr/>";
// echo $_SERVER['SERVER_NAME'];
// array (
//     'city_id' => 2163,
//     'region' => '中国|华南|广东省|深圳市|鹏博士',
// )