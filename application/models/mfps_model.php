<?php

class Mfps_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

  	function select_result($valorFPS)
	{
		$this->db->from('fichas');

		$where = "(operadorFPS='Menor' AND FPS>=".$valorFPS.") OR (operadorFPS='Mayor' AND FPS<=".$valorFPS.")";
		$this->db->where($where);
		$this->db->group_by("titulo"); 

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return "FALSE";
		}
	}

  	function select_personas_tramo($valorFPS)
	{
		$this->db->select('personas');
		$this->db->from('tramos');
		$this->db->where('minimo <=',$valorFPS);
		$this->db->where('maximo >=',$valorFPS);

		$query = $this->db->get();

		//echo $this->db->last_query();

		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
			return $row['personas'];
		}
		else
		{
			return FALSE;
		}
	}

}
