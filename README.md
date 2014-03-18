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

## 部署说明 ##
		需要写权限的目录： 
				statics/fb_uploads/
				statics/captcha/
		将项目根目录下的 db/cifeed.sql导入到数据库，编码为 utf8 或 UTF-8
		将 index_production.php 或 index_production_anysrv.php 或 index_testing.php 重命名为 index.php
		
## nginx 虚拟机配置示例 ##
		server {
			listen   8089;

			root /var/www/html/cifeed/;
			#server_name www.example.com;

			location / {
			        index index.html index.php;
			        if (-f $request_filename/index.html){
			            rewrite (.*) $1/index.html break;
			        }
			        if (-f $request_filename/index.php){
			            rewrite (.*) $1/index.php;
			        }
			        if (!-f $request_filename){
			            rewrite (.*) /index.php;
			        }
			}
			location ~ .*\.php$ {
			    include /etc/nginx/fastcgi_params;
			    fastcgi_pass 127.0.0.1:9000;
			    fastcgi_index index.php;
			}
		}
