<?php

/**
 * 微信接口类
 * Class wx
 */
class wx{
	private $appid;
	private $appsecret;

	/**
	 * 初始化appid appsecret
	 * wx constructor.
	 * @param $appid
	 * @param $appsecret
	 */
	public function __construct($appid,$appsecret){
		if(!isset($appid) && !isset($appsecret)){
			return false;
		}else{
			$this->appid = $appid;
			$this->appsecret = $appsecret;
		}
	}
	
	//构造获取access_token的url
	public function getAccessToken(){
		$urlObj['grant_type'] = 'client_credential';
		$urlObj['appid'] = $this->appid;
		$urlObj['secret'] = $this->appsecret;
		$urlParam = $this->urlParam($urlObj);
		return $url = "https://api.weixin.qq.com/cgi-bin/token?".$urlParam;
	}
	//构造获取code的url
	public function getCodeUrl($redirectUrl){
		$urlObj['appid'] = $this->appid;
		$urlObj['redirect_url'] = $redirectUrl;
		$urlObj['response_type'] = 'code';
		$urlObj['scope'] = 'snsapi_base';
		$urlObj['state'] = 'STATE'.'#wechat_redirect';
		$urlParam = $this->urlParam($urlObj);
		return $url = "https://open.weixin.qq.com/connect/oauth2/authorize?".$urlParam;
	}
	//获取access_token和code后跳转的url
	public function getOpenIdUrl($code){
		$urlObj["appid"] = $this->appid;
		$urlObj["secret"] = $this->appsecret;
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$urlParam = $this->urlParam($urlObj);
		return $url = "https://api.weixin.qq.com/sns/oauth2/access_token?".$urlParam;
	}
	//通过code获取openid
	public function getOpenId($url){
		if(empty($_GET['code'])){
			header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_base&state=123&connect_redirect=1#wechat_redirect');
			// state 可以传递表单提交过来的数据
			/*
			$state = json_encode(array(
			
			));
			$url = str_replace("STATE",$state,$url);
			*/
			//Header("Location: $url");
		}else{
			$code = $_GET['code'];
			$state = $_GET['state'];
			return $url = $this->getOpenIdUrl($code);
		}
	}
	//构造获取用户基本信息的URL
	public function getUserInfoUrl($access_token,$openid){
		$urlObj['access_token'] = $access_token;
		$urlObj['openid'] = $openid;
		$urlObj['lang'] = 'zh_CN';
		$urlParam = $this->urlParam($urlObj);
		return $url = 'https://api.weixin.qq.com/cgi-bin/user/info?'.$urlParam;
	}
	//构造获取关注用户列表的URL
	public function getUserListUrl($access_token,$next_openid=''){
		$urlObj['access_token'] = $access_token;
		$urlObj['next_openid'] = $next_openid;
		$urlParam = $this->urlParam($urlObj);
		return $url = 'https://api.weixin.qq.com/cgi-bin/user/get?'.$urlParam;
	}
	//构造获取jsapi_ticket的URL
	public function getTicketUrl($access_token){
		$urlObj['access_token'] = $access_token;
		$urlObj['type'] = 'jsapi';
		$urlParam = $this->urlParam($urlObj);
		return $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?'.$urlParam;
	}
	//获取signature签名算法
	public function getSignature($jsapi_ticket,$noncestr,$timestamp,$url){
		$urlObj['jsapi_ticket'] = $jsapi_ticket;
		$urlObj['noncestr'] = $noncestr;
		$urlObj['timestamp'] = $timestamp;
		$urlObj['url'] = $url;
		$string = $this->urlParam($urlObj);
		return sha1($string);
	}
	//构造设置用户备注名的url
	public function remarkUrl($access_token){
		$urlObj['access_token'] = $access_token;
		$urlParam = $this->urlParam($urlObj);
		return $url = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?'.$urlParam;
	}
	//拼接URL字符串
	public function urlParam($urlObj){
		$buff = '';
		foreach($urlObj as $k => $v){
			if($k != 'sign'){
				$buff .= $k .'='. $v .'&';
			}
		}
		$buff = trim($buff,"&");
		return $buff;
	}
	//通过cURL获取数据
	public function getData($url,$post = false,$post_data = null){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if($post == true){
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
		}
		$res = curl_exec($ch);
		curl_close($ch);
		$data = json_decode($res,true);
		return $data;
	}
}
?>