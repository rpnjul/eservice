<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages extends CI_Controller {

    var $template = 'admin/admin_template';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->library('pagination');
        $this->load->model('Page');
    }

    function index($page = null) {

        #Pagination COde ----------------------------------
        $pages = $this->Page->getPages();
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($pages);
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/admin/pages/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['pages'] = $this->Page->getPages($config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['pages'] = $this->Page->getPages($config['per_page'], $this->uri->segment(4));
        endif;

        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------



        $data['status'] = $this->Page->status;
        $data['content'] = 'admin/pages/index';
        $this->load->view($this->template, $data);
    }

    function add() {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('body', 'body', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            if ($this->Page->create()) {
                $this->session->set_flashdata('success', 'Page created');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
            }
            redirect('admin/pages/index');
        }
        $data['status'] = $this->Page->status;
        $data['content'] = 'admin/pages/add';
        $this->load->view($this->template, $data);
    }

    function edit($id = null) {
        if ($id == null) {
            $id = $this->input->post('id');
        }
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('body', 'body', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            if ($this->Page->update($id)) {
                $this->session->set_flashdata('success', 'Page edited');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
            }
            redirect('admin/pages/index');
        }

        $data['page'] = $this->Page->getPagesById($id);
        $data['status'] = $this->Page->status;
        $data['content'] = 'admin/pages/edit';
        $this->load->view($this->template, $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Invalid page');
            redirect('admin/pages/index');
        } else {
            if ($this->Page->delete($id)) {
                $this->session->set_flashdata('success', 'Page deleted');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
            }
            redirect('admin/pages/index');
        }
    }

}

?>
