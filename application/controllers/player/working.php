<?php

class Working	 extends CI_Controller {

    var $template = 'player/player_template';

    function __construct() {
        parent::__construct();
        $this->general->cekPlayerLogin();
        $this->load->model('Order');
        $this->load->model('User');
        $this->load->library('pagination');

    } 
 
    function index() {

        #Pagination COde ----------------------------------
        $orders = $this->Order->getAll();
		$id = $this->session->userdata('id');
        $stat = 15;
		$status = 3 OR 4 OR 5;
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($orders);
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/player/working';
         $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['orders'] = $this->Order->getOrders(array('mekanik_id' => $stat,'status' => $status) , $config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['orders'] = $this->Order->getOrders(array('mekanik_id' => $stat,'status' => $status), $config['per_page'], $this->uri->segment(4));
        endif;
        
        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------

        $data['paymentMethods'] = $this->Order->paymentMethods;
        $data['status'] = $this->Order->status;
        $data['content'] = 'player/orders/working';
        $this->load->view($this->template, $data);
    }
}