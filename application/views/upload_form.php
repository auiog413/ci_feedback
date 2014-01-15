<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('feedback/add');?>

<input type="file" name="attachment" size="20" />
<br />
<textarea name="content" style="width:500px;height:150px;" placeholder="输入您的反馈"></textarea>
<br />

<input type="submit" value="提交" />

</form>

</body>
</html>