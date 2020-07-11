<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class General {

    var $ci;

    function __construct() {
        $this->ci = &get_instance();
//        $this->isLogin();
    }

    function isLogin() {
        if ($this->ci->session->userdata('is_login') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	

    function cekUserLogin() {
        if ($this->isLogin() != TRUE) {
            $this->ci->session->set_flashdata('message', 'Anda tidak memiliki hak akses');
            redirect('users/login');
        }
    }

    function cekAdminLogin() {
        if ($this->isLogin() == TRUE) {
            if ($this->ci->session->userdata('level') != 1) {
                $this->ci->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
                redirect('users/login');
            }
        } else {
            $this->ci->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
            redirect('users/login');
        }
    }

    function cekPlayerLogin() {
        if ($this->isLogin() == TRUE) {
            if ($this->ci->session->userdata('level') != 2) {
                $this->ci->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
                redirect('users/login');
            }
        } else {
            $this->ci->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
            redirect('users/login');
        }
    }

    function getNewProducts($limit) {
        $this->ci->load->model('Product');
        $products = $this->ci->Product->getNewProducts($limit);
        return $products;
    }


    function getProductsByCategoryId($categoryId) {
        $this->ci->load->model('Product');
        $products = $this->ci->Product->getProductsByCategoryId($categoryId);
        return $products;
    }

    function getCategories() {
        $this->ci->load->model('Category');
        $categories = $this->ci->Category->getCategories();
        return $categories;
    }
 
    function getDiscountedProducts() {
        $this->ci->load->model('Product');
        $products = $this->ci->Product->getDiscountedProducts();
        return $products;
    }

	function getPages() {
		$this->ci->load->model('Page');
		$page = $this->ci->Page->getPages();
        return $page;
	}
		
    function getPagesByPermalink($permalink) {
        $this->ci->load->model('Page');
        $page = $this->ci->Page->getPagesByPermalink($permalink);
        return $page;
    }

    function generateRandomCode($length = 3) {
        // Available characters
        $chars = '0123456789';
        $length= 5;
        $format = "ymd";
        $Code = date($format);
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper($Code);
    }

    function getSetting($key) {
        $this->ci->load->model('Setting');
        $setting = $this->ci->Setting->getSettingByKey($key);
        return $setting['value'];
    }

    function getSingleMedia($type, $key) {

        $this->ci->load->model('Media');
        $image = $this->ci->Media->findSingle($type, $key);
        return $image;
    }

    public function humanDate($datetime) {
        return date("D, d M Y H:i:s", strtotime($datetime));
    }

    public function humanDate2($date) {
        return date("D, d M Y", strtotime($date));
    }

    function isExistFile($filename) {
//        echo $filename;exit;
        if (file_exists($filename)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function setPaymentDeadline($days) {

        $dueDate = mktime(0, 0, 0, date("m"), date("d") + $days, date("Y"));
        return date("Y-m-d", $dueDate);
    }

    function getBankName() {
        $setting = $this->getSetting('Bank.Name');
        $banks = explode(',', $setting);
        return $banks;
    }

    function getSlides() {
        $this->ci->load->model('Slide');
        $this->ci->load->model('Media');
        $slides = $this->ci->Slide->findActive();
        $data = array();
        $i = 0;
        if (!empty($slides)):
            foreach ($slides as $slide) {
                $image = $this->ci->Media->findSingle('slide', $slide['id']);
                $data[$i]['id'] = $slide['id'];
                $data[$i]['path'] = $image['path'];
                $data[$i]['title'] = $slide['title'];
                $data[$i]['description'] = $slide['description'];
                $i++;
            }
        endif;
        return $data;
    }

    function isExistNextSlide($position) {
        $this->ci->load->model('Slide');
        $slide = $this->ci->Slide->getNextSlide($position);
        if (!empty($slide)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function isExistPrevSlide($position) {
        $this->ci->load->model('Slide');
        $slide = $this->ci->Slide->getPrevSlide($position);
        if (!empty($slide)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
