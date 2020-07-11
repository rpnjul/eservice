<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Stoks extends CI_Controller {

    var $template = 'admin/admin_template';
    var $path = 'public/stoks/';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('Stok');
        $this->load->model('Category');
        $this->load->model('Media');
        $this->load->library('pagination');
    }

    function index() {

        #Pagination COde ----------------------------------
        $Stoks = $this->Stok->getStoks();

        $config['uri_segment'] = 10;
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/admin/Stoks/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['stoks'] = $this->Stok->getStoks($config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['stoks'] = $this->Stok->getStoks($config['per_page'], $this->uri->segment(4));
        endif;

        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------

        $data['status'] = $this->Stok->status;
        $data['content'] = 'admin/Stoks/index';
        $this->load->view($this->template, $data);
    }

    function add() {
        $this->form_validation->set_rules('code', 'code', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');
        $this->form_validation->set_rules('description', 'description', '');
        $this->form_validation->set_rules('stock', 'stock', 'required|numeric');
        $this->form_validation->set_rules('category_id', 'category', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            if ($this->Stok->create()) {

                if ($_FILES['image']['error'] != 4) {
                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload("image")) {
                        
                        $data = $this->upload->data();

                        $filename = $data['orig_name'];
                        $media = array(
                            'type' => 'Stok',
                            'key' => $this->db->insert_id(),
                            'mime' => $data['file_type'],
                            'path' => $this->path . $filename,
                            'description' => $this->input->post('name'),
                            'created' => date('Y-m-d H:i:s')
                        );
                        $this->Media->create($media);
                    } else {
                        $data = $this->upload->data();

                        $filename = $data['orig_name'];
                        $media = array(
                            'type' => 'Stok',
                            'key' => $this->db->insert_id(),
                            'mime' => $data['file_type'],
                            'path' => $this->path . $filename,
                            'description' => $this->input->post('name'),
                            'created' => date('Y-m-d H:i:s')
                        );
                        $this->Media->create($media);
                    }
                }
                $this->session->set_flashdata('success', 'Stok created');
                redirect('admin/Stoks/index');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
                redirect('admin/Stoks/add');
            }
        }

        $data['status'] = $this->Stok->status;
        $data['categories'] = $this->Category->getDropDown();
        $data['content'] = 'admin/Stoks/add';
        $this->load->view($this->template, $data);
    }
	
	function add_stok() {
        $this->form_validation->set_rules('code', 'code', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');
        $this->form_validation->set_rules('description', 'description', '');
        $this->form_validation->set_rules('stock', 'stock', 'required|numeric');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('category_id', 'category', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            if ($this->Stok->create()) {

                if ($_FILES['image']['error'] != 4) {
                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload("image")) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/Stoks/index');
                    } else {
                        $data = $this->upload->data();

                        $filename = $data['orig_name'];
                        $media = array(
                            'type' => 'Stok',
                            'key' => $this->db->insert_id(),
                            'mime' => $data['file_type'],
                            'path' => $this->path . $filename,
                            'description' => $this->input->post('name'),
                            'created' => date('Y-m-d H:i:s')
                        );
                        $this->Media->create($media);
                    }
                }
                $this->session->set_flashdata('success', 'Stok created');
                redirect('admin/Stoks/index');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
                redirect('admin/Stoks/add');
            }
        }

        $data['status'] = $this->Stok->status;
        $data['categories'] = $this->Category->getDropDown();
        $data['content'] = 'admin/Stoks/add_stok';
        $this->load->view($this->template, $data);
    }	

    function edit($id = null) {

        if ($id == null) {
            $id = $this->input->post('id');
        }
        $this->form_validation->set_rules('code', 'code', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');
        $this->form_validation->set_rules('description', 'description', '');
        $this->form_validation->set_rules('stock', 'stock', 'required|numeric');
        $this->form_validation->set_rules('category_id', 'category', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {

            if ($this->Stok->update($id)) {

                if ($_FILES['image']['error'] != 4) {

                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                 
                }
                $this->session->set_flashdata('success', 'Stok edited');
                redirect('admin/Stoks/index');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
                redirect('admin/Stoks/edit/' . $id);
            }
        }
        $data['stok'] = $this->Stok->getStoksById($id);
        $data['status'] = $this->Stok->status;
        $data['categories'] = $this->Category->getDropDown();
        $data['content'] = 'admin/Stoks/edit';
        $this->load->view($this->template, $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Invalid Stok');
            redirect('admin/Stoks/index');
        } else {
            if ($this->Stok->delete($id)) {
                $this->Media->deleteByTypeAndKey('Stok', $id);
                $this->session->set_flashdata('success', 'Stok deleted');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again!');
            }
            redirect('admin/Stoks/index');
        }
    }

}

?>
