<?php

//todo: limit size, check type, multi file upload
class FileUpload{
	
	/*private $is_multi = false;*/

	private $obj_file = NULL;
	private $dir = '/upload';
	private $root = NULL;

	private $allowed_type = array();

	private $file_name = NULL;
	private $ext;
	private $md5;

	function __construct()
	{
		$this->root = $_SERVER['DOCUMENT_ROOT'];
	}

	private function setup()
	{
		//setting md5
		$this->md5 = md5(time() . rand());

		//setting file ext
		$ext_tmp = '';
		$ext_tmp = $this->obj_file['name'];
		$ext_tmp = explode('.', $ext_tmp);
		$ext_tmp = end($ext_tmp);
		$this->ext = $ext_tmp;

		//setting file name
		$this->name = $this->obj_file['name'];
		

		return true;
	}



	public function upload(){
		return move_uploaded_file($this->obj_file['tmp_name'], $this->root . $this->dir .'/'. $this->md5);
	}
	public function checkFile(){
		//validate file 1
		if($this->obj_file['error'] != 0){
			return false;
		}

		//validate file 2
		if(!is_uploaded_file($this->obj_file['tmp_name'])){
			return false;
		}

		if(!empty($allowed_type))
		{
			//todo
		}
	}



	public function setFile($obj_file){
		$this->obj_file = $obj_file;
		/*
		//set is_multi
		if(is_array($this->obj_file['error']))
			$this->is_multi = true;
		*/
		return $this->setup();
	}
	public function setRoot($root){
		$this->root = $root;
		return true;
	}
	public function setDir($dir){
		if(!is_dir($dir))
			return false;

		$this->dir = $dir;
		return true;
	}
	public function setFileName($file_name){
		$this->file_name = $file_name;
	}
	public function setAllowedType($allowed_type){
		$this->allowed_type = $allowed_type;
	}


	public function getName(){
		if(!$this->chkFileSet())
			return false;

		return $this->name;
	}
	public function getExt(){
		if(!$this->chkFileSet())
			return false;

		return $this->ext;
	}
	public function getMd5(){
		if(!$this->chkFileSet())
			return false;

		return $this->md5;
	}
	public function getInfo(){
		if(!$this->chkFileSet())
			return false;

		return array(
			"obj_file"		=> $this->obj_file,
			"dir"			=> $this->dir,
			"root"			=> $this->root,
			"allowed_type"	=> $this->allowed_type,
			"file_name"		=> $this->file_name,
			"name"			=> $this->name,
			"ext"			=> $this->ext,
			"md5"			=> $this->md5,
		);
	}


	private function chkFileSet(){
		if($this->obj_file == NULL){
			throw new Exception('setFile() first!');
			return false;
		}
	}


}
?>