<?php
//https://www.vnil.cn后台生成的appkey
$appkey = '';

$config	= [
	'appkey'	=> $appkey,
	'domain'	=> 'https://api.vnil.cn',
];

$vnil = new Vnil($config);

//	生成短网址
print_r($vnil->shorturl('https://www.vnil.cn', 'sina'));

//	微信检测
//print_r($vnil->checkWx('https://www.vnil.cn'));

//	QQ域名检测
//print_r($vnil->checkqq('https://www.vnil.cn'));

//	备案信息查询
//print_r($vnil->icpInfo('https://www.baidu.com'));

//	用户信息查询
//print_r($vnil->getUserInfo('https://www.baidu.com'));


class Vnil {
	
	private $appkey;
	private $domain;
	
	public function __construct($config = []) {
		$this->appkey = $config['appkey'];
		$this->domain = $config['domain'];
	}
	
	/**
	 * 生成短地址
	 * @param string $url 长地址
	 * @param string $type 类型
	 */
	public function shorturl($url = '', $type = 'sina') {
		$param	= [
			'appkey'	=> $this->appkey,
			'type'		=> $type,
			'url'		=> $url
		];
		$apiUrl	= $this->domain.'/api/shorturl/create';	
		return self::curlGet($apiUrl, $param);
	}
	
	/**
	 * 微信域名检测
	 * @param string $domain 域名地址
	 */
	public function checkWx($domain = '') {
		$param	= [
			'appkey'	=> $this->appkey,
			'domain'	=> $domain
		];
		$apiUrl	= $this->domain.'/api/check/deal/wx';	
		return self::curlGet($apiUrl, $param);
	}
	
	/**
	 * QQ域名检测
	 * @param string $domain 域名地址
	 */
	public function checkqq($domain = '') {
		$param	= [
			'appkey'	=> $this->appkey,
			'domain'	=> $domain
		];
		$apiUrl	= $this->domain.'/api/check/deal/qq';	
		return self::curlGet($apiUrl, $param);
	}
	
	/**
	 * 域名备案信息查询
	 * @param string $domain 域名地址
	 */
	public function icpInfo($domain = '') {
		$param	= [
			'appkey'	=> $this->appkey,
			'domain'	=> $domain
		];
		$apiUrl	= $this->domain.'/api/icp/deal';	
		return self::curlGet($apiUrl, $param);
	}
	
	/**
	 * 获取用户账户信息
	 */
	public function getUserInfo() {
		$param	= [
			'appkey'	=> $this->appkey,
		];
		$apiUrl	= $this->domain.'/api/user/getInfo';	
		return self::curlGet($apiUrl, $param);
	}
	
	/**
	 * curl get
	 */
	private static function curlGet($apiUrl = '', $param = []) {
	
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
	
}

