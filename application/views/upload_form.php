<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="/statics/jquery-1.8.3.min.js"></script>
	<script src="/statics/jquery.form.js"></script>
	<script type="text/javascript">
		function refresh_capthcha(){
			jQuery.ajax({
				url: "<?php echo $base_url;?>feedback/refresh_capthcha",
				dataType: "text",
				cache: false,
				success: function(data){
					jQuery('span#captcha_area').html(data);
					return true;
				}
			});
			return true;
		}
		
		// 参数列表说明： 提示内容，提示的背景颜色，提示的内容颜色
		function show_submit_hint(content,bgcolor,fgcolor){
			jQuery('tr#response_hints').css('display','');
			// 设置背景颜色
			if(bgcolor) jQuery('tr#response_hints td').css('backgroundColor',bgcolor);
			// 设置前景颜色
			if(fgcolor) jQuery('span#response_hints_msg').css('color',fgcolor);
			// 设置内容
			jQuery('span#response_hints_msg').html(content);
			
			return false;
		}
		
		function hide_submit_hint(){
			jQuery('tr#response_hints').css('display','none');
			jQuery('span#response_hints_msg').html('');
		}
		
		/**
		 * 提交前的校验
		 */
		function fbcontent_submit_request(){
			var content = jQuery('textarea#content').val();
			if(!content.length){
				return show_submit_hint('请填写反馈内容。');
			}
			var captcha = jQuery('input#captcha').val();
			if(!captcha.length){
				return show_submit_hint('请填写验证码。');
			}
			var email = jQuery("input#email").val();
			if(email){
				//对电子邮件的验证
				var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
			
				if(!myreg.test(email))
				{
					return show_submit_hint('请填写正确的邮箱地址。');
				}
			}
			var qq = jQuery('input#qq').val();
			if(qq){
				//对qq号进行验证
				var qqtest = /^\d{5,13}$/;
			
				if(!qqtest.test(qq))
				{
					return show_submit_hint('请填写正确的QQ号码。');
				}
			}
			
			return true;
		}
		
		/**
		 * 提交成功之后的处理
		 */
		function fbcontent_submit_success(data){
			if(data.errno){
				if(data.errno == 1){
					show_submit_hint(data.errmsg);
				}else if(data.errno == 2){
					show_submit_hint('请填写反馈内容。');
				}else if(data.errno == 3){
					show_submit_hint('请填写验证码。');
				}
			}else{
				show_submit_hint('您的反馈内容已经提交成功，谢谢您的反馈。', 'white', 'green');
				jQuery('form#feedback_form')[0].reset();
				refresh_capthcha();
				setTimeout(function(){hide_submit_hint();},5000);
			}
		}
		
		function fbcontent_submit(){
			hide_submit_hint();
			
			var options = { 
				target:        '#response_hints_msg',   // target element(s) to be updated with server response 
				beforeSubmit:  fbcontent_submit_request,  // pre-submit callback 
				success:       fbcontent_submit_success,  // post-submit callback 
				dataType:      'json',
				
				// other available options: 
				//clearForm: true        // clear all form fields after successful submit 
				//resetForm: true        // reset the form after successful submit
				//timeout:   3000 
			}; 
		 
			// inside event callbacks 'this' is the DOM element so we first 
			// wrap it in a jQuery object and then invoke ajaxSubmit 
			$('#feedback_form').ajaxSubmit(options); 
	 
			// !!! Important !!! 
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		}
	</script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>用户反馈</title>
  <style>
	td {  font-family: "宋体"; font-size: 9pt; line-height: 150%; color: #000000; text-decoration: none}
	.top a{
		font-size: 10pt;
		color: 006CC6;
		text-decoration: none;
		font-weight: bold;
	} 
	.top a:hover{
		font-size: 10pt;
		color: 006CC6;
		text-decoration: underline;
		font-weight: bold;
	}
	.font1 {  font-family: "宋体"; font-size: 10pt; font-weight: normal; color: #840000}
	a {  font-family: "宋体"; font-size: 9pt; color: #000000; text-decoration: none}
	a:hover {  font-family: "宋体"; font-size: 9pt; color: #000000; text-decoration: underline}
	.table3 {  border: 1px solid #ACCCEA}
	.font2 {
		font-size: 10pt;
		color: 006CC6;
		line-height: 180%;
		font-weight: bold;
	}

	.txt {  
	border: #999999; border-style: solid; border-width:1px;font-size:12px; 
	}
	.button {  
		font-family: "Verbigna", "Arial", "Helvetica", "sans-serif"; 
		font-size: 12px; 
		height: 20px; 
		border-style: solid; border-width:1px;border-color:#000000;
		background-color:#EBEADB
	}
	
	.button:hover {  
		font-family: "Verbigna", "Arial", "Helvetica", "sans-serif"; 
		font-size: 12px; 
		height: 20px;
		text-decoration:none;
	}
	
	.PropelPager {
	  width : 100%;
	  height : 20px
	}

	.PropelPagerSummary {
	  float : left;
	  width : 40%
	}

	.PropelPagerDigit {
	  color : red;
	  text-decoration : underline
	}

	.PropelPagerNav {
	  float : right;
	  width : 50%;
	  text-align : right;
	  padding-right : 25px
	}

	.PropelPagerNav a {
	  color : #4B6D9B;
	  text-decoration : none
	}

	.PropelPagerNav a:hover {
	  color : #f00;
	  text-decoration : underline
	}

	.PropelPagerForm {
	  font-size : 12px
	}
  </style>
  </head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
  <br />

  <table width="579" height="43" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top"><img src="/statics/advice_01.gif" width="579" height="38" /></td>
    </tr>
  </table>
  
  <?php echo form_open_multipart('feedback/add', array('id' => 'feedback_form'));?>
  <table width="579" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#84C7E7">
	<tr>
      <td bgcolor="#FFFFFF" colspan="2">标 <strong style="color:red;">*</strong> 的为必填项</td>
    </tr>
    <tr>
      <td width="88" align="center" bgcolor="#D2EEFC">姓名</td>
      <td width="412" bgcolor="#FFFFFF"><input name="name" type="text" class="table3" size="15" /></td>
    </tr>

    <tr>
      <td align="center" bgcolor="#D2EEFC">标题</td>
      <td bgcolor="#FFFFFF"><input name="title" type="text" class="table3" size="50" /></td>
    </tr>

    <tr>
      <td align="center" bgcolor="#D2EEFC">电子邮件</td>
      <td bgcolor="#FFFFFF"><input name="email" id="email" type="text" class="table3" size="30" /></td>
    </tr>

    <tr>
      <td align="center" bgcolor="#D2EEFC">联系电话</td>
      <td bgcolor="#FFFFFF"><input name="phone" type="text" class="table3" size="30" /></td>
    </tr>

	<tr>
      <td align="center" bgcolor="#D2EEFC">QQ</td>
      <td bgcolor="#FFFFFF"><input name="qq" id="qq" type="text" class="table3" size="30" /></td>
    </tr>

    <tr>
      <td align="center" bgcolor="#D2EEFC">反馈内容 <strong style="color:red;">*</strong> </td>
      <td bgcolor="#FFFFFF">
		<textarea name="content" id="content" style="width:473px;height:180px;" class="table3" placeholder="[必填]输入您的反馈"></textarea>
	  </td>
    </tr>
	
    <tr>
      <td align="center" bgcolor="#D2EEFC">附件</td>
      <td bgcolor="#FFFFFF"><input name="attachment" type="file" size="20" /></td>
    </tr>
	
	<tr>
      <td align="center" bgcolor="#D2EEFC">验证码 <strong style="color:red;">*</strong> </td>
      <td bgcolor="#FFFFFF"><input name="captcha" id="captcha" type="text" class="table3" size="30" /><br /><span id="captcha_area"><?php echo $captcha_image;?></span><a onclick="return refresh_capthcha();" style="text-decoration:none;color:green;vertical-align:top;margin-left:10px;cursor:pointer;">看不清</a></td>
    </tr>
    
	<tr id="response_hints" style="display:none;">
      <td style="background-color:#D893A1;" align="left" colspan="2">
		  <span id="response_hints_msg" style="font-weight:bold;color:red;"></span>
      </td>
    </tr>
    
    <tr>
      <td bgcolor="#D2EEFC" align="center" colspan="2">
        <a href="javascript:void(0);" class="button" style="padding:1px 6px 2px 5px;" onclick="fbcontent_submit();">提交</a>
        <a href="javascript:void(0);" class="button" style="padding:1px 6px 2px 5px;" onclick="window.opener=null;window.open('','_self');window.close();">取消</a></td>
    </tr>
    
    <tr align="center" bgcolor="#D2EEFC">
      <td height="45" colspan="2">您也可以直接与我们的客服人员联系<br />
      联系电话： | 联系人： | 邮箱： | 传真：</td>
    </tr>

  </table>
  </form>
</body>
</html>
