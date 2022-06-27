
<?php 
defined('BASEPATH') OR exit();

class Chart extends CI_Controller{ 

    public function index(){
        
        $this->load->view('chart');
    }

    public function chart_data (){
        $data = $this->chart_model->chart_database();
        echo json_encode($data);
    }
}
?>



