<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todos_model extends CI_Model 
{
	private $todos_table = 'todos';
	private $list_table = 'todo_lists';
	private $urgency_table = 'todo_urgency';
	private $status_table = 'todo_status';
	
	function __construct()
	{
	
	}
	
	function add_todo()
	{
		$data = array(
			'todo_description' => $this->form_validation->set_value('description'),
			'list' => $this->form_validation->set_value('list'),
			'urgency' => $this->form_validation->set_value('urgency'),
			'time_required' => $this->form_validation->set_value('time_required'),
			'status' => '1'
		);
		
		if ($this->db->insert($this->todos_table, $data))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function complete_todos()
	{
		$haystack = array_keys($_POST);
	    foreach($haystack as $key=>$needle)
	    {
	        if(strpos($needle, 'complete_') !== FALSE)
	        {
	        	$id = str_replace('complete_', '', $needle);
	        	
	        	$data = array(
	        		'status' => '2'
	        	);
	        	
	        	$this->db->where('todo_id', $id)
					->update($this->todos_table, $data); 
	        } 
	    }
	    return TRUE;	
	}

	function delete_todos()
	{
		$haystack = array_keys($_POST);
	    foreach($haystack as $key=>$needle)
	    {
	        if(strpos($needle, 'delete_') !== FALSE)
	        {
	        	$id = str_replace('delete_', '', $needle);
	        	
	        	$this->db->where('todo_id', $id)
					->delete($this->todos_table); 
	        } 
	    }
	    return TRUE;	
	}

	function get_todos()
	{
		$this->db->select('*')
			->from($this->todos_table)
			->join($this->list_table, $this->todos_table.'.list = '. $this->list_table .'.list_id', 'left')
			->join($this->urgency_table, $this->todos_table.'.urgency = '. $this->urgency_table .'.urgency_id', 'left')
			->join($this->status_table, $this->todos_table.'.status = '. $this->status_table .'.status_id', 'left')
			->where($this->status_table.'.status_id =1')
		;
		$query = $this->db->get();
		return $query->result();
	}
	
	function add_list()
	{
		$data = array(
			'list_name' => $this->form_validation->set_value('list_name')
		);
		
		if ($this->db->insert($this->list_table, $data))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function get_lists()
	{
		$this->db->select('*')
			->from($this->list_table)
		;
		$query = $this->db->get();
		return $query->result();
	}

	function add_urgency()
	{
		$data = array(
			'urgency_name' => $this->form_validation->set_value('urgency_name')
		);
		
		if ($this->db->insert($this->urgency_table, $data))
		{
			return TRUE;
		}
		return FALSE;
	}

	function get_urgencies()
	{
		$this->db->select('*')
			->from($this->urgency_table)
		;
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file todos_model.php */
/* Location: ./application/models/todos_model.php */