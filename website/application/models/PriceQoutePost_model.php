<?php

class PriceQoutePost_model extends CI_Model {

	protected $table = 'priceQoutePosts';

	public function create_post ($blueprint_image) 
    {
		$data = array(
			'blueprint_image' => $blueprint_image,
			'description' => $this->input->post('description'),
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
            'phone_number' => $this->input->post('phone_number')
		);
		return $this->db->insert($this->table, $data);
	}

	public function get_posts ($phone_number = FALSE)
	{
		if ($phone_number === FALSE) {
			$this->db->order_by($this->table.'.created_at', 'DESC');
			$query = $this->db->get($this->table);
			return $query->result_array();
		}

		$query = $this->db->get_where($this->table, array('phone_number' => $phone_number));
		return $query->row_array();
	}

	public function delete_post ($phone_number)
	{
		$this->db->where('phone_number', $phone_number);
		$this->db->delete($this->table);
		return true;
	}

	
}