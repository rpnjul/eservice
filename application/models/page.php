<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Page extends CI_Model {

    var $table = 'pages';
    var $status = array(
        0 => 'draft',
        1 => 'published'
    );

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'title' => $this->input->post('title'),
            'permalink' => url_title(strtolower($this->input->post('title'))),
            'body' => $this->input->post('body'),
            'status' => $this->input->post('status'),
            'created' => date('Y-m-d H:i:s')
        );

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getPages($perPage = 5, $offset = 0, $key = null) {
        $this->db->select('*');
        $this->db->limit($perPage, $offset);
        if ($key != null) {
            $this->db->like('title', $key);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getPagesById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getPagesByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function update($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'permalink' => url_title(strtolower($this->input->post('title'))),
            'body' => $this->input->post('body'),
            'status' => $this->input->post('status'),
            'modified' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return TRUE;
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

}

?>
