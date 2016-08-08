<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends CI_Controller {

	public function index()
	{
	 	$this->load->view('common/header');
	 	$this->load->view('picture/index');
	}
	public function uplode()
	{
		$data['name'] = $this->input->post('name');
		$data['password'] = $this->input->post('password');
		$ret['role_id'] = $this->input->post('roleid');
		$fname = array_keys($_FILES);
		$this->load->model('UploadModel');
		$data['picture'] = $this->UploadModel->do_upload($fname[0]);
		print_r($data);
		if($data['picture'] == '0' || $data['picture'] =='1')
		{
			header('Refresh:0;url = /user/useradd');
		}
	}
	public function waterfall()
	{
		$this->load->view('common/header');
		$this->load->view('picture/waterfall');
	}
	public function ajaxdata()
	{
		$path = explode("\\",$this->uri->config->_config_paths[0]);
		$last = $path[0].$path[1].'/'.$path[2].'/'.$path[3].'/public/upload';
		$str = $this->listDir($last); 
		exit(json_encode($str['list']));
	} 
	private function listDir($dir)
	{
	    $data = array();
	    if(is_dir($dir))
	    {
	        if ($dh = opendir($dir))
	        {
	            while (($file = readdir($dh)) !== false)
	            {
	                if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
	                {
	                    $data['file'][] =  $file;
	                    listDir($dir."/".$file."/");
	                }
	                else
	                {
	                    if($file!="." && $file!="..")
	                    {
	                        $data['list'][] = $file;
	                    }
	                }
	            }
	            closedir($dh);
	        }
	    }
	    return $data;
	}
	public function morepic()
	{
		$this->load->view('common/header');
		$this->load->view('picture/morepic');
	}
}