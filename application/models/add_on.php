<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Add_on extends CI_Model {

    var $table = 'addon';

    function __construct() {
        parent::__construct();
    }

	 function create_add() {
		$date = Date('Y/m/d');
		$total = $this->input->post('stok_price') * $this->input->post('qty');
		 
        $data = array(
			'order_id' => $this->input->post('order_id'),
			'date' => $date,
			'username' => $this->input->post('username'),
			'stok_name' => $this->input->post('name'), 
			'stok_price' => $total,
			'qty' => $this->input->post('qty')  
        );
		
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
	
	
	function sql($id){
		$this->db->select('SUM(stok_price) as total');
		$this->db->where('order_id', $id);
		$this->db->from('addon');
		return $this->db->get()->row()->total;
	}
	
	 function getByOrderId($orderId) {
        $this->db->where('order_id', $orderId);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
	function sql_banyak($id){
		$this->db->select('COUNT(*) as jumlah');
		$this->db->where('order_id', $id);
		$this->db->from('addon');
		return $this->db->get()->row()->jumlah;
	}
	
   function getById($id) {
    $this->db->select('*');
    $this->db->from('addon');
    $this->db->where('order_id',$id);
    $this->db->order_by('id', 'DESC');
    return $this->db->get()->result();
}

}
?>