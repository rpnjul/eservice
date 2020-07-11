<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Confirmations extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->model('Confirmation');
        $this->load->model('Order');
    }

    function add($orderCode = null) {
        if ($orderCode == null) {
            $orderCode = $this->input->post('code');
        }

        $this->form_validation->set_rules('sender_bank', 'sender bank', 'required');
        $this->form_validation->set_rules('bank_account_name', 'account name', 'required');
        $this->form_validation->set_rules('receiver_bank', 'destination bank', 'required');
        $this->form_validation->set_rules('total', 'amount', 'required');
        $this->form_validation->set_rules('payment_date', 'payment date', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == true) {
            $order = $this->Order->getByOrderCode($orderCode);
            if ($this->input->post('total') < $order['total']) {
                $this->session->set_flashdata('error', 'Confirmation failed, your amount is less than total order! ');
                redirect('confirmations/add/' . $orderCode);
            } else {
                $confirmation = array(
                    'sender_bank' => $this->input->post('sender_bank'),
                    'bank_account_name' => $this->input->post('bank_account_name'),
                    'receiver_bank' => $this->input->post('receiver_bank'),
                    'amount' => $this->input->post('total'),
                    'payment_date' => $this->input->post('payment_date'),
                    'status' => 0,
                    'order_id' => $order['id'],
                    'created' => date('Y-m-d H:i:s')
                );
                if ($this->Confirmation->create($confirmation)) {
                    $orderUpdate = array(
                        'status' => 4 // waiting for approval
                    );
                    $this->Order->update($orderUpdate, $order['id']);
                    $this->session->set_flashdata('success', 'Your confirmation sent successfully, we will process soon. Thanks');
                    redirect('orders/history');
                } else {
                    $this->session->set_flashdata('error', 'Confirmation failed, try again !');
                    redirect('confirmations/add/' . $orderCode);
                }
            }
        }
        $data['content'] = 'confirmations/add';
        $data['order'] = $this->Order->getByOrderCode($orderCode);
        if (empty($data['order'])) {
            redirect('orders/history');
        }
        $data['banks'] = $this->general->getBankName();
        $this->load->view($this->template, $data);
    }

}

?>
