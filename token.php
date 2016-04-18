<?php
$mmc=memccache_init()；//初始化缓存
$token=memcache_get($mmc,"token");
if(empty($token))//判断是否为空，如为空则重新获取token
{
$appid="wxc9f0a3ab871c467e";//填写AppID

$secret="ea27f90ae34175d7e84d3baea1433e98 ";//填写Secert
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//以文件流方式输出
$a=curl_exec($ch);//将文件保存到变量$a
$strjson=json_decode($a);//JSON解析
$access_token = $strjson->access_token;//获取access_token
memcache_set($mmc,"token",$access_token,0,7100);//过期时间为7100秒
$token=memcache_get($mmc,"token");获取token
echo “$token”;
}
?>