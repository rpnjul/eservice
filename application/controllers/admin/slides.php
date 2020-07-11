<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Slides extends CI_Controller {

    var $template = 'admin/admin_template';
    var $path = 'public/slides/';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('Slide');
        $this->load->model('Media');
    }

    function index($page = null) {

        $this->load->library('pagination');
        $config['uri_segment'] = 4;
        $config['total_rows'] = $this->Slide->countAll();
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'admin/slides/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $q = $this->input->get('q');
        else:
            $data['slides'] = $this->Slide->findAll($config['per_page'], $this->uri->segment(4));
        endif;
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'admin/slides/index';
        $data['status'] = $this->Slide->status;
        $this->load->view($this->template, $data);
    }

    function add() {
        $this->form_validation->set_rules('title', 'title', 'required|xss_clean');
        $this->form_validation->set_rules('description', 'description', 'required|xss_clean');
        $this->form_validation->set_rules('status', 'status', 'required|xss_clean');
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == TRUE) {

            if ($_FILES['image']['error'] != 4) {

                $this->Slide->create();
                $slide_id = $this->db->insert_id();
                $this->Slide->setPosition($slide_id, $slide_id);
                $config['upload_path'] = $this->path;
                $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                $config['max_size'] = $this->general->getSetting('maxImageSize');

                $this->load->library('upload', $config);


                if (!$this->upload->do_upload("image")) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    redirect('admin/slides/index');
                } else {
                    $data = $this->upload->data();

                    $filename = $data['orig_name'];
                    $media = array(
                        'type' => 'slide',
                        'key' => $slide_id,
                        'mime' => $data['file_type'],
                        'path' => $this->path . $filename,
                        'description' => $this->input->post('name'),
                        'created' => date('Y-m-d H:i:s')
                    );
                    $this->Media->create($media);
                    $this->session->set_flashdata('success', 'Slide created');
                    redirect('admin/slides/index');
                }
            } else {
                $this->session->set_flashdata('error', 'Failed, image is required');
                redirect('admin/slides/add');
            }
        }

        $data['status'] = $this->Slide->status;
        $data['content'] = 'admin/slides/add';
        $this->load->view($this->template, $data);
    }

    function edit($id = null) {

        if ($id == null) {
            $id = $this->input->post('id');
        }
        $this->form_validation->set_rules('description', 'description', 'required|xss_clean');
        $this->form_validation->set_rules('status', 'status', 'required|xss_clean');
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == TRUE) {
            $this->Slide->update($id);
            $slide_id = $id;

            if ($_FILES['image']['error'] != 4) {
              
                if ($this->general->isExistFile($this->path . $_FILES['image']['name'])) {
                    unlink($this->path . $_FILES['image']['name']);
                }
                $config['upload_path'] = $this->path;
                $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                $config['max_size'] = $this->general->getSetting('maxImageSize');

                $this->load->library('upload', $config);


                if ($this->upload->do_upload("image")) {
                    $media = $this->upload->data();

                    
                    $path = $this->path . $media['orig_name'];



                    $description = $this->input->post('description');
                    if ($this->Media->isExist('slide', $slide_id) == TRUE) {
                        $this->Media->updateMedia($path, 'slide', $slide_id, $description);
                    } else {

                        $media = array(
                            'type' => 'slide',
                            'key' => $slide_id,
                            'mime' => $data['file_type'],
                            'path' => $path,
                            'description' => $description,
                            'created' => date('Y-m-d H:i:s')
                        );
                        $this->Media->create($media);
                    }
                    $this->session->set_flashdata('success', 'Slide edited');
                    redirect('admin/slides');
                }
            } else {
                $this->session->set_flashdata('success', 'Slide edited');
                redirect('admin/slides');
            }
        }

        $data['slide'] = $this->Slide->findById($id);
        $data['image'] = $this->Media->findSingle('slide', $id);
        $data['status'] = $this->Slide->status;
        $data['content'] = 'admin/slides/edit';
        $this->load->view($this->template, $data);
    }

    function up($position = null) {
        if ($position == null) {
            $this->session->set_flashdata('error', 'Invalid slide');
            redirect('admin/slides');
        } else {
            $currentSlide = $this->Slide->findByPosition($position);
            $prevSlide = $this->Slide->getPrevSlide($position);
            if (!empty($prevSlide)) {
                $currentSlideId = $currentSlide['id'];
                $currentSlideNewPosition = $prevSlide['position'];
                $this->Slide->setPosition($currentSlideId, $currentSlideNewPosition);

                $prevSlideId = $prevSlide['id'];
                $prevSlideNewPosition = $currentSlide['position'];
                $this->Slide->setPosition($prevSlideId, $prevSlideNewPosition);
                redirect('admin/slides');
            } else {
                $this->session->set_flashdata('error', 'There is no previous slide');
                redirect('admin/slides');
            }
        }
    }

    function down($position = null) {
        if ($position == null) {
            $this->session->set_flashdata('error', 'Invalid slide');
            redirect('admin/slides');
        } else {
            $currentSlide = $this->Slide->findByPosition($position);

            $nextSlide = $this->Slide->getNextSlide($position);

            if (!empty($nextSlide)) {
                $currentSlideId = $currentSlide['id'];
                $currentSlideNewPosition = $nextSlide['position'];
                $this->Slide->setPosition($currentSlideId, $currentSlideNewPosition);

                $nextSlideId = $nextSlide['id'];
                $nextSlideNewPosition = $currentSlide['position'];
                $this->Slide->setPosition($nextSlideId, $nextSlideNewPosition);
                redirect('admin/slides');
            } else {
                $this->session->set_flashdata('error', 'There is no next slide');
                redirect('admin/slides');
            }
        }
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('success', 'Invalid slide');
            redirect('admin/slides');
        } else {
            $media = $this->Media->findSingle('slide', $id);
            if (!empty($media)) {
                unlink($media['path']);
            }
            $this->Slide->destroy($id);
            $this->session->set_flashdata('success', 'Slide deleted');
            redirect('admin/slides');
        }
    }

}

?>
