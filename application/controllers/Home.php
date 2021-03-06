<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('main/home_model', 'home');
		$this->load->model('main/webshop_model','webshop');
		$this->load->helper('text');
		$this->allprotect->Web_Protection();
		$this->load->database();
		$this->load->library('encryption');
		$this->load->library('lib');
	}

	function index()
	{
		$data['title'] = 'DarkblowPB || Home';
		$data['account'] = $this->home->getdata_account();
		$data['clan'] = $this->home->getdata_clan();
		$data['allaccount'] = $this->home->getdata_allaccount();
		$data['onlineaccount'] = $this->home->getdata_onlineaccount();
		$data['quickslide'] = $this->home->getdata_quickslide();
		$data['webshop'] = $this->webshop->getdata_webshop_mostpopular();
		$data['isi'] = 'main/content/home/content_home';
		$this->load->view('main/layout/wrapper', $data, FALSE);
	}
	
	function logout()
	{
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('player_name');
		$this->session->unset_userdata('access_level');
		
		$this->session->set_flashdata('true', 'Successfully Logged Out.');
		echo "<script>self.history.back();</script>";
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //