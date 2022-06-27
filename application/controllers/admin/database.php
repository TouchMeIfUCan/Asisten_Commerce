<?php 
defined('BASEPATH') OR exit();

class Database extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('my_model','m');
        $this->load->helper('form');
        $this->load->helper('url');   
    }

    public function index(){
        $data['title']="DATABASE Asisten";
        $this->load->view('home',$data);
    }

    public function ambildata (){
        $dataAsisten = $this->m->ambildata('tbl_art')->result();
        echo json_encode($dataAsisten);
    }
}
?>