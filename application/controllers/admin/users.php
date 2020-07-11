<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller {

    var $template = 'admin/admin_template';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('User');
    }

    function index() {
    
        $data['users'] = $this->User->findAll();
        $data['status'] = $this->User->status;
        $data['level'] = $this->User->level;
        $data['content'] = 'admin/users/index';
        $this->load->view($this->template, $data);
    }

    function add() {
     
        $this->form_validation->set_rules('full_name', 'full name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', '');
        $this->form_validation->set_rules('address', 'address', '');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'password confirm', 'required|matches[password]');

        if ($this->form_validation->run() == TRUE) {
            $this->User->admin_create();
            $this->session->set_flashdata('success', 'User created');
            redirect('admin/users/index');
        }
        $data['status'] = $this->User->status;
        $data['level'] = array(0 => $this->User->level[0], 1 => $this->User->level[1], 2 => $this->User->level[2]) ;
        $data['content'] = 'admin/users/add';
        $this->load->view($this->template, $data);
    }

    function add_player() {
     
        $this->form_validation->set_rules('full_name', 'full name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', '');
        $this->form_validation->set_rules('address', 'address', '');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'password confirm', 'required|matches[password]');

        if ($this->form_validation->run() == TRUE) {
            $this->User->create();
            $this->session->set_flashdata('success', 'User created');
            redirect('admin/users/index');
        }
        $data['status'] = $this->User->status;
        $data['level'] = array(2 => $this->User->level[2]) ;
        $data['content'] = 'admin/users/add';
        $this->load->view($this->template, $data);
    }

    function edit($id = null) {
       
        if ($id == null) {
            $id = $this->input->post('id');
        }

        $this->form_validation->set_rules('full_name', 'full name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', '');
        $this->form_validation->set_rules('address', 'address', '');
        if ($this->input->post('password')):
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('confirm_password', 'password confirm', 'required|matches[password]');
        endif;

        if ($this->form_validation->run() == TRUE) {
            $this->User->update($id);
            $this->session->set_flashdata('success', 'User edited');
            redirect('admin/users/index');
        }
        $data['user'] = $this->User->getUserById($id);
        $data['status'] = $this->User->status;
        $data['level'] = array(0 => $this->User->level[0]);
        $data['content'] = 'admin/users/edit';
        $this->load->view($this->template, $data);
    }

    function profile() {

        $this->form_validation->set_rules('full_name', 'full name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', '');
        $this->form_validation->set_rules('address', 'address', '');

        if ($this->input->post('password')):
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('confirm_password', 'password confirm', 'required|matches[password]');

        endif;
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->User->update($this->session->userdata('id'));
            $this->session->set_flashdata('success', 'Profile edited');
            redirect('admin/users/profile');
        }
        $data['user'] = $this->User->getUserById($this->session->userdata('id'));
        $data['content'] = 'admin/users/profile';
        $this->load->view($this->template, $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Invalid user');
            redirect('admin/users/index');
        } else {
           if ($this->User->delete_users($id)) {
            $this->session->set_flashdata('success', 'User deleted');
          }
           else {
                $this->session->set_flashdata('success', 'User deleted');
            }
             redirect('admin/users/index');
        }
    }

    function logout() {

        $this->session->sess_destroy();
        redirect('users/login');
    }

}

?>
