<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Order_model extends CI_Model 
{
	 function __construct()
	  {
		parent::__construct(); // construct the Model class
	  }
	/*Common SQL Queries*/	
	function insert($table,$data)
	{
		if($this->db->insert($table,$data))
		return true;
		else
		return false;
	}
	/*Select All Data From Single Table*/	
	function select_all($table) 
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query;
	}
	function record_count($table,$cond)
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($cond))
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	/*Select Data By Condition From A Table*/	
	function select($table,$cond)
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($cond))
		$this->db->where($cond);
		$query = $this->db->get();
		return $query;
	}
	/*Update*/	
	function update($table,$data,$cond)
	{
		if($this->db->update($table,$data,$cond))
		return true;
		else
		return false;
	}
	
	/*Delete*/	
	function delete($table,$cond)
	{
		if($this->db->delete($table,$cond))
		return true;
		else
		return false;
	}	
	
	function get_field($table)
	{
		$fields = $this->db->list_fields($table);
			
		return $fields;
	}
	
	

	
}