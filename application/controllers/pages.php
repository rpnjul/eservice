<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Page');
		$this->load->library('cart');
    }

    function home() {
		$data['cart_total'] = $this->cart->total_items();
        $data['content'] = 'pages/home';
        $this->load->view($this->template, $data);
    }

    function read($permalink = null) {
        if ($permalink == null) {
            $this->session->set_flashdata('message', 'Halaman tidak ditemukan');
            redirect('pages/home');
        }

        $data['page'] = $this->Page->getPagesByPermalink($permalink);
        $data['content'] = 'pages/read';
        $this->load->view($this->template, $data);
    }

}

?>
