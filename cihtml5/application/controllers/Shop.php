<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Feedback.php');
class Shop extends feedback {
	public function index()
	{
		if($_POST)
		{
			$id = $this->input->post('id');
			$p['name'] = $this->input->post('name');
			$did = $this->input->post('did');
			if($did)
			{
				$didarray = explode('v',$did);
				$p['did'] = $didarray[0];
				$p['path']= $didarray[1].'.'.$didarray[0];
			}else
			{
				$p['did']=0;
				$p['path']=0;
			}
			$this->load->model('ClassificationModel');
			if($id)
			{
				$res = $this->ClassificationModel->update($p,$id);
			}else
			{
				$res = $this->ClassificationModel->insert($p);
			}
		    	 $backUrl = $_SERVER['HTTP_REFERER'];
			if($res)
			{
				$this->feedbacks('操作成功','3','/shop/shoplist');
			}else
			{
				$this->feedbacks('操作失败','3');
			}
		}
		$this->load->model("ClassificationModel");
		$rest = array();
		if($this->input->get('id'))
		{
			$rest = $this->ClassificationModel->whereDataAll(intval($this->input->get('id')));
		}
		$data = $this->ClassificationModel->dataAll();
		foreach($data as $key=>$val)
		{
			$counts = count(explode('.',$val->path))-1;
			$data[$key]->name = str_repeat('|---',$counts).$val->name;
		}
		$this->load->view('common/header');
		$this->load->view('shop/index',array('data'=>$data,'rest'=>$rest));
	}
	public function addshop()
	{
		$this->load->model("ClassificationModel");
		$data = $this->ClassificationModel->dataAll();
		foreach($data as $key=>$val)
		{
			$counts = count(explode('.',$val->path))-1;
			$data[$key]->name = str_repeat('|---',$counts).$val->name;

		}
		$this->load->view('common/header');
		$this->load->view('shop/addshop',array('data'=>$data));
	}

	public function shoplist()
	{
		$this->load->model("ClassificationModel");
		$data = $this->ClassificationModel->dataAll();
		foreach($data as $key=>$val)
		{
			$counts = count(explode('.',$val->path))-1;
			$data[$key]->name = str_repeat('|---',$counts).$val->name;
		}
		$this->load->view('common/header');
		$this->load->view('shop/list',array('data'=>$data));
	}
	public function ajaxdel()
	{
		$id = $this->input->post('id');
		$this->load->model("ClassificationModel");
		$data = $this->ClassificationModel->delect($id);
		if($data)
		{
			echo 200;
		}else
		{
			echo 400;
		}
	}
	public function opadd()
	{
		$p = $this->input->post();
		print_r($p);
		$fname = array_keys($_FILES);
		$this->load->model('UploadModel');
		$data['picture'] = $this->UploadModel->do_upload($fname[0]);
		print_r($data);
	}
}