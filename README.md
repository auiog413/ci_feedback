ci_feedback
===========

## 面向用户的反馈提交页面： ##
    	http://www.example.com/feedback

## 接口： ##
		http://www.example.com/feedback/add    				添加
        提交方式: POST
	    参数说明：
            * [必须]content     反馈内容
            * [必须]captcha     验证码
            * [选填]name        姓名
            * [选填]title       标题
            * [选填]email       电子邮件
            * [选填]phone       电话号码
            * [选填]qq          QQ
            * [选填]attachment  附件
        
		http://www.example.com/feedback/refresh_capthcha 	刷新验证码
        
## 管理后台页面： ##
		http://www.example.com/manage/feedback/view         后台管理->反馈列表
		http://www.example.com/manage/login				    登陆页面
		http://www.example.com/manage/logout				注销登陆
