<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Media extends CI_Model {

    var $table = 'media';

    function create($data = array()) {

        $this->deleteByTypeAndKey($data['type'], $data['key']);
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function findSingle($type, $key) {
        $this->db->where('type', $type);
        $this->db->where('key', $key);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function findMultiple($type, $key, $limit = null, $offset = null) {
        $this->db->where('type', $type);
        $this->db->where('key', $key);
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function update($data = array(), $conditions = array()) {
        $this->db->where($conditions);
        $this->db->update($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function delete($conditions = array()) {
        $this->db->where($conditions);
        $this->db->delete($this->table);
    }

    function deleteByTypeAndKey($type, $key) {
        $media = $this->findSingle($type, $key);
        if (!empty($media)) {
            if ($this->general->isExistFile($media['media'])) {
                unlink($media['path']);
            }
            $conditions = array(
                'type' => $type,
                'key' => $key
            );
            $this->delete($conditions);
        }
    }

    function isExist($type, $key) {
        $this->db->where('type', $type);
        $this->db->where('key', $key);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function updateMedia($path, $type, $key, $description) {

        $data = array(
            'path' => $path,
            'description' => $description
        );
        $this->db->where('type', $type);
        $this->db->where('key', $key);
        $this->db->update($this->table, $data);
    }

}

?>
