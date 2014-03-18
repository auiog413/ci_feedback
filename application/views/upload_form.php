<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
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

    function check_all_needed_fields(){
        if( $('#think_result').val() == ''){
                alert('What do you think of Cocos Code IDE?');
                return false;
        }

        if( $('#content').val() == '' ){
                $('#content').css({'borderColor':'red'});
                $('#content').focus();
                setTimeout(function(){$('#content').css({'borderColor':'#e2e2e4'});}, 3000);
                return false;
        }

        if( $('#captcha').val() == '' ){
                $('#captcha').css({'borderColor':'red'});
                $('#captcha').focus();
                setTimeout(function(){$('#captcha').css({'borderColor':'#e2e2e4'});}, 3000);
                return false;
        }

        $('#submit_btn').removeClass('submit_btn_disabled').addClass('submit_btn_enabled');
        return true;
    }

    // 投票按钮效果
    function think_btn(id){
        var current_node = $('#'+id);
        if(current_node.attr('rel') == '0'){
                $('#think_result').val(current_node.html());
                current_node.attr('rel', '1')
                        .removeClass('span_normal')
                        .removeClass('span_unselect')
                        .addClass('span_select')
                    .siblings('span')
                        .removeClass('span_select')
                        .removeClass('span_normal')
                        .addClass('span_unselect')
                        .attr('rel', '0');
                check_all_needed_fields();
        }else{
                $('#think_result').val('');
                current_node.attr('rel', '0')
                        .removeClass('span_select')
                        .removeClass('span_unselect')
                        .addClass('span_normal')
                        .siblings('span')
                        .removeClass('span_unselect')
                        .removeClass('span_select')
                        .addClass('span_normal')
                        .attr('rel', '0');
                $('#submit_btn').addClass('submit_btn_disabled').removeClass('submit_btn_enabled');
        }
    }

    // 是否选择填写邮箱
    function filled_email_check(check_input){
        if($('#'+check_input).attr('checked') == 'checked'){
                $('span#email_area').show();
        }else{
                $('span#email_area').hide();
        }
    }

    function fbcontent_submit_success(data) {
                if(data.errno > 0)
                {
                        alert(data.errmsg);
                }else{
                        window.location.href="/feedback/success";
                }
        }

    function fbcontent_submit(){
            if (!check_all_needed_fields()){
                return false;
            }

      var options = {
        target:        '#response_hints_msg',   // target element(s) to be updated with server response
        beforeSubmit:  check_all_needed_fields,  // pre-submit callback
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
      return false;
    }
  </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback Forum | Cocos Code IDE</title>
<style type="text/css" rel="stylesheet">
*{margin:0;padding:0;}
.container{width:100%;height:100%;background:url(statics/bg_main.png) repeat;position:absolute;}
.header{height:34px;margin:auto;padding-top:6px;background-color:#2d2d2d;width:100%;}
.header h3{font-size:24px;text-align:center;font-family:"Arial";font-weight:bold;color:#ffffff;}
.main{margin-top:56px;font-family:"Tahoma";}
.content{width:568px;padding:38px 83px;background-color:#fdfdff;position:relative;left:50%;border-radius:5px;margin-left:-367px;-webkit-box-shadow:0px 0px 4px #818181;;-moz-box-shadow:0px 0px 4px #818181;;box-shadow:0px 0px 4px #818181;;}
.form_title{font-size:26px;color:#029bdb;border-bottom:#ddd dashed 1px;padding-bottom:8px;font-weight:normal;}
.required_star{font-weight:bold;color:#ffa800;font-size:16px;margin-left:5px;}
.content .tape{background:url(statics/tape.png) no-repeat;width:154px;height:54px;position:absolute;top:-28px;left:291px;}
.content .shadow{background:url(statics/shadow.png) no-repeat;width:954px;height:100px;position:absolute;bottom:-100px;left:0px;}
.captcha_area img{border:#e2e3e5 solid 1px;}
form textarea{height:118px;width:560px;padding:3px;border:#e2e2e4 solid 1px;}
form .emailtext{height:24px;padding:3px;width:276px;border:#e2e2e4 solid 1px;line-height:24px;}
form .emailnotice{margin-top:9px;padding:5px 8px;border:#e0f7ff solid 1px;background-color:#f4fcfe;font-size:14px;}
form .submit_btn{width:122px;height:24px;padding:5px 23px;display:block;text-decoration: none;float:left;}
form .submit_btn_enabled{background:url(statics/Submit_btn1.png) no-repeat;color:#ffffff;}
form .submit_btn_enabled:hover{background:url(statics/Submit_btn1_hover.png) no-repeat;text-decoration: underline;}
form .submit_btn_disabled{background:url(statics/Submit_btn0.png) no-repeat;color:#4b4a4a;}
form .cancel{display:block;float:left;margin-top:5px;margin-left:10px;color:#898989;text-decoration: none;}
form .cancel:hover{text-decoration: underline;}
form .seccode{width:162px;height:24px;line-height:24px;padding:3px;border:#e2e2e4 solid 1px;}
form .vote_btns{margin-top:5px;padding-left:9px;}
form .vote_btns span{padding-left:33px;width:60px;float:left;display:block;height:26px;padding-top:10px;color:#4d4d4d;font-size:14px;}
form .vote_btns span:hover{cursor:pointer;opacity:1.0}
form .vote_btns .span_unselect{opacity:0.3;}
form .vote_btns .span_unselect:hover{opacity:1;}
form .vote_btns .span_select{opacity:1;}
form .vote_btns .span_normal{opacity:0.6;}
form .vote_btns .btn_like{background:url(statics/Like.png) no-repeat;}
form .vote_btns .btn_neutral{background:url(statics/Neutral.png) no-repeat;}
form .vote_btns .btn_dislike{background:url(statics/Dislike.png) no-repeat;}
form .word_counts{position:absolute;top:-24px;right:0px;color:#c3c3c3;font-size:14px;}
form .tryanother{margin-left:4px;color:#029adb;font-size:14px;cursor:pointer;}
form .tryanother:hover{text-decoration:underline;}
</style>
</head>
<body>
<div class="container">
        <div class="header">
                <h3>Cocos Code IDE</h3>
        </div>
        <div class="main">
                <div class="content">
      <div class="tape"></div>
      <?php echo form_open_multipart('feedback/add', array('id' => 'feedback_form'));?>
        <input type="hidden" name="version" value="<?php echo $version; ?>" />
        <input type="hidden" name="os" value="<?php echo $os; ?>" />
        <h4 class="form_title">Feedback Forum</h4>
        <div style="margin-top:8px;color:#4e4e4e;font-size:14px;"><strong class="required_star" style="font-size:14px;">*</strong> indicates a required field</div>
        <div style="margin-top:26px;color:#2a2a2a;font-size:16px;">What do you think of Cocos Code IDE?<strong class="required_star">*</strong></div>
        <div class="vote_btns">
          <input type="hidden" id="think_result" name="think_result" value="" />
          <span id="btn_like" class="btn_like span_normal" rel="0" onclick="think_btn(this.id)">Like</span>
          <span id="btn_neutral" class="btn_neutral span_normal" rel="0" onclick="think_btn(this.id)">Neutral</span>
          <span id="btn_dislike" class="btn_dislike span_normal" rel="0" onclick="think_btn(this.id)">Dislike</span>
          <div style="clear:both;"></div>
        </div>
        <div style="margin-top:12px;color:#2a2a2a;font-size:16px;">What would you like to share with us?<strong class="required_star">*</strong></div>
        <div style="margin-top:5px;position:relative;"><div id="word_counts" class="word_counts">1000</div><textarea name="content" id="content" onblur="check_all_needed_fields();"></textarea></div>
        <input type="file" name="attachment" style="margin-top:12px;" />
        <div style="margin-top:12px;"><span id="captcha_area"><?php echo $captcha_image;?></span><span class="tryanother" onclick="return refresh_capthcha();">Try another</span></div><!-- 垂直对齐 -->
        <div style="margin-top:12px;"><input type="text" name="captcha" id="captcha" onblur="check_all_needed_fields();" class="seccode" placeholder="Type the above word" /><strong class="required_star">*</strong></div>
        <div style="margin-top:12px;font-size:16px;"><input type="checkbox" id="filled_email" name="filled_email" style="margin-right:2px;" onclick="filled_email_check(this.id);" />Check here to let us contact you to follow up on you feedback.</div>
        <span id="email_area" style="display:none;">
                <div style="margin-top:12px;"><input type="text" class="emailtext" name="email" placeholder="Email address (optional)" /></div>
                <div class="emailnotice">Your email addresses will keep private. We understand your privacy is important.</div>
        </span>
        <div style="margin-top:30px;">
          <a href="javascript:void(0);" onclick="fbcontent_submit();" id="submit_btn" class="submit_btn submit_btn_disabled">Submit Feedback</a>
          <span style="display:block;float:left;margin-left:10px;color:#898989;margin-top: 5px;">or</span>
          <a href="javascript:void(0);" onclick="window.opener=null;window.open('','_self');window.close();" class="cancel">cancel</a>
          <div style="clear:both;"></div>
        </div>
      </form>
      <div class="shadow"></div>
                </div>
        </div>
</div>
</body>
</html>
