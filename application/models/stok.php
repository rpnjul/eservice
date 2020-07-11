<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Stok extends CI_Model {

    var $table = 'stoks';
    var $status = array(
        0 => 'draft',
        1 => 'published'
    );
	var $kategori = array (
		17 => 'AC',
		18 => 'Kulkas',
		19 => 'Mesin Cuci'
	);


    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'price' => $this->input->post('price'),
            'discount_percent' => $this->input->post('discount_percent'),
            'net_price' => $this->input->post('price') - ($this->input->post('discount_percent') / 100 * $this->input->post('price')),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'status' => 0,
            'category_id' => $this->input->post('category_id')
        );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getStoks($offset = null, $key = null) {
        $this->db->select('p.id, p.code,p.name,p.description,p.permalink,  p.price, p.discount_percent,p.net_price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');

        if ($key != null) {
            $this->db->like('p.name', $key);
            $this->db->or_like('p.description', $key);
        }
        $query = $this->db->get('Stoks p');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
	
	public function get_stok_query()
	{
		$query = $this->db->get('stoks');
		return $query->result();
	}


    function getStoksPublished($offset = 0, $key = null) {
        $this->db->select('p.id, p.code,p.name,p.description,p.permalink,  p.price, p.discount_percent,p.net_price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('p.status', 1);

        if ($key != null) {
            $this->db->like('p.name', $key);
            $this->db->or_like('p.description', $key);
        }
        $query = $this->db->get('Stoks p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getStoksByCategoryId($categoryId, $offset = 0) {
        $this->db->select('p.id,p.code, p.name,p.description,p.permalink,  p.price, p.discount_percent,p.net_price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('p.category_id', $categoryId);
        $this->db->where('p.status', 1);

 
        $query = $this->db->get('Stoks p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getNewStoks($limit) {
        $this->db->select('p.id,p.code, p.name,p.description,p.permalink,  p.price, p.discount_percent,p.net_price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('status', 1);
        $this->db->limit($limit);
        $query = $this->db->get('Stoks p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getDiscountedStoks() {
        $this->db->select('p.id, p.code,p.name,p.description,p.permalink,  p.price, p.discount_percent,p.net_price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('status', 1);
        $this->db->where('discount_percent !=', 0);
        $query = $this->db->get('Stoks p');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getStoksById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);

        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getProductByCode($code) {
        $this->db->select('*');
        $this->db->where('code', $code);

        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getProductByPermalink($permalink) {
        $this->db->select('p.id, p.name,p.description,p.permalink, p.code,p.category_id, p.price, p.discount_percent,p.net_price, p.discount_percent, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('p.permalink', $permalink);
        $query = $this->db->get('Stoks p', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getStoksByOptions($options = array()) {
        $this->db->where($options);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function update($id) {
        $data = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'price' => $this->input->post('price'),
            'discount_percent' => $this->input->post('discount_percent'),
            'net_price' => $this->input->post('price') - ($this->input->post('discount_percent') / 100 * $this->input->post('price')),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'status' => 0,
            'category_id' => $this->input->post('category_id')
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
