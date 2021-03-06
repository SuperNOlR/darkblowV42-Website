<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->main_protect->mainProtectB();
		$this->load->model('main/register_model', 'register');
		$this->allprotect->Web_Protection();
	}
	
	function index()
	{
		$data['title'] = 'DarkblowPB || Register';
		$data['isi'] = 'main/content/register/content_register';
		$this->load->view('main/layout/wrapper', $data, FALSE);	
	}

	function do_register()
	{
		$this->form_validation->set_rules(
			'login',
			'Username',
			'strtolower|trim|min_length[4]|max_length[16]|is_unique[accounts.login]|alpha_numeric|required',
			array(
				'min_length' => '%s Must Contains 4 Character With Combination of Letters and Numbers.',
				'max_length' => '%s Can Only Use 16 Characters.',
				'is_unique' => '%s Already Registered',
				'alpha_numeric' => '%s Can Only Use A Combination Of Letters And Numbers.',
				'required' => '%s Cannot Be Empty'
			)
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'strtolower|trim|valid_email|required',
			array(
				'valid_email' => '%s Invalid',
				'required' => '%s Cannot Be Empty'
			)
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'strtolower|trim|min_length[4]|max_length[16]|alpha_numeric|required',
			array(
				'min_length' => '%s Must Contains 4 Character With Combination of Letters and Numbers.',
				'max_length' => '%s Can Only Use 16 Characters.',
				'alpha_numeric' => '%s Can Only Use A Combination Of Letters And Numbers.',
				'required' => '%s Cannot Be Empty'
			)
		);
		$this->form_validation->set_rules(
			're_password',
			'Confirmation Password',
			'strtolower|trim|matches[password]|required',
			array(
				'matches' => '%s Mismatch',
				'required' => '%s Cannot Be Empty'
			)
		);
		$this->form_validation->set_rules(
			'hint_question',
			'Hint Question',
			'required',
			array('required' => '%s Cannot Be Empty')
		);
		$this->form_validation->set_rules(
			'hint_answer',
			'Hint Answer',
			'required',
			array('required' => '%s Cannot Be Empty')
		);
		if ($this->form_validation->run()) 
		{
			$this->register->RegisterValidationV2();
		}
		else
		{
			$this->form_validation->set_error_delimiters('', '');
			echo validation_errors();
		}
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //