<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Category extends CI_Model {

    var $table = 'categories';

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'permalink' => url_title(strtolower($this->input->post('name')))
        );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getCategories() {
        $this->db->select('*');
        $this->db->order_by('name','ASC');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getCategoryById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getCategoryByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'permalink' => url_title(strtolower($this->input->post('name')))
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getDropDown() {
        $this->db->select('id,name');
        $query = $this->db->get($this->table);

        $data = array();
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = $row['name'];
        }

        return $data;
    }

}

?>
