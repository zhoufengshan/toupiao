<?php
header("Content-type:text/html;charset=utf-8");
class IndexAction extends Action {
	public function index(){
		$wxconfig = M("Wxconfig");
		$config = $wxconfig->where("id = 1")->find();
		$appid = $config['appid'];
		$appsecret = $config['appsecret'];
		import('ORG.Wx.Wx');
		$wx = new wx($appid,$appsecret);
		$cache = M("Cache");
		$ca = $cache->where("id = 1")->find();
		date_default_timezone_set("Asia/shanghai");
		$time = time();
		/*
		$redis = new Redis();
		$redis->connect("127.0.0.1",6379);
		$redis->select(2);
		if(!($redis->exists("access_token"))){
			$access_token = getData($wx->getAccessToken());
			$redis->setex("access_token",7000,$access_token['access_token']);
			$access_token = $redis->get("access_token");
		}else{
			$access_token = $redis->get("access_token");
		}
		*/
		if($time>$ca['expire_time']){
			$access_token = $wx->getData($wx->getAccessToken());
			$data['access_token'] = $access_token['access_token'];
			$data['expire_time'] = $time+7000;
			$cache->where("id = 1")->setField($data);
			$access_token = $access_token['access_token'];
		}else{
			$access_token = $ca['access_token'];
		}
		if($time>$ca['ticket_time']){
			$jsapi_ticket = $wx->getData($wx->getTicketUrl($access_token));
			$data['jsapi_ticket'] = $jsapi_ticket['ticket'];
			$data['ticket_time'] = $time+7000;
			$cache->where("id = 1")->setField($data);
			$ticket = $jsapi_ticket['ticket'];
		}else{
			$ticket = $ca['jsapi_ticket'];
		}
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
		//获取用户对公众号的openid
		if(!isset($_COOKIE['openid'])){
			$openid = $wx->getData($wx->getOpenId($url));
			cookie('openid',$openid['openid'],500);
			$openid = cookie('openid');
		}else{
			$openid = cookie('openid');
		}
		$userList = $wx->getData($wx->getUserListUrl($access_token));
		$list = $userList['data']['openid'];
		if(in_array($openid,$list)){
			$isfollow = 'ok';
		}else{
			$isfollow = 'no';
		}
		$userinfo = $wx->getData($wx->getUserInfoUrl($access_token,$openid));
		$nickname = $userinfo['nickname'];
		cookie('openid',$openid,600);
		cookie('isfollow',$isfollow,600);
		cookie('nickname',$nickname,600);
		echo "<script>";
		echo "window.location.href='http://gtoupiao.duapp.com/index.php/Index/jieshao.html'";
		echo "</script>";
	}
	public function baoming(){
		$this->display();
	}
	public function signup(){
		if(IS_POST){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 10*1024*1024 ;
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath =  './Public/image/signup/';
			$upload->thumb = true;
			$upload->thumbMaxWidth = '118';
			$upload->thumbMaxHeight = '118';
			if(!$upload->upload()) {
				echo "<script>alert('报名失败');</script>";
				echo "<script>history.back(1);</script>";
				exit();
			}else{
				$info =  $upload->getUploadFileInfo();
			}
			$signup = M("Signup");
			$data['photo'] = $info[0]['savename'];
			$data['thumb'] = 'thumb_'.$info[0]['savename'];
			$data['title'] = I('post.name');
			$data['tel'] = I('post.tel');
			$data['qq'] = I('post.qq');
			$data['sex'] = I("post.sex");
			$data['introduce'] = I('post.introduce');
			$data['time'] = time();
			$result = $signup->add($data);
			if($result){
				echo "<script>alert('报名成功');</script>";
				echo "<script>window.location.href='http://gtoupiao.duapp.com/index.php/Index/index.html'</script>";
			}else{
				echo "<script>alert('报名失败');</script>";
				echo "<script>history.back(1);</script>";
			}
		}
	}
	public function jieshao(){
		if(!isset($_COOKIE['openid'])){
			echo "<script>window.location.href='http://gtoupiao.duapp.com/index.php/Index/index.html'</script>";
			exit();
		}
		$cache = M("Cache");
		$ca = $cache->where("id = 1")->find();
		date_default_timezone_set("Asia/shanghai");
		$time = time();
		$wxconfig = M("Wxconfig");
		$config = $wxconfig->where("id = 1")->find();
		$appid = $config['appid'];
		$appsecret = $config['appsecret'];
		import('ORG.Wx.Wx');
		$wx = new wx($appid,$appsecret);
		if($time>$ca['expire_time']){
			$access_token = $wx->getData($wx->getAccessToken());
			$data['access_token'] = $access_token['access_token'];
			$data['expire_time'] = $time+7000;
			$cache->where("id = 1")->setField($data);
			$access_token = $access_token['access_token'];
		}else{
			$access_token = $ca['access_token'];
		}
		if($time>$ca['ticket_time']){
			$jsapi_ticket = $wx->getData($wx->getTicketUrl($access_token));
			$data['jsapi_ticket'] = $jsapi_ticket['ticket'];
			$data['ticket_time'] = $time+7000;
			$cache->where("id = 1")->setField($data);
			$ticket = $jsapi_ticket['ticket'];
		}else{
			$ticket = $ca['jsapi_ticket'];
		}
		$noncestr = substr(str_shuffle(join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ), range ( 0, 9 ) ) ) ),0,16);
		$timestamp = time();
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
		$signature = $wx->getSignature($ticket,$noncestr,$timestamp,$url);
		$this->assign("noncestr",$noncestr);
		$this->assign("appid",$appid);
		$this->assign("timestamp",$timestamp);
		$this->assign("signature",$signature);
		//dingbulunbo
		$imgcarous = M("Imgcarous");
		$img = $imgcarous->limit(3)->select();
		//jieshaoxinxi
		$config = M("Config");
		$result = $config->where("id = 1")->find();
		//toupiaoliang
		$signup = M("Signup");
		$canyu = $signup->count();
		$zsignup = $signup->sum("vote");
		//wodetoupiaojilu
		$openid = $_COOKIE['openid'];
		$vote = M("Vote");
		$jilu = $vote->where("openid = '{$openid}'")->select();
		//paihangbang
		$paihang = $signup->field("vote,title")->order("vote desc")->select();
		//quanbuxuanshou
		$qbxs = $signup->order("id asc")->limit(15)->select();
		//zuixinxuanshou
		$zxxs = $signup->order("time desc")->limit(15)->select();
		//renqixuanshou
		$rqxs = $signup->order("vote desc")->limit(15)->select();
		$this->assign("rqxs",$rqxs);
		$this->assign("zxxs",$zxxs);
		$price = M("Price");
		$price = $price->where("id = 1")->find();
		$this->assign("price",$price);
		$ip = get_client_ip();
		$this->assign("ip",$ip);
		$this->assign("openid",$openid);
		$isfollow = $_COOKIE['isfollow'];
		$this->assign("isfollow",$isfollow);
		$this->assign("qbxs",$qbxs);
		$this->assign("paihang",$paihang);
		$this->assign("jilu",$jilu);
		$this->assign("zsignup",$zsignup);
		$this->assign("canyu",$canyu);
		$this->assign("result",$result);
		$this->assign("img",$img);
		$share = M("Share");
		$shareinfo = $share->where("id = 1")->find();
		$this->assign("shareinfo",$shareinfo);
		$this->display();
	}
	public function jiazai(){
		$ci = $_POST['ci'];
		$sign = M("Signup");
		$cont = $sign->count();
		$max = $sign->max();
		$res = $sign->limit($ci,1)->select();
		echo $res = json_encode($res);
	}
	public function zx(){
		$ci = $_POST['ci'];
		$sign = M("Signup");
		$cont = $sign->count();
		$max = $sign->max();
		$res = $sign->order("time desc")->limit($ci,15)->select();
		echo $res = json_encode($res);
	}
	public function rq(){
		$ci = $_POST['ci'];
		$sign = M("Signup");
		$cont = $sign->count();
		$max = $sign->max();
		$res = $sign->order("vote desc")->limit($ci,15)->select();
		echo $res = json_encode($res);
	}
	public function search(){
		$signup = M("Signup");
		$zxxs = $signup->order("time desc")->limit(10)->select();
		$this->assign("zxxs",$zxxs);
		$rqxs = $signup->order("vote desc")->limit(10)->select();
		$this->assign("rqxs",$rqxs);
		$price = M("Price");
		$price = $price->where("id = 1")->find();
		$this->assign("price",$price);
		$imgcarous = M("Imgcarous");
		$img = $imgcarous->limit(3)->select();
		$config = M("Config");
		$result = $config->where("id = 1")->find();
		$con = $_GET['con'];
		$signup = M("Signup");
		$result = $signup->query("select * from `tp_signup` where `id` like '%{$con}%' or `title` like '%{$con}%'");
		$paihang = $signup->field("vote,title")->order("vote desc")->select();
		$this->assign("result",$result);
		$this->assign("img",$img);
		$this->assign("paihang",$paihang);
		$this->assign("result",$result);
		$this->display();
	}
	public function show(){
		//dingbulunbo
		$ip = get_client_ip();
		$isfollow = $_COOKIE['isfollow'];
		$openid = $_COOKIE['openid'];
		$price = M("Price");
		$price = $price->where("id = 1")->find();
		$this->assign("price",$price);
		//$ip = '195.123.15.255';
		$this->assign("isfollow",$isfollow);
		$this->assign("ip",$ip);
		$this->assign("openid",$openid);
		$imgcarous = M("Imgcarous");
		$img = $imgcarous->limit(3)->select();
		$this->assign("img",$img);
		$config = M("Config");
		$result = $config->where("id = 1")->find();
		$this->assign("result",$result);
		$id = $_GET['id'];
		$signup = M("Signup");
		$res = $signup->where("id = '{$id}'")->find();
		$this->assign("res",$res);
		//当前排名
		$number = $signup->where("vote>'{$res['vote']}'")->count();
		$this->assign("number",$number+1);
		//排行榜
		$paihang = $signup->field("vote,title")->order("vote desc")->select();
		$this->assign("paihang",$paihang);
		$this->assign("id",$id);
		$config = M("Config");
		$config = $config->where("id = 1")->find();
		$this->assign("config",$config);
		$this->display();
	}
	public function weiguan(){
		$id = $_GET['id'];
		$signup = M("Signup");
		$weiguan = $signup->where("id = '{$id}'")->find();
		echo $weiguan['visits'];
		$data['visits'] = $weiguan['visits']+1;
		$signup->where("id = '{$id}'")->setField($data);
	}
	public function toupiao(){
		$ip = get_client_ip();
		//$id = $_POST['id'];
		$id = $_POST['id'];
		$openid = $_COOKIE['openid'];
		$title=$_POST['title'];
		$isfollow = $_COOKIE['isfollow'];
		//$ip = '54.67.189.255';
		import('ORG.Ip.IP');
		$cip = new IP();
		$get_ip = $cip->find($ip);
		$address = $get_ip[1];
		$config = M("Config");
		$res = $config->where("id = 1")->find();
		$tstime = strtotime($res['votestarttime']);
		$tetime = strtotime($res['voteendtime']);
		$vtime = time();
		$dtime = date("Y-m-d");
		$dtime = strtotime($dtime.'00:00:00');
		$ntime = date("Y-m-d",strtotime("+1day"));
		$ntime = strtotime($ntime.'00:00:00');
		$vote = M("vote");
		$xtip = $vote->where("time>'{$dtime}' and time<'{$ntime}' and ip = '{$ip}'")->count();
		
		if($vtime<$tstime){
			echo "投票还没开始";
			exit();
		}else if($vtime>$tetime){
			echo "投票时间已截止";
			exit();
		}
		if(empty($openid)){
			echo "投票失败,缺失参数";
			exit();
		}
		if($res['isfollow'] == 1){
			if($isfollow !== 'ok'){
				echo "你还没有关注公众账号，请先关注再参与！";
				exit();
			}
		}
		if($res['everydayvote']==1){
			$everydayvote = $vote->where("time>'{$dtime}' and time<'{$ntime}' and openid = '{$openid}'")->select();
			if($everydayvote !== null){
				echo "你今天已经投过票了";
				exit();
			}
		}else if($res['everydayvote']==0){
			$everydayvote = $vote->where("openid = '{$openid}'")->select();
			if($everydayvote !== null){
				echo "你已经投过票了";
				exit();
			}
		}		
		if(!empty($res['ipaddress'])){
			if(!strpos($res['ipaddress'],$address)){
				echo "地域限制，该活动只能在".$res['ipaddress']."地区参与！";
				exit();
			}
		}
		if($xtip >= $res['iptimes']){
			echo "同一IP今天投票已经超过限制，请明天再来!";
			exit();
		}
		$signup = M("Signup");
		$rs = $signup->where("id = '{$id}'")->find();
		$arr['vote'] = $rs['vote']+1;
		$signup->where("id = '{$id}'")->setField($arr);
		$data['openid'] = $openid;
		$data['time'] = time();
		$data['ip'] = $ip;
		$data['address'] = $address;
		$data['get_id'] = $id;
		$data['title'] = $title;
		//$data['nickname'] = $_COOKIE['nickname'];
		$vote->add($data);
		echo "投票成功";
	}
	public function bming(){
		$config = M("Config");
		$time = $config->where("id = 1")->find();
		$stime = strtotime($time['bmstarttime']);
		$etime = strtotime($time['bmendtime']);
		$dtime = time();
		if($dtime<$stime){
			echo 1;
			exit();
		}else if($dtime>$etime){
			echo 2;
			exit();
		}else{
			echo 3;
		}
	}
	public function ziliao(){
		$name = htmlspecialchars(addslashes($_POST['name']));
		$phone = htmlspecialchars(addslashes($_POST['phone']));
		$vote = M("Vote");
		$openid = $_COOKIE['openid'];
		$data['username'] = $name;
		$data['tel'] = $phone;
		$vote->where("openid = '{$openid}'")->setField($data);
		echo "ok";
	}
	public function visits(){
		$config = M("Config");
		$visits = $config->where("id = 1")->find();
		echo $visits['visits'];
		$data['visits'] = $visits['visits']+1;
		$config->where("id=1")->setField($data);
	}
	public function isshowdes(){
		$config = M('Config');
		$res = $config->where("id = 1")->find();
		echo $res['isshowdes'];
	}
	public function isshowcanyu(){
		$config = M('Config');
		$res = $config->where("id = 1")->find();
		echo $res['isshowcanyu'];
	}
	public function isshowflow(){
		$config = M('Config');
		$res = $config->where("id = 1")->find();
		echo $res['isshowflow'];
	}
	public function isshowprice(){
		$config = M('Config');
		$res = $config->where("id = 1")->find();
		echo $res['isshowprice'];
	}
}