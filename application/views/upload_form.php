<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('feedback/add');?>

<input type="file" name="attachment" size="20" />
<input type="text" name="content" size="50" />
<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>