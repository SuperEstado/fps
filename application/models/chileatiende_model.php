<?php

class Chileatiende_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function insert_data_dump($query)
	{
		$data = array(
				'dump' => $query,
			);

		$this->db->insert('dump_chileatiende', $data);
	}

  	function select_dump_data()
	{
		$this->db->from('dump_chileatiende');
		$this->db->like('dump','FPS');
		$this->db->or_like('dump','fps');
		$this->db->or_like('dump','f.p.s.');
		$this->db->or_like('dump','F.P.S.');
		$this->db->or_like('dump','Ficha de Protección Social'); 
		$this->db->or_like('dump','Ficha CAS'); 
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return "lol";
		}
	}

	function insert_data($query)
	{
		$this->db->insert('dump_chileatiende', $query);
	}

}
