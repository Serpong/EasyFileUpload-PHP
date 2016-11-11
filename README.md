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

	setFile($obj_file)
void setRoot($root)

	setRoot($root)
void setDir($dir)

	checkFile()
void setFileName($file_name)

	setFileName($file_name)
void setAllowedType($allowed_type)

	setDir($dir)
array upload()

	upload()
array checkFile()

	setAllowedType($allowed_type)
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