<?php

class Post_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_posts($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('posts.id', 'DESC');
			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		$query = $this->db->get_where('posts', array('slug' => $slug));
		return $query->row_array();
	}

	public function create_post($post_image){
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'category_id' => $this->input->post('category_id'),
			'post_image' => $post_image
		);

		return $this->db->insert('posts', $data);
	}

	public function delete_post($id){
		$this->delete_image_file ($id);
		$this->db->where('id', $id);
		$this->db->delete('posts');
		return true;
	}



	public function update_post($post_image){
		$slug = url_title($this->input->post('title'));

		
		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'category_id' => $this->input->post('category_id')
		);

		if ($post_image !== FALSE) {
			$data['post_image'] = $post_image;
			$this->delete_image_file ($this->input->post('id'));
		}
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('posts', $data);
	}

	public function get_categories(){
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	public function delete_image_file ($id) {
		$image_filename = $this->get_image_filename($id);
		$cwd = getcwd(); // Save the current directory
		$image_file_path = $cwd."\\assets\\images\\posts\\";
		chdir($image_file_path);
		unlink($image_filename);
		chdir($cwd); // Restore the previous working directory  
	}

	public function get_image_filename ($id) {
		return $this->db->select('post_image')->get_where('posts', array('id' => $id) )->row()->post_image;
	}
}