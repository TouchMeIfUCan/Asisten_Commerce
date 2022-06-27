<?php 

class Kategori extends CI_Controller{
    public function pembantu()
    {
        $data['pembantu'] = $this->model_kategori->data_pembantu()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembantu',$data);
        $this->load->view('templates/footer');
    }

    public function baby_sitter()
    {
        $data['baby_sitter'] = $this->model_kategori->data_baby_sitter()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('baby_sitter',$data);
        $this->load->view('templates/footer');
    }

    public function tukang_kebun()
    {
        $data['tukang_kebun'] = $this->model_kategori->data_tukang_kebun()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tukang_kebun',$data);
        $this->load->view('templates/footer');
    }

    public function satpam()
    {
        $data['satpam'] = $this->model_kategori->data_satpam()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('satpam',$data);
        $this->load->view('templates/footer');
    }
}

