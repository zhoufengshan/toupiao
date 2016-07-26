// JavaScript Document

$(function() {
    var msg_inter_handle, msg_timeout_handle;
    //提交信息表单提交出发事件
	
    $('#hongbaoform,#hongbaoform2').submit(function(eve) {
		console.log($(eve.target));
        eve.preventDefault(); //取消默认提交事件
        clearInterval(msg_inter_handle); //取消倒计时.重新开始
        clearInterval(msg_timeout_handle); //取消倒计时.重新开始
		
        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize() + '&dosubmit=',
            type: 'POST',
            beforeSend: function() {
                var i = 5;
                //console.log(this);

                if ($(eve.target).find('#hb_name').val() == '') {
                    $(".msg_tanchuang_show2").html('请输入姓名<br>' + i + '秒后自动关闭!');
                    msg_inter_handle = setInterval(function() {
                        if (i <= 1) {
                            i = 5;
                            clearInterval(msg_inter_handle);
                            $(".opacaity_0").hide();
                            return false;
                        }
                        $(".msg_tanchuang_show2").html('请输入姓名<br>' + (--i) + '秒后自动关闭!');
                    }, 1000);
                    $(".baoming_group").hide(); //隐藏正常提示
                    $(".msg_tanchuang_show2").show(); //显示错误提示
                    $(".opacaity_0").show(); //显示弹窗顶层框架div
                    return false;
                }
				
                if ($(eve.target).find('#hb_phone').val() == '') {
                    $(".msg_tanchuang_show2").html('请输入手机号<br>' + i + '秒后自动关闭!');
                    msg_inter_handle = setInterval(function() {
                        if (i <= 1) {
                            i = 5;
                            clearInterval(msg_inter_handle);
                            $(".opacaity_0").hide();
                            return false;
                        }
                        $(".msg_tanchuang_show2").html('请输入手机号<br>' + (--i) + '秒后自动关闭!');
                    }, 1000);
                    $(".baoming_group").hide(); //隐藏正常提示
                    $(".msg_tanchuang_show2").show(); //显示错误提示
                    $(".opacaity_0").show(); //显示弹窗顶层框架div
                    return false;
                }
				
				if (!$("#hb_phone").val().match(/^1[3|4|5|8|7][0-9]\d{4,8}$/)) {
                    $(".msg_tanchuang_show2").html('请输入正确的手机号<br>' + i + '秒后自动关闭!');
                    msg_inter_handle = setInterval(function() {
                        if (i <= 1) {
                            i = 5;
                            clearInterval(msg_inter_handle);
                            $(".opacaity_0").hide();
                            return false;
                        }
                        $(".msg_tanchuang_show2").html('请输入正确的手机号<br>' + (--i) + '秒后自动关闭!');
                    }, 1000);
                    $(".baoming_group").hide(); //隐藏正常提示
                    $(".msg_tanchuang_show2").show(); //显示错误提示
                    $(".opacaity_0").show(); //显示弹窗顶层框架div
                    return false;
                }
				
            },
            success: function() {
                $(".baoming_group").hide(); //隐藏所有提示
                $(".baoming_group.zero").show(); //提交成功div显示

                $(".msg_tanchuang_show2").hide(); //错误提示隐藏
                $(".opacaity_0").show(); //弹窗顶层div显示
                setTimeout('$(".opacaity_0").hide();', 5000); //5秒后隐藏弹窗顶层div
                $(eve.target).find('#myform2').val(''); //清空提交表单的input值
				$("input").attr("value","");

            }
        });
    });
    //弹窗关闭按钮被点击事件
    $(".hide_msg_container_clo").click(function() {
        clearInterval(msg_inter_handle);
        clearInterval(msg_timeout_handle);
        $(".opacaity_0").hide();
    });
});
