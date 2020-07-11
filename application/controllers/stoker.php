<?php
class Stoker extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_stok');
    }
    function index(){
        $x['data']=$this->m_stok->get_kategori();
        $this->load->view('test/v_kategori',$x);
    }
 
    function get_subkategori(){
        $id=$this->input->post('id');
        $data=$this->m_stok->get_subkategori($id);
        echo json_encode($data);
    }
}