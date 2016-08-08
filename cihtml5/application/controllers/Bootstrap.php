<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function table1()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/table/table1');
	}
	public function table2()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/table/table2');
	}
	public function table3()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/table/table3');
	}
	public function table4()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/table/table4');
	}
	public function input1()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/input/input1');
	}
	public function input2()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/input/input2');
	}
	public function input3()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/input/input3');
	}
	public function publish()
	{
		$this->load->view('common/header');
		$this->load->view('bootstrap/publish/fonts');
	}
}
