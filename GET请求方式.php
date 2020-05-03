<?php
//后台生成的appkey
$appkey = '';

//	生成短网址
$type	= 'sina';
$url	= 'https://www.vnil.cn';
$apiUrl	= 'https://api.vnil.cn/api/shorturl/create';

$param	= [
	'appkey'	=> $appkey,
	'type'		=> $type,
	'url'		=> $url
];

print_r(curlGet($apiUrl, $param));


//	微信域名检测
$domain	= 'https://www.vnil.cn';
$apiUrl	= 'https://api.vnil.cn/api/check/deal/wx';

$param	= [
	'appkey'	=> $appkey,
	'domain'	=> $domain
];

print_r(curlGet($apiUrl, $param));


// QQ域名检测
$domain	= 'https://www.vnil.cn';
$apiUrl	= 'https://api.vnil.cn/api/check/deal/qq';

$param	= [
	'appkey'	=> $appkey,
	'domain'	=> $domain
];

print_r(curlGet($apiUrl, $param));


//	域名备案查询
$apiUrl = 'https://api.vnil.cn/api/icp/deal';
$domain	= 'https://www.baidu.com';

$param	= [
	'appkey'	=> $appkey,
	'domain'	=> $domain
];

print_r(curlGet($apiUrl, $param));



function curlGet($apiUrl = '', $param = []) {
	
	$apiUrl = $apiUrl. '?' . http_build_query($param);
	
	$ch = curl_init();
	curl_setopt	( $ch, CURLOPT_URL, $apiUrl );
	curl_setopt ( $ch, CURLOPT_ENCODING, "gzip, deflate,sdch" );
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_MAXREDIRS, 5 );
	curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 ); 
	
	$content = curl_exec( $ch );
	curl_close ( $ch );
	
	return $content;
}
