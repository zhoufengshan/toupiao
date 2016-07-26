<?php
header("Content-type:text/html;charset=utf-8");
class IndexAction extends Action {
	public function __construct(){
		parent::__construct();
		$deny=array("login","dologin");
		$action=ACTION_NAME;
		if(!in_array($action,$deny)){
			if(empty($_SESSION['uid'])||empty($_SESSION['username'])){
				$this->redirect('Index/login');
			}
		}
	}
	public function login(){
		$this->display();
	}
	public function dologin(){
		if(IS_POST){
			$username = addslashes(trim($_POST['username']));
			$password = md5(addslashes(trim($_POST['password'])));
			$User = M("Admin");
			$result = $User->where("username = '{$username}' AND password = '{$password}'")->find();
			if(!empty($result)){
				$data['logintime'] = time();
				$User->where("id = '{$result['id']}'")->setField($data);
				session('uid',$result['id']);
				session('username',$result['username']);
				session('root',$result['root']);
				$this->success("登录成功",U("Index/imgcarous"));
			}else{
				$this->error("用户名或密码错误",U("Index/login"));
			}
		}
	}
	public function logout(){
		session("uid",null);
		session("username",null);
		$this->success("退出成功！",U("Index/login"));
	}
	public function user(){
		$name=session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function adduser(){
		$suser = $_SESSION['username'];
		$suid = $_SESSION['uid'];
		$user = M("Admin");
		$sadmin = $user->where("id = '{$suid}' AND username = '{$suser}'")->find();
		//var_dump($sadmin);
		if($sadmin['root'] !== '1'){
			$this->error("您不是超级管理员，无权添加！");
		}else{
			if(empty($_POST['username'])||empty($_POST['password'])){
				$this->error("用户名和密码不能为空");
			}else if($_POST['password']!==$_POST['repassword']){
				$this->error("两次密码输入不一致");
			}else{
				$data['username'] = addslashes(trim($_POST['username']));
				$data['password'] = addslashes(md5(trim($_POST['password'])));
				$data['regtime'] = time();
				$data['root'] = '0';
				$result = $user->add($data);
				if($result){
					$this->success("添加管理员成功");
				}else{
					$this->error("添加管理员失败");
				}
			}
		}
	}
	public function imgcarous(){
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function addimgcarous(){
		$User = M("Imgcarous");
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->maxSize  = 3145728 ;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
		$upload->savePath =  './Public/image/imgcarous/';
		if(!$upload->upload()) {
			$this->error($upload->getErrorMsg());
		}else{
			$info =  $upload->getUploadFileInfo();
		}
		$data['photo'] = $info[0]['savename'];
		$data['url'] = $_POST['url'];
		$data['title'] = $_POST['title'];
		$result = $User->add($data);
		if($result){
			$this->success("上传成功！",U("Index/showimgcarous"));
		}else{
			$this->error("上传失败！",U("Index/showimgcarous"));
		}
	}
	public function showimgcarous(){
		$User = M("Imgcarous");
		$result = $User->select();
		$this->assign("result",$result);
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function delimgcarous(){
		$id = $_GET['id'];
		$User = M("Imgcarous");
		$photo = $User->where("id = '{$id}'")->find();
		$path = "./Public/image/imgcarous/".$photo['photo'];
		unlink($path);
		$result = $User->where("id = '{$id}'")->delete();
		if($result){
			$this->success("删除成功！",U("Index/showimgcarous"));
		}else{
			$this->error("删除失败！",U("Index/showimgcarous"));
		}
	}
	public function config(){
		$config = M("Config");
		$info = $config->where("id = 1")->find();
		$this->assign("info",$info);
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function voteconfig(){
		if(IS_POST){
			$config = M("Config");
			$data['votetitle'] = I('post.votetitle');
			$data['bmstarttime'] = I('post.bmstarttime');
			$data['bmendtime'] = I('post.bmendtime');
			$data['votestarttime'] = I('post.votestarttime');
			$data['voteendtime'] = I('post.voteendtime');
			$data['pagetitle'] = I('post.pagetitle');
			$data['pagedec'] = I('post.pagedec');
			$data['activeabout'] = $_POST['activeabout'];
			$data['canyu'] = $_POST['canyu'];
			$data['flow'] = $_POST['flow'];
			$data['prize'] = $_POST['prize'];
			$data['voting'] = $_POST['voting'];
			$data['isshowdes'] = $_POST['isshowdes'];
			$data['isshowcanyu'] = $_POST['isshowcanyu'];
			$data['isshowflow'] = $_POST['isshowflow'];
			$data['isshowprice'] = $_POST['isshowprice'];
			$data['tel'] = I('post.tel');
			$data['visits'] = I('post.visits');
			$data['iptimes'] = I('post.iptimes');
			$data['everydayvote'] = I('post.everydayvote');
			$data['isfollow'] = I('post.isfollow');
			$data['ipaddress'] = I('post.ipaddress');
			$result = $config->where("id = 1")->setField($data);
			if($result){
				$this->success("成功修改配置信息");
			}else{
				$this->error("修改失败");
			}
		}
	}
	public function bm(){
		$bm = D("Signup");
		$bm->baoming();
	}
	public function signup(){
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function addsignup(){
		$sign = D("Signup");
		$info = $sign->baoming();
		if($info){
			$this->success("报名成功");
		}else{
			$this->error("报名失败");
		}
		$this->display();
	}
	public function showsignup(){
		///sleep(3);
		$signup = M("Signup");
		import('ORG.Util.Page');
		$count      = $signup->count();
		$Page       = new Page($count,10);
		$Page ->setConfig("header","条数据");
		$Page ->setConfig("theme","%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %nextPage% %end% %downPage% ");
		$show       = $Page->show();
		$result = $signup->order("time asc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$sum = $signup->sum('vote');
		$this->assign("sum",$sum);
		$this->assign("show",$show);
		$this->assign("result",$result);
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function showvote(){
		$id = $_GET['id'];
		$vote = M("Vote");
		$result = $vote->where("get_id = '{$id}'")->select();
		$this->assign("result",$result);
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function delvote(){
		$id = $_GET['id'];
		$vote = M("Vote");
		$result = $vote->where("id = '{$id}'")->delete();
		if($result){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function delsignup(){
		$id = $_GET['id'];
		$signup = M("Signup");
		$result = $signup->where("id = '{$id}'")->delete();
		if($result){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function wxconfig(){
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function addwxconfig(){
		if(IS_POST){
			$wxconfig = M("Wxconfig");
			$data['appid'] = I('post.appid');
			$data['appsecret'] = I('post.appsecret');
			$data['mchid'] = I('post.mchid');
			$data['mchkey'] = I('post.key');
			if(empty($_POST['appid'])||empty($_POST['appsecret'])){
				$this->error("APPID和APPSECRET不能为空");
			}else{
				$result = $wxconfig->where("id = 1")->setField($data);
				if($result){
					$this->success("配置成功");
				}else{
					$this->error("配置失败");
				}
			}
		}
	}
	public function vote(){
		$vt = M("Vote");
		import('ORG.Util.Page');
		$count      = $vt->count();
		$Page       = new Page($count,10);
		$Page ->setConfig("header","条数据");
		$Page ->setConfig("theme","%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %nextPage% %end% %downPage% ");
		$show       = $Page->show();
		$result = $vt->order("time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("result",$result);
		$this->assign("show",$show);
		$name = session("username");
		$this->assign("name",$name);
		$this->display();
	}
	public function price(){
		$price = M("Price");
		$res = $price->where("id = 1")->find($data);
		$this->assign("res",$res);
		$this->display();
	}
	public function addjp(){
		if(IS_POST){
			$price = M("Price");
			$data['company'] = $_POST['company'];
			$data['thankinfo'] = $_POST['thankinfo'];
			$data['price'] = $_POST['price'];
			$data['info1'] = $_POST['info1'];
			$data['info2'] = $_POST['info2'];
			$data['info3'] = $_POST['info3'];
			$data['info4'] = $_POST['info4'];
			$res = $price->where("id = 1")->setField($data);
			if($res){
				$this->success("修改成功");
			}else{
				$this->error("修改失败");
			}
		}
	}
	public function userlist(){
		if($_SESSION['root'] !== 1){
			$path = "none.js";
			$this->assign('path',$path);
		}
		$user = M('Admin');
		$result = $user->where('root = 0')->select();
		/* var_dump($res); */
		$this->assign('result',$result);
		$this->display();
	}
	public function deluser(){
		$id = $_GET['id'];
		$user = M('Admin');
		$res = $user->where("id = '{$id}'")->limit(1)->delete();
		if($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function shareinfo(){
		$share = M("Share");
		$res = $share->where("id = 1")->find();
		$this->assign('res',$res);
		$this->display();
	}
	public function editshare(){
		if(IS_POST){
			$share = M("Share");
			$data['title'] = $_POST['title'];
			$data['des'] = $_POST['des'];
			$data['shareimg'] = $_POST['shareimg'];
			$res = $share->where("id = 1")->setField($data);
			if($res){
				$this->success("保存成功");
			}else{
				$this->error("保存失败");
			}
		}
	}
}