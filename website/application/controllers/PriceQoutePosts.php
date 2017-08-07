<?php

class PriceQoutePosts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

/* for public use */
    public function index(){		
        $data['title'] = 'Price Qoute';
        $this->load->view('templates/header');
        $this->load->view('price-qoute-posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['title'] = 'Price Qoute Submission Form';

        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|regex_match[/^[0-9]{9}$/]'); //{10} for 10 digits number

		if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('price-qoute-posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            // Upload Image or PDF
			$config = $this->getFileConfig();
			$blueprint_image = $_FILES['userfile']['name'];
            $ext = pathinfo($blueprint_image, PATHINFO_EXTENSION);

            if ($ext == 'pdf') $config['upload_path'] = './assets/pdfs/';


            $this->load->library('upload', $config);
            $uploadFailed = !$this->upload->do_upload();

            if ($uploadFailed) { 
                $errors = array('error' => $this->upload->display_errors());
                $blueprint_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            $this->priceQoutePost_model->create_post($blueprint_image);
            $_SESSION['about_message'] = "You have successfully submitted your price qoute!  Please allow us 24 hours to contact you back.";
            redirect('about');
        }
    }




/* for admin use only */
    public function delete ($phone_number)
    {
        $this->validate_admin();
        $this->priceQoutePost_model->delete_post($phone_number);
        redirect('price-qoute/admin');

    }

    public function admin_index()
    {   
        $this->validate_admin();
        $data['title'] = 'Client Price Qoutes';
        $data['posts'] = $this->priceQoutePost_model->get_posts();
        $this->load->view('templates/header');
        $this->load->view('price-qoute-posts/admin_index', $data);
        $this->load->view('templates/footer');
    }

    public function admin_view($phone_number)
    {
        $this->validate_admin();
        $data['title'] = 'Client Price Qoute for ';
        $data['post'] = $this->priceQoutePost_model->get_posts($phone_number);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] .= $data['post']['name'];

        $this->load->view('templates/header');
        $this->load->view('price-qoute-posts/admin_view', $data);
        $this->load->view('templates/footer');
    }


    /* utilities */

    private function validate_admin()
    {
        //$ion_auth = new Ion_auth_model();
        if ( !$this->ion_auth->is_admin() ) 
            redirect('price-qoute');
    }
    private function getFileConfig() {
        $config['upload_path']   = './assets/images/posts/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']      = '10240'; //10mb
        $config['max_width']     = '6000';
        $config['max_height']    = '6000';
        return $config;
    }
}