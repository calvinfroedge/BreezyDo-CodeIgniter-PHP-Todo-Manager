<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todos extends MY_Controller 
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('todos_model');
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	function index()
	{
		$data = array(
			'todos' => $this->todos_model->get_todos()
		);

		if (isset($_POST['submit']))
		{
			$complete_todos = $this->todos_model->complete_todos();
			$delete_todos = $this->todos_model->delete_todos();
			if($complete_todos || $delete_todos)
			{
				redirect(current_url());
			}
		}
		
		$this->load->view('todos', $data);
	}

	/**
	 * Add a new todo
	 *
	 */
	function add_todo()
	{	
		
		$data = array(
			'lists' => $this->todos_model->get_lists(),
			'urgency' => $this->todos_model->get_urgencies()
		);
		
		if($this->form_validation->run('add_todo')  == FALSE)
		{
		
		}
		else
		{
			if ($this->todos_model->add_todo()) print "todo added";
		}
		
		$this->load->view('todos_add', $data);
	}
	
	/**
	 * Add a new list
	 *
	 */
	function add_list()
	{	
		if($this->form_validation->run('add_list')  == FALSE)
		{
		
		}
		else
		{
			if ($this->todos_model->add_list()) print "todo list added";
		}
		
		$this->load->view('todos_list_add');
	}

	/**
	 * Add a new urgency
	 *
	 */
	function add_urgency()
	{	
		if($this->form_validation->run('add_urgency')  == FALSE)
		{
		
		}
		else
		{
			if ($this->todos_model->add_urgency()) print "urgency added";
		}
		
		$this->load->view('todos_urgency_add');
	}
}

/* End of file todos.php */
/* Location: ./application/controllers/todos.php */