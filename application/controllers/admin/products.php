<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Controller {

    var $template = 'admin/admin_template';
    var $path = 'public/products/';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('Product');
        $this->load->model('Category');
        $this->load->model('Media');
        $this->load->library('pagination');
    }

    function index() {

        #Pagination COde ----------------------------------
        $products = $this->Product->getProducts();

        $config['uri_segment'] = 10;
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/admin/products/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['products'] = $this->Product->getProducts($config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['products'] = $this->Product->getProducts($config['per_page'], $this->uri->segment(4));
        endif;

        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------

        $data['status'] = $this->Product->status;
        $data['content'] = 'admin/products/index';
        $this->load->view($this->template, $data);
    }

    function add() {
        $this->form_validation->set_rules('code', 'code', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');
        $this->form_validation->set_rules('description', 'description', '');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('category_id', 'category', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            if ($this->Product->create()) {

                if ($_FILES['image']['error'] != 4) {
                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload("Xproduct")) {
                        
                        $data = $this->upload->data();

                        $filename = $data['orig_name'];
                        $media = array(
                            'type' => 'product',
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
                            'type' => 'product',
                            'key' => $this->db->insert_id(),
                            'mime' => $data['file_type'],
                            'path' => $this->path . $filename,
                            'description' => $this->input->post('name'),
                            'created' => date('Y-m-d H:i:s')
                        );
                        $this->Media->create($media);
                    }
                }
                $this->session->set_flashdata('success', 'Product created');
                redirect('admin/products/index');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
                redirect('admin/products/add');
            }
        }

        $data['status'] = $this->Product->status;
        $data['categories'] = $this->Category->getDropDown();
        $data['content'] = 'admin/products/add';
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
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('category_id', 'category', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {

            if ($this->Product->update($id)) {

                if ($_FILES['image']['error'] != 4) {

                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload("image")) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/products/index');
                    } else {
                        $data = $this->upload->data();

                        $filename = $data['orig_name'];
                        $media = array(
                            'type' => 'product',
                            'key' => $id,
                            'mime' => $data['file_type'],
                            'path' => $this->path . $filename,
                            'description' => $this->input->post('name'),
                            'created' => date('Y-m-d H:i:s')
                        );
                        $this->Media->create($media);
                    }
                }
                $this->session->set_flashdata('success', 'Product edited');
                redirect('admin/products/index');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again !');
                redirect('admin/products/edit/' . $id);
            }
        }
        $data['product'] = $this->Product->getProductsById($id);
        $data['status'] = $this->Product->status;
        $data['categories'] = $this->Category->getDropDown();
        $data['content'] = 'admin/products/edit';
        $this->load->view($this->template, $data);
    }
	
	function close() {
		$this->Product->close();
		redirect('admin/dashboard');
	}
	
	function open() {
		$this->Product->open();
		redirect('admin/dashboard');
	}

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Invalid product');
            redirect('admin/products/index');
        } else {
            if ($this->Product->delete($id)) {
                $this->Media->deleteByTypeAndKey('product', $id);
                $this->session->set_flashdata('success', 'Product deleted');
            } else {
                $this->session->set_flashdata('error', 'Failed, try again!');
            }
            redirect('admin/products/index');
        }
    }

}

?>
