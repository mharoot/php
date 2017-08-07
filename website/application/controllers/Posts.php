<?php
	class Posts extends CI_Controller{
		public function index(){		
			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = 'Create Post';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');


			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image
				$config = $this->getImageConfig();
				$this->load->library('upload', $config);
				$post_image = $_FILES['userfile']['name'];
				$filename = $config['upload_path'].$post_image;
				if (file_exists($filename) && $post_image !== '') { // no duplicate file names
					$data['title'] = 'Posting Rules';
					$this->load->view('templates/header');
					$this->load->view('posts/rules', $data);
					$this->load->view('templates/footer');
				} else {
					if(!$this->upload->do_upload()){
						$errors = array('error' => $this->upload->display_errors());
						$post_image = 'noimage.jpg';
					} else {
						$data = array('upload_data' => $this->upload->data());
					}
					$this->post_model->create_post($post_image);
					redirect('posts');
				}
			}
		}

		public function delete($id){
			$this->post_model->delete_post($id);
			redirect('posts');
		}

		public function edit($slug){
			$data['post'] = $this->post_model->get_posts($slug);

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function rules() {
			$data['title'] = 'Posting Rules';
			$this->load->view('templates/header');
			$this->load->view('posts/rules', $data);
			$this->load->view('templates/footer');
		}
		public function update(){
			$config = $this->getImageConfig();
			$this->load->library('upload', $config);
			$post_image = $_FILES['userfile']['name'];
			$filename = $config['upload_path'].$post_image;

			if (file_exists($filename) && $post_image !== '') { // no duplicate file names
				$this->post_model->update_post($post_image);
			} else {
				if(!$this->upload->do_upload() || $post_image === '') {
					$this->post_model->update_post(FALSE);
				} else {
					$data = array('upload_data' => $this->upload->data());	
					$this->post_model->update_post($post_image);
				}

			}
			redirect('posts');	
		}

		private function getImageConfig() {
			$config['upload_path']   = './assets/images/posts/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '10240'; //10mb
			$config['max_width']     = '6000';
			$config['max_height']    = '6000';
			return $config;
		}
	}