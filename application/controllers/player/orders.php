<?php

/*
 * To change this template, choose Tools | Templates
 * and open the  template in the editor.
 */

class Orders extends CI_Controller {

    var $template = 'player/player_template';

    function __construct() {
        parent::__construct();
        $this->general->cekPlayerLogin();
		$this->load->model('Stok');
        $this->load->model('Confirmation');
        $this->load->model('Order');
		$this->load->model('Category');
		$this->load->model('Add_on');
        $this->load->model('Order_detail');
        $this->load->model('User');
        $this->load->library('pagination');
    }

    function index() {

        #Pagination COde ----------------------------------
        $orders = $this->Order->getAll();
        $stat = 2 ;
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($orders);
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/player/orders/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['orders'] = $this->Order->getOrders(array('status' => $stat), $config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['orders'] = $this->Order->getOrders(array('status' => $stat), $config['per_page'], $this->uri->segment(4));
        endif;

        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------

        $data['paymentMethods'] = $this->Order->paymentMethods;
        $data['status'] = $this->Order->status;
        $data['content'] = 'player/orders/index';
        $this->load->view($this->template, $data);
    }

    function detail($id) {
        $data['order'] = $this->Order->getById($id);
        if (empty($data['order'])) {

            redirect('order/history');
        }
		$data['total'] = $this->Add_on->sql($id);
        $data['orderDetails'] = $this->Order_detail->getByOrderId($data['order']['id']);
		$data['banyak'] = $this->Add_on->sql_banyak($data['order']['id']);
		$data = array(
				'addonDetails' => $this->Add_on->getById($id),
				'order' => $this->Order->getById($id),
				'banyak' => $this->Add_on->sql_banyak($data['order']['id']),
				'orderDetails' => $this->Order_detail->getByOrderId($data['order']['id']),
				'total' => $this->Add_on->sql($id),
				'confirmation' => $this->Confirmation->getByOrderId($data['order']['id'])
			);
        $data['confirmation'] = $this->Confirmation->getByOrderId($data['order']['id']);
        $data['user'] = $this->User->getUserById($data['order']['user_id']);
        $data['paymentMethods'] = $this->Order->paymentMethods;
        $data['status'] = $this->Order->status;
        $data['content'] = 'player/orders/detail';
        $this->load->view($this->template, $data);
    }
	
	 function addon($id = null) {

        if ($id == null) {
            $id = $this->input->post('id');
        }
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('stok_price', 'stok_price', 'required|numeric');
        $this->form_validation->set_rules('qty', 'qty', 'required|numeric');
        $this->form_validation->set_error_delimiters('', '<br/>');
		if ($this->form_validation->run() == TRUE) {
            $this->Add_on->create_add();
            $this->session->set_flashdata('success', 'Additional Item added');
            redirect('index.php/player/working');
        }
		$data['stok'] = $this->Stok->get_stok_query();
        $data['order'] = $this->Order->getById($id);
        $data['detail'] = $this->Order_detail->getByOrderId($data['order']['id']);
        $data['user'] = $this->User->getUserById($data['order']['user_id']);
        $data['content'] = 'player/orders/addon';
        $this->load->view($this->template, $data);
    }
	

	

    function approve() {
        $confirmationId = $this->input->post('id');
        $confirmation = $this->Confirmation->getById($confirmationId);
        $mekanik_id = $this->User->getUserById($this->session->userdata('id'));
        $order = $this->Order->getById($confirmation['order_id']);
        
        
        if (!empty($order)) {
            $dataOrder = array(
                'mekanik_id' => $mekanik_id['id'],
                'status' => 3 //approve order
            );
            if ($this->Order->update($dataOrder, $order['id'])) {
                $confirmationData = array(
                    'mekanik_id' => $mekanik_id['id'],
                    'status' => 3
                );
                $this->Confirmation->update($confirmationData, $confirmationId);
                $this->session->set_flashdata('success', 'Orderan Berhasil Diambil!');



                // --------------Send notification email------------//
                $this->load->library('email');
                $config['protocol'] = 'mail';
//                $config['smtp_host'] = 'mail.bukutablet.com';
//                $config['smtp_user'] = 'noreply@bukutablet.com';
//                $config['smtp_pass'] = 'noreply';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $user = $this->User->getUserById($order['user_id']);
                $this->email->to($user['email']);
                $this->email->from($this->general->getSetting('Email.Admin'));
                $this->email->subject('Your Order Approved - Tokokita ');
                $message = '';
                $email['order'] = $this->Order->getById($order['id']);
                $email['orderDetails'] = $this->Order_detail->getByOrderId($email['order']['id']);
                $email['paymentMethods'] = $this->Order->paymentMethods;
                $email['status'] = $this->Order->status;
                $email['user'] = $user;
                $message .= $this->load->view('email/approve', $email, TRUE);
                
                $this->email->message($message);
                $this->email->send();
                //-------------------------------------------------//
                
                
                
                redirect('player/orders/detail/' . $confirmation['order_id']);
            } else {
                $this->session->set_flashdata('error', 'Approval process failed, try again!');
                redirect('player/orders/detail/' . $confirmation['order_id']);
            }
        } else {
            $this->session->set_flashdata('error', 'Approval process failed, try again!');
            redirect('player/orders/detail/' . $confirmation['order_id']);
        }
    }

    function success() {
        $confirmationId = $this->input->post('id');
        $confirmation = $this->Confirmation->getById($confirmationId);
        $mekanik_id = $this->User->getUserById($this->session->userdata('id'));
        $order = $this->Order->getById($confirmation['order_id']);
        
        
        if (!empty($order)) {
            $dataOrder = array(
                'mekanik_id' => $mekanik_id['id'],
                'status' => 1 //approve order
            );
            if ($this->Order->update($dataOrder, $order['id'])) {
                $confirmationData = array(
                    'mekanik_id' => $mekanik_id['id'],
                    'status' => 1
                );
                $this->Confirmation->update($confirmationData, $confirmationId);
                $this->session->set_flashdata('success', 'Approval process success!');



                // --------------Send notification email------------//
                $this->load->library('email');
                $config['protocol'] = 'mail';
//                $config['smtp_host'] = 'mail.bukutablet.com';
//                $config['smtp_user'] = 'noreply@bukutablet.com';
//                $config['smtp_pass'] = 'noreply';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $user = $this->User->getUserById($order['user_id']);
                $this->email->to($user['email']);
                $this->email->from($this->general->getSetting('Email.Admin'));
                $this->email->subject('Your Order Approved - Tokokita ');
                $message = '';
                $email['order'] = $this->Order->getById($order['id']);
                $email['orderDetails'] = $this->Order_detail->getByOrderId($email['order']['id']);
                $email['paymentMethods'] = $this->Order->paymentMethods;
                $email['status'] = $this->Order->status;
                $email['user'] = $user;
                $message .= $this->load->view('email/approve', $email, TRUE);
                
                $this->email->message($message);
                $this->email->send();
                //-------------------------------------------------//
                
                
                
                redirect('player/orders/detail/' . $confirmation['order_id']);
            } else {
                $this->session->set_flashdata('error', 'Approval process failed, try again!');
                redirect('player/orders/detail/' . $confirmation['order_id']);
            }
        } else {
            $this->session->set_flashdata('error', 'Approval process failed, try again!');
            redirect('player/orders/detail/' . $confirmation['order_id']);
        }
    }

}

?>
