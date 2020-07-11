<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Category');
        $this->load->library('pagination');
        $this->load->library('cart');
    }

    function index($page = null) {
        $products = $this->Product->getProductsPublished();

        $config['uri_segment'] = 3;
        $config['total_rows'] = count($products);
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'index.php/products/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')) {
            $data['products'] = $this->Product->getProductsPublished($config['per_page'], $this->uri->segment(5), $this->input->get('q'));
            $data['products'] = $this->Product->getProductsPublished($config['per_page'], $this->uri->segment(5), $this->input->get('q'));
            if (empty($data['products'])) {
                $this->session->set_flashdata('error', 'I am sorry, we could not find any product !');
                redirect('products');
            }
        } else {
            $data['products'] = $this->Product->getProductsPublished($config['per_page'], $this->uri->segment(5));
        }

        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/index';
        $this->load->view($this->template, $data);
    }

    function detail($permalink) {

        $data['product'] = $this->Product->getProductByPermalink($permalink);
        if (empty($data['product'])) {
            $this->session->set_flashdata('error', 'Invalid product');
            redirect('products');
        }
        $data['content'] = 'products/detail';
        $this->load->view($this->template, $data);
    }

    function category($permalink, $page = null) {
        $data['category'] = $this->Category->getCategoryByPermalink($permalink);
        $products = $this->Product->getProductsByCategoryId($data['category']['id']);
        if (empty($products)) {
            $this->session->set_flashdata('error', 'There is no item in this category');
            redirect('products');
        }
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($products);
        $config['per_page'] = 9;
        $config['base_url'] = base_url() . 'index.php/products/category/' . $permalink . '/';
        $this->pagination->initialize($config);
        $pages_count = ceil($config['total_rows'] / $config['per_page']);
        $page = ($page == 0) ? 1 : $page;
        $offset = $config['per_page'] * ($page - 1);

        $data['products'] = $this->Product->getProductsByCategoryId($data['category']['id'], $config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/category';
        $this->load->view($this->template, $data);
    }

    function add_cart($permalink) {
        $product = $this->Product->getProductByPermalink($permalink);

        $media = $this->general->getSingleMedia('Xproduct', $product['id']);

        $data = array(
            'id' => $product['code'],
            'qty' => 1,
            'price' => $product['net_price'],
            'name' => $product['name'],
			'kategori' -> $product['category_id'],
            'options' => array('pic' => $media['path'], 
			'discount_percent' => $product['discount_percent'])
        );

        if ($this->cart->insert($data)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan silahkan klik <a href="http://localhost/ewar2/index.php/carts">Keranjang Saya</a> untuk melanjutkan ke Pembayaran');
            redirect('products/detail/' . $permalink);
        }
    }

}

?>
