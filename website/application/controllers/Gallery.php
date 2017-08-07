<?php



class Gallery extends CI_Controller {

    public function index($offset = 0){		
        $data['title'] = 'EPS Welding Service Gallery';

        $data['photos'] = $this->gallery_model->get_images($offset);

        $this->load->view('templates/header');
        $this->load->view('pages/gallery', $data);
        $this->load->view('templates/footer');
    }

}