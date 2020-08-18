<?php include("./class/file_upload.class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Example</title>
</head>
<body>

	<?php

	if(isset($_FILES['f']))
	{
		echo "file recieved<br>";
		$file = new FileUpload();
		$file->setFile($_FILES['f']);
		if($file->checkFile()['error'] == 0)
			echo "file is ok";
		else
			echo "file is not ok";

		echo "<pre>";
		print_r($file->getInfo());
		echo "</pre>";
	}

	?>
	<form enctype="multipart/form-data" method="post">
		<input type="file" name="f">
		<input type="submit" value="upload">
	</form>

</body>
</html>