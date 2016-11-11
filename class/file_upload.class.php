<?php

//todo: limit size, check type, multi file upload
class FileUpload{
	
	/*private $is_multi = false;*/

	private $msg = array(
		"msg" => "success",
		"error" => false,
	);

	private $obj_file = NULL;
	private $dir = '/upload';
	private $root = NULL;

	private $is_uploaded = false;

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
		

		$this->return_success();
	}



	public function upload(){
		$b_result = move_uploaded_file($this->obj_file['tmp_name'], $this->root . $this->dir .'/'. $this->md5);
		$this->is_uploaded = true;
		return $b_result;
	}
	public function checkFile(){
		//validate file 1
		if($this->obj_file['error'] != 0){
			$this->return_error("file object has error");
		}

		//validate file 2
		if(!is_uploaded_file($this->obj_file['tmp_name'])){
			$this->return_error("file not uploaded to tmp folder");
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
		$this->is_uploaded = false;
		return $this->setup();
	}
	public function setRoot($root){
		$this->root = $root;
		$this->return_success();
	}
	public function setDir($dir){
		if(!is_dir($dir))
			$this->return_error();

		$this->dir = $dir;
		$this->return_success();
	}
	public function setFileName($file_name){
		$this->file_name = $file_name;
	}
	public function setAllowedType($allowed_type){
		$this->allowed_type = $allowed_type;
	}


	public function getName(){
		if(!$this->chkFileSet())
			$this->return_error();

		return $this->name;
	}
	public function getExt(){
		if(!$this->chkFileSet())
			$this->return_error();

		return $this->ext;
	}
	public function getMd5(){
		if(!$this->chkFileSet())
			$this->return_error();

		return $this->md5;
	}
	public function getUploaded(){
		if(!$this->chkFileSet())
			$this->return_error();

		return $this->is_uploaded;
	}
	public function getInfo(){
		if(!$this->chkFileSet())
			$this->return_error();

		return array(
			"obj_file"		=> $this->obj_file,
			"dir"			=> $this->dir,
			"root"			=> $this->root,
			"allowed_type"	=> $this->allowed_type,
			"file_name"		=> $this->file_name,
			"name"			=> $this->name,
			"ext"			=> $this->ext,
			"md5"			=> $this->md5,
			"uploaded"		=> $this->is_uploaded,
		);
	}


	private function chkFileSet(){
		if($this->obj_file == NULL){
			throw new Exception('setFile() first!');
			$this->return_error();
		}
	}
	private function return_msg($msg, $error, $return_all = true){
		if($return_all == false)
			$this->msg = array();

		$this->msg['msg'] = $msg;
		$this->msg['error'] = $error;

		return $msg;
	}
	private function return_success($msg = 'success'){
		$this->return_msg($msg, false);
	}
	private function return_error($msg = 'fail'){
		$this->return_msg($msg, true);
	}


}
?>