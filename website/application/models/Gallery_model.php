<?php

class Gallery_model extends CI_Model {

    protected $table = 'gallery';
	public function __construct()
    {
		$this->load->database();
	}

	public function get_images($offset = 0)
    {
        $this->db->order_by($this->table.'.id', 'DESC');
        $query = $this->db->limit(10, $offset)->get($this->table);
        return $query->result_array();
	}

}