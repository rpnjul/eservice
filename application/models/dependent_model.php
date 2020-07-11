<?php
class Dependent_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_category_query()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}
}