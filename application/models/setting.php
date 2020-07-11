<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Setting extends CI_Model {

    var $table = 'settings';

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'key' => $this->input->post('key'),
            'value' => $this->input->post('value'),
            'description' => $this->input->post('description')
        );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function update($id) {
        $data = array(
            'value' => $this->input->post('value'),
            'description' => $this->input->post('description')
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getSettingByKey($key) {
        $this->db->select('*');
        $this->db->where('key', $key);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getSettings() {
        $this->db->select('*');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getSettingById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
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
