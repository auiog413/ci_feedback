<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="/statics/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		function refresh_capthcha(){
			jQuery.ajax({
				url: "<?php echo $base_url;?>",
				dataType: "text",
				success: function(data){
					jQuery('span#captcha_area').html(data);
				}
			});
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
  
  <?php echo form_open_multipart('feedback/add');?>
  <table width="579" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#84C7E7">
	<tr>
      <td bgcolor="#fff" colspan="2">标 <strong style="color:red;">*</strong> 的为必填项</td>
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
      <td bgcolor="#FFFFFF"><input name="email" type="text" class="table3" size="30" /></td>
    </tr>

    <tr>
      <td align="center" bgcolor="#D2EEFC">联系电话</td>
      <td bgcolor="#FFFFFF"><input name="phone" type="text" class="table3" size="30" /></td>
    </tr>

	<tr>
      <td align="center" bgcolor="#D2EEFC">QQ</td>
      <td bgcolor="#FFFFFF"><input name="phone" type="text" class="table3" size="30" /></td>
    </tr>

    <tr>
      <td align="center" bgcolor="#D2EEFC">反馈内容 <strong style="color:red;">*</strong> </td>
      <td bgcolor="#FFFFFF">
		<textarea name="content" style="width:473px;height:180px;" class="table3" placeholder="[必填]输入您的反馈"></textarea>
	  </td>
    </tr>
	
    <tr>
      <td align="center" bgcolor="#D2EEFC">附件</td>
      <td bgcolor="#FFFFFF"><input name="attachment" type="file" size="20" /></td>
    </tr>
	
	<tr>
      <td align="center" bgcolor="#D2EEFC">验证码 <strong style="color:red;">*</strong> </td>
      <td bgcolor="#FFFFFF"><input name="captcha" type="text" class="table3" size="30" /><br /><span id="captcha_area"><?php echo $captcha_image;?></span><a href="javascript:void(0);" onclick="refresh_capthcha();" style="text-decoration:none;color:green;vertical-align:top;margin-left:10px;">看不清</a></td>
    </tr>
	
    <tr>
      <td bgcolor="#D2EEFC" align="center" colspan="2">
        <input type="submit" name="submit" class="button" value="提交">
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
