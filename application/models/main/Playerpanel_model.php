<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Playerpanel_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getdata_accountdetails()
	{
		return $this->db->where('player_id', $_SESSION['uid'])->get('accounts')->result_array();
	}

	function RequestHint()
	{
		$query = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']))->row();
		if ($query)
		{
			echo $query->hint_answer;
		}
		else
		{
			echo "";
		}
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //