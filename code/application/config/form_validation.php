<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	//Customer facing forms
	'add_list'	=>	array(
		array(
			'field'		=> 'list_name',
			'label' 	=> 'List name',
			'rules'		=> 'required|trim|xss_clean'
		)
	),
	'add_urgency'	=>	array(
		array(
			'field'		=> 'urgency_name',
			'label' 	=> 'Urgency name',
			'rules'		=> 'required|trim|xss_clean'
		)
	),
	'add_todo'	=>	array(
		array(
			'field'		=> 'description',
			'label' 	=> 'Todo description',
			'rules'		=> 'required|trim|xss_clean'
		),
		array(
			'field'		=> 'list',
			'label' 	=> 'Todo list',
			'rules'		=> 'required|trim|xss_clean'
		),
		array(
			'field'		=> 'urgency',
			'label' 	=> 'Todo urgency',
			'rules'		=> 'required|trim|xss_clean'
		),
		array(
			'field'		=> 'time_required',
			'label' 	=> 'Time required to complete',
			'rules'		=> 'required|trim|xss_clean'
		)
	)
);