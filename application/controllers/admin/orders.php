<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Orders extends CI_Controller {

    var $template = 'admin/admin_template';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('Confirmation');
        $this->load->model('Order');
        $this->load->model('Order_detail');
		$this->load->model('Add_on');
        $this->load->model('User');
        $this->load->library('pagination');
    }
 
    function index() {

        #Pagination COde ----------------------------------
        $orders = $this->Order->getAll();

        $config['uri_segment'] = 4;
        $config['total_rows'] = count($orders);
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/admin/orders/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['orders'] = $this->Order->getOrders(array(), $config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['orders'] = $this->Order->getOrders(array(), $config['per_page'], $this->uri->segment(4));
        endif;

        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------

        $data['paymentMethods'] = $this->Order->paymentMethods;
        $data['status'] = $this->Order->status;
        $data['content'] = 'admin/orders/index';
        $this->load->view($this->template, $data);
    }

     function detail($id) {
        $data['order'] = $this->Order->getById($id);
        if (empty($data['order'])) {

            redirect('order/history');
        }
        $data['orderDetails'] = $this->Order_detail->getByOrderId($data['order']['id']);
        $data['confirmation'] = $this->Confirmation->getByOrderId($data['order']['id']);
        $data['user'] = $this->User->getUserById($data['order']['user_id']);
        $data['paymentMethods'] = $this->Order->paymentMethods;
		$data['banyak'] = $this->Add_on->sql_banyak($data['order']['id']);
        $data['status'] = $this->Order->status;
		$data = array (
				'order' => $this->Order->getById($id),
				'banyak' => $this->Add_on->sql_banyak($data['order']['id']),
				'orderDetails' => $this->Order_detail->getByOrderId($data['order']['id']),
				'confirmation' => $this->Confirmation->getByOrderId($data['order']['id']),
				'user' => $this->User->getUserById($data['order']['user_id']),
				'paymentMethods' => $this->Order->paymentMethods,
				'status' => $this->Order->status,
				'addonDetails'  => $this->Add_on->getById($id),
				'total' => $this->Add_on->sql($data['order']['id']),
				);
        $data['content'] = 'admin/orders/detail';
        $this->load->view($this->template, $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Invalid Order ID');
            redirect('admin/orders');
        } else {
           if ($this->Order->delete($id)) {
            $this->session->set_flashdata('success', 'Order deleted');
          }
           else {
                $this->session->set_flashdata('success', 'Order deleted');
            }
             redirect('admin/orders');
        }

    }
 
    function approve() {
        $confirmationId = $this->input->post('id');
        $confirmation = $this->Confirmation->getById($confirmationId);

        $order = $this->Order->getById($confirmation['order_id']);
        
        
        if (!empty($order)) {
            $dataOrder = array(
                'status' => 2 //approve order
            );
            if ($this->Order->update($dataOrder, $order['id'])) {
                $confirmationData = array(
                    'status' => 2
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
                $this->email->subject('Your Order Approved');
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
                
                
                
                redirect('admin/orders/detail/' . $confirmation['order_id']);
            } else {
                $this->session->set_flashdata('error', 'Approval process failed, try again!');
                redirect('admin/orders/detail/' . $confirmation['order_id']);
            }
        } else {
            $this->session->set_flashdata('error', 'Approval process failed, try again!');
            redirect('admin/orders/detail/' . $confirmation['order_id']);
        }
    }

}

?>
