# File Upload Class 

usage
------- 

```php
<?php
	$fileUpload = new FileUpload();

	$fileUpload->setFile($_FILE['input_file']);
	if($fileUpload->checkFile())
		echo "this file is ok";
	else
		echo "this file is not ok";

	$fileUpload->upload();

	print_r($fileUpload->getInfo());
?>
```

[블로그](http://blog.serpongs.net)