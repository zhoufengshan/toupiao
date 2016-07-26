<?php
class AdminModel extends Model{
	//定义一个自动完成的属性
	protected $_auto=array(
		array("password","md5",3,"function"),
		array("reg_time","get_time",1,"callback"),
	);
	//自动验证的属性
	protected $_validate=array(
		array("username","require","用户名不能为空",1),
		array("password","require","密码不能为空",1),
		array("repassword","require","确认密码不能为空",1),
		array("username","","用户名重复",1,"unique"),
		array("repassword","password","两次密码不一致",1,"confirm")
	);

	//获得当前时间的方法
	protected function get_time(){
		return date("Y-m-d H:i:s");
	}
}
?>