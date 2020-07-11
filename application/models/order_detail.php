<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Order_detail extends CI_Model {

    var $table = 'order_details';

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
	

    function getByOrderId($orderId) {
        $this->db->where('order_id', $orderId);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

}

?>
