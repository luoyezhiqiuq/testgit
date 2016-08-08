<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function feedbacks($message,$pos,$path)
	{
		$data = array(
			'message'=>$message,
			'pos'=>$pos,
			'path'=>$path
			);
		$this->load->view('js/feedback',array('data'=>$data));
	} 
}
