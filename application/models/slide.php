<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Slide extends CI_Model {

    var $table = 'slides';
    var $status = array(
        0 => 'draft',
        1 => 'published'
    );

    function __construct() {
        parent::__construct();
    }

    function findAll($limit = 100, $offset = 0) {
        $this->db->select('slides.*');
        $this->db->limit($limit, $offset);
        $this->db->order_by('position', 'ASC');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function findActive() {
        $this->db->select('slides.*');
        $this->db->where('status', 1);
        $this->db->order_by('position', 'ASC');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function findById($id) {
        $this->db->select('slides.*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function findByPosition($position) {
        $this->db->select('slides.*');
        $this->db->where('position', $position);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function countAll() {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    function create() {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function update($id) {

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function setPosition($id, $position) {
        $data = array(
            'position' => $position
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function getPrevSlide($position) {
        $this->db->where('position <', $position);
        $this->db->order_by('position', 'DESC');
        $query = $this->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getNextSlide($position) {
        $this->db->where('position >', $position);
        $this->db->order_by('position', 'ASC');
        $query = $this->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}

?>
