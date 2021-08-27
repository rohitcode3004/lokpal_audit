<?php 

class Complaint_no_bug_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_year_counter($year)
	{ 
		$sql = "select complaint_counter from year_initialisation where year='".$year."'";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_max_comp_no($year)
	{ 
		$sql = "select max(complaint_no::int) from case_detail where complaint_year='".$year."'";
		$query = $this->db->query($sql)->result();
		return $query;
	}

}