<?php
class SignupModel extends Model{
	//报名信息模型类
	public function baoming(){
		if(IS_POST){
			$signup = M("Signup");
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize  = 3145728 ;
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath =  './Public/image/signup/';
			if(!$upload->upload()) {
				$this->error($upload->getErrorMsg());
			}else{
				$info =  $upload->getUploadFileInfo();
			}
			$data['title'] = I('post.title');
			$data['tel'] = I('post.tel');
			$data['qq'] = I('post.qq');
			$data['sex'] = I('post.sex');
			$data['introduce'] = I('post.introduce');
			$data['photo'] = './Public/image/signup/'.$info[0]['savename'];
			$data['time'] = time();
			$data['vote'] = I('post.vote');
			$data['visits'] = I('post.visits');
			if(empty($data['tltle'])&&empty($data['tel'])){
				return false;
				exit();
			}else{
				$result = $signup->add($data);
				return $result;
			}
		}
	}
}
?>