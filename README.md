# File Upload Class 

usage
------- 

```php
<?php
	$fileUpload = new FileUpload();

	$fileUpload->setFile($_FILES['input_file']);
	if($fileUpload->checkFile())
		echo "this file is ok";
	else
		echo "this file is not ok";

	$fileUpload->upload();

	print_r($fileUpload->getInfo());
?>
```
##methods

void setFile($obj_file)

	setFile($_FILES['f'])
void setRoot($root)

	setRoot("/var/www/html")
void setDir($dir)

	checkFile()
void setFileName($file_name)

	setFileName("file_name")
void setAllowedType($allowed_type)

	setDir("/upload")
array upload()

	upload()
array checkFile()

	setAllowedType(array('jpg','gif'))
string getName()	

	getName()	
string getExt()	

	getExt()	
string getMd5()	

	getMd5()	
bool getUploaded()	

	getUploaded()	
array getInfo()

	getInfo()

[블로그](http://blog.serpongs.net)