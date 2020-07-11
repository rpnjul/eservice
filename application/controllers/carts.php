<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Carts extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    function index() {
        $data['carts'] = $this->cart->contents();
        $data['content'] = 'carts/index';
        $this->load->view($this->template, $data);
    }

    function delete($rowId) {
        $data = array('rowid' => $rowId, 'qty' => 0);

        $this->cart->update($data);
        $this->session->set_flashdata('success', 'Item deleted');
        redirect('carts/index');
    }

    function update() {

        $this->cart->update($_POST);
        $this->session->set_flashdata('success', 'Shopping cart updated');
        redirect('carts/index');
    }

}

?>
