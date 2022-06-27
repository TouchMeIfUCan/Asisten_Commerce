<?php 
require FCPATH. 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_asisten extends CI_Controller{

    //ini adalah controller data_asisten yang ada di folder C:\xampp\htdocs\asisten\application\controllers\admin

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '1'){
           $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda belum login!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('auth/login'); 
        }      
    }

    public function index()
    {
         $data['asisten'] = $this->model_asisten->tampil_data()->result();
         $this->load->view( 'templates_admin/header');
         $this->load->view( 'templates_admin/sidebar');
         $this->load->view( 'admin/data_asisten', $data);
         $this->load->view( 'templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_art       = $this->input->post('nama_art');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name'];
        if ($gambar =''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal Upload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_art'   => $nama_art,
            'keterangan' => $kategori,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'stok'       => $stok,
            'gambar'     => $gambar,  
        );
        $this->model_asisten->tambah_asisten($data, 'tbl_art');
        redirect('admin/data_asisten/index');
    }

    public function edit($id)
    {
        $where = array('id_art' =>$id);
        $data['asisten'] = $this->model_asisten->edit_asisten($where, 'tbl_art')->result();
        $this->load->view( 'templates_admin/header');
        $this->load->view( 'templates_admin/sidebar');
        $this->load->view( 'admin/edit_asisten',$data);
        $this->load->view( 'templates_admin/footer');
    }

    public function update(){
        $id             = $this->input->post('id_art');
        $nama_art       = $this->input->post('nama_art');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');

        $data = array(
            'nama_art'      => $nama_art,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok,
        );

        $where = array( 'id_art' => $id);

        $this->model_asisten->update_data($where,$data, 'tbl_art');
        redirect('admin/data_asisten/index');

    }

    public function hapus ($id){
        $where = array( 'id_art' => $id);
        $this->model_asisten->hapus_data($where, 'tbl_art');
        redirect('admin/data_asisten/index');
    }   

    public function Print(){
        $data['asisten'] = $this->model_asisten->tampil_data('tbl_art')->result();
        $this->load->view('print_asisten',$data);
    }

    public function PDF(){
        $data['asisten'] = $this->model_asisten->tampil_data('tbl_art')->result();

        $this->load->view('pdf_asisten',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html,"Laporan_data_asisten",$paper_size,$orientation);

        /*
        $pdf = new Dompdf();

        $pdf->setPaper($paper_size, $orientation);
        $pdf->load_Html($html);
        $pdf->render();

        $pdf->stream("Laporan_data_asisten.pdf", [
            'Attachment' => 0
        ]);*/
    }

    public function excel()
    {
         $asisten = $this->model_asisten->tampil_data()->result();

         $spreadsheet = new Spreadsheet;

         $spreadsheet->setActiveSheetIndex(0)
                     ->setCellValue('A1', 'No')
                     ->setCellValue('B1', 'Nama Asisten')
                     ->setCellValue('C1', 'Keterangan')
                     ->setCellValue('D1', 'Kategori')
                     ->setCellValue('E1', 'Harga')
                     ->setCellValue('E1', 'Stok');

         $kolom = 2;
         $nomor = 1;
         foreach($asisten as $art) {

              $spreadsheet->setActiveSheetIndex(0)
                          ->setCellValue('A' . $kolom, $nomor)
                          ->setCellValue('B' . $kolom, $art->nama_art)
                          ->setCellValue('C' . $kolom, $art->keterangan)
                          ->setCellValue('C' . $kolom, $art->kategori)
                          ->setCellValue('C' . $kolom, $art->harga)
                          ->setCellValue('E' . $kolom, $art->stok);

              $kolom++;
              $nomor++;

         }

         $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}